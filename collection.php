<?php

   // This class will be for the database connection singleton
   class dbconn {
   
     public function __construct() {}

     public function sql($sql = '') {}
   
   }
   // this is the base class for the model
   class model {
     //see create table if does not exist sql statement
     //this will need to be overridden or dynamicly created
     public function save() {}
     public function createTable() {}
   }

   // this holds the properties for the user
   class userModel extends model {
   
     // make some getters and setters
     //take an ID in and load the user from the DB
     public function __construct($userID) {
     
        //put select query to load one user into the properties of this object;
     }
     
     public function checkPassword($password) {}
   
   }
   //  this is the base class for the collection and it's job is to run SQL
   //commands for groups of records
   class collection {
   
     //creates a new record for the collection, needs overrriden with specific
     //implementation 
     public function create() {
     
        $obj = new model;

	return $obj;
     }

     public function getList($limit)  {}

     public function getNext($numItems) {}

     public function getPrevious($numItems) {}
   
   }

   class usersCollection {

    

   }

   class carModel extends model {}
   class carsCollection {
      private $cars;
      private $pageRecordLimit;

      public function __construct($pageRecordLimit = 10) {

         $sql = 'SELECT * FROM cars LIMIT :RecordLimit';

         $dbconn = new DBconn;
         $stmt = $dbconn->prepare($sql);
	 $stmt->bindParam(':RecordLimit', $pageRecordLimit);
         $stmt->execute();
	 $stmt->fetchObject('carModel');
	 $this->cars = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
      }
   
      
   
   }


//implmentation 

class main {
 //example of how to make a new car / new record  
   $carCollection = new carCollection;

   $car = $carCollection->create();
   $car->setMake($make);
   $car->setModel($model);

   $car->save();

 //handling page view requests /w paging

   $carCollection = new carCollection; 


}

$program = new main();







