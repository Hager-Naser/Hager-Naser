<?php 
use App\Http\Requestes\validation;
use App\Database\Models\User;
$title = "register";
include "layouts/head.php";
include "layouts/nav.php";
include "layouts/breadcrumb.php";
// submit
$validate = new validation;
if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)){
    // $_POST
    // validation
    $validate->setKey("first name")->setValue($_POST["first-name"])->require()->string()->checklen_max(20);
    $validate->setKey("last name")->setValue($_POST["last-name"])->require()->string()->checklen_max(20);
    $validate->setKey("phone")->setValue($_POST["phone"])->require()->uniqe_data("users" , "phone")->regular_expretion("/^01[0125][0-9]{8}$/");
    $validate->setKey("email")->setValue($_POST["email"])->require()->uniqe_data("users" , "email")->regular_expretion("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/");
    $validate->setKey("password")->setValue($_POST["password"])->require()->regular_expretion("/^(?=.*\d).{4,10}$/" , "Password must be between 4 and 10 digits long and include at least one numeric digit.")->confirm($_POST["password-confirmation"]);
    $validate->setKey("password confirmation")->setValue($_POST["password-confirmation"])->require();
    $validate->setKey("gender")->setValue($_POST["gender"])->require()->check_gender(['f' , 'm']);
    if(empty($validate->getErrors())){
    //     // hash password
    //     // create code 
        $verification_code = rand(10000000,99999999);
        $user = new user;
    //     // insert user in database
        $user->setFirst_name($_POST["first-name"])->setLast_name($_POST["last-name"])->setPhone($_POST["phone"])->setEmail($_POST["email"])->setPassword($_POST["password"])->setGender($_POST["gender"])->setVerification_code($verification_code) ;
        if($user->create()){
            // send mail
            $_SESSION['verification_email'] = $_POST['email'];
            // header (verification code)
            header("location:verification-code.php?page=register");
        }else{
        $error = "<div class='alter alter-danger'>Something Error</div>";
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
                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?= $error ??"" ?>
                                    <form method="post">
                                        <input type="text" name="first-name" placeholder="First Name" value="<?= $_POST['first-name'] ??''  ?>">
                                        <?= $validate->errorMessage("first name") ?>
                                        <input type="text" name="last-name" placeholder="Last Name" value="<?= $_POST['last-name'] ??''  ?>">
                                        <?= $validate->errorMessage("last name") ?>
                                        <input type="tele" name="phone" placeholder="Phone" value="<?= $_POST['phone'] ??''  ?>">
                                        <?= $validate->errorMessage("phone") ?>
                                        <input name="email" placeholder="Email" type="email" value="<?= $_POST['email'] ??''  ?>">
                                        <?= $validate->errorMessage("email") ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?= $validate->errorMessage("password") ?>
                                        <input type="password" name="password-confirmation" placeholder="Password Confirmation">
                                        <?= $validate->errorMessage("password confirmation") ?>
                                        <select class="form-control" name="gender" id="">
                                            <option value="m" <?= isset($_POST['gender']) && $_POST['gender'] == 'm' ? 'selected' : '' ?>>Male</option>
                                            <option value="f" <?= isset($_POST['gender']) && $_POST['gender'] == 'f' ? 'selected' : '' ?>>Female</option>
                                        </select>
                                        <?= $validate->errorMessage("gender") ?>
                                        <div class="button-box ">
                                            <button type="submit" class="mt-3"><span>Register</span></button>
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