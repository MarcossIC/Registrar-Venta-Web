<?php declare(strict_types=1);

    class Invoker{
        private Command $command;
        private Query $query;

    
        public function setCommand(Command $command){
            $this->command = $command;
        }
        public function setQuery(Query $query){
            $this->query = $query;
        }

        public function runCommand(){
            $this->command->execute();
        }
        public function runQuery(){
            return $this->query->execute();
        }
        
    }

?>