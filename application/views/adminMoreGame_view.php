<?php 
foreach($data['game'] as $row)
    {
                echo"<div class='admin'>
                <form method='POST' enctype='multipart/form-data'>
                    <h3>ID:</h3>
                    <input type='text' name='key'readonly value=".$row[0]."><br>
                    <h3>Название:</h3>
                    <input type='text' name='name' readonly value='".$row[1]."'><br>
                    <h3>Цена:</h3>
                    <input type='text' name='price' readonly value='".$row[2]."'><br>
                    <h3>Описание:</h3>
                    <textarea name='about' readonly >".$row[3]."</textarea>
                    <h3>Дата релиза:</h3>
                    <input type='date' readonly name='date' value='".$row[4]."'><br>";
                    echo"<h3>Жанр:</h3>
                    <select readonly name='genre'>";
                       foreach($data['genre'] as $rowGenre)
                       {
                           if($row['id_genre']==$rowGenre['id']) echo"<option selected value='".$rowGenre['id']."'>".$rowGenre['name']."</option>";
                           else echo"<option value='".$rowGenre['id']."'>".$rowGenre['name']."</option>";
                       }
                    echo"</select>";
                    echo"<h3>Фото:</h3>";
                    if(!empty($row[5]))
                    echo"<img src='/".$row[5]."' width='140' height='140' style='margin: 10px;'>";
                    echo"<h3>Скриншоты и т.д.:</h3>";
                    $i=0;
                    foreach($data['screens'] as $rowScreen)
                    {if($i%3==0)echo"<br>";
                        $i++;
                          echo" 
                          <img src='/$rowScreen[1]' width='140' height='140' style='margin: 10px;'> ";
                    }
                    echo"<br>";     
                echo"</form> <a href='/admin/index'><button>Назад</button></a></div>";
            }