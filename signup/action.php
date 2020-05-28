<?php
/**
 *
 */
 require_once('signup.php');
class Action
{

  function __construct()
  {
    // code...
    switch ($_POST['submit']) {
      case 'insert':
        // code...
        $objSignup = new Signup();
        $objSignup->setFname($_POST['fname']);
        $objSignup->setLname($_POST['lname']);
        $objSignup->setEmail($_POST['email']);
        $objSignup->setMobile($_POST['mobile']);
        $objSignup->setHobby($_POST['hobby']);
        $objSignup->setDob($_POST['dob']);
        $objSignup->setGender($_POST['gender']);
        if ($objSignup->insert()) {
          // code...
          header('location:home.php?insert=1');
        }else {
          // code...
          header('location:index.php?insert=0');
        }
        break;

      default:
        header('location:index.php');
        break;
    }
  }
}

if (isset($_POST['submit'])) {
  // code...
  $objAct = new Action;
}else {
    header('location:index.php');
}
 ?>
