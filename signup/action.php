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
          header('location:index.php?insert=1');
        }else {
          // code...
          header('location:index.php?insert=0');
        }
        break;

        case 'update':
          // code...
          $objSignup = new Signup();
          $objSignup->setId($_POST['bid']);
          $objSignup->setFname($_POST['fname']);
          $objSignup->setLname($_POST['lname']);
          $objSignup->setEmail($_POST['email']);
          $objSignup->setMobile($_POST['mobile']);
          $objSignup->setHobby($_POST['hobby']);
          $objSignup->setDob($_POST['dob']);
          $objSignup->setGender($_POST['gender']);
          if ($objSignup->update()) {
            // code...
            header('location:index.php?update=1');
          }else {
            // code...
            header('location:index.php?update=0');
          }
          break;
          case 'delete':
            // code...
            $objSignup = new Signup();
            $objSignup->setId($_POST['bid']);
          
            if ($objSignup->delete()) {
              // code...
              header('location:index.php?delete=1');
            }else {
              // code...
              header('location:index.php?delete=0');
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
