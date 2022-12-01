<?php 
    class SearchAllQuery implements Query{

        public function execute(){
            $repository = new ProductRepositoryMySQL();
          
            return $repository->searchAll();
        }
    }

?>