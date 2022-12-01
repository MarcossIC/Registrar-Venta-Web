<?php 

    class ProductResponse {
        public $productId;
        public $saleDate;
        public $productName;
        public $quantity;
        public $cost;

        public function __construct($productId, $saleDate, $productName, $quantity, $cost){
            $this->productId = $productId;
            $this->saleDate = $saleDate;
            $this->productName = $productName;
            $this->quantity = $quantity;
            $this->cost = $cost;
        }
    }
?>