<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Meu perfil</title>
</head>

<body>
    <?php
    $perfil = 'active';
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    require_once "includes/login.php";
    require_once "includes/head.php";

    ?>

    <div>
        <div class='py-4 text-center'>
            <i class='material-icons d-inline'>border_color</i>
            <h1 class="display-5 d-inline">Alteração de dados</h1>
        </div>
        <div class="alert alert-warning text-center py-2 mb-5" role="alert">
            Obs: Você não pode mudar seu usuário e se deixar o campo senha vazio, a senha irá continuar a mesma!
        </div>
        <?php
        if (!isset($_POST['usuario'])) {
            include "user-edit-form.php";
        } else {
            $nome = $_POST['nome'] ?? null;
            $senha1 = $_POST['senha1'] ?? null;
            $senha2 = $_POST['senha2'] ?? null;

            $q = "update usuarios set nome = '$nome'";

            if (!(empty($senha1) || is_null($senha1))) {
                if ($senha1 === $senha2) {
                    $senha = gerarHash($senha1);
                    $q .= ", senha='$senha'";
                } else {
                    echo '<div class="alert alert-danger text-center fade show w-50 mx-auto" role="alert"><i class="material-icons float-start">password</i>As senhas não conferem!<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    include "user-edit-form.php";
                }
            }
            $q .= " where nick='" . $_SESSION['user'] . "'";
            if ($banco->query($q)) {

                echo '<div class="alert alert-success text-center fade show w-50 mx-auto" role="alert"><i class="material-icons float-start">done</i>Realize novamente seu login</div>';
                logout();
                echo "<script>setTimeout(function(){
                        window.location='index.php'
                    }, 2000)</script>";
            } else {
                echo '<div class="alert alert-danger text-center fade show w-50 mx-auto" role="alert"><i class="material-icons float-start">error</i>Algo deu errado na hora de alterar<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                include "user-edit-form.php";
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>