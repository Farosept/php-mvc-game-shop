<?php
   class CartSession
    {
       public $lineCollection = array();
       public function AddItem($id, $quantity)
        {
            include 'connection.php';
            $query = "SELECT * FROM games where id='$id'";
            $result = mysqli_query($link,$query) or die("Ошибка " . mysqli_error($link));
            $game = mysqli_fetch_assoc($result);
            if(!empty($this->lineCollection))
            foreach($this->lineCollection as $l)
            {
                if($l->Game['id']==$game['id'])
                {
                    $l->Quantity+=$quantity;
                    return;
                }
            }
            $ct= new CartLine();
            $ct->Game=$game;
            $ct->Quantity=$quantity;
            $this->lineCollection[]=$ct;
        }

        public function RemoveLine($id)
        {
            session_start();
            for($i=0;$i<count($this->lineCollection);$i++)
            {
                if($this->lineCollection[$i]->Game['id']==$id)
                {
                    if($this->lineCollection[$i]->Quantity==1)
                    {
                        unset($this->lineCollection[$i]);
                        $this->lineCollection=array_values($this->lineCollection);
                        return;
                    }
                    else
                    {
                        $this->lineCollection[$i]->Quantity--;
                    }
                }
            }   
        }

        public function ComputeTotalValue()
        {
            if(!empty($this->lineCollection))
            foreach($this->lineCollection as $l)
            {
                $sum += $l->Quantity*$l->Game['price'];
            }
            return $sum;

        }
        public function Clear()
        {
            lineCollection.Clear();
        }

       public function Lines()
        {
            
            return $this->lineCollection;
        }
    }

    class CartLine
    {
        public $Game;
        public $Quantity;
    }