<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include('ConnectionDb-Class.php');
        $con = new ConnectionDb();
        $result = $con->GetListdb("select * from Cordenadas");
        var_dump($result);
        ?>
    </body>
</html>
