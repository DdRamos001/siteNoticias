<main>
    <form action="<?php echo HOME_URI;?>usuario/login" method="POST">
        <fieldset>
            <legend>Bem-vindo, já possui uma conta ?</legend>
            <input type="hidden" name="id" />
            <div class="form-group">
                <input class="form-control" type="text" name="nome" placeholder="Nome do usuário"/>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="Email"/>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Senha"/>
            </div>
            <div class="form-group">
                <input class="form-control" type="submit" name="enviar" value="enviar" />
            </div>
        </fieldset>
    </form>

</main>