<main>
    <form action="<?php echo HOME_URI."usuario/alterar/".$id;?>" method="POST">
        <fieldset>
            <legend>Alterar senha</legend>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Senha"/>
            </div>
            <div class="form-group">
                <input type="submit" name="enviar" value="enviar" />
            </div>
        </fieldset>
    </form>

</main>