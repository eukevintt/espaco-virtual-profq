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

    <div>
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
                    echo "Senhas não conferem!";
                }
            }
            $q .= " where nick='" . $_SESSION['user'] . "'";
            if ($banco->query($q)) {
                echo "Dados alterados";
                logout();
                echo "<script>window.location='usu-login.php'</script>";
            } else {
                echo "Algo deu errado na hora de alterar";
            }
        }
        ?>
    </div>


</body>

</html>