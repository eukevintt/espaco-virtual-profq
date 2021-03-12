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
        <h1>Escolha até 4 itinerários</h1>
        <table border=1>

            <tr>
                <td>Foto</td>
                <td>Nome</td>
                <td>Escolha</td>
            </tr>
            <?php
            $busca = $banco->query("select * from itinerari");

            while ($reg = $busca->fetch_object()) {
                echo "<tr><td>$reg->img</td><td>$reg->nome</td><td><input type='checkbox'></td></tr>";
            }
            ?>
        </table>
    </div>


</body>

</html>