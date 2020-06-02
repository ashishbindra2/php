<?php
class Posts extends Controller
{
  public function __construct()
  {
    if (!isLoggedIn()) {
      redirect('users/signIn');
    }

    $this->postModel = $this->model('Post');
    $this->userModel = $this->model('User');
  }
  //addCoauther
  public function addCoAuthor()
  {
    $id = getId();
    $aid = $_SESSION['user_id'];
    $journal = $this->postModel->getPages();
    $journalsId = $this->userModel->getJournalsById($id);
    $Id = $this->postModel->getStream();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'aid' => $aid,
        'journalId' => $journalsId,
        'name'  => $_POST['Name'],
        'email' => $_POST['Email'],
        'number' => $_POST['Number'],
        'city'  => $_POST['City'],
        'state' => $_POST['State'],
        'gender' => $_POST['Gender'],
        'colorCheckbox' => $_POST['colorCheckbox']
      ];
      $fname1 = trim($_POST['fname1']);
      $fname2 = trim($_POST['fname2']);
      $fname3 = trim($_POST['fname3']);
      $lname1 = trim($_POST['lname1']);
      $lname2 = trim($_POST['lname2']);
      $lname3 = trim($_POST['lname3']);
      $email1 = trim($_POST['email1']);
      $email2 = trim($_POST['email2']);
      $email3 = trim($_POST['email3']);
      $institude1 = trim($_POST['institude1']);
      $institude2 = trim($_POST['institude2']);
      $institude3 = trim($_POST['institude3']);
      if (isset($data['colorCheckbox'])) {
        # code...
        if (empty($_POST['fname1'])) {
          # code...
          echo "<script>alert('error in first row');</script>";
        } else {
          $r1 = $this->postModel->suggestion($fname1, $lname1, $email1, $institude1, $aid);
          echo "<script> alert('sumbit');</script>";
        }
        if (empty($_POST['fname2'])) {
          # code...
          echo "<script>alert('error in 2nd');</script>";
        } else {
          $r2 = $this->postModel->suggestion($fname2, $lname2, $email2, $institude2, $aid);
          echo "<script> alert('sumbit');</script>";
        }
        if (empty($_POST['fname3'])) {
          # code...
          echo "<script>alert('error in 3 row');</script>";
        } else {
          $r3 = $this->postModel->suggestion($fname3, $lname3, $email3, $institude3, $aid);
          echo "<script> alert('sumbit');</script>";
        }
      }
      $name = $data['name'];
      $email = $data['email'];
      $number = $data['number'];
      $city = $data['city'];
      $state = $data['state'];
      $gender = $data['gender'];
      foreach ($data['name'] as $key => $value) {
        if ($this->postModel->addCoAuhtor($aid, $value, $email[$key], $number[$key], $city[$key], $state[$key], $gender[$key])) {

          flash('register_success', 'You are registered and can log in');
          redirect('posts/&id=' . $id);
        } else {
          die('Something went wrong');
        }
      }

