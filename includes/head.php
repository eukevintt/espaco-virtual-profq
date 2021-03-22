<?php
if ($_SESSION['user'] == "") {
    echo "<script>window.location='usu-login.php'</script>";
}


echo "Olá, " . $_SESSION['nome'];

if (is_admin()) {
    echo " | Novo Usuario | <a href='relation.php'>Relação alunos</a>";
}


echo " | <a href='user-logout.php'>Sair</a>";
