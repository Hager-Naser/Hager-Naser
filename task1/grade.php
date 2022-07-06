<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        define('MAX_GRADE' , 100);
        define('PERCENTAGE_SYMBOL' , "%");
        $sum = $_POST['grade_physics'] + $_POST['grade_chemistry'] + $_POST['grade_biology'] + $_POST['grade_mathematics'] + $_POST['grade_computer'];
        $number_percentage = $sum / (MAX_GRADE * 5) * 100;
        $percentage = $number_percentage . PERCENTAGE_SYMBOL;
        if($number_percentage < 40 && $number_percentage >= 0){
                $message = "Grade F";
        }elseif($number_percentage >=40 && $number_percentage < 60){
                $message = "Grade E"; 
        }elseif($number_percentage >=60 && $number_percentage < 70){
                $message = "Grade D"; 
        }elseif ($number_percentage >=70 && $number_percentage < 80){
                $message = "Grade C"; 
        }elseif($number_percentage >=80 && $number_percentage < 90){
                $message = "Grade B"; 
        }elseif($number_percentage >=90 && $number_percentage <= 100){
                $message = "Grade A"; 
        }else{
            $message = "no valid number";
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
                <form action="" method="POST" class="col-6 offset-3 border border-warning p-5 mt-2">
                <div class="form-group text-center h3 text-success">
                        STUDENT GRADE
                    </div>
                    <div class="form-group">
                        <label for="Physics">Enter Your Grade in Physics</label>
                        <input type="number" name="grade_physics" id="" class="form-control" placeholder="Enter Number" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="Chemistry">Enter Your Grade in Chemistry</label>
                        <input type="number" name="grade_chemistry" id="" class="form-control" placeholder="Enter Number" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="Biology">Enter Your Grade in Biology</label>
                        <input type="number" name="grade_biology" id="" class="form-control" placeholder="Enter Number" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="Mathematics">Enter Your Grade in Mathematics </label>
                        <input type="number" name="grade_mathematics" id="" class="form-control" placeholder="Enter Number" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="Computer">Enter Your Grade in Computer</label>
                        <input type="number" name="grade_computer" id="" class="form-control" placeholder="Enter Number" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary col-12">Check</button>
                    </div>
                    <div class="form-group">
                        <?php
                            echo $sum ??"";
                            echo "<br>";
                            echo $percentage ??"";
                            echo "<br>";
                            echo $message ??"";
                        ?>
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
