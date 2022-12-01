<?php declare( strict_types = 1 );

require_once '../shared/Command.php';
require_once '../shared/Query.php';
require_once '../shared/Connection.php';
require_once '../shared/Invoker.php';

require_once './domain/ProductResponse.php';
require_once './domain/Product.php';
require_once './domain/ProductRepository.php';

require_once './services/ProductRepositoryMySQL.php';
require_once './services/commands/CreateCommand.php';
require_once './services/querys/SearchAllQuery.php';

require_once './infrastructure/resources/createResource.php';
require_once './infrastructure/resources/searchAllResource.php';

define("REQUEST", file_get_contents('php://input'));

switch($_SERVER["REQUEST_METHOD"]){
    case 'GET': 
        searchAll();
        break;
    case 'POST':
        createProductResource();
        break;
    default: 
        header_remove('Set-Cookie');
        header('Content-Type: application/json', true, 404);
        http_response_code(404);
        break;     
}
    
?>