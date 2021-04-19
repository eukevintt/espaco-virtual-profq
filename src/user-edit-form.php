<?php
$q = "select * from usuarios where nick ='" . $_SESSION['user'] . "'";
$busca = $banco->query($q);
$reg = $busca->fetch_object();
?>


<div class='container'>
    <form action="perfil.php" method="post">
        <label for="usuario">Usuário</label>
        <input type="text" name="usuario" class='form-control' id="usuario" maxlength="30" value="<?php echo $reg->nick ?>" readonly>
        <label for="nome">Nome</label>
        <input type="text" name="nome" class='form-control' id="nome" maxlength="100" value="<?php echo $reg->nome ?>">
        <label for="senha1">Senha</label>
        <input type="password" class='form-control' name="senha1" id="senha1">
        <label for="senha2">Confirmação da senha</label>
        <input type="password" class='form-control mb-2' name="senha2" id="senha2">
        <button type='submit' class='btn btn-primary'>Atualizar</button>
    </form>
</div>