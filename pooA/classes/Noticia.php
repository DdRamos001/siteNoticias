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
class Noticia{
    /**
     * Identifier
     * @access private
     * @name id
     */
    private $id;
      /**
     * @access private
     * @name titulo
     */
    private $titulo;
        /**
     * @access private
     * @name descricao
     */
    private $descricao;
     /**
     * @access private
     * @name comentarios
     */
    private $comentarios;
     /**
     * @access private
     * @name data
     */
    private $data;
      /**
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
    public function setTitulo($titulo){
        $this->titulo=$titulo;
    }
        /**
 * 
 * @access public
 * @return int
 * 
 */
    public function getTitulo(){
        return $this->titulo;
    }
/**
 * 
 * @access public
 * @param int
 * 
 */
    public function setDescricao($descricao){
        $this->descricao=$descricao;
    }
        /**
 * 
 * @access public
 * @return int
 * 
 */
    public function getDescricao(){
        return $this->descricao;
    }
/**
 * 
 * @access public
 * @param int
 * 
 */
    public function setComentarios($comentarios){
        $this->comentarios=$comentarios;
    }
        /**
 * 
 * @access public
 * @return int
 * 
 */
    public function getComentarios(){
        return $this->comentarios;
    }
    /**
 * 
 * @access public
 * @param int
 * 
 */
    public function setData($data){
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
 * Method responsible for loading the initial page 
 * @access public
 * @since 2020/08/20
 */
    public function index(){
       $this->listar();
    }
/**
 * 
 * Method responsible for loading the list of news
 * @access public
 *  @since 2020/08/20
 */
    public function listar(){
        $conexao=Conexao::getConexao();
        
        $resultado=$conexao->query(
            "SELECT id, titulo, descricao,DATE_FORMAT(data, '%d/%m/%Y') AS data, (SELECT nome FROM usuario WHERE id=noticias.usuario_id) AS nome_usuario FROM noticias ORDER BY id DESC LIMIT 5"
        );
        
        
        $noticias=null;
        while($noticia=$resultado->fetch(PDO::FETCH_OBJ)){
            $noticias[]=$noticia;
        }
        include HOME_DIR."view/paginas/noticias/noticias.php";
    }
    /**
 * 
 * 
 * Method responsible for save the news
 * @access public
 * @deprecated
 * 
 * 
 */
    public  function salvar(){
            $sql="INSERT INTO noticia (usuario_id, titulo, descricao,data) VALUES (".$_SESSION['usuario']['id'].",)";
    }
 /**
 * 
 * 
 * Method responsible for view the news
 * @access public
 * @since 2020/08/20
 * 
 * 
 */
   
    public function ver($id){
        $conexao=Conexao::getConexao();
        $resultado=$conexao->query(
            "SELECT id, titulo, descricao,DATE_FORMAT(data, '%d/%m/%Y') AS data,
             (SELECT nome FROM usuario WHERE id=noticias.usuario_id) AS nome_usuario
             FROM noticias  
             WHERE id=".$id
        );
       
        $noticia=$resultado->fetch(PDO::FETCH_OBJ);
       
        include HOME_DIR."view/paginas/noticias/noticia.php";
    }
 /**
 * 
 * 
 * Method responsible for delete the news
 * @access public
 * @since 2020/08/20
 * 
 * 
 */
    public  function delete($id){
        

        $sql="DELETE FROM noticias.noticias WHERE noticias.id = '$id'";
        $conexao=Conexao::getConexao();
        $resultado=$conexao->query($sql);

      header('Location:'.HOME_URI.'noticia');

    }

     /**
 * 
 * 
 * Method responsible for update the news
 * @access public
 * @since 2020/08/20
 * 
 * 
 */

    public function alterar($id){
  
        if(isset($_POST['enviar'])){
         
            $titulo=$_POST['titulo'];
            $texto=$_POST['texto'];

            $sql="UPDATE noticias.noticias SET titulo = '$titulo', descricao = '$texto' WHERE id = '$id'";

            $conexao=Conexao::getConexao();
            $resultado=$conexao->query($sql);

        
             header('Location:'.HOME_URI.'noticia/ver/'.$id);
        }


        include HOME_DIR."view/paginas/noticias/alterar.php";

}
     /**
 * 
 * 
 * Method responsible for create a news
 * @access public
 * @since 2020/08/20
 * 
 * 
 */
    public function criar(){

        if(isset($_POST['enviar'])){
         
            $titulo=$_POST['titulo'];
            $texto=$_POST['texto'];
            $senha=$_SESSION['senha'];
            $data = date('Y-m-d');
            $id = $_SESSION['id'];
          

            $sql="INSERT INTO noticias.noticias (descricao,titulo,data,usuario_id) VALUES ('$texto','$titulo','$data','$id')";
            $conexao=Conexao::getConexao();
            $resultado=$conexao->query($sql);
        

            header('Location:'.HOME_URI.'noticia');

        }
     include HOME_DIR."view/paginas/noticias/criar.php";
} 
    
}

      
?>