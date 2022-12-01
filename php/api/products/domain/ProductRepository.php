<?php
    interface ProductRepository{
        public function searchAll();
        public function addProduct();
        public function updateProduct();
        public function deleteProduct();
    }
?>