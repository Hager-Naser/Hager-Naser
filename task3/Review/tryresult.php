<?php
session_start();
$arr_question = [
    'Are you satisfied with the level of cleanliness?',
    'Are you satisfied with the service prices?',
    'Are you satisfied with the nursing service?', 
    'Are you satisfied with the level of the doctor?' ,
    'Are you satisfied with the calmness in the hospital?'
];
$arr_marks=[
    'bad'       => 0 ,
    'good'      => 3 ,
    'very good' => 5 , 
    'excellent' => 10
];
$head_mark = array_map("check" , $arr_marks );
function check($arr){
    return $arr;
}
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
$table = "<table class='table'>";
$table .= "<thead><tr>
<th>Question</th>
<th>Mark</th>
</tr></thead>";
$table .= "<tbody>";
$total =0;
foreach($_POST as $keyquestion => $valuequestion){
        $table .= "<tr>";
        
        $table .= "<td>";
        $table .= str_replace( "_" , " " , $keyquestion);
        $table .=  "</td>";
        $table .= "<td>";
        $table .= $_POST["$keyquestion"];
        $table .= "</td>";
        $table .= "</tr>";
        foreach($arr_marks as $key => $value){
            if($key = $_POST["$keyquestion"]){
                $total += $arr_marks["$key"];
                break;
            }
        }
    }
        $table .= "<tbody>";
        $table .= "</table>";
    echo $table;
if($total >= 0 && $total<25){
    $message= "<p class='p-3 bg-primary text-light'>We will call you later on this phone : " . $_SESSION['phone'] . "</p>";
}elseif($total > 25){
    $message=  "<p class='p-3 bg-primary text-light'>thanks</p>";
}
echo $message;