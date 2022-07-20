<?php session_start(); ?>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST){
        $_SESSION['phone']   =  $_POST['phone'];
        header('location:tryreview.php');
        die;
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
        <div class="container">
            <div class="col-12 text-center text-primary h1 mt-5 pt-5">
                Hospital
            </div>
            <div class="row">
                <div class="col-5">
                    <img src="1.png" alt="" class="col-12">
                </div>
                <div class="col-4 offset-2 pt-5 mt-5">
                    <form action="" method="POST">
                        <div class="form-group pt-4">
                            <label for="phone">Phone Number</label>
                            <input type="number" name="phone" id="" class="form-control mt-2" placeholder="" aria-describedby="helpId">
                        </div>
                        <button class="btn text-center font-weight-bold p-2 bg-primary text-light mt-2">Login</button>
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