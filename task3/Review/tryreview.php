<?php session_start(); ?>
<?php
$arr_question = [
    'Are you satisfied with the level of cleanliness?',
    'Are you satisfied with the service prices?',
    'Are you satisfied with the nursing service', 
    'Are you satisfied with the level of the doctor?' ,
    'Are you satisfied with the calmness in the hospital?'
];
$arr_marks=[
    'bad'       => 0 ,
    'good'      => 3 ,
    'very good' => 5 , 
    'excellent' => 10
];
$head_mark = array_map("mark" , $arr_marks );
$question  = array_map("mark" , $arr_question );
function mark($result){
    return $result;
}
function question($result_question){
    return $result_question;
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
        <form action='tryresult.php' method='POST'>
        <table class="table">
            <thead>
                <tr class="text-capitalize">
                    <?php 
                        $th = "<th>Question</th>";
                        foreach($head_mark as $key => $value){
                        $th .=  "<th>";
                            $th .= $key;
                            $th .=  "</th>";
                        }
                        echo $th;
                        ?>
                </tr>
            </thead>
            <tbody>
                    <?php
                        foreach($question as $key_question => $value_question){
                            $body = "<tr>";
                            $body .= "<td scope='row'>" ;
                            $body .= $value_question;
                            $body .= "</td>";
                            foreach($head_mark as $key => $value){
                            $body .= "<td><input type='radio' name='$value_question' value='$key' class='ml-3'></td>";
                        }
                            $body .= "</tr>";
                            echo $body;
                        }
                        ?>
            </tbody>
        </table>
        <hr>
        <button class="btn text-center font-weight-bold p-3 bg-primary text-light mt-4 col-12 h3" style="">Result</button>
    </form>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>