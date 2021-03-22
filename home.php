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
        $busca = $banco->query("select nick from usu_it");
        while ($reg = $busca->fetch_object()) {
            if ($reg->nick === $_SESSION['user']) {
                $verify = true;
            } else {
                $verify = false;
            }
        }

        if ($verify === true) {
            echo "tem";
        } else {
            echo "Parece que é uma das primeiras vezes que você entra aqui, <a href='itinerarios.php'>escolha seus itinerarios</a>";
        }
        ?>
        </table>
    </div>


</body>

</html>