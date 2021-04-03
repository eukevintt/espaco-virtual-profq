<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Entrar</title>
</head>

<body>
    <?php
    $novousu = 'active';
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    require_once "includes/login.php";

    if (!$_SESSION['user'] == "") {
        echo "<script>window.location='index.php'</script>";
    }

    ?>

    <div>
        <?php
        $user = $_POST['user'] ?? null;
        $pass = $_POST['senha'] ?? null;

        if (is_null($user) || is_null($pass)) {
            require "user-login-form.php";
        } else {
            $q = "select nick, nome, senha, nivel from usuarios where nick = '$user'";
            $busca = $banco->query($q);
            if (!$busca) {
                echo 'Errado!';
            } else {
                if ($busca->num_rows > 0) {
                    $reg = $busca->fetch_object();
                    if (testarHash($pass, $reg->senha)) {
                        $_SESSION['user'] = $reg->nick;
                        $_SESSION['nome'] = $reg->nome;
                        $_SESSION['nivel'] = $reg->nivel;
                        echo "<script>window.location='home.php'</script>";
                    } else {
                        echo '<div class="alert alert-danger text-center fade show w-50 mx-auto" role="alert"><i class="material-icons float-start">error</i>Senha inválida!<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        require "user-login-form.php";
                    }
                } else {
                    echo '<div class="alert alert-danger text-center fade show w-50 mx-auto" role="alert"><i class="material-icons float-start">error</i>Usuário errado!
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    require "user-login-form.php";
                }
            }
        }
        ?>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>