<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Inicio</title>
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
                break;
            } else {
                $verifi = false;
            }
        }

        if ($verifi === true) {
            $busca2 = $banco->query("select itinerari.img as itimg,usu_it.nick as usunick, itinerari.id_iti as iditi, itinerari.nome as itinome, itinerari.descricao as itidesc from usu_it join itinerari on itinerari.id_iti = usu_it.id_it where nick = '" . $_SESSION['user'] . "'");

            echo "<h1 class='text-center pb-5 py-4 display-5'>Suas escolhas:</h1>";

            while ($reg2 = $busca2->fetch_object()) {

                switch ($reg2->iditi) {
                    case 1:
                        $link = 'https://www.youtube.com/watch?v=utql4IgG3x8';
                        break;
                    case 2:
                        $link = 'https://www.youtube.com/watch?v=jY62oMc683c';
                        break;
                    case 3:
                        $link = 'https://www.youtube.com/watch?v=82pXbyHTiQk';
                        break;
                    case 4:
                        $link = 'https://www.youtube.com/watch?v=3YxaaGgTQYM';
                        break;
                    case 5:
                        $link = 'https://www.youtube.com/watch?v=1kEMhX0-Vos';
                        break;
                    case 6:
                        $link = 'https://www.youtube.com/watch?v=pkcJEvMcnEg';
                        break;
                    case 7:
                        $link = 'https://www.youtube.com/watch?v=m-fK9J-OGVs';
                        break;
                }


                echo "<div class='col-md-6 col-12 float-start text-center center mb-3 container'>
                        <div class='card w-50'>
                            <img src='img/$reg2->itimg' class='card-img-top'>
                            <div class='card-body'>
                              <h5 class='card-title text-center'>$reg2->itinome</h5>
                              <p class='card-text'>$reg2->itidesc</p>
                              <a href='$link' class='btn btn-primary'>Ir para o link</a>
                            </div>
                        </div>
                    </div>";
            }
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