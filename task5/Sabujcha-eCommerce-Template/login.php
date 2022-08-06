<?php 
$title = "login";
use App\Http\Requestes\validation;
use App\Database\Models\User;
include_once ("layouts/head.php");
include_once ("layouts/nav.php");
include_once ("layouts/breadcrumb.php");
$validate = new validation;
if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)){
    //validation 
    $validate->setKey('email')->setValue($_POST['email'] ?? null)->require()->regular_expretion("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/");
    $validate->setKey("password")->setValue($_POST["password"] ?? null)->require()->regular_expretion("/^(?=.*\d).{4,10}$/" , "Password or email wrong <a class='text-primary font-weight-bold' href='register.php'> Create Account Here</a>");
    if(empty ($validate->getErrors())){
        $user = new user;
        $user->setEmail($_POST['email']);
        $output =$user->email_id();
        if($output->num_rows == 1){
            // store data of user
            $data_user = $output->fetch_object();
            //check pass
            //password_verify( $_POST['password'] , $data_user->password
            if( password_verify( $_POST['password'] , $data_user->password)){
                //check email verify or not
                if(! is_null($data_user->email_verified_at)){
                    // store data of user
                    $_SESSION['user'] = $data_user;
                    if(isset($_POST['remember'])){
                        setcookie('information',$_POST['email'],time() + (86400*365) ,'/');
                    }else{
                    header("location:index.php");
                    }
                }
                else{
                    // store email
                    $_SESSION['verification_email'] = $_POST['email'];
                    header('location:verification-code.php?page=login');
                    die;
                }
            }
            else{
                $error = "email or password wrong  <a class='text-primary font-size-3 font-weight-bold' href='register.php'> Create Account Here</a>";
            }
        }
        else{
            $error = "email or password wrong  <a class='text-primary font-size-3 font-weight-bold' href='register.php'> Create Account Here</a>";
        }
    }
}
?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?= $error ?? "" ?>
                                    <?= $success_login ?? "" ?>
                                    <form method="post">
                                        <input type="email" name="email" placeholder="Email">
                                        <input type="password" name="password" placeholder="Password">
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox" name="remember_me">
                                                <label>Remember me</label>
                                                <a href="forget-password.php">Forgot Password?</a>
                                            </div>
                                            <button type="submit"><span>Login</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
include_once ("layouts/footer.php");
include_once ("layouts/scripts.php");
?>