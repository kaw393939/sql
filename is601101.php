<?php


class main {

    public function __construct()
    {
        $todo = new todo($_GET['id']);


    }

}

abstract class model {

    //This class has the SQL query template for INSERT, UPDATE and DELETE of single records

    public function __construct($id)

    {
        $record = $this->getSelectAllQuery($id);

    }


    protected function getSelectAllQuery($recordType, $ID) {

        $sql = "SELECT * FROM $recordType WHERE id=$ID";

        return $sql;

    }

}

class todo extends model {

    //This class has the specific implementation of CRUD for one todo
    public function findOne($id) {

        $dbh = "DO THIS: GET DATABASE CONNECTION";

        $sql = $this->getSelectAllQuery(todos, $id);

        $recordSet = $dbh->execute($sql);

        return $recordSet;
    }

}

class account extends model {

    //This class has the specific implementation of CRUD for one account

}

abstract class collection {

    //this class has the query template for selecting ALL, Sorting, or Retrieval of records
}

class todos extends collection {

    //this class has the implementation for todo specific queries
}

class accounts extends collection {

    //this class has the implementation for account specific queries

}


abstract class schema {

    //this class has the generic table create query and update table query
}

class todoSchema extends schema {

    //this class has the todo specific table fields with data types.
}

class accountSchema extends schema {}


?>