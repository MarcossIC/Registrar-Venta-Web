<?php declare( strict_types = 1 );

    function createProductResource(): void {

        $command = new CreateCommand();

        $invoker = new Invoker();
        $invoker->setCommand($command);
        $invoker->runCommand();
        
        $response = Product::create(REQUEST)->generateDto(); 
        
        http_response_code(200);
        exit(json_encode($response));
    }

?>