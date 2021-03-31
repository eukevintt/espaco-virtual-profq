<?php
$q = "select * from usuarios where nick ='" . $_SESSION['user'] . "'";
$busca = $banco->query($q);
$reg = $busca->fetch_object();
?>



<form action="perfil.php" method="post">
    Usuario: <input type="text" name="usuario" id="usuario" maxlength="30" value="<?php echo $reg->nick ?>" readonly>
    Nome: <input type="text" name="nome" id="nome" maxlength="100" value="<?php echo $reg->nome ?>">
    Senha: <input type="password" name="senha1" id="senha1">
    Confirmação da senha: <input type="password" name="senha2" id="senha2">
    <input type="submit" value="Atualizar">
</form>