<?php
session_start();
class Controller_Account extends Controller
{
    function __construct()
    {
        include 'connection.php';
        $this->modelAccount=new Model_Account($link);
        $this->view=new View();
    }
	function action_login()
	{	
        if(isset($_POST['login']))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $data = $this->modelAccount->get_data($login);
            if($data['password'] ==$password)
            {
                $hash = md5($this->generateCode(10));    
                $id = $data['id'];
                $this->modelAccount->set_hash_login($hash,$id);
                $_SESSION['id']= $id;
                $_SESSION['hash']=$hash;
                $_SESSION['role']=$data['id_role'];
                $_SESSION['login']=$data['login'];
                include "/application/scripts/check.php";
                header("Location: /main/index"); exit(); 
            } 
            else 
            { 
                echo"Вы ввели неправильный логин/пароль<br>"; 
            } 
        }
		$this->view->generate('login_view.php', 'template_view.php',$data);
	}
    function action_register()
    {
        $err=array(); 
    if($_POST['login']!="" && $_POST['pass']!="" && $_POST['confirimpass']!="" && $_POST['email']!=""){
        $login=$_POST['login'];
        $password=$_POST['pass'];
        $email=$_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $err[]= "Некоректный email";
        $confirmpass=$_POST['confirimpass'];
        $err[]=$this->modelAccount->check_user($login);
    }else{
        $err[]="Нужно заполнить все поля!";
    }
    if($password!=$confirmpass) $err[]="Пароли не совпадают"; 
    $i=0;
    foreach($err AS $error) 
      { 
         if($error!=NULL or $error!="")
         {
            $i++;
         }
      }
      if($i>0)
      {
        $this->view->generate('register_view.php', 'template_view.php',$err);
      }
      else
      {
          $login = trim($login);
          $password = trim($password);
          $this->modelAccount->set_data($login,$password,$email);
          header("Location: /account/login"); exit(); 
      }
    }
    function action_logout()
    {
        session_unset();
        header('Location: /main/index'); exit();
    }
    function generateCode($length=6) 
    { 
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789"; 
        $code = ""; 
        $clen = strlen($chars) - 1;   
        while (strlen($code) < $length) 
        { 
            $code .= $chars[mt_rand(0,$clen)];   
        } 
    return $code; 
    } 

}