      $this->view('posts/addCoAuthor', $data);
    } else {
      $data = [
        'aid' => $aid,
        'journalId' => $journalsId,
        'fname1' => '',
        'fname2' => '',
        'fname3' => '',
        'lname1' => '',
        'lname2' => '',
        'lname3' => '',
        'email1' => '',
        'email2' => '',
        'email3' => '',
        'institude1' => '',
        'institude2' => '',
        'institude3' => '',
        'name' => '',
        'email' => '',
        'number' => '',
        'city' => '',
        'state' => '',
        'gender' => ''
      ];
      $this->view('posts/addCoAuthor', $data);
    }
  }
  //papperReports
  public function papperReports()
  {
    $id = getId();
    $journalsId = $this->userModel->getJournalsById($id);
    $journal = $this->postModel->stream($id);
    $aid = $_SESSION['user_id'];
    $posts = $this->postModel->getDetail($aid);
    $dateOfS = $this->postModel->authorUpload($aid);
    $ass = $this->postModel->assignment($aid);
    $nameR = $this->postModel->reviwerName($aid);
    $detail = $this->postModel->reviwerDetail();
    $editor = $this->postModel->resultEditor();
    $data = [
      'aid' => $aid,
      'post' => $posts,
      'journal' => $journal,
      'journalId' => $journalsId,
      'date' => $dateOfS,
      'reviwer' => $nameR,
      'editor' => $editor,
      'ass' => $ass,
      'detail' => $detail
    ];
    $this->view('posts/papperReports', $data);
  }
  //changePassword.php
  public function changePassword()
  {
    $id = getId();
    $journalsId = $this->userModel->getJournalsById($id);
    $journal = $this->postModel->stream($id);
    $aid = $_SESSION['user_id'];
    $posts = $this->postModel->getDetail($aid);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'aid' => $aid,
        'post' => $posts,
        'journal' => $journal,
        'journalId' => $journalsId,
        // 'password' => trim($_POST['password']),
        'new_password' => trim($_POST['newPassword']),
        'confirm_password' => trim($_POST['password2']),
        // 'password_err' => '',
        'new_password_err' => '',
        'confirm_password_err' => ''
      ];

      // Validate Password
      if (empty($data['new_password'])) {
        $data['new_password_err'] = 'Pleae enter password';
      } elseif (strlen($data['new_password']) < 6) {
        $data['new_password_err'] = 'Password must be at least 6 characters';
      }

      // Validate Confirm Password
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = 'Pleae confirm password';
      } else {
        if ($data['new_password'] != $data['confirm_password']) {
          $data['confirm_password_err'] = 'Passwords do not match';
        }
      }


      if (empty($data['new_password_err']) && empty($data['confirm_password_err'])) {
        // Validated
        // Register Use+r
        // Hash Password
        $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);

        if ($this->postModel->updatePassword($data)) {
          flash('register_success', 'You are registered and can log in');
          redirect('posts/&id=' . $id);
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('posts/changePassword', $data);
      }
    } else {
      $data = [
        'aid' => $aid,
        'post' => $posts,
        'journal' => $journal,
        'journalId' => $journalsId,
        // 'password' => '',
        'new_password' => '',
        'confirm_password' => '',
        'password_err' => $posts->PASSWORD,
        'new_password_err' => '',
        'confirm_password_err' => ''
      ];
      $this->view('posts/changePassword', $data);
    }
    $this->view('posts/changePassword', $data);
  }
  //
  public function editProfile()
  {
    $id = getId();
    $journalsId = $this->userModel->getJournalsById($id);
    $journal = $this->postModel->stream($id);
    $aid = $_SESSION['user_id'];
    $posts = $this->postModel->getDetail($aid);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'aid' => $aid,
        'post' => $posts,
        'journal' => $journal,
        'journalId' => $journalsId,
        'fname' => trim($_POST['fname']),
        'lname' => trim($_POST['lname']),
        'email' => trim($_POST['email']),
        'title' => trim($_POST['title']),
        'city' => trim($_POST['city']),
        'state' => trim($_POST['state']),
        'country' => trim($_POST['country']),
        'gender' => trim($_POST['gender']),
        'designation' => trim($_POST['designation']),
        'phone' => trim($_POST['phone']),
        'institute' => trim($_POST['institute']),

        'fname_err' => '',
        'lname_err' => '',
        'email_err' => '',
        'title_err' => '',
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
      }

      // Validate Name
      if (empty($data['fname'])) {
        $data['fname_err'] = 'Pleae enter name';
      }
      // Validate Last Name
      if (empty($data['lname'])) {
        $data['lname_err'] = 'Pleae enter last name';
      }
      // Validate Title
      if (empty($data['title'])) {
        $data['title_err'] = 'Pleae enter title';
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
      } elseif (strlen($data['phone']) < 6) {
        $data['phone_err'] = 'Phone number mustbe at least 10 characters';
      }
      // Validate Name
      if (empty($data['institute'])) {
        $data['institute_err'] = 'Pleae enter institue';
      }

      // Make sure errors are empty
      if (
        empty($data['email_err']) && empty($data['lname_err']) &&
        empty($data['lnmae_err']) && empty($data['title_err']) &&
        empty($data['city_err']) && empty($data['state_err']) &&
        empty($data['country_err']) && empty($data['gender_err']) &&
        empty($data['designation_err']) && empty($data['phone_err']) && empty($data['institute_err'])
      ) {
        // Validated
        // Register Use+r
        if ($this->postModel->updateAuthor($data)) {
          flash('register_success', 'You are registered and can log in');
          redirect('posts/editProfile&id=' . $id);
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('posts/editProfile', $data);
      }
    } else {
      // Init data
      $data = [
        'post' => $posts,
        'journal' => $journal,
        'journalId' => $journalsId,
        'fname' => $posts->FNAME,
        'lname' => $posts->LNAME,
        'email' => $posts->EMAIL,
        'title' => $posts->A_TITLE,
        'city' => $posts->CITY,
        'state' => $posts->STATE,
        'country' => $posts->COUNTRY,
        'gender' => $posts->GENDER,
        'designation' => $posts->DESIGNATION,
        'phone' => $posts->MOBILE,
        'institute' => $posts->INSTITUTE_NAME,

        'name_err' => '',
        'lname_err' => '',
        'email_err' => '',
        'title_err' => '',
        'city_err' => '',
        'state_err' => '',
        'country_err' => '',
        'gender_err' => '',
        'designation_err' => '',
        'phone_err' => '',
        'institute_err' => ''
      ];

      // Load view
      $this->view('posts/editProfile', $data);
    }
  }
  //
  public function journalDynamic()
  {
    $id = getId();
    // $type = $_POST['type'];

    $journal = $this->postModel->stream($id);
    $data = [
      'journal' => $journal,
      'id' => $id

    ];
    $this->view('posts/journalDynamic', $data);
  }
  //
  public function userUpload()
  {
    $id = getId();
    $journal = $this->postModel->getPages();
    $journalsId = $this->userModel->getJournalsById($id);
    $Id = $this->postModel->getStream();
    // Get posts
    // $posts = $this->postModel->getPosts();
    $aid = $_SESSION['user_id'];
    $posts = $this->postModel->getDetail($aid);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'aid' => $aid,
        'sid' => $Id,
        'error' => '',
        'journalId' => $journalsId,
        'journalName' => $journal,
        'posts' => $posts,
        'stram' => trim($_POST['Sid']),
        // 'author' => trim($_POST['Author_name']),
        'jid' => trim($_POST['jjid']),
        'keyword' => trim($_POST['keyword']),
        'description' => trim($_POST['Description']),
        'title' => trim($_POST['paper_title']),
        'file' => $_FILES['fileToUpload'],
        'journal_err' => '',
        'stram_err' => '',
        'author_err' => '',
        'keyword_err' => '',
        'issue_err' => '',
        'title_err' => '',
        'file_err' => ''
      ];
      if (empty($data['jid'])) {
        $data['journal_err'] = 'Please select a journals.';
      }
      if (empty($data['stram'])) {
        $data['stram_err'] = 'Please select a stram.';
      }
      if (empty($data['title'])) {
        $data['title_err'] = 'please enter the title';
      }
      if (empty($data['keyword'])) {
        $data['keyword_err'] = 'please enter the keywords';
      }
      if (empty($data['description'])) {
        $data['issue_err'] = 'please enter the issue';
      }
      if (empty($data['file'])) {
        $data['file_err'] = 'please upload the file';
      }
      if (isset($_FILES['fileToUpload'])) {
        $errors = array();
        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];

        $name = $posts->FNAME;
        // Check For Submit
        $target_dir =  "uploads/" . $name . $aid . "/";
        if (!file_exists($target_dir)) {
          $target_dir = mkdir("uploads/" . $name  . $aid . "/");
        }

        $bname = basename($file_name);
        $target_file = $target_dir . $bname;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = 1;
        $check = filesize($file_tmp);
        // if ($check !== false) {
        //   echo "<script>alert('Plz try again some error Occur'); </script>";
        //   $uploadOk = 1;
        // } else {
        //   $uploadOk = 0;
        // }

        // Check if file already exists
        if (file_exists($target_file)) {
          $data['file_err']  = 'Alreday Exsist Plz rename the file';
          $uploadOk = 0;
        }
        // Check file size
        if ($file_size > 6291456) {
          $data['file_err']  = 'File should be under 5 mb';
          $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "pdf" && $imageFileType != "docx"  && $imageFileType != "txt" && $imageFileType != "doc") {
          $data['file_err']  = 'File shold in PDF,TXT or DOCX format';
          $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error

        if ($uploadOk == 1) {
          move_uploaded_file($file_tmp, "uploads/" . $name  . $aid . "/" . $file_name);
          $pathlk = filesize($_FILES["fileToUpload"]["tmp_name"]);
          $data['file'] =  $target_file;
          // Sanitize POST array
          //Check Required Field
          if (
            empty($data['issue_err'])  && empty($data['stram_err'])
            && empty($data['keyword_err'])  && empty($data['title_err'])
            && empty($data['journal_err']) && empty($data['file_err'])
          ) {
            //Passed
            if ($this->postModel->authorPaper($data)) {
              flash('post_message', 'Post Added');
              redirect('posts/addCoAuthor&id=' . $id);
            } else {
              die('Something went wrong');
            }
          } else {
            $this->view('posts/userUpload', $data);
          }
        }

        // echo "<script>alert('Done', 'Your File " . basename($_FILES["fileToUpload"]["name"]) . "Uploded Sucessfully', 'success'); </script>";
      }
      $this->view('posts/userUpload', $data);
    } else {
      $data = [
        'sid' => $Id,
        'journalId' => $journalsId,
        'journalName' => $journal,
        'posts' => $posts,
        'stram' => '',
        'author' => '',
        'jid' => '',
        'keyword' => '',
        'description' => '',
        'title' => '',
        'journal_err' => '',
        'stram_err' => '',
        'author_err' => '',
        'keyword_err' => '',
        'issue_err' => '',
        'file_err' => '',
        'title_err' => '',
      ];
      $this->view('posts/userUpload', $data);
    }
  }

  public function paperStatus()
  {
    $id = getId();
    $journalsId = $this->userModel->getJournalsById($id);
    $journal = $this->postModel->stream($id);
    $aid = $_SESSION['user_id'];
    $posts = $this->postModel->getDetail($aid);
    $dateOfS = $this->postModel->authorUpload($aid);
    $ass = $this->postModel->assined($aid);
    $associate = $this->postModel->associateAct($aid);
    $nameR = $this->postModel->reviwerName($aid);
    $detail = $this->postModel->reviwerDetail();
    $editor = $this->postModel->resultEditor();
    $data = [
      'aid' => $aid,
      'post' => $posts,
      'journal' => $journal,
      'journalId' => $journalsId,
      'date' => $dateOfS,
      'reviwer' => $nameR,
      'editor' => $editor,
      'ass' => $ass,
      'detail' => $detail,
      'associate' => $associate
    ];
    $this->view('posts/paperStatus', $data);
  }
  public function index()
  {
    $id = getId();
    $journalsId = $this->userModel->getJournalsById($id);
    // Get posts
    // $posts = $this->postModel->getPosts();
    $aid = $_SESSION['user_id'];
    $posts = $this->postModel->getDetail($aid);
    $data = [
      'journalId' => $journalsId,
      'posts' => $posts
    ];

    $this->view('posts/index', $data);
  }
}
