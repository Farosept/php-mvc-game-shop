<?php 
foreach($data['dev'] as $row)
    {
                echo"<div class='admin'>
                <form method='POST' enctype='multipart/form-data'>
                    <h3>ID:</h3>
                    <input type='text' name='key'readonly value=".$row[0]."><br>
                    <h3>Название:</h3>
                    <input type='text' name='name' value='".$row[1]."'><br>
                    <h3>Страна:</h3>
                    <input type='text' name='country' value='".$row[2]."'><br>";
                   echo"<td><input type='submit' value='Изменить' name='edit'></td>";
                echo"</form><button onclick='javascript:history.back(); '>назад</button> </div>";
            }