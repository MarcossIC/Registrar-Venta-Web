<?php 
    class CreateCommand implements Command{

        public function execute(): void{
            $repository = new ProductRepositoryMySQL();
          
            $repository->addProduct();
        }
    }

?>