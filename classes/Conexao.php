<?php
/*
*
*
*   Classe Conexao
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
class Conexao {
     /**
 * 
 * 
 * Method responsible for get the connection with the data base
 * @access public
 * @since 2020/08/20
 * 
 * 
 */
   
    static public function getConexao(){
        return new PDO (SGBD.":host=".HOST_DB.";dbname=".DB."",USER_DB, PASS_DB);
    }

}