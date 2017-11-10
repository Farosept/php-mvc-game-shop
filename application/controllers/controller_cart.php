<?php
session_start();
class Controller_Cart extends Controller
{
    function __construct()
    {
        $this->view=new View();
    }
	function action_index()
	{
		$cart = $this->GetCart();
        $data['cart'] = $cart->Lines();
        $data['sum'] = $cart->ComputeTotalValue();
        $this->view->generate('cart_view.php', 'template_view.php',$data);
	}
    function action_AddCart()
    {
        $cart=$this->GetCart();
        $cart->AddItem($_POST['game'],1); 
        header("Location: /cart/index"); 
    }
     function action_DelCart()
    {
        $cart=$this->GetCart();
        $cart->RemoveLine($_GET['del']);
        header("Location: /cart/index"); 
    }
    public function GetCart()
    {
        $cart=$_SESSION['cart'];
        if($cart==NULL)
        { 
            $cart = new CartSession();
            $_SESSION['cart']=$cart;
        }
        return $cart;
    }
}