<html>
<body>
<div class="main">
<div class='wrapper' style='z-index:2;'>
<?php
echo"<ul class='products clearfix'>";
foreach ($data['game'] as $row)
{
echo"
	<li class='product-wrapper'>
		<a href='/main/item?id=".$row['id']."' class='product'>
        <div class='product-main'>
            <div class='product-photo'>
                <img src='/".$row['photo']."' alt=''>
            </div>
            <div class='product-text'>
                <h2 class = 'marquee'>".$row['name']."</h2>
                <p>".$row['descreptive']."</p>";
     
           echo"  </div>
            </div>
            <div class='product-details-wrap'>
            <div class='product-details'>
            <div class='product-availability'>
            <span class=''>
             Жанр:
            </span>";
                foreach ($data['genre'] as $row2)
                {
                    if($row2['id']==$row['id_genre'])
                    echo $row2['name'];
                } 
           echo"
            </div>
                <span class='product-price'>
                    <b>".$row['price']."</b>
                    <small>руб.</small>
                </span>
                </div>
            </div>
        </a>
	</li>
  
";
}   
echo" </ul> ";
?>
</div>
<div class="pagination" style="position:relative; margin-left:50%; padding-bottom:5%; color:rgb(51,51,51);">
<?php 
    if($data['page']>1)
    {
        echo"<a href='/main/index?page=1'><<</a>";
        $prev = $data['page'];
        echo"<a href='/main/index?page=".$prev."'><</a>";
    }
    $th = $data['page'];
    $start = $th-$data['limit'];
    $end = $th+$data['limit'];
    for($j = 1; $j<$data['pages']; $j++)
    {
        if($j>=$start && $j<=$end)
        {
            if($j==($data['page']))
            echo"<a style='background-color: rgb(51,51,51); border-color: rgb(51,51,51);color: #ffffff;' href='/main/index?page=".$j."'>".$j."</a>";
            else
            echo"<a href='/main/index?page=".$j."'>".$j."</a>";
        }
    }
    if ($j>$data['page'] && ($data['page']+1)<$j)
    {
        echo '<a href="/main/index?page='.($data['page']+1).'"> ></a>';
        echo '<a href="/main/index?page='.($j-1).'">>></a>';
    }  
?>
</div>
    </div>
    
    <footer>
       <div id="social">
       </div>   
        <div id="right">
          Все права защищены &copy; <?php echo date('Y')?>
        </div>
    </footer>
</body>
</html>