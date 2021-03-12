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
        $user = $_POST['user'] ?? null;
        $pass = $_POST['senha'] ?? null;

        if (is_null($user) || is_null($pass)) {
            require "user-login-form.php";
        } else {
            $q = "select nick, nome, senha, nivel from usuarios where nick = `$user`";
            $search = $banco->query($q);
            if (!$search) {
                echo 'aaa';
            } else {
                $reg = $search->fetch_object();
                if (testarHash($pass, $reg->senha)) {
                    echo "passou2";
                }
            }
        }
        ?>


    </div>
</body>

</html>