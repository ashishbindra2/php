<?php require APPROOT . '/views/inc/header.php';
// require '../../../vendor/PHP_Email/PHPMailer-master/PHPMailerAutoload.php';
?>

<link rel="stylesheet" href="<?php echo STYLE . '/login.css'; ?>">
<div id="main">
    <div class="container">

        <div class="container-fluid mt-1 mb-2">
            <div class="row">
                <div class="col-lg-10 col-md-6 form-container">
                    <div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box">
                        <!-- <div class="logo mt-5 mb-3 text-center">
                            <img src="image/logo.png" width="150px">
                        </div> --><?php if ($data['email_err']) : ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                <?php echo $data['email_err']; ?>
                            </div>
                        <?php endif; ?>
                        <div class="reset-form d-block">
                            <form class="reset-password-form" method="post">
                                <h4 class="mb-3">Reset Your Password</h4>
                                <p class="mb-3 text-green">
                                    Please enter your email address and we will send you a password reset link
                                </p>
                                <div class="form-input">
                                    <span><i class="fa fa-envelope"></i></span>
                                    <input type="email" name="email" placeholder="Email Address" required>
                                    <input type="submit" name="submit" class="btn" value="Send Reset link">
                                </div>
                            </form>
                        </div>
                        <!-- <div class="reset-confirmation d-none">
                            <div class="mb-4">
                                <h4 class="mb-3">Link was sent</h4>
                                <h6 class="text-white">Please, check your inbox</h6>
                            </div>
                            <div>
                                <a href="login.html">
                                    <button type="submit" class="btn">Login Now</button>
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>
            </div>
        </div>

        <!-- <script type="text/javascript">
            function PasswordReset() {
                $('form.reset-password-form').on('submit', function(e) {
                    e.preventDefault();
                    $('.reset-form')
                        .removeClass('d-block')
                        .addClass('d-none');
                    $('.reset-confirmation').addClass('d-block');
                });
            }

            window.addEventListener('load', function() {
                PasswordReset();
            });
        </script>-->
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>