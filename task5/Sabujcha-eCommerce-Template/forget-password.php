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
    if(empty ($validate->getErrors())){
        $user = new user;
        $output = $user->setEmail($_POST['email'])->email_id();
        if($output->num_rows == 1){
            $change_Code = rand(10000000, 99999999);
            $user->setVerification_code($change_Code);
            if ($user->changing_code()) {
                $_SESSION['verification_email'] = $_POST['email'];
                header('location:verification-code.php?page=forget-password');
                die;
            } else {
                $error = "<p class='text-danger font-weight-bold'> something went wrong </p>";
            }
        }
        else {
            $error = "This email dosen't registration ";
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
                            <h4> Find Your Account </h4>
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
                                        <?= $validate->errorMessage('email') ?>
                                        <div class="button-box">
                                            <button type="submit"><span>next</span></button>
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