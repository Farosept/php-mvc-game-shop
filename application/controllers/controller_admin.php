<?php
class Controller_Admin extends Controller
{
    function __construct()
    {
        include "/application/scripts/check.php";
        if($roleId!=1)  header('Location: /main/index');
        include 'connection.php';
        $this->modelGame=new Model_Game($link);
        $this->modelGenre = new Model_Genre($link);
        $this->modelDev = new Model_Dev($link);
        $this->view=new View();
    }
	function action_index()
	{
        $data['game'] = $this->modelGame->get_data();
		$this->view->generate('adminGame_view.php', 'template_view.php', $data);
	}
    function action_edit()
    {
        if(!isset($_POST['edit']))
        {
            $id = $_GET['id'];
            $data['game']= $this->modelGame->get_data($id);
            $data['genre']= $this->modelGenre->get_data();
            $data['screens']=$this->modelGame->get_screens($id);
            $data['dev'] = $this->modelDev->get_data();
            $this->view->generate('adminEditGame_view.php', 'template_view.php', $data);
        }
        else
        {
            $this->modelGame->edit_data($_POST['key'],$_POST['name'],$_POST['price'],$_POST['about'],
            $_POST['genre'],$_POST['date'],$_FILES['photo'],$_FILES['screens'],$_POST['dev']);
            header('Location: /admin/index');
        }
    }
    function action_more()
    {
            $id = $_GET['id'];
            $data['game']= $this->modelGame->get_data($id);
            $data['genre']= $this->modelGenre->get_data();
            $data['screens']=$this->modelGame->get_screens($id);
            $this->view->generate('adminMoreGame_view.php', 'template_view.php', $data);
    }
    function action_delscr()
    {
        $this->modelGame->del_img_screen($_GET['img']);
        $ref = $_SERVER['HTTP_REFERER'];
        header("Location: $ref");exit();
    }
    function action_delimg()
    {
        $this->modelGame->del_img($_GET['img']);
        $ref = $_SERVER['HTTP_REFERER'];
        header("Location: $ref");exit();
    }
    function action_del()
    {
        $this->modelGame->del_data($_GET['id']);
        header('Location: /admin/index');
    }
    function action_add()
    {
        if(!isset($_POST['add']))
        {
            $data['genre']= $this->modelGenre->get_data();
            $data['dev'] = $this->modelDev->get_data();
            $this->view->generate('adminAddGame_view.php', 'template_view.php', $data);
        }
        else
        {
            $this->modelGame->set_data($_POST['name'],$_POST['price'],$_POST['about'],$_POST['genre'],$_POST['date'],$_FILES['photo'],$_FILES['screens'],$_POST['dev']);
            header('Location: /admin/index');
        }
    }
    function action_indexGenre()
	{
        $data['genre'] = $this->modelGenre->get_data();
		$this->view->generate('adminGenre_view.php', 'template_view.php', $data);
	}
    function action_editGenre()
    {
        if(!isset($_POST['edit']))
        {
            $id = $_GET['id'];
            $data['genre']= $this->modelGenre->get_genre($id);
            $this->view->generate('adminEditGenre_view.php', 'template_view.php', $data);
        }
        else
        {
            $this->modelGenre->edit_data($_POST['key'],$_POST['name']);
            header('Location: /admin/indexGenre');
        }
    }
    function action_delGenre()
    {
        $this->modelGenre->del_data($_GET['id']);
        header('Location: /admin/indexGenre');
    }
    function action_addGenre()
    {
        if(!isset($_POST['add']))
        {
            $data['genre']= $this->modelGenre->get_data();
            $this->view->generate('adminAddGenre_view.php', 'template_view.php', $data);
        }
        else
        {
            $this->modelGenre->set_data($_POST['name']);
            header('Location: /admin/indexGenre');
        }
    }
    function action_indexDev()
	{
        $data['dev'] = $this->modelDev->get_data();
		$this->view->generate('adminDev_view.php', 'template_view.php', $data);
	}
    function action_editDev()
    {
        if(!isset($_POST['edit']))
        {
            $id = $_GET['id'];
            $data['dev']= $this->modelDev->get_dev($id);
            $this->view->generate('adminEditdev_view.php', 'template_view.php', $data);
        }
        else
        {
            $this->modelDev->edit_data($_POST['key'],$_POST['name'],$_POST['country']);
            header('Location: /admin/indexDev');
        }
    }
    function action_delDev()
    {
        $this->modelDev->del_data($_GET['id']);
        header('Location: /admin/indexDEv');
    }
    function action_addDev()
    {
        if(!isset($_POST['add']))
        {
            $data['dev']= $this->modelDev->get_data();
            $this->view->generate('adminAddDev_view.php', 'template_view.php', $data);
        }
        else
        {
            $this->modelDev->set_data($_POST['name'],$_POST['country']);
            header('Location: /admin/indexDev');
        }
    }
}