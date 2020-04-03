<?php
    // Making the Product class
    class Produto{
        //setting the attributos for the Product class
        private $idProduto;
        private $nomeProduto;
        private $unidadeProduto;
        private $precoProduto;  
        private $fotoProduto; 
        
        //making the getters and setters below
        public function getIdProduto(){
            return $this->idProduto;
        }

        public function setIdProduto($id){
                $this->idProduto = $id;
        }

        public function getnomeProduto(){
            return $this->nomeProduto;
        }

        public function setnomeProduto($nome){
                $this->nomeProduto = $nome;
        }

        public function getunidadeProduto(){
            return $this->unidadeProduto;
        }

        public function setunidadeProduto($unidadeProduto){
            $this->unidadeProduto = $unidadeProduto;
        }
        
        public function getprecoProduto(){
            return $this->precoProduto;
        }

        public function setprecoProduto($preco){
            $this->precoProduto = $preco;
        }

        public function getFotoProduto(){
            return $this->fotoProduto;
        }

        public function setFotoProduto($ft){
            $this->fotoProduto = $ft;
        }
        
        //making a function for list one product
        public function listar(){
            $conexao = Conexao::pegarConexao();
            $querySelect = "select idProduto, 
            nomeProduto,unidadeProduto, precoProduto,fotoProduto 
            from tbproduto";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }
        
        //making a function for list one specific product
        public function listarPesquisa($campoPesquisa){
            $conexao = Conexao::pegarConexao();
            $querySelect = "select idProduto,nomeProduto,unidadeProduto,precoProduto,
             fotoProduto
                from tbproduto
                    where nomeProduto like '$campoPesquisa' or  like '$campoPesquisa'";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }
    
    
        public function listarProduto($Produto){
            $conexao = Conexao::pegarConexao();
            $querySelect = "select idProduto,nomeProduto,unidadeProduto,precoProduto,
            fotoProduto
               from tbproduto
                 where idProduto =".$Produto->getIdProduto();
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            foreach ($lista as $linha){
                $Produto->setIdProduto($linha['idProduto']);
                $Produto->setnomeProduto($linha['nomeProduto']);
                $Produto->setunidadeProduto($linha['unidadeProduto']);
                $Produto->setprecoProduto($linha['precoProduto']);
                $Produto->setFotoProduto($linha['fotoProduto']);
            }
            return $Produto;   
        }
    }



?>