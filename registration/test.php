<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('db.php');
include('function.php');
// print_r (findByEmail("ashish@gmail.com","46"));
 if(!empty(findByEmail("ashishb@gmail.com","ashishb@gmail.com")))
     echo  "email is already Exisit";
  else
  	echo "ss";