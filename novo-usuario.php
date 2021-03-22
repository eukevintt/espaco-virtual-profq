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
    require_once "includes/head.php";

    ?>
    <?php
    if (!is_admin()) {
        echo "<script>window.location='home.php'</script>";
    }
    ?>

    <div>
        <h1>Crie um novo usuário</h1>
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
                        echo "Usuário cadastrado!";
                    } else {
                        echo "Não foi possivel criar o usuário, o usuário já está sendo usado";
                    }
                }
            } else {
                echo "Senhas não conferem!";
            }
        }
        ?>

    </div>


</body>

</html>