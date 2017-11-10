<?php
session_start();
?>
<html>
<head>
<script>
    $(document).ready (function () {
            $("#done").click(function(){
                
                var login = $("#login").val();
                var pass = $("#pass").val();
                var pass2 = $("#passconf").val();
                var email = $("#email").val();
                var fail = "";
                if(login.length < 3) fail = "Логин не менее 3-х символов";
                if(pass.length < 6) fail="Пароль не менее чем 6 символов"
                else if (pass!=pass2) fail = "Пароли должны совпадать";
                if (fail!=""){
                    $('#reg').html("<b >При регистрации произошли следующие ошибки:</b><br><span style='color:red;'>"+fail+"</span>");
                    $('#reg').show();
                    return false;}
                });
        });
</script>

</head>

<body>
    <div class="formAcc">
        
    
    <form action="/account/register" method="POST">
    <div class="form-horizontal" style="position: absolute; left: 5%; color:white">
           <h3 style="position: relative; left: 28%;">Регистрация </h3>
        
        <div class="form-group">
            <span>Логин*</span>
               <input type="text" id="login" name="login" style="position: relative; left: 29.3%;">
        </div>

        <div class="form-group">
           <span>Пароль*</span>
               <input type="password" id="pass" name="pass"style="position: relative; left: 25.5%;">
        </div>

        <div class="form-group">
           <span>Повторите пароль*</span>
                <input type="password" id="passconf" name="confirimpass" style="position: relative; left: 1%;">
        </div>

        <div class="form-group">
          <span>e-mail*</span>
                <input type="text" id="email" name="email"style="position: relative; left: 29.3%;">
        </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <input type="submit" id="done" class="btn btn-default" value="Зарегистрироваться" name="submit" style="position: relative; left: 28%;"/>
        </div>

    </div>

</div>
</form>

<div id="reg" style="color:black; position: absolute; left:30%;">
<?php
    if ($data) {
      echo "<b style='color:white;' >При регистрации произошли следующие ошибки:</b><br>"; 
      foreach($data AS $error) 
      { 
          echo'<span style="color:red;" >';
        print $error."</span><br>"; 
      }
    }
?>
</div>
</div>
</body>
</html>