<?php
/*
*
*
*   Classe Usuario
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
class Usuario{
        /**
     * Identifier
     * @access private
     * @name id
     */
    private $id;
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
     * @name senha
     */
    private $senha;
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
    public function setSenha($senha){
        $this->senha=$senha;
    }
  /**
 * 
 * @access public
 * @return int
 * 
 */  
    public function getSenha(){
        return $this->senha;
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
 * Method responsible for loading the list of users 
 * @access public
 * @since 2020/08/20
 */
    public function listar(){

        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
        {
          unset($_SESSION['login']);
          unset($_SESSION['senha']);
          header('location:'.HOME_URI.'Inicio');
          }

        $conexao=Conexao::getConexao();
        $resultado=$conexao->query(
            "SELECT id, nome, email FROM usuario");
        
        $usuarios = null;
      while($usuario=$resultado->fetch(PDO::FETCH_OBJ)){
            $usuarios[]=$usuario;
   };
  
             include HOME_DIR."view/paginas/usuarios/listar.php";
    }
/**
 * 
 * Method responsible for register a new user 
 * @access public
 * @since 2020/08/20
 */
   
    public function criar(){
    
        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
        {
          unset($_SESSION['login']);
          unset($_SESSION['senha']);
          
                  header('location:'.HOME_URI.'Inicio');
          }

        
          if(isset($_POST['enviar'])){
  

            $senha=md5('info123');
            $nome=$_POST['nome'];
            $email=$_POST['email'];
    

            $sql="SELECT email FROM noticias.usuario WHERE email='$email'";

            $conexao=Conexao::getConexao();
            $resultado=$conexao->query($sql);

                if($resultado->rowCount()>0){
                    
                     echo '<p>Usuario já cadastrado</p>';
                              
                }else{

                    $sql="INSERT INTO noticias.usuario (nome,email,senha) VALUES ('$nome','$email','$senha')";
                    $conexao=Conexao::getConexao();
                    $resultado=$conexao->query($sql);
                
                    echo '<p>USUARIO CADASTRADO COM SUCESSO!</p>';

                }
            }
             include HOME_DIR."view/paginas/usuarios/form_usuario.php";       
}
/**
 * 
 * Method responsible for save a new user in the data base
 * @access public
 * @deprecated 
 */
   

    public function salvar(){

        include HOME_DIR."view/paginas/usuarios/validar.php";
      
    }
/**
 * 
 * Method responsible for show the user id
 * @access public
 * @deprecated 
 */
   
    public function exibir($id){
        echo "O id do usuario é".$id;
    }
/**
 * 
 * Method responsible for the login 
 * @access public
 * @since 2020/08/20
 */
   
    public function login(){

        if(isset($_POST['enviar'])){
        
                $nome=$_POST['nome'];
                $email=$_POST['email'];
                $senha=md5($_POST['password']);

                $sql="SELECT email FROM noticias.usuario WHERE email='$email'";

                $conexao=Conexao::getConexao();
                $resultado=$conexao->query($sql);

                if($resultado->rowCount()>0){

                    $sql="SELECT id,email,senha FROM noticias.usuario WHERE email='$email' AND senha='$senha'";
                    $conexao=Conexao::getConexao();
                    $resultado=$conexao->query($sql);     


                    if($resultado->rowCount()>0){

                        $conexao=Conexao::getConexao();
                        $resultado=$conexao->query(
                            "SELECT id, nome, email FROM usuario WHERE nome='$nome'");
                        
                        $usuarios = null;
                      while($usuario=$resultado->fetch(PDO::FETCH_OBJ)){
                            $usuarios[]=$usuario;
                   };
                   if(isset($usuarios)){
                    foreach($usuarios AS $usuario){
             
                        $_SESSION['id']=$usuario->id;

                    }

                            echo 'você está logado!';
                            $_SESSION['login'] = $nome;
                            $_SESSION['senha'] = $senha;
                        
                           header('location:'.HOME_URI.'Inicio');
                        

                    }else{

                        
                        echo '<style type="text/css">
                        #find{
                            font-weight:bold;
                            color:red;
                        }
                        </style>
                        <p id="find" >Usuario não encontrado !</p>';


                    }
        }
    
                }

        }    
        include HOME_DIR."view/paginas/usuarios/login.php";

        }
    
        
    
/**
 * 
 * Method responsible for the logout 
 * @access public
 * @since 2020/08/20
 */
   
    public function logout(){

        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location:'.HOME_URI.'Inicio');
        
    }
    /**
 * 
 * Method responsible for the delete a user from the data base 
 * @access public
 * @since 2020/08/20
 */
   
    public function delete($id){
      
        $sql="DELETE FROM noticias.usuario WHERE usuario.id = '$id'";
          $conexao=Conexao::getConexao();
          $resultado=$conexao->query($sql);

        header('Location:'.HOME_URI.'usuario');
    }
        /**
 * 
 * Method responsible for the update the user password
 * @access public
 * @since 2020/08/20
 */
    public function alterar($id){
  
        if(isset($_POST['enviar'])){
         
            $senha=md5($_POST['password']);
            $sql="UPDATE noticias.usuario SET senha = '$senha' WHERE id = '$id'";

             $conexao=Conexao::getConexao();
             $resultado=$conexao->query($sql);
             
             header('Location:'.HOME_URI.'usuario');
  

        }

       include HOME_DIR."view/paginas/usuarios/alterar.php";
}

}
