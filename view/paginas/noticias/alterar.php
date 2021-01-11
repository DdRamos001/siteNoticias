<main>
    <form action="<?php echo HOME_URI;?>noticia/alterar/<?php echo $id;?>" method="POST">
        <fieldset>
            <legend>Alterar noticia</legend>
            <input type="hidden" name="id" />
            <div class="form-group">
                <input class="form-control" type="text" name="titulo" placeholder="Titulo"/>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="texto" placeholder="Texto da notícia"/>
            </div>
            <div class="form-group">
                <input class="form-control" type="submit" name="enviar" value="enviar" />
            </div>
        </fieldset>
    </form>

</main>