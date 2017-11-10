<?php
class Model_Account extends Model
{
    public $link;
    public function __construct($link){
        $this->link = $link;
    }
	public function get_data($login)
	{
        $query =" SELECT id,login,password,id_role FROM users WHERE login = '$login' ";
        $result = mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error($this->link)); 
        $row = mysqli_fetch_assoc($result);
		return $row;
	}
    public function set_data($login,$pass,$email)
    {
        $query="INSERT INTO users VALUES(NULL,'$login','$pass','$email','2',NULL)"; 
        mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error($this->link));
    }
    public function check_user($login)
    {
        $query="SELECT * FROM users where login = '$login'";
        $result= mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error($this->link));
        $ul=mysqli_num_rows($result);
        if($ul>0) {return "Пользователь с таким логином уже существует";}
    }
    public function get_data_id($id)
	{
        $query =" SELECT * FROM users WHERE id = '$id' ";
        $result = mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error($this->link)); 
        $row = mysqli_fetch_assoc($result);
		return $row;
	}
    public function set_hash_login($hash,$id)
    {
        $query="UPDATE users SET hash='$hash' WHERE id='$id'"; 
        mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error($this->link));
    }
}