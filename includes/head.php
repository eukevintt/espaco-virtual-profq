<?php
if ($_SESSION['user'] == "") {
    echo "<script>window.location='usu-login.php'</script>";
}


echo "Olá, " . $_SESSION['nome'];

if (is_admin()) {
    echo " | <a href='novo-usuario.php'>Novo Usuario</a> | <a href='relation.php'>Relação alunos</a>";
}


echo " | <a href='perfil.php'>Meu perfil</a> | <a href='user-logout.php'>Sair</a>";
