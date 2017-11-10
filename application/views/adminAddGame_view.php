<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd'
    });
  } );
</script>
<?php
echo"
<div class='admin'>
    <form method='POST' enctype='multipart/form-data'>
        <h3>Название:</h3>
        <input type='text' name='name'><br>
        <h3>Цена:</h3>
        <input type='text' name='price'><br>
        <h3>Описание:</h3>
        <textarea name='about' ></textarea>
        <h3>Дата релиза:</h3>
        <input type='text' id='datepicker' name='date'><br>";
        echo"<h3>Жанр:</h3>
        <select name='genre'>";
            foreach ($data['genre'] as $rowGenre)
            {
                echo"<option value='".$rowGenre[0]."'>".$rowGenre[1]."</option>";
            }
        echo"</select>";
        echo"<h3>Разработчик:</h3>
        <select name='dev'>";
            foreach ($data['dev'] as $rowDev)
            {
                echo"<option value='".$rowDev[0]."'>".$rowDev[1]."</option>";
            }
        echo"</select>";
        echo"<h3>Фото:</h3>
        <input type='file' name='photo'><br>";
        echo"Загрузить: <input type='file' max='5' name='screens[]' multiple><br>";
        echo"<br>";
        echo"<br>";
        echo"<td><input type='submit' value='Добавить' name='add'></td>";
    echo"</form><button onclick='javascript:history.back(); '>назад</button></div>";