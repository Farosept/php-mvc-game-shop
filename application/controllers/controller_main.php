<?php
class Controller_Main extends Controller
{	public $modelGame;
    public $modelGenre;
    public $modelDev;
    public $modelSelectGames;
	public $view;
    public $pl;
    function __construct()
    {
		include 'connection.php';
        $this->modelGame=new Model_Game($link);
        $this->modelGenre = new Model_Genre($link);
        $this->modelDev = new Model_Dev($link);
        $this->view=new View();
        $this->modelSelectGames= new Model_SelectGames($link);
        $this->pl = new PagedList($link);
    }
	function action_index()
	{
        $data['limit']=3;
        $quantity = 8;
        $data['game'] = $this->modelGame->get_data($_GET['page'],$data['limit'],$quantity);
        $data['genre']= $this->modelGenre->get_data();
        if(isset($_GET['page']))
        {
            $data['page'] = $_GET['page'];
        }
        else
        {
            $data['page'] = 1;
        }
        $data['pages'] = $this->pl->get_pages($quantity);
        $data['dev']= $this->modelDev->get_data();
		$this->view->generate('main_view.php', 'template_view.php',$data);
	}
    function action_item()
	{
        $data['game'] = $this->modelGame->get_game($_GET['id']);
        $data['scr'] = $this->modelGame->get_screens($_GET['id']);
        $data['genre']= $this->modelGenre->get_data();
        $data['dev']= $this->modelDev->get_data();
		$this->view->generate('item_view.php', 'template_view.php',$data);
	}
    function action_select()
    {
        $limit=3;
        $quantity = 8;
        $data['genre']= $this->modelGenre->get_data();
        $data['dev']= $this->modelDev->get_data();
        if(isset($_GET['gid']))
        {
            $id = $_GET['gid'];
            $data['genre_id']= $id;
            $query = "SELECT * FROM games where id_genre='$id' order by releaseDate desc";
            if(!empty($data['zap']))
            {
                $data['zap'] =$data['zap'] . "&gid=".$_GET['gid'];   
            }else
            $data['zap'] = "gid=".$_GET['gid'];
        }
        if(isset($_GET['date']))
        {
            if($_GET['date']=="old")
            $query = "SELECT * FROM games order by releaseDate asc";
            if($_GET['date']=="new")
            $query = "SELECT * FROM games order by releaseDate desc";
            if(!empty($data['zap']))
            {
                $data['zap'] =$data['zap'] . "date=".$_GET['date'];
            }else $data['zap'] ="date=".$_GET['date'];
        }
        if(isset($_GET['price']))
        {
            if($_GET['price']=="m")
            $query = "SELECT * FROM games order by price asc";
            if($_GET['price']=="b")
            $query = "SELECT * FROM games order by price desc";
            if(!empty($data['zap']))
            {
                $data['zap'] =$data['zap'] . "price=".$_GET['price'];
            }else $data['zap'] ="price=".$_GET['price'];
        }
        if(isset($_GET['dev']))
        {
            $id = $_GET['dev'];
            $data['dev_id']= $id;
            $query = "SELECT * FROM games where id_dev='$id' order by releaseDate desc";
            if(!empty($data['zap']))
            {
                $data['zap'] =$data['zap'] . "&gid=".$_GET['gid'];   
            }else
            $data['zap'] = "gid=".$_GET['gid'];
        }
        if(isset($_GET['page']))
        {
            $data['page'] = $_GET['page'];
        }
        else
        {
            $data['page'] = 1;
        }
        $pages = $this->pl->get_pages($quantity,$query);

        $data['limit'] = $limit;
        $data['pages'] = $pages;
        $data['game']=  $this->modelSelectGames->get_data($_GET['page'],$limit,$quantity,$query);
        $data['genre']= $this->modelGenre->get_data();
        
        $this->view->generate('select_view.php', 'template_view.php',$data);
    }
    function action_img()
    {
        $data['img'] = $_GET['img'];
        $this->view->generate('one_image.php','template_view.php',$data);
    }
}