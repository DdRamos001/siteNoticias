<?php
/*
*
*
*   Classe Inicio
*
*   @author Diogo Ramos
*
*   @version 1.0
*
*   @access public
*
*   @copyright GPL 2020, ESCOLA TÉCNICA ESTADUAL MONTEIRO LOBADO CURSO TÉCNICO EM INFORMÁTICA INTEGRADO AO TÉCNICO 
*
*/
class Inicio{
/**
 * 
 * 
 * Method responsible for load initial page
 * @access public
 * @since 2020/08/20
 * 
 * 
 */
    public function index(){
        include HOME_DIR."view/paginas/home.php";
    }
}

?>