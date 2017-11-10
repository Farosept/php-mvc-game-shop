<?php session_start();?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/Content/Site.css" />
    <link rel="stylesheet" type="text/css" href="/Content/PagedList.css" />
    <link rel="stylesheet" type="text/css" href="/Content/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Content/bootstrap.min.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <title>Game-SHOP</title>
    <style>
        body 
        {
            background: url(/Content/Call.png);
            background-attachment: fixed;
        }
    </style>
</head>
<body>
<nav class="top-menu">
  <ul class="menu-main">
    <li class="left-item"><a href="/main/index">Главная</a></li>
    <li class="left-item"><a href="/main/index">Игры</a>
        <ul>
            <li><a href="">Жанры</a>
                <ul>
                    <?php 
                        foreach($data['genre'] as $rowg)
                        {
                            echo"<li ><a href='/main/select?gid=".$rowg['id']."'>".$rowg['name']."</a></li>";
                        } 
                    ?>
                </ul>
            </li>
            <li><a href="">Дата выхода</a>
                <ul>
                    <li><a href='/main/select?date=old'>Старые</a></li>
                    <li><a href='/main/select?date=new'>Новые</a></li>
                </ul>    
            </li>
            <li><a href="">Цена</a>
                <ul>
                    <li ><a href='/main/select?price=m'>Сначала дешёвые</a></li>
                    <li ><a href='/main/select?price=b'>Сначала дорогие</a></li>
                </ul>
            </li>
            <li><a href="">Разработчик</a>
                <ul>
                    <?php 
                        foreach($data['dev'] as $rowd)
                        {
                            echo"<li ><a href='/main/select?dev=".$rowd[0]."'>".$rowd[1]."</a></li>";
                        } 
                    ?>
                </ul>
            </li>
        </ul>
    </li>
    <li class="left-item"><a href="">О нас</a></li>
<?php
    if (isset($_SESSION['id']) and isset($_SESSION['hash']) and $_SESSION['id']!='' and $_SESSION['hash']!='') 
{ 
  echo'
    <li class="right-item"><a href="">'.htmlspecialchars($_SESSION['login']).'</a></li>
    <li class="right-item"><a href="/account/logout">Выход</a></li>';

   if($_SESSION['role']==1){
   echo' <li class="right-item"><a href="/admin/index">Админ меню</a></li>
    ';}
    }
    else{
        echo'<li class="right-item"><a href="/account/login">Вход</a></li>
        <li class="right-item"><a href="/account/register">Регистрация</a></li>';
    }
?>
</ul>
  <a class="navbar-logo" href="/main/index"><img src="/Content/game_shop.png"></a>
  <a class="buttonmain" href="/cart/index" style="position: absolute;top: 0px;left: auto;right: -89px;">
  <img width="20" height="20" src="/Content/cart.png" alt="Корзина">
  </a>

</nav>
</body>
</html>
