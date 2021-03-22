<?php
$q = "select * from usuarios where nick ='" . $_SESSION['user'] . "'";
$busca = $banco->query($q);
$reg = $busca->fetch_object();
?>

<h1>Alteração de dados</h1>

<p>Obs: Você não pode mudar seu usuário e se deixar o campo senha vazio, a senha irá continuar a mesma!</p>

<form action="perfil.php" method="post">
    Usuario: <input type="text" name="usuario" id="usuario" maxlength="30" value="<?php echo $reg->nick ?>" readonly>
    Nome: <input type="text" name="nome" id="nome" maxlength="100" value="<?php echo $reg->nome ?>">
    Senha: <input type="password" name="senha1" id="senha1">
    Confirmação da senha: <input type="password" name="senha2" id="senha2">
    <input type="submit" value="Atualizar">
</form>