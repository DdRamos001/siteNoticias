<main>
    <form action="<?php echo HOME_URI;?>usuario/criar" method="POST">
        <fieldset>
            <legend>Cadastro de usuários</legend>
            <input type="hidden" name="id" />
            <div class="form-group">
                <input class="form-control" type="text" name="nome" placeholder="Nome do usuário"/>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="Email"/>
            </div>
            <div class="form-group">
                <input class="form-control" type="submit" name="enviar" value="enviar" />
            </div>
        </fieldset>
    </form>

</main>