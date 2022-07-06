<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        define('ADD_BILL' , 0.2);
        if($_POST['number'] > 0 && $_POST['number'] <= 50){
            $before_add = $_POST['number'] * 0.5;
            $message = $before_add + $before_add * ADD_BILL;
        }elseif($_POST['number'] > 50 && $_POST['number'] <= 150){
            $before_add = $_POST['number'] * 0.75;
            $message =  $before_add + $before_add * ADD_BILL;
        }elseif($_POST['number'] > 150 && $_POST['number'] <= 250){
            $before_add = $_POST['number'] * 1.20;
            $message = $before_add + $before_add * ADD_BILL;
        }elseif($_POST['number'] > 250){
            $before_add = $_POST['number'] * 1.5;
            $message = $before_add + $before_add * ADD_BILL;
        }else{
            $message = "not valid";
        }
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
                <form action="" method="POST" class="col-6 offset-3 p-5 border border-danger mt-5">
                    <div class="form-group text-center h3 text-success text-capitalize">
                        calculate total electricity bill
                    </div>
                    <div class="form-group">
                        <label for="Enter Number">Enter Number</label>
                        <input type="number" name="number" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success col-12">Check</button>
                    </div>
                    <div class="form-group">
                        <?php echo $message??"";?>
                    </div>
                </form>
                
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
