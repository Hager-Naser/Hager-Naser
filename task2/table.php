<?php
// dynamic table
// dynamic rows //4 
// dynamic columns // 4
// check if gender of user == m ==> male // 1
// check if gender of user == f ==> female // 1

$users = [
    (object)[
        'Id' => 1,
        'Name' => 'ahmed',
        "Gender" => (object)[
            'gender' => "m"
        ],
        'Hobbies' => [
            'football', 'swimming', 'running'
        ],
        'Activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ],
    ],
    (object)[
        'Id' => 2,
        'Name' => 'mohamed',
        "Gender" => (object)[
            'gender' => 'm'
        ],
        'Hobbies' => [
            'swimming', 'running',
        ],
        'Activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
    ],
    (object)[
        'Id' => 3,
        'Name' => 'menna',
        "Gender" => (object)[
            'gender' => 'f'
        ],
        'Hobbies' => [
            'running',
        ],
        'Activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
    ], 
];
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
        <table class="table table-striped">
            <thead class="thead-inverse">
                <tr>
                    <?php  foreach($users[0] AS $address_column => $name){ ?>
                        <th><?php echo $address_column;?></th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>
                <!-- check items in main array (users) -->
                <?php foreach($users As $user){  ?>
                    <tr>
                        <!-- i enter $users[0]-->
                        <?php foreach($user As $information_person){?>
                        <td scope="row">
                                <!-- i enter $users[0]->object check values-->
                                <?php if(is_object($information_person) || is_array($information_person)){
                                    foreach($information_person AS $secondary_information){
                                        if($secondary_information == "m"){
                                            echo "male";
                                        }elseif($secondary_information == "f"){
                                            echo "famle";
                                        }else{
                                        echo "{$secondary_information} <br>";
                                        }
                                    }
                                }elseif($information_person === null){
                                    echo "Not Entered";
                                }
                                else{ 
                                echo $information_person ; 
                                }?>
                        </td>
                        <?php }?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
        // $table = "<table class='table table-striped'>";
        //     $table .= '<thead class="thead-inverse">';
        //     $table .= "<tr>";
        //         foreach($users[0] AS $address_column => $name){ 
        //             $table .= "<th>echo $address_column;</th>";
        //         }
        //     $table .= "</tr>";
        //     $table .= "</thead>";
        //     $table = "<tbody>";
        //         foreach($users As $user){
        //         $table .= "<tr>";
        //             foreach($user As $information_person){
        //                 $table .= "<td scope='row'>";
        //                                 if(is_object($information_person) || is_array($information_person)){
        //                                     foreach($information_person AS $secondary_information){
        //                                         if($secondary_information == "m"){
        //                                             echo "male";
        //                                         }elseif($secondary_information == "f"){
        //                                             echo "famle";
        //                                         }else{
        //                                         echo "{$secondary_information} <br>";
        //                                         }
        //                                     }
        //                                 }elseif($information_person === null){
        //                                     echo "Not Entered";
        //                                 }
        //                                 else{ 
        //                                 echo $information_person ; 
        //                                 }
        //                 $table .= "</td>";
        //             }
        //         $table .= "</tr>";
        //         }
        //     $table .= "</tbody>";
        // $table .= "</table>";
        // echo $table;
        ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
