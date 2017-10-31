<?php
/**
 * Created by PhpStorm.
 * User: kwilliams
 * Date: 10/31/17
 * Time: 2:35 PM
 */

$program = new main();

class main {
    public function __construct()
    {
        $accounts = new accounts();
        $todos = new todos();

        $sql =  $accounts->getRecordSet();
        echo $sql . '<br>';
        $sql =  $todos->getRecordSet();
        echo $sql;
    }
}

class collection {

    public function __construct()
    {
    }

    public function getRecordSet() {

        $sql = 'SELECT * FROM ' . get_class($this);

        return $sql;
    }
}

class model {
    protected function getRecord() {}

    protected function save() {

        $sql = 'INSERT INTO Accounts (firstname, lastname)
                VALUES $this->firstName, $this->lastName';

    }


    protected function delete() {}
}

class schema {
    protected function getSchema() {}
}

class accounts extends collection {}

class account extends model {}

class accountFields extends schema {}

class todos extends collection {}

class todo extends model {}

class todoFields extends schema {}





