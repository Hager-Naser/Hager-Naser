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
    $validate->setKey('password')->setValue($_POST['password'])->require()->regular_expretion("/^(?=.*\d).{4,10}$/" , "Password must be between 4 and 10 digits long and include at least one numeric digit.")->confirm($_POST["password-confirmation"]);
    $validate->setKey("password confirmation")->setValue($_POST["password-confirmation"])->require();
    if(empty ($validate->getErrors())){
        $user = new user;
        $user->setPassword($_POST['password'])->setEmail($_SESSION['verification_email']);
        if($user->changing_password()){
            unset($_SESSION['verification_email']);
            header('refresh:5;url=login.php');
        }
        else{
            $error = "password not change";
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
                            <h4> Set New Password</h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?= $error ?? "" ?>
                                    <?= $success ?? "" ?>
                                    <form method="post">
                                    <input type="password" name="password" placeholder="Password">
                                    <input type="password" name="password-confirmation" placeholder="Password Confirmation">
                                    <?= $validate->errorMessage('password') ?>
                                        <div class="button-box">
                                            <button type="submit"><span>Change</span></button>
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