<form action="novo-usuario.php" method="post">
    Usuario: <input type="text" name="usuario" id="usuario" maxlength="30">
    Nome: <input type="text" name="nome" id="nome" maxlength="100">
    Senha: <input type="password" name="senha1" id="senha1">
    Confirmação da senha: <input type="password" name="senha2" id="senha2">
    Nivel: <select name="nivel" id="nivel">
        <option value="usu" selected>Aluno</option>
        <option value="admin">Administrador</option>
    </select>
    <input type="submit" value="Cadastrar">
</form>