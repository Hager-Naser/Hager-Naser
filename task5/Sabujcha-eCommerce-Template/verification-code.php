<?php 
use App\Http\Requestes\validation;
use App\Database\Models\User;
$title = "Verification Code";
include "layouts/head.php";
include "layouts/nav.php";
include "layouts/breadcrumb.php";
include "App/Http/Middlewares/emailVerification.php";
// submit
$validate = new validation;
$validate->setKey('page')->setValue($_GET['page'] ?? null)->require()->check_exist(['register' , 'login' , 'forget-password']);
if($validate->getErrors()){
    header('location:layouts/errors/404.php');
    die;
}
if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)){
    // $_POST
    //validation on verification-code
    $validate->setKey('verification code')->setValue($_POST['verification-code'])->require()->regular_expretion("/^[0-9]{8}$/")->exist_data("users" , "verification_code");
    if(empty($validate->getErrors())){
        //search email & password in database
        $user = new user;
        $user->setEmail($_SESSION['verification_email'])->setVerification_code($_POST["verification-code"]);
        $output =  $user->check_code();
        if($output->num_rows == 1){
            $user->setEmail_verified_at(date('Y-m-d H:i:s'));
            if($user->email_verified()){
                if($_GET['page'] == 'register' || $_GET['page'] == 'login'){
                    $success_code = "success code , Please Wait for send you to home page";
                    $_SESSION['user'] = $output->fetch_object();
                    // user already in database so we don,t use email
                    unset($_SESSION['verification_email']);
                    header('refresh:5;url=index.php');
                }elseif($_GET['page'] == 'forget-password'){
                    $success_code = "success code , Please Wait for send you to set new password";
                    header('refresh:5;url=set.new.password.php?page=verification-code');
                }
            }
            }
            else{
                $error = "somthing error";
            }
        }
        else{
            $error = "error in verification code";
        }
}
?> 
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> Verification Code </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?= $error ??"" ?>
                                    <?= $success_code ??"" ?>
                                    <form method="post">
                                        <input type="number" name="verification-code" placeholder="Verification Code" value="<?= $_POST['verification-code'] ??''  ?>">
                                        <?= $validate->errorMessage("verification code") ?>
                                        <div class="button-box ">
                                            <button type="submit" class="mt-3"><span>send</span></button>
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