<?php
            echo"
            <div class='admin'>
             <table cellpadding='5' cellspacing='1' border='1' style='color: black;'>
    <caption>Игры</caption>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th colspan='3' style='text-align:center;'>
        <a href='/admin/addGenre' class='buttonlogin' >Добавить</a>
        |<a href='/admin/index' class='buttonlogin' >Игры</a>
        </th>
    </tr>";
        foreach ($data['genre'] as $row)
        {
    echo"
    <tr>
        <td>$row[0]</td> 
        <td>$row[1]</td> 
        <td><a href='/admin/editGenre?id=$row[0]' class='buttonlogin' >Изменить</a></td>
        <td><a href='/admin/delGenre?id=$row[0]' class='buttonlogin' >Удалить</a></td>
      
    </tr>";
            
    }
    echo"</table> <br>";
     echo" </div>";
?>
<html>
<head>

</head>
<body>
    
</body>
</html>