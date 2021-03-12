<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itinerários</title>
</head>

<body>
    <?php
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    require_once "includes/login.php";
    ?>

    <div>
        <?php
        $user = $_POST['usuario'];
        $pass = $_POST['senha'];

        if (is_null($user) || is_null($pass)) {
            require "user-login-form.php";
        } else {
            echo "passou";
        }
        ?>


    </div>
</body>

</html>