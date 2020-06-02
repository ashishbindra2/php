<?php
class Users extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('User');
  }
   public function  ajaxState()
    {
        $cid =  $_POST["country_id"];
        $sid =  $_POST["state_id"];

        $state = $this->userModel->state($cid);
        $coun = $this->userModel->city($sid);
        $data = [
            // 'country' => $coun,
            'state' => $state,
            'city' => $coun
        ];

        $this->view('users/ajaxState', $data);
    }
  //reset password
  public function resetPassword()
  {
    $id = getId();
    $email = $_GET['email'];
    $journalsId = $this->userModel->getJournalsById($id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'id' => $id,
        'journalId' => $journalsId,
        'password' => trim($_POST['member_password']),
        'email' => $email,
        'email_err' => ''
      ];
      if ($this->userModel->resetPass($data)) {
        redirect('users/signIn');
      } else {
        echo ('Some error');
        $this->view('users/resetPassword', $data);
      }
    } else {
      $data = [
        'id' => $id,
        'journalId' => $journalsId,
      ];
      $this->view('users/resetPassword', $data);
    }
  }
  //froget password
  public function frogetPass()
  {
    $id = getId();
    $journalsId = $this->userModel->getJournalsById($id);
    require 'vendor/PHP_Email/PHPMailer-master/PHPMailerAutoload.php';
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'id' => $id,
        'journalId' => $journalsId,
        'email' => trim($_POST['email']),
        'email_err' => ''
      ];
      // Check for user/email
      if ($this->userModel->findUserByEmail($data['email'])) {
        // User found

        define("PROJECT_HOME", "http://localhost/phpsamples/");

        define("PORT", "465"); // port number
        define("MAIL_USERNAME", "testdatabindra@gmail.com"); // smtp usernmae
        define("MAIL_PASSWORD", "Test@123"); // smtp password
        define("MAIL_HOST", "smtp.gmail.com"); // smtp host
        define("MAILER", "smtp");
        define("SENDER_NAME", "Vishal");
        define("SERDER_EMAIL", "ashishbindra2@gmail.com");

        $emailBody = "<p>Click this link to recover your password <br> <a href='" . URLROOT . "users/resetPassword&id=" . $id . "&email=" . $data['email'] . "'>reset_password.php </a> </p>Regards,<br>" . SENDER_NAME;
        $mailto = $data['email'];
        $mailSub = "recovery password";

        $mail = new PHPMailer();
        $mail->IsSmtp();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465; //465; // or 587
        $mail->IsHTML(true);
        $mail->Username = 'testdatabindra@gmail.com';
        $mail->Password = 'Test@123';
        $mail->SetFrom('testdatabindra@gmail.com');
        $mail->Subject = $mailSub;
        $mail->Body = $emailBody;
        $mail->AddAddress($mailto);

        if (!$mail->Send()) {
          echo "<script>alert('Mail Not Sent');</script>";
        } else {
          echo "<script>alert('Check your gmail');</script>";
        }


        $this->view('users/frogetPass', $data);
      } else {
        // User not found
        $data['email_err'] = 'Wrong email this email is not register';

        $this->view('users/frogetPass', $data);
      }
    } else {

      $data = [
        'id' => $id,
        'journalId' => $journalsId,
        'email_err' => ''
      ];
      $this->view('users/frogetPass', $data);
    }
  }
  public function signIn()
  {
    $id = getId();
    $journalsId = $this->userModel->getJournalsById($id);
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'journalId' => $journalsId,
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',
      ];

      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Pleae enter email';
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
      }

      // Check for user/email
      if ($this->userModel->findUserByEmail($data['email'])) {
        // User found
      } else {
        // User not found
        $data['email_err'] = 'No user found';
      }
      if (isset($_POST['remember'])) {
        # code...
        setcookie('email', $data['email'], time() + 90 * 90 * 7);
        setcookie('password', $data['password'], time() + 90 * 90 * 7);
      }

      // Make sure errors are empty
      if (empty($data['email_err']) && empty($data['password_err'])) {
        // Validated
        // Check and set logged in user
        $loggedInUser = $this->userModel->login($data['email'], $data['password']);

        if ($loggedInUser) {
          // Create Session
          $this->createUserSession($loggedInUser);
        } else {
          $data['password_err'] = 'Password incorrect';

          $this->view('users/signIn', $data);
        }
      } else {
        // Load view with errors
        $this->view('users/signIn', $data);
      }
    } else {
      // Init data
      $data = [
        'journalId' => $journalsId,
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
      ];

      // Load view
      $this->view('users/signIn', $data);
    }
  }


  public function register()
  {
     $country =  $this->userModel->country();
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'name' => trim($_POST['name']),
        'mname' => trim($_POST['mname']),
        'lname' => trim($_POST['lname']),
        'email' => trim($_POST['email']),
        'title' => trim($_POST['title']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'city' => trim($_POST['city']),
        'state' => trim($_POST['state']),
        'country' => trim($_POST['country']),
        'gender' => trim($_POST['gender']),
        'designation' => trim($_POST['designation']),
        'phone' => trim($_POST['phone']),
        'institute' => trim($_POST['institute']),

        'name_err' => '',
        'mname_err' => '',
        'lname_err' => '',
        'email_err' => '',
        'title_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
        'city_err' => '',
        'state_err' => '',
        'country_err' => '',
        'gender_err' => '',
        'designation_err' => '',
        'phone_err' => '',
        'institute_err' => ''
      ];

      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Pleae enter email';
      } else {
        // Check email
        if ($this->userModel->findUserByEmail($data['email'])) {
          $data['email_err'] = 'Email is already taken';
        }
      }

      // Validate Name
      if (empty($data['name'])) {
        $data['name_err'] = 'Pleae enter name';
      }
      // Validate Last Name
      if (empty($data['lname'])) {
        $data['lname_err'] = 'Pleae enter last name';
      }
      // Validate Title
      if (empty($data['title'])) {
        $data['title_err'] = 'Pleae enter title';
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Pleae enter password';
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] = 'Password must be at least 6 characters';
      }

      // Validate Confirm Password
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = 'Pleae confirm password';
      } else {
        if ($data['password'] != $data['confirm_password']) {
          $data['confirm_password_err'] = 'Passwords do not match';
        }
      }
      // Validate City
      if (empty($data['city'])) {
        $data['city_err'] = 'Pleae enter city name';
      }
      // Validate State Name
      if (empty($data['state'])) {
        $data['state_err'] = 'Pleae enter state name';
      }
      // Validate country
      if (empty($data['country'])) {
        $data['country_err'] = 'Pleae enter country';
      }
      // Validate Gender
      if (empty($data['gender'])) {
        $data['gender_err'] = 'Pleae enter gender';
      }
      // Validate Desgnation
      if (empty($data['designation'])) {
        $data['designation_err'] = 'Pleae enter designation';
      }
      // Validate Phone
      if (empty($data['phone'])) {
        $data['phone_err'] = 'Pleae enter phone';
      } elseif (strlen($data['phone']) < 9) {
        $data['phone_err'] = 'Phone number mustbe at least 10 characters';
      }
      // Validate Name
      if (empty($data['institute'])) {
        $data['institute_err'] = 'Pleae enter institue';
      }

      // Make sure errors are empty
      if (
        empty($data['email_err']) && empty($data['name_err']) &&
        empty($data['password_err']) && empty($data['confirm_password_err']) &&
        empty($data['lnmae_err']) && empty($data['title_err']) &&
        empty($data['city_err']) && empty($data['state_err']) &&
        empty($data['country_err']) && empty($data['gender_err']) &&
        empty($data['designation_err']) && empty($data['phone_err']) && empty($data['institute_err'])
      ) {
        // Validated

        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Register User
       $lastId= $this->userModel->register($data);
        if (!empty($lastId)) {
          // $lastId = $this->userModel->lastInsertId();
          $token = sha1($lastId);
          $url = APPROOT . '/views/users/register&id='.$lastId.'&token='.$token;
          $html = '<div>Thanks for registering with localhost. Please click this link to complete your registration:<br>'.$url.'</div>';
           $dat = [
        'email' => $data['email'],
        'sub' => 'Confirm your email',
        'body' => $html
      ];if(vmail($dat))
          flash('register_success', 'You are registered and can log in');
          else
            flash('register_success', 'mail not send');
          redirect('users/signIn&id=' . $id);
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('users/register', $data);
      }
    } else {
      // Init data
      $data = [
        'name' => '',
        'mname' => '',
        'lname' => '',
        'email' => '',
        'title' => '',
        'password' => '',
        'confirm_password' => '',
        'city' => '',
        'state' => '',
        'country' => $country,
        'gender' => '',
        'designation' => '',
        'phone' => '',
        'institute' => '',

        'name_err' => '',
        'mname_err' => '',
        'lname_err' => '',
        'email_err' => '',
        'title_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
        'city_err' => '',
        'state_err' => '',
        'country_err' => '',
        'gender_err' => '',
        'designation_err' => '',
        'phone_err' => '',
        'institute_err' => ''
      ];

      // Load view
      $this->view('users/register', $data);
    }
  }


  public function createUserSession($user)
  {
    $id = getId();
    $_SESSION['user_id'] = $user->AUTH_ID;
    $_SESSION['user_email'] = $user->EMAIL;
    $_SESSION['user_name'] = $user->FNAME;
    redirect('posts&id=' . $id);
  }

  public function logout()
  {
    $id = getId();
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    session_destroy();
    redirect('users/signIn&id=' . $id);
  }
}
