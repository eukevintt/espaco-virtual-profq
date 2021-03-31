<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
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
        <h1 class='display-5 text-center'>Escolha <strong>4</strong> itinerários</h1>
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
                    echo "<tr><td>$reg->img</td><td>$reg->nome</td><td><input type='checkbox' id='itinerarios' name='$reg->idit' onclick='verificar()'></td></tr>";

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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script>
        var CheckMaximo = 4;

        function verificar() {
            var Marcados = 0;
            var objCheck = document.forms['checks'].elements['itinerarios'];
            for (var iLoop = 0; iLoop < objCheck.length; iLoop++) {
                if (Marcados < CheckMaximo) {
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