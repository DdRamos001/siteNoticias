<?php

/*
*
*
*   Classe Noticia
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

class Contato{

   /**
     * @access private
     * @name nome
     */
    private $nome;
   /**
     * @access private
     * @name email
     */
    private $email;
   /**
     * @access private
     * @name assunto
     */
    private $assunto;
   /**
     * @access private
     * @name texto
     */
    private $texto;
/**
 * 
 * @access public
 * @param int
 * 
 */
    public function setNome($nome){
        $this->nome=$nome;
    }
      /**
 * 
 * @access public
 * @return int
 * 
 */
    public function getNome(){
        return $this->nome;
    }
/**
 * 
 * @access public
 * @param int
 * 
 */
    public function setEmail($email){
        $this->email=$email;
    }
      /**
 * 
 * @access public
 * @return int
 * 
 */
    public function getEmail(){
        return $this->email;
    }
/**
 * 
 * @access public
 * @param int
 * 
 */
    public function setTexto($texto){
        $this->texto=$texto;
    }
      /**
 * 
 * @access public
 * @return int
 * 
 */
    public function getTexto(){
        return $this->texto;
    }
/**
 * 
 * @access public
 * @param int
 * 
 */
    public function setAssunto($assunto){
        $this->assunto=$assunto;
    }
      /**
 * 
 * @access public
 * @return int
 * 
 */
    public function getAssunto(){
        return $this->assunto;
    }
/**
 * 
 * Method responsible for loading the initial page 
 * @access public
 * @since 2020/08/20
 */
    public function index(){
        
        $this->enviar();

    }

/**
 * 
 * Method responsible for send the user question to the support 
 * @access public
 * @since 2020/08/20
 */
    public function enviar(){

        if(isset($_POST['enviar'])){
  
           
            $nome=$_POST['nome'];
            $email=$_POST['email'];
            $assunto=$_POST['assunto'];
            $texto=$_POST['texto'];
    
            $emailenviar = "diogo_assis_ramos5@hotmail.com";
            $destino = $email;
    
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: $nome <$email>';
        //$headers .= "Bcc: $EmailPadrao\r\n";
      
        $enviaremail = mail($emailenviar, $assunto, $texto, $headers);
        if($enviaremail){
        $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
        echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
        } else {
        $mgm = "ERRO AO ENVIAR E-MAIL!";
        echo "";
        }

            }
             include HOME_DIR."view/paginas/contato/enviar.php";       
}



    }







?>