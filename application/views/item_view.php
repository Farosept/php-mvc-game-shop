<div class = "oneItem">
    <div calss = "blockOneItem">
    <?php
        echo" <div class='rect'>
    <div class='item-preview'>
    <img alt='".$data['game']['name']."' style='position: relative; top: 5px; left:5px;' src='/".$data['game']['photo']."' width='140' height='140'>
    </div> 
    <p class='item-title' contenteditable='false'>".$data['game']['name']."</p>";
        foreach($data['genre'] as $row2){
            if($row2['id']==$data['game']['id_genre']) echo"<span class='item-preview-details'>Жанр: ".$row2['name']."</span><br>";
        }
        foreach($data['dev'] as $row2){
            if($row2[0]==$data['game']['id_dev']){
            echo"<span class='item-preview-details'>Разработчик: ".$row2[1]."</span><br>";
            echo"<span class='item-preview-details'>Страна: ".$row2[2]."</span>";
            }
        }
    echo" 
    <form method='POST' action='/cart/addcart'>
    <input type='hidden'name='game'  value='".$data['game']['id']."' />
    <input type='submit' class='buttoncart' value='В корзину' />
    </form>
    <span class='item-price'>".$data['game']['price']." <sup class='currency'>руб</sup></span>
</div>"; ?>  
    </div> 
    <?php echo" <div class = 'screensOneItem'>
    <div class='imgbig'>
            <img class = 'big' src='/".$data['scr'][0]['path']."' />
            </div>
            <div class = 'thumbs'>";
                foreach($data['scr'] as $scr)
                {
                    echo"<img  width='194' height='160' src='/".$scr['path']."' alt='".$data['game']['name']."' />";
                }
         echo"   </div>
        </div>";?>
        <script>
            $('.thumbs').delegate('img','click', function(){
            $('.big').attr('src',$(this).attr('src').replace('thumb','big'));
                });
        </script>
    <div class = "descOneItem">
        <h3>Описание:</h3>
        <div>
            <?php echo $data['game']['descreptive'] ?>
        </div>
    </div>
</div>
    <footer>
       <div id="social">
       </div>   
        <div id="right">
          Все права защищены &copy; <?php echo date('Y')?>
        </div>
    </footer>