<?php
   // I create a model class that is an abstract so that I can put common
   //methods here.
   abstract class model {

     public function save() {}

   }

   //I need a concrete class to actually be a user
   class user extends model {
     public $username;
     public $password;
     public $email;
     public $firstName;
     public $lastName;
     
     //I make a constructor to load a user or create a new user
     public function __construct($userID = NULL) {

         if($userID == NULL) {
            //code for creating new empty user model
           
	 } else {

           //code for loading the user
	 }
     }
     //check the users password
     public function checkPassword() {}
     //save, delete, update, find methods
     public function save() {}
     public function delete() {}
     public function update() {}
     public function findOne($userID) {} 

   }


   //my database connection class that creates a signleton this is my db class
   class dbConn {
      //this holds the database connection
      protected static $db;
      
      //create db connection

      public function __construct() {}     
      
      //this is what returns the singleton
      static public function getConnection() {}

   }

   
   //this would be syntax for creating a new user
   $user = new user();

   //this would be syntax for loading an existing user.
   $user = new user('kwilliam@njit.edu');











