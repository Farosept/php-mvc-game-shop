<?php
class Model_Game extends Model
{    public $link;
    public function __construct($link){
        $this->link = $link;
    }
	public function get_data($id=NULL)
	{	
        if($id==NULL)
        $query ="SELECT * FROM games inner join genres on games.id_genre=genres.id inner join developers on games.id_dev = developers.id";
        else
        $query ="SELECT * FROM games where id='$id'";
        $result = mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
        $rows = array();
        while($row = mysqli_fetch_row($result))
        {
            $rows[]=$row;
        }
		return $rows;
	}
    public function edit_data($id,$name,$price,$about,$genre,$date,$file,$screens,$iddev)
	{
        $about = str_replace("'","&#39",$about);
        $name = str_replace("'","&#39",$name);
        if(!empty($screens)) $this->upload_screens($screens,$id);
        $check = $this->check_upload($file);
        if($check===true)
        {
            $pathPhoto = "Content/".$file['name'];
            $this->upload($file,$pathPhoto);
        }
        if($check===true) $query="UPDATE games as g set g.name='$name',g.price='$price',g.descreptive='$about',
        g.releaseDate='$date',g.id_genre='$genre',g.photo='$pathPhoto', g.id_dev='$iddev' where g.id='$id'";
        else  $query="UPDATE games as g set g.name='$name',g.price='$price',
        g.descreptive='$about',g.releaseDate='$date',g.id_genre='$genre', g.id_dev='$iddev' where g.id='$id'";
        mysqli_query($this->link, $query) or die("Ошибка edit " . mysqli_error($this->link));
	}
    public function set_data($name,$price,$about,$genre,$date,$file,$screens,$iddev)
	{
        $about = str_replace("'","&#39",$about);
        $name = str_replace("'","&#39",$name);
        $check = $this->check_upload($file);
        if($check===true)
        {
            $pathPhoto = "Content/".$file['name'];
            $this->upload($file,$pathPhoto);
        }
        if($check!==true)
        $query="INSERT INTO games values (NULL,'$name','$price','$about','$date',NULL,'$genre','$iddev')";
        else $query="INSERT INTO games values (NULL,'$name','$price','$about','$date','$pathPhoto','$genre','$iddev')";
        mysqli_query($this->link, $query) or die("Ошибка добавление " . mysqli_error($this->link));
        $query ="SELECT * FROM games where name='$name'";
        $result = mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
        $row = mysqli_fetch_row($result);
        if(!empty($screens)) $this->upload_screens($screens,$row[0]);
	}
    public function del_data($id)
	{
        $query="DELETE from photos where id_game='$id'"; 
        mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error($this->link));
        $query="DELETE from games where id='$id'"; 
        mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error($this->link));
        header("Location: /admin/index"); exit();
	}
    public function del_img($id)
	{
        $query="UPDATE games set photo=NULL where id='$id'";
        mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error($this->link));

	}
    public function del_img_screen($id)
	{
        $query="DELETE from photos where id='$id'"; 
        mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error($this->link));
	}
    public function get_screens($id)
	{
        $query ="SELECT * FROM photos where id_game='$id'";
        $result = mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
        $rows = array();
        while($row = mysqli_fetch_row($result))
        {
            $rows[]=$row;
        }
		return $rows;
	}
    function check_upload($file)
    {
        if($file['name'] == '')
            return 'Вы не выбрали файл!.';
        if($file['size'] == 0)
            return 'Файл слишком большой.';
        $getMime = explode('.', $file['name']);
        $mime = strtolower(end($getMime));
        $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
        if(!in_array($mime, $types))
            return 'Недопустимый тип файла.';
        return true;
    }
    function upload($file,$path)
    {	
        move_uploaded_file($file['tmp_name'], $path);
    }
    function upload_screens($screens,$id)
    {	
        for($i=0;$i<count($screens['name']);$i++)
        {
            if($screens['name'][$i] == '')
                return 'Вы не выбрали файл.';

            if($screens['size'][$i] == 0)
                return 'Файл слишком большой.';

            $getMime = explode('.', $screens['name'][$i]);

            $mime = strtolower(end($getMime));

            $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');

            if(!in_array($mime, $types))
                return 'Недопустимый тип файла.';
            $path = "Screens/".$screens['name'][$i];
            $query="INSERT INTO photos values (NULL,'$path','$id')";
            mysqli_query($this->link, $query) or die("Ошибка asdasd " . mysqli_error($this->link));
            move_uploaded_file($screens['tmp_name'][$i], $path);
        }
    }


}
class Model_Genre extends Model
{    public $link;
    public function __construct($link){
        $this->link = $link;
    }
	public function get_data()
	{
        $query = "SELECT * FROM genres";
        $result = mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
        $rows = array();
        while($row = mysqli_fetch_row($result))
        {
            $rows[]=$row;
        }
		return $rows;
	}
    public function get_genre($id)
	{
        $query = "SELECT * FROM genres where id = '$id'";
        $result = mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
        $rows = array();
        while($row = mysqli_fetch_row($result))
        {
            $rows[]=$row;
        }
		return $rows;
	}
    public function set_data($name)
	{
        $query="INSERT INTO genres values (NULL,'$name')";
        mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
	}
    public function edit_data($id,$name)
	{
        $query="UPDATE genres set name='$name' where id='$id'";
        mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
	}
    public function del_data($id)
	{
        $query="DELETE from genres where id='$id'"; 
        mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
	}
}
class Model_Dev extends Model
{    public $link;
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
    public function get_dev($id)
	{
        $query = "SELECT * FROM developers where id = '$id'";
        $result = mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
        $row = mysqli_fetch_row($result);
		return $row;
	}
    public function set_data($name, $country)
	{
        $query="INSERT INTO developers values (NULL,'$name','$country')";
        mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
	}
    public function edit_data($id,$name,$country)
	{
        $query="UPDATE developers set name='$name', country='$country' where id='$id'";
        mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
	}
    public function del_data($id)
	{
        $query="DELETE from developers where id='$id'"; 
        mysqli_query($this->link,$query) or die("Ошибка " . mysqli_error($this->link));
	}
}