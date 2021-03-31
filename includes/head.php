<?php
if ($_SESSION['user'] == "") {
    echo "<script>window.location='usu-login.php'</script>";
}

echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Olá, ' . $_SESSION['nome'] . '</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link ' . @$home . '" href="home.php">Home</a>';

if (is_admin()) {
    echo ' <a class="nav-link ' . @$novousu . '" href="novo-usuario.php">Novo Usuario</a> 
    <a class="nav-link ' . @$relation . '" href="relation.php">Relação alunos</a>';
}


echo '<a class="nav-link ' . @$perfil . '" href="perfil.php">Meu perfil</a>
<a class="nav-link" href="user-logout.php">Sair</a>

</div>
</div>
</div>
</nav>';
