<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST['number_one'] > $_POST['number_two'] && $_POST['number_one'] > $_POST['number_three']){
            echo "Max Number: " . $_POST['number_one'];
            echo "<br>";
            if($_POST['number_two'] > $_POST['number_three']){
                echo "Min Number: " . $_POST['number_three'];
            }else{
                echo "Min Number: " . $_POST['number_two'];
            }
        }elseif($_POST['number_two'] > $_POST['number_one'] && $_POST['number_two'] > $_POST['number_three']){
            echo "Max Number: " . $_POST['number_two'];
            echo "<br>";
            if($_POST['number_one'] > $_POST['number_three']){
                echo "Min Number: " . $_POST['number_three'];
            }else{
                echo "Min Number: " . $_POST['number_one'];
            }
        }else{
            echo "Max Number: " . $_POST['number_three'];
            echo "<br>";
            if($_POST['number_one'] > $_POST['number_two']){
                echo "Min Number: " . $_POST['number_two'];
            }else{
                echo "Min Number: " . $_POST['number_one'];
            }
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
            <div class="row">
                <form action="" method="POST"class="col-6 offset-3 p-5 mt-5 border border-primary">
                    <div class="form-group col-12 text-center h3 text-info mt-3 pb-4">
                        GIT MAX & MIN
                    </div>
                    <div class="form-group">
                        <label for="number one">Number One</label>
                        <input type="number" name="number_one" id="" class="form-control" placeholder="Enter Number" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="number two">Number Two</label>
                        <input type="number" name="number_two" id="" class="form-control" placeholder="Enter Number" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="number three">Number Three</label>
                        <input type="number" name="number_three" id="" class="form-control" placeholder="Enter Number" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary col-12">Check</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
