<link rel="stylesheet" href="<?php echo HOME_URI?>view/tema/css/contato.css"> 
<main>
    <form action="<?php echo HOME_URI;?>contato/enviar" method="POST">
        <fieldset>
            <legend>Ficou com duvidas ? envie sua dúvida pelo formulário</legend>
            <input type="hidden" name="id" />
            <div class="form-group">
                <input class="form-control" type="text" name="nome" placeholder="Nome"/>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="E-mail"/>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="assunto" placeholder="Assunto"/>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="texto" placeholder="Escrever..."/>
            </div>
            <div class="form-group">
                <input class="form-control" type="submit" name="enviar" value="enviar" />
            </div>
        </fieldset>
    </form>
    <div class="container-2">
    <svg  id='mail' width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="#737373" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg>
<h2 id='email'>info@cimol.com</h2>
</div>
</main>