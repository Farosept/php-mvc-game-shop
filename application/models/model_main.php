<?php
class Model_Game extends Model
{
    public $link;
    public function __construct($link){
        $this->link = $link;
    }
	public function get_data($page,$limit,$quantity)
	{	
        $pl = new PagedList($this->link);
        $list = $pl->get_Page($page,$limit,$quantity);
        $query = "SELECT * FROM games order by releaseDate desc limit $quantity offset $list";
        $result = mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
        $rows = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $rows[]=$row;
        }
        
		return $rows;
	}
    public function get_game($id)
	{	
        $query = "SELECT * FROM games where id='$id'";
        $result = mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
        $row = mysqli_fetch_assoc($result);
        
		return $row;
	}
    public function get_screens($id)
	{	
        $query = "SELECT * FROM photos where id_game='$id'";
        $result = mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
        $rows = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $rows[]=$row;
        }
        
		return $rows;
	}
}
class PagedList
{
        public $link;
    public function __construct($link){
        $this->link = $link;
    }
    public function get_Page($page,$limit,$quantity,$key=NULL)
    {
        $pageData=array();
        if ($page<1) $page=1;
        if(!is_numeric($page)) $page=1;
        $pages=$this->get_pages($quantity,$key);
        if ($page>$pages) $page = 1;
        if (!isset($list)) $list=0;
        $list=--$page*$quantity;
        return $list;
    }
    public function get_pages($quantity,$key=NULL)
    {
        if($key==NULL)
        $query = "SELECT * FROM games";
        else
        $query = $key;
        $result = mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
        $num = mysqli_num_rows($result);
        $pages=$num/$quantity;
        $pages=ceil($pages);
        $pages++;
        return $pages;
    }
}
class Model_Genre extends Model
{
        public $link;
    public function __construct($link){
        $this->link = $link;
    }
	public function get_data()
	{	
        $query = "SELECT * FROM genres";
        $result = mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
        $rows = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $rows[]=$row;
        }
        
		return $rows;
	}
}
class Model_SelectGames extends Model
{
        public $link;
    public function __construct($link){
        $this->link = $link;
    }
	public function get_data($page,$limit,$quantity,$query)
	{
       
        $pl = new PagedList($this->link);
        $list = $pl->get_Page($page,$limit,$quantity,$query);
        $query = $query . " limit $quantity offset $list";
        
        $result = mysqli_query($this->link,$query) or die("Ошибка ssss" . mysqli_error($this->link));
        $rows = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $rows[]=$row;
        }
        
		return $rows;
	}
}
class Model_Dev extends Model
{
        public $link;
    public function __construct($link){
        $this->link = $link;
    }
	public function get_data()
	{	
        $query = "SELECT * FROM developers";
        $result = mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
        $rows = array();
        while($row = mysqli_fetch_row($result))
        {
            $rows[]=$row;
        }
        
		return $rows;
	}
}