<?php
class Model_Genre extends Model
{
	public function get_data()
	{	
        require_once 'connection.php';
        $query = "SELECT * FROM games";
        $result = mysqli_query($link,$query) or die("Ошибка " . mysqli_error($link));
        $rows = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $rows[]=$row;
        }
		return $rows;
	}
}