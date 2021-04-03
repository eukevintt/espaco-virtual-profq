<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Relação dos Alunos</title>
</head>

<body>
    <?php
    $relation = 'active';
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    require_once "includes/login.php";
    require_once "includes/head.php";

    if (!is_admin()) {
        echo '<div class="alert alert-danger text-center fade show w-50 mx-auto" role="alert"><i class="material-icons float-start">pan_tool</i>Parado ai, você acessou uma página restrita, volte para o inicio!</div>';
        exit;
    }
    ?>

    <div class='text-center container'>
        <div class='py-4'>
            <i class='material-icons d-inline'>ballot</i>
            <p class='display-5 text-center d-inline'>Relação das escolhas</p>
        </div>
        <table id="example" class="cell-border, hover, row-border, display" style="width:100%">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Escolheu</td>
                </tr>
            </thead>
            <?php
            $busca = $banco->query("select usuarios.nick as unick,usuarios.nome as unome, itinerari.nome as itnome from usuarios join usu_it on usuarios.nick = usu_it.nick left join itinerari on itinerari.id_iti = usu_it.id_it");
            echo "<tbody>";
            while ($reg = $busca->fetch_object()) {
                echo "<tr><td>$reg->unome</td><td>$reg->itnome</td></tr>";
            }
            echo "</tbody>";
            ?>

        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>