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
          }
          else
          {
            
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
             //print('failed to connect to MYSQL '. mysqli_connect_error());

             die(mysqli_connect_error());
         }
         else
         {
             //echo('Connected');
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
            }
            else
            {
               // print(mysqli_error($connection));
            }

            #insert users into the table
            $sql1 = "INSERT INTO procom_users (email, password, firstname, lastname, role) VALUES
            ('a.dottin@gmail.com','andrewdottin123','Andrew', 'Dottin','Administrator'),
            ( 'j.doe@hotmail.com', 'janedoe1991', 'Jane','Doe', 'Administrator'),
            ( 'j.brown@brown.net', 'hackerbrown1', 'John','Brown','Administrator')";

            $verdict = mysqli_query($connection, $sql1);

            if($verdict == true)
            {
              
            }
            else
            {
               // print(mysqli_error($connection));
            }
        }

        #create courses table and insert courses
        public static function createCourseTable()
        {
            $host = '127.0.0.1';
            $database = 'procom_db';
            $user = 'root';
            $password ='';

            $connection = mysqli_connect($host, $user, $password, $database);

            $sql = "CREATE TABLE courses ( 
                 courseCode VARCHAR(20) NOT NULL,
                 courseName VARCHAR(70) NOT NULL, 
                 PRIMARY KEY(courseCode) 
            )";

            $result = mysqli_query($connection, $sql);

            if($result == true)
            {
                
            }
            else
            {
               // print(mysqli_error($connection));
            }

            #insert courses into table

            $sql1 = "INSERT INTO courses VALUES   
                    ('COMP2210', 'Mathematics for Computer Science II'),
                    ('COMP2220', 'Computer System Architecture'),
                    ('COMP2225', 'Software Engineering'),
                    ('COMP2232', 'Object-Oriented Programming Concepts'),
                    ('COMP2235', 'Networks I'),
                    ('COMP2611',  'Data Structures'),
                    ('COMP2245', 'Web Development Concepts Tools and Practices'),
                    ('COMP2410', 'Computing in the Digital Age'),
                    ('COMP2415', 'Information Technology Engineering')
                 ";

               $response = mysqli_query($connection, $sql1);


             //close connection
             mysqli_close($connection);
        }

        #create student table
        public function createStudent()
        {
            require_once('./config.php');

            $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

            if(mysqli_connect_errno())
            {
                //print('Error connection from within database');
            }
            else
            {
                $sql = "CREATE TABLE students ( 
                    id INT NOT NULL UNIQUE,
                    firstname VARCHAR (30) NOT NULL,
                    lastname VARCHAR (30) NOT NULL,
                    email VARCHAR(50) NOT NULL UNIQUE,
                    address VARCHAR(50) NOT NULL,
                    year VARCHAR(4) NOT NULL,

                    PRIMARY KEY(id)
                    
                    )";

                $result = mysqli_query($connection, $sql);

                 #add students to database

                 $sql1 = "INSERT INTO students (id, firstname, lastname, email, address, year) VALUES
                    ('416000000','Wayne','Rooney','wazza@hotmail.com','Manchester','2016'),
                    ('416000001','Cristiano','Ronaldo','cr7@gmail.com','Manchester','2016'),
                    ('416000002','Ryan','Giggs','r.giggs@hotmail.com','Manchester','2016'),
                    ('416000003','Paul','Scholes','p.scholes@hotmail.com','Manchester','2016'),
                    ('417000000','Frank','Lampard','f.lampard@hotmail.com','London','2017'),
                    ('417000001','John','Terry','j.terry@gmail.com','London','2017'),
                    ('417000002','Eden','Hazard','goldenboy@hotmail.com','London','2017'),
                    ('418000000','Steven','Gerrard','s.gerrard@gmail.com','Liverpool','2018'),
                    ('418000001','Dirk','Kuyt','d.kuyt@hotmail.com','Liverpool','2018'),
                    ('418000002','Fernando','Torres','f.torres@gmail.com','Liverpool','2018'),
                    ('418000003','Xabi','Alonso','xabie_alonso@gmail.com','Liverpool','2018')
                  ";
                  $status = mysqli_query($connection, $sql1);

            }

            mysqli_close($connection);
        }

  
   }//DATABASE

  
   $test = new Database();
   $test -> createDatabase();
   $test ->getDbConnection();
   $test -> createUserTable();
   $test -> createCourseTable();
   $test -> createStudent();

?>