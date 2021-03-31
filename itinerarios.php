<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

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
            <form action="" method="post" name='checks'>
                <tr>
                    <td>Foto</td>
                    <td>Nome</td>
                    <td>Escolha</td>
                </tr>
                <?php
                $busca = $banco->query("select id_iti as idit, nome, descricao, img from itinerari");
                error_reporting(0);
                while ($reg = $busca->fetch_object()) {
                    echo "<tr><td>$reg->img</td><td>$reg->nome</td><td><input type='checkbox' id='$reg->idit' name='$reg->idit' onclick='verificar()'></td></tr>";

                    if ($_POST[$reg->idit]) {
                        $q = "insert into usu_it (nick, id_it) values ('" . $_SESSION['user'] . "', '" . $reg->idit . "')";
                        $banco->query($q);
                        echo "<script>window.location='home.php'</script>";
                    }
                }
                ?>
            </form>
            <input type="submit" value="enviar">
        </table>

        <?php
        ?>
    </div>

    <script>
        var CheckMaximo = 3;

        function verificar() {
            var Marcados = 1;
            var objCheck = document.forms['checks'];
            for (var iLoop = 0; iLoop < objCheck.length; iLoop++) {
                if (Marcados <= CheckMaximo) {
                    if (objCheck[iLoop].checked) {
                        Marcados++;
                    }
                    for (var i = 0; i < objCheck.length; i++) {
                        objCheck[i].disabled = false;
                    }
                } else {
                    for (var i = 0; i < objCheck.length; i++) {
                        if (objCheck[i].checked == false) {
                            objCheck[i].disabled = true;
                        }
                    }
                }
            }
        }
    </script>
</body>

</html>