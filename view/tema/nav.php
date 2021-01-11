<?php


if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);

		?>
		<a id='login' href='<?php echo HOME_URI;?>usuario/login'>
		<svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-door-closed-fill" fill="#1d476d" xmlns="http://www.w3.org/2000/svg">
	<path fill-rule="evenodd" d="M4 1a1 1 0 0 0-1 1v13H1.5a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2a1 1 0 0 0-1-1H4zm2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
	
  </svg>
<p>LOGAR</p>
  </a>

	 
	  <?php

  }
	
  ?>
<?php 

if((isset ($_SESSION['login']) == true) and (isset ($_SESSION['senha']) == true)){
		
	?>
	<div class="row">
	<a id='logout' href='<?php echo HOME_URI;?>usuario/logout'>
	<svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-door-open-fill" fill="#1d476d" xmlns="http://www.w3.org/2000/svg">
	<path fill-rule="evenodd" d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2v13h1V2.5a.5.5 0 0 0-.5-.5H11zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
  </svg>
  <p>LOGOUT</p>
	</a>
  </div>
  <?php

}
?>
<nav>
	<ul>
		<li><a href="<?php echo HOME_URI;?>">Início</a></li>
		<?php if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
  		unset($_SESSION['login']);
 		 unset($_SESSION['senha']);
}else{

	?><li><a href="<?php echo HOME_URI;?>usuario">Usuários</a></li><?php

}
?>

		<li><a href="<?php echo HOME_URI;?>noticia">Notícia</a></li>
		<li><a href="<?php echo HOME_URI;?>contato">Contato</a></li>
		
	</ul>
</nav>
