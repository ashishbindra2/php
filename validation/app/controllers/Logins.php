<?php
class Logins extends Controller
{
    public function __construct()
    {
        $this->loginModel = $this->model('Login');
    }
    // adminLogin
    public function adminLogin()
    {
        $id = getId();
        $journalsId = $this->loginModel->getJournalsById($id);
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
            if ($this->loginModel->findUserByEmail($data['email'])) {
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
                $loggedInUser = $this->loginModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    // Create Session
                    $this->createAdminSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('logins/adminLogin', $data);
                }
            } else {
                // Load view with errors
                $this->view('logins/adminLogin', $data);
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
            $this->view('logins/adminLogin', $data);
        }
        $this->view('logins/adminLogin', $data);
    }
    //register
    public function register()
    {
        $id = getId();
        $journalsId = $this->loginModel->getJournalsById($id);
        $allStream = $this->loginModel->stream();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'journalId' => $journalsId,
                'title' => 'test Us',
                'stream' => $allStream,
                'name' => rim($_POST['name']),
                'email' => rim($_POST['email']),
                'password' => rim($_POST['pwd1']),
                'mobile' => rim($_POST['mobile']),
                'web' => rim($_POST['weblink']),
                'role' => trim($_POST['role']),
                'status' => rim($_POST['status']),
                'college' => rim($_POST['college_name']),
                'detail' => rim($_POST['Detail']),
                'sid' => trim($_POST['sid']),

                'stream_err' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'mobile_err' => '',
                'role_err' => '',
                'web_err' => '',
                'status_err' => '',
                'college_err' => '',
                'detail_err' => ''
            ];
            if (empty($data["sid"])) {
                $data["sid_err"] = "Stream name is required";
            }
            if (empty($data["name"])) {
                $data["name_err"] = "Name is required";
            }
            if (empty($data["email"])) {
                $data["email_err"] = "email is required";
            }
            if (empty($data["password"])) {
                $data["password_err"] = "password is required";
            }
            if (empty($data["mobile"])) {
                $data["mobile_err"] = "mobile no is required";
            }
            if (empty($data["role"])) {
                $data["role_err"] = "Role is required";
            }
            if (empty($data["status"])) {
                $data["status_err"] = "Status is required";
            }
            if (empty($data["college"])) {
                $data["college_err"] = "college_name is required";
            }
            if (empty($data["detail"])) {
                $data["detail_err"] = "Details is required";
            }
            // Make sure errors are empty
            if (
                empty($data['email_err']) && empty($data['name_err']) &&
                empty($data['password_err']) && empty($data['sid_err']) &&
                empty($data['role_err']) && empty($data['status_err'])
                && empty($data['mobile_err']) && empty($data['college_err'])
            ) {
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->loginModel->register($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('logins/adminLogin');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('logins/register', $data);
            }
        } else {
            $data = [
                'journalId' => $journalsId,
                'title' => 'test Us',
                'stream' => $allStream,
                'name' => '',
                'email' => '',
                'password' => '',
                'mobile' => '',
                'web' => '',
                'role' => '',
                'status' => '',
                'college' => '',
                'detail' => '',
                'sid' => '',

                'stream_err' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'mobile_err' => '',
                'role_err' => '',
                'web_err' => '',
                'status_err' => '',
                'college_err' => '',
                'detail_err' => ''
            ];
            $this->view('logins/register', $data);
        }
    }
    public function index()
    {
        $id = getId();
        $journalsId = $this->loginModel->getJournalsById($id);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
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


            if (isset($_POST['reviwer']) == 'submit') {
                // Check for user/email
                if ($this->loginModel->findReviwerByEmail($data['email'])) {
                    // User found
                } else {
                    // User not found
                    $data['email_err'] = 'No user found';
                }
                // Make sure errors are empty
                if (empty($data['email_err']) && empty($data['password_err'])) {
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->loginModel->loginReviwer($data['email'], $data['password']);

                    if ($loggedInUser) {
                        // Create Session
                        $this->createReviwerSession($loggedInUser);
                    } else {
                        $data['password_err'] = 'Password incorrect';
                        // Load view with errors
                        $this->view('logins/index', $data);
                    }
                } else {
                    // Load view with errors
                    $this->view('logins/index', $data);
                }
            } elseif (isset($_POST['associate'])) {
                if ($this->loginModel->findAssociateByEmail($data['email'])) {
                    // User found
                } else {
                    // User not found
                    $data['email_err'] = 'No user found';
                }
                // Make sure errors are empty
                if (empty($data['email_err']) && empty($data['password_err'])) {
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->loginModel->loginAssociate($data['email'], $data['password']);

                    if ($loggedInUser) {
                        // Create Session
                        $this->createAssociateSession($loggedInUser);
                    } else {
                        $data['password_err'] = 'Password incorrect';

                        $this->view('logins', $data);
                    }
                }
            } else {
                // Load view with errors
                $this->view('logins/index', $data);
            }
            $this->view('logins/index', $data);
        } else {
            // Init data
            $data = [
                'journalId' => $journalsId,
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            $this->view('logins/index', $data);
        }
        $this->view('logins/index', $data);
    }

    public function createAdminSession($user)
    {
        $id = getId();
        $_SESSION['user_id'] = $user->EIC_ID;
        $_SESSION['user_email'] = $user->EMAIL;
        $_SESSION['user_name'] = $user->NAME;
        redirect('editors');
    }
    public function createReviwerSession($user)
    {
        $id = getId();
        $_SESSION['user_id'] = $user->REVIEWER_ID;
        $_SESSION['user_email'] = $user->EMAIL;
        $_SESSION['user_name'] = $user->FNAME;
        redirect('reviwers');
    }

    public function createAssociateSession($user)
    {
        $id = getId();
        $_SESSION['user_id'] = $user->EIC_ID;
        $_SESSION['user_email'] = $user->EMAIL;
        $_SESSION['user_name'] = $user->NAME;
        redirect('associates');
    }


    public function logout()
    {
        $id = getId();
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('pages/index');
    }
}
