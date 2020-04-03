<?php 
    // Making the Conection class
    class Conexao{
        public static function getConexao(){
            try{
            
                $servidor = '127.0.0.1'; //setting my localhost server
                $usuario = 'root'; //setting my username
                $senha = ''; //setting the password
                $bdname = 'bdTelaUm'; // setting the database name
            
                $conexao = new PDO('mysql:host='.$servidor.';dbname='.$bdname, $usuario, $senha);
                //setting the PDO Object
            
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexao->exec("SET CHARACTER SET utf8");
                return $conexao;
            }catch(PDOException $th){
                echo 'teste exception';
                echo $th->getMessage();
            }
        }

    }

?>