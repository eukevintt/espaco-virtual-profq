<div class="container">
    <div class='py-4'>
        <i class='material-icons d-inline'>fiber_new</i>
        <h1 class='d-inline display-5 text-center'>Crie um novo usuário</h1>
    </div>
    <form action="novo-usuario.php" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" maxlength="30" class="form-control">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" maxlength="100" class="form-control">
        <label for="senha1">Senha</label>
        <input type="password" name="senha1" id="senha1" class="form-control">
        <label for="senha2">Confirmação da senha</label>
        <input type="password" name="senha2" id="senha2" class="form-control">
        <label for="nivel">Nivel</label>
        <select name="nivel" id="nivel" class="form-select mb-2">
            <option value="usu" selected>Aluno</option>
            <option value="admin">Administrador</option>
        </select>
        <button type='submit' class='btn btn-primary'>Cadastrar</button>
    </form>
</div>