<?php

    const INSERTSQL = 
    "INSERT INTO sale(id_product, product_name, sale_date, quantity, cost) VALUES(?, ?, ?, ?, ?)";
    const SELECTSQL ="SELECT * FROM sale";

    class ProductRepositoryMySQL extends ConnectionPDO implements ProductRepository {
        
        public function addProduct(){
            $product = Product::create(REQUEST); 
             
            $this->connect();

            $sql = "INSERT INTO sale(id_product, product_name, sale_date, quantity, cost) VALUES(?, ?, ?, ?, ?)";
            $stmt = $this->getConnection()->prepare($sql);

            $productId=       $product->getProductId();
            $productName=  $product->getProductName();
            $saleDate =    $product->getSaleDate();
            $quantity =    $product->getQuantity();
            $cost =        $product->getCost();

            $stmt->bindParam(1,   $productId     );
            $stmt->bindParam(2,   $productName);
            $stmt->bindParam(3,   $saleDate   );
            $stmt->bindParam(4,   $quantity   );
            $stmt->bindParam(5,   $cost       );

            $stmt->execute();
            $this->disconnect();
        }
        
        public function searchAll(){
            $response = array();
            $this->connect();
            $sql ="SELECT * FROM sale";
            $stmt =$this->getConnection()->query($sql);
            $rows = $stmt->fetchAll();
            foreach($rows as $row){
                $product = new Product(
                    $row['id_product'], $row['sale_date'], $row['product_name'], $row['quantity'], $row['cost']);
                array_push($response, $product->generateDto());
            }
          
            $this->disconnect();
            return $response;
        }
        public function updateProduct(){
        }
        public function deleteProduct(){
        }
    }
?>