<?php 
foreach($data['game'] as $row)
    {
                echo"<div class='admin'>
                <form method='POST' enctype='multipart/form-data'>
                    <h3>ID:</h3>
                    <input type='text' name='key'readonly value=".$row[0]."><br>
                    <h3>Название:</h3>
                    <input type='text' name='name' value='".$row[1]."'><br>
                    <h3>Цена:</h3>
                    <input type='text' name='price' value='".$row[2]."'><br>
                    <h3>Описание:</h3>
                    <textarea name='about' >".$row[3]."</textarea>
                    <h3>Дата релиза:</h3>
                    <input type='date' name='date' value='".$row[4]."'><br>";
                    echo"<h3>Жанр:</h3>
                    <select name='genre'>";
                       foreach($data['genre'] as $rowGenre)
                       {
                           if($row[6]==$rowGenre[0]) echo"<option selected value='".$rowGenre[0]."'>".$rowGenre[1]."</option>";
                           else echo"<option value='".$rowGenre[0]."'>".$rowGenre[1]."</option>";
                       }
                    echo"</select>";
                    echo"<h3>Разработчик:</h3>
                    <select name='dev'>";
                       foreach($data['dev'] as $rowDev)
                       {
                           if($row[7]==$rowDev[0]) echo"<option selected value='".$rowDev[0]."'>".$rowDev[1]."</option>";
                           else echo"<option value='".$rowDev[0]."'>".$rowDev[1]."</option>";
                       }
                    echo"</select>";
                    echo"<h3>Фото:</h3>";
                    if(!empty($row[5]))
                    echo"<img src='/".$row[5]."' width='140' height='140' style='margin: 10px;'>";
                    echo"<a style=' position:relative; margin:10px; left:-120px; top:10px;' href='/admin/delimg?img=".$row[0]."'>Удалить</a>
                    <input type='file' name='photo'><br>";
                    echo"<h3>Скриншоты и т.д.:</h3>";
                    $i=0;
                    foreach($data['screens'] as $rowScreen)
                    {if($i%3==0)echo"<br>";
                        $i++;
                          echo" 
                          <a href='/main/img?img=/".$rowScreen[1]."'><img src='/$rowScreen[1]' width='140' height='140' style='margin: 10px;'></a> 
                          <a style=' position:relative; margin:10px; left:-120px; top:10px;' href='/admin/delscr?img=".$rowScreen[0]."'>Удалить</a>";
                    }
                    echo"<br><br> Загрузить: <input type='file' max='5' name='screens[]' multiple><br><br>";
                    echo"<br>";

                   echo"<td><input type='submit' value='Изменить' name='edit'></td>";
                echo"</form><button onclick='javascript:history.back(); '>назад</button> </div>";
            }