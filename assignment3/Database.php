<?php

   class Database
   {
       #attributes

       #methods

       #create database
       public static function createDatabase()
       {
          $servername ='localhost';
          $username = 'root';
          $password = '';

          //create connection
          $connection = mysqli_connect($servername, $username, $password);

          if(!$connection)
          {
              //print('Error connecting to created database');
              die(mysqli_connect_error());
          }

          //create database
          $sql = 'CREATE DATABASE procom_db';

          if(mysqli_query($connection,$sql))
          {
              print('Database created successfully');
          }
          else
          {
              print('Error creating database');
          }

          mysqli_close($connection);
       }


       #get database connection
       public static function getDbConnection()
       {
         $host = '127.0.0.1';
         $database = 'procom_db';
         $user = 'root';
         $password ='';

         $connection = mysqli_connect($host, $user, $password, $database);

         //require_once('./db_connect.php');

         if(mysqli_connect_errno())
         {
             print('failed to connect to MYSQL '. mysqli_connect_error());

             die(mysqli_connect_error());
         }
         else
         {
             echo('Connected');
             return $connection;
         }

        //close connection
         mysqli_close($connection);
        }


        #create user table and insert users
        public static function createUserTable()
        {
            $host = '127.0.0.1';
            $database = 'procom_db';
            $user = 'root';
            $password ='';

            $connection = mysqli_connect($host, $user, $password, $database);

            $sql = 'CREATE TABLE procom_users(
                email VARCHAR(70) PRIMARY KEY,
                password VARCHAR(70)  NOT NULL, 
                firstname VARCHAR(70) NOT NULL,
                lastname VARCHAR (70) NOT NULL,
                role VARCHAR(50) NOT NULL
                )';

            $result = mysqli_query($connection, $sql);
            
            if($result == true)
            {
                print('connected successfully');
            }
            else
            {
                print(mysqli_error($connection));
            }

            #insert users into the table
            $sql1 = "INSERT INTO procom_users (email, password, firstname, lastname, role) VALUES
            ('a.dottin@gmail.com','andrewdottin123','Andrew', 'Dottin','Administrator'),
            ( 'j.doe@hotmail.com', 'janedoe1991', 'Jane','Doe', 'Administrator'),
            ( 'j.brown@brown.net', 'hackerbrown1', 'John','Brown','Administrator')";

            $verdict = mysqli_query($connection, $sql1);

            if($verdict == true)
            {
                print('Users successfully added');
            }
            else
            {
                print(mysqli_error($connection));
            }
        }

        #create courses table and insert courses
        public static function createCourseTable()
        {
            
        }

  



      

   }//DATABASE

  
   $test = new Database();
   $test -> createDatabase();
   $test ->getDbConnection();
   $test -> createUserTable();

?>