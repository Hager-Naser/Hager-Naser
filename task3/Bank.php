<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST){
    $errors = [];
    if(empty($_POST['user'])){
        $errors['user'] = '<p class="p-3 text-danger">*Please Enter Your Name</p>';
    }
    if(empty($_POST['years'])){
        $errors['years'] = '<p class="p-3 text-danger">Please Enter Your Number Of years</p>';
    }if(empty($_POST['amount'])){
        $errors['amount'] = '<p class="p-3 text-danger">Please Enter Your Mony</p>';
    }
    if(empty($errors)){
        if($_POST['years'] > 0 && $_POST['years'] <= 3){
            $benefit = 0.1 ;
            $benefit = $_POST['years'] * $_POST['amount'] * $benefit;
            $after_benefit = $benefit + $_POST['amount'];
            $monthly = $after_benefit / ($_POST['years'] * 12);
        }elseif($_POST['years'] > 3){
            $benefit = 0.15 ;
            $benefit = $_POST['years'] * $_POST['amount'] * $benefit;
            $after_benefit = $benefit + $_POST['amount'];
            $monthly = $after_benefit / ($_POST['years'] * 12);
        }
    }
    $table = '<table class="table table-striped table-inverse col-12 p-0 mt-5">';
        $table .= "<thead class='col-12'>";
            $table .= "<th>User Name </th>";
            $table .= "<th>Interest Rate </th>";
            $table .= "<th>Loan After Rate </th>";
            $table .= "<th>Monthly </th>";
        $table .= "</thead>";
        $table .= "<tbody>";
            $table .= "<td>";
                $table .=  $_POST['user'];
            $table .= "</td>";
            $table .= "<td>$benefit</td>";
            $table .= "<td>$after_benefit</td>";
            $table .= "<td>$monthly</td>";
        $table .= "</tbody>";
    $table .= "</table>";
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <div class="container mt-5">
            <div class="row">
                <div class="image col-5">
                    <img src="image/3.png" class="col-12">
                </div>
                <div class="form col-6 offset-1 pt-5">
                    <form action="" method="POST" class="col-12">
                        <div class="form-group pt-5">
                            <label for="User Name" class="text-primary h5">User Name</label>
                            <input type="text" name="user" value="<?= $_POST['user'] ??'' ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <?= $errors['user'] ?? ''; ?>
                        </div>
                        <div class="form-group">
                            <label for="Amount" class="text-primary h5">Loan Amount</label>
                            <input type="number" name="amount" value="<?= $_POST['amount'] ??'' ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <?= $errors['amount'] ?? ''; ?>
                        </div>
                        <div class="form-group">
                            <label for="Number Of Years" class="text-primary h5">Number Of Years</label>
                            <input type="number" name="years" value="<?= $_POST['years'] ??'' ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <?= $errors['years'] ?? ''; ?>
                        </div>
                        <button class="btn bg-primary text-light font-weight-bold p-3 col-12">Calculate</button>
                        <?= $table ?? ''?>
                    </form>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
