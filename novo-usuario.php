<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Itinerários</title>
</head>

<body>
    <?php
    $novousu = 'active';
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    require_once "includes/login.php";
    require_once "includes/head.php";

    ?>
    <?php
    if (!is_admin()) {
        echo "<script>window.location='home.php'</script>";
    }
    ?>

    <div>

        <?php
        if (!isset($_POST['usuario'])) {
            require "novo-usuario-form.php";
        } else {
            $nick = $_POST['usuario'] ?? null;
            $nome = $_POST['nome'] ?? null;
            $senha1 = $_POST['senha1'] ?? null;
            $senha2 = $_POST['senha2'] ?? null;
            $nivel = $_POST['nivel'] ?? null;

            if ($senha1 === $senha2) {
                if (empty($nick) || empty($nome) || empty($senha1) || empty($senha2) || empty($nivel)) {
                    echo "Todos os dados são obrigatório!";
                } else {
                    $senha = gerarHash($senha1);
                    $q = "insert into usuarios values('$nick', '$nome', '$senha', '$nivel')";
                    if ($banco->query($q)) {
                        echo '<div class="alert alert-success text-center fade show w-50 mx-auto" role="alert"><i class="material-icons">done</i>Usuário cadastrado!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        require "novo-usuario-form.php";
                    } else {
                        echo '<div class="alert alert-danger text-center fade show w-50 mx-auto" role="alert"><i class="material-icons">error</i>Não foi possivel criar o usuário, o usuário já está sendo usado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        require "novo-usuario-form.php";
                    }
                }
            } else {
                echo "Senhas não conferem!";
            }
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>