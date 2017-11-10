<?php
            echo"
            <div class='admin'>
             <table cellpadding='5' cellspacing='1' border='1' style='color: black;'>
    <caption>Игры</caption>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Цена</th>
        <th>Описание</th>
        <th>Дата релиза</th>
        <th>Жанр</th>
        <th>Разработчик</th>
        <th colspan='3' style='text-align:center;'>
        <a href='/admin/add' class='buttonlogin' >Добавить</a>|
        <a href='/admin/indexGenre' class='buttonlogin' >Жанры</a>
        <a href='/admin/indexDev' class='buttonlogin' >Разработчики</a>
        </th>
    </tr>";
        foreach ($data['game'] as $row)
        {
            $diskr = substr($row[3],0,30);
    echo"
    <tr>
        <td>$row[0]</td> 
        <td>$row[1]</td> 
        <td>$row[2]</td> 
        <td>$diskr</td> 
        <td>$row[4]</td> 
        <td>$row[9]</td>
        <td>$row[11]</td>
        <td><a href='/admin/edit?id=$row[0]' class='buttonlogin' >Изменить</a></td>
        <td><a href='/admin/more?id=$row[0]' class='buttonlogin' >Подробнее</a></td>
        <td><a href='/admin/del?id=$row[0]' class='buttonlogin' >Удалить</a></td>
      
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