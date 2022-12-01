<?php declare( strict_types = 1 );

    function searchAll(): void {

        $query = new SearchAllQuery();

        $invoker = new Invoker();
        $invoker->setQuery($query);
        $response =$invoker->runQuery();
        
        http_response_code(200);
        exit(json_encode($response));
    }

?>