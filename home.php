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
    $home = 'active';
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    require_once "includes/login.php";
    require_once "includes/head.php";

    ?>

    <div>
        <?php
        $verifi = false;
        $busca = $banco->query("select * from usu_it");
        while ($reg = $busca->fetch_object()) {

            if ($reg->nick === $_SESSION['user']) {
                $verifi = true;
            } else {
                $verifi = false;
            }
        }

        if ($verifi === true) {
            $busca2 = $banco->query("select usu_it.nick as usunick, itinerari.id_iti as iditi, itinerari.nome as itinome, itinerari.descricao as itidesc from usu_it join itinerari on itinerari.id_iti = usu_it.id_it where nick = '" . $_SESSION['user'] . "'");

            while ($reg2 = $busca2->fetch_object()) {
                echo $reg2->iditi . " ," . $reg2->itinome;
            }

            // select usuarios.nick as unick,usuarios.nome as unome, itinerari.nome as itnome from usuarios join usu_it on usuarios.nick = usu_it.nick left join itinerari on itinerari.id_iti = usu_it.id_it
        } else {
            echo "<div class='alert alert-warning text-center' role='alert'><i class='material-icons'>announcement</i>
            Parece que é uma das primeiras vezes que você entra aqui, <a href='itinerarios.php'>escolha seus itinerarios.</a></div>";
        }
        ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>