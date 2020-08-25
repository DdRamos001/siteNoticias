<?php
/*
*
*
*   Classe Comentario
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
class Comentario{
     /**
     * Identifier
     * @access private
     * @name id
     */
    private $id;
       /**
     * 
     * @access private
     * @name comentario
     */
    private $comentario;
       /**
     * 
     * @access private
     * @name data
     */
    private $data;
       /**
     * 
     * @access private
     * @name noticia
     */
    private $noticia;
       /**
     * 
     * @access private
     * @name usuario
     */
    private $usuario;

    /**
 * 
 * @access public
 * @param int
 * 
 */
    public function setId($id){
        $this->id=$id;
    }
       /**
 * 
 * @access public
 * @return int
 * 
 */
    public function getId(){
        return $this->id;
    }
/**
 * 
 * @access public
 * @param int
 * 
 */
    public function setComentario($comentario){
        $this->comentario=$comentario;
    }
       /**
 * 
 * @access public
 * @return int
 * 
 */
    public function getComentario(){
        return $this->comentario;
    }
/**
 * 
 * @access public
 * @param int
 * 
 */
    public function setDatad($data){
        $this->data=$data;
    }
       /**
 * 
 * @access public
 * @return int
 * 
 */
    public function getData(){
        return $this->data;
    }
/**
 * 
 * @access public
 * @param int
 * 
 */
    public function setNoticia($noticia){
        $this->noticia=$noticia;
    }
       /**
 * 
 * @access public
 * @return int
 * 
 */
    public function getNoticia(){
        return $this->noticia;
    }
/**
 * 
 * @access public
 * @param int
 * 
 */
    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }
       /**
 * 
 * @access public
 * @return int
 * 
 */
    public function getUsuario(){
        return $this->usuario;
    }
/**
 * 
 * Method responsible for loading the list of comments
 * @access public
 *  @since 2020/08/20
 */
    public function listar($id){

        $conexao=Conexao::getConexao();
        $resultado=$conexao->query(
          "SELECT nome, comentario FROM comentario WHERE id = $id "
        );
        
        
        $comentarios=null;
        while($comentario=$resultado->fetch(PDO::FETCH_OBJ)){
            $comentarios[]=$comentario;
        }
        include HOME_DIR."view/paginas/noticias/noticia.php";
    }
    
/**
 * 
 * Method responsible for read the comments and insert then into de data base
 * @access public
 *  @since 2020/08/20
 * 
 * 
 */
    public function comentar($id){

        if(isset($_POST['enviar'])){

            $comentario =  $_POST['comentario'];

            if(isset($_SESSION['login'])){

            $nome=$_SESSION['login'];

            $sql =  "INSERT INTO noticias.comentario (comentario,nome,noticia_id) VALUES ('$comentario','$nome','$id')";

             $conexao=Conexao::getConexao();
             $resultado=$conexao->query($sql);

            }else{

                $sql =  "INSERT INTO noticias.comentario (comentario,nome,noticia_id) VALUES ('$comentario','Anonimo','$id')";
                $conexao=Conexao::getConexao();
                $resultado=$conexao->query($sql);
            }

        }
        include HOME_DIR."view/paginas/noticias/noticia.php";
    }


}