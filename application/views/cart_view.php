<html>
<head>
    <title>Game-SHOP | Корзина</title>
</head>
<body>
    <div class="cart">
    <h2 class='text-center'>Ваша корзина</h2>
    <table class="table" style="color:white; ">
        <thead>
            <tr>
                <th>Кол-во</th>
                <th>Игра</th>
                <th class="text-right">Цена</th>
                <th class="text-right">Общая цена</th>
            </tr>
        </thead>
        <tbody>
        <?php    
        foreach($data['cart'] as $row)
        {
          echo"<tr>
                <td class='text-center'>".$row->Quantity."</td>
                <td class='text-left'>".$row->Game['name']."</td>
                <td class='text-right'>".$row->Game['price']."</td>
                <td class='text-right'>
                   ".$row->Quantity*$row->Game['price']."
                </td>
                <td class='text-right'>
                    <form type='GET' action='/cart/delcart'>
                    <input type='hidden' name='del' value='".$row->Game['id']."' />
                    <input style='padding: 1px; position: relative;' type='submit' class='buttoncart' value='Удалить' />
                </form>
                </td>

            </tr>";
            }?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-right">Итого:</td>
                <td class="text-right">
                <?php
                   echo"".$data['sum']."";
                ?>
                </td>
            </tr>
        </tfoot>
    </table>
    <div class="text-center">
        <a class="btn btn-primary" href="/main/index">Продолжить покупки</a>
    </div>
    </div>
</body>
</html>