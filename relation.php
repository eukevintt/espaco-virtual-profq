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
        <h1>Escolha até 4 itinerários</h1>
        <table border=1>

            <tr>
                <td>Nick</td>
                <td>Nome</td>
                <td>Escolha</td>
            </tr>
            <?php
            $busca = $banco->query("select usuarios.nick as unick,usuarios.nome as unome, itinerari.nome as itnome from usuarios join usu_it on usuarios.nick = usu_it.nick left join itinerari on itinerari.id_iti = usu_it.id_it");

            while ($reg = $busca->fetch_object()) {
                echo "<tr><td>$reg->unick</td><td>$reg->unome</td><td>$reg->itnome</td></tr>";
            }
            ?>
        </table>
    </div>


</body>

</html>