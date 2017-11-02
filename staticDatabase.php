<?php
/**
 * Created by PhpStorm.
 * User: kwilliams
 * Date: 10/31/17
 * Time: 9:48 PM
 */


/**
 * Created by PhpStorm.
 * User: kwilliams
 * Date: 10/30/17
 * Time: 10:37 PM
 */
//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);


define('DATABASE', 'kwilliam');
define('USERNAME', 'kwilliam');
define('PASSWORD', 'ma9euXF1H');
define('CONNECTION', 'sql2.njit.edu');

class dbConn{

    //variable to hold connection object.
    protected static $db;

    //private construct - class cannot be instatiated externally.
    private function __construct() {

        try {
            // assign PDO object to db variable
            self::$db = new PDO( 'mysql:host=' . CONNECTION .';dbname=' . DATABASE, USERNAME, PASSWORD );
            self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch (PDOException $e) {
            //Output error - would normally log this to error file rather than output to user.
            echo "Connection Error: " . $e->getMessage();
        }

    }

    // get connection function. Static method - accessible without instantiation
    public static function getConnection() {

        //Guarantees single instance, if no connection object exists then create one.
        if (!self::$db) {
            //new connection object.
            new dbConn();
        }

        //return connection.
        return self::$db;
    }
}


class collection {


    static public function findAll() {

        $db = dbConn::getConnection();
        $tableName = get_called_class();
        $sql = 'SELECT * FROM ' . $tableName;
        $statement = $db->prepare($sql);
        $statement->execute();
        $class = static::$modelName;
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        $recordsSet =  $statement->fetchAll();
        return $recordsSet;
    }

    static public function findOne($id) {

        $db = dbConn::getConnection();
        $tableName = get_called_class();
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE id =' . $id;
        $statement = $db->prepare($sql);
        $statement->execute();
        $class = static::$modelName;
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        $recordsSet =  $statement->fetchAll();
        return $recordsSet[0];
    }
}

class accounts extends collection {
    protected static $modelName = 'account';
}
class todos extends collection {
    protected static $modelName = 'todo';
}
class model {
    protected $tableName;
    public function save() {

        $tableName = get_called_class();

        $array = get_object_vars($this);
        $columnString = implode(',', $array);
        $valueString = ":".implode(',:', $array);
       // echo "INSERT INTO $tableName (" . $columnString . ") VALUES (" . $valueString . ")</br>";

        echo 'I just saved record: ' . $this->id;
    }

    public function update() {
        echo 'I just updated record' . $this->id;
    }
    public function delete() {

        echo 'I just deleted record' . $this->id;
    }
}

class account extends model {



}
class todo extends model {
    public $id;
    public $owneremail;
    public $ownerid;
    public $createddate;
    public $duedate;
    public $message;
    public $isdone;


    public function __construct()
    {
        $this->tableName = 'todos';
    }
}
// this would be the method to put in the index page for accounts
$records = accounts::findAll();
//print_r($records);


// this would be the method to put in the index page for todos
$records = todos::findAll();
//print_r($records);

//this code is used to get one record and is used for showing one record or updating one record
$record = todos::findOne(1);

//print_r($record);


//this is used to save the record or update it (if you know how to make update work and insert)



$record->save();


//$record = accounts::findOne(1);


//This is how you would save a new todo item
$record = new todo();
$record->message = 'some task';
$record->isdone = 0;
$record->save();

print_r($record);



