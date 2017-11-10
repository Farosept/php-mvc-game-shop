<?php
            echo"
            <div class='admin'>
             <table cellpadding='5' cellspacing='1' border='1' style='color: black;'>
    <caption>Разработчики</caption>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Страна</th>
        <th colspan='3' style='text-align:center;'>
        <a href='/admin/addDev' class='buttonlogin' >Добавить</a>
        <a href='/admin/index' class='buttonlogin'>Игры</a>
        </th>
    </tr>";
        foreach ($data['dev'] as $row)
        {
    echo"
    <tr>
        <td>$row[0]</td> 
        <td>$row[1]</td> 
        <td>$row[2]</td>
        <td><a href='/admin/editDev?id=$row[0]' class='buttonlogin' >Изменить</a></td>
        <td><a href='/admin/delDev?id=$row[0]' class='buttonlogin' >Удалить</a></td>
      
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