<?php 

    class Product {
        private $productId;
        private $saleDate;
        private $productName;
        private $quantity;
        private $cost;

        public function __construct($productId, $saleDate, $productName, $quantity, $cost){
            $this->productId = $productId;
            $this->saleDate = $saleDate;
            $this->productName = $productName;
            $this->quantity = $quantity;
            $this->cost = $cost;
        }

        public static function create(string $json){
            $body = json_decode($json);
            return new Product($body->productId, $body->saleDate , $body->productName, $body->quantity, $body->cost);
        }

        public function generateDto(){
            return new ProductResponse($this->productId, $this->saleDate, $this->productName, $this->quantity, $this->cost);
        }

        public function getProductId(){
            return $this->productId;
        }
        public function getSaleDate(){
            return $this->saleDate;
        }
        public function getProductName(){
            return $this->productName;
        }
        public function getQuantity(){
            return $this->quantity;
        }
        public function getCost(){
            return $this->cost;
        }
    }

?>