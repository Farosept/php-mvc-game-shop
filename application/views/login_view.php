<html>
<body>
    <div class="formAcc">   
    <form action="/account/login" method="POST">
    <div class="form-horizontal" style="position: absolute; left: 5%; color:white">
           <h3 style="position: relative; left: 28%;">Вход</h3>
        
        <div class="form-group">
            <span>Логин</span>
               <input type="text" name="login" style="position: relative; left: 25%;">
        </div>

        <div class="form-group">
           <span>Пароль</span>
               <input type="password" name="password"style="position: relative; left: 20%;">
        </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <input type="submit" class="btn btn-default" value="Войти" name="submit" style="position: relative; left: 28%;"/>
        </div>

    </div>

</div>
</form>
</div>