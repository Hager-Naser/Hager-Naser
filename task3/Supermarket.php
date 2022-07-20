<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST){
    $errors = [];
    if(empty($_POST['user'])){
        $errors['user'] = '<p class="p-3 text-denger">*Please Enter Your Name</p>';
    }
    if(empty($_POST['number'])){
        $errors['number'] = '<p class="p-3 text-denger">Please Enter Your Number Of Product</p>';
    }
    if(empty($errors)){
        $_SESSION['city'] = $_POST['city'];
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
        <div class="container mt-5">
            <div class="row">
                <div class="image col-6">
                    <img src="2.png" class="col-12">
                </div>
                <div class="form col-5 offset-1 pt-5">
                    <form action="" method="POST">
                        <div class="form-group pt-5">
                            <label for="User Name" class="text-primary h5">User Name</label>
                            <input type="text" name="user" value="<?= $_POST['user']??''; ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <?= $errors['user'] ?? ''; ?>
                        </div>
                        <div class="form-group">
                            <label for="City" class="text-primary h5">City</label>
                            <select class="form-control" name="city" id="" value="">
                                <option value="Cairo" <?= $_SESSION['city'] == 'Cairo'?'selected' : ''; ?>>Cairo</option>
                                <option value="Giza" <?= $_SESSION['city'] == 'Giza'?'selected' : ''; ?>>Giza</option>
                                <option value="Alex" <?= $_SESSION['city'] == 'Alex'?'selected' : ''; ?>>Alex</option>
                                <option value="Others" <?= $_SESSION['city'] == 'Others'?'selected' : ''; ?>>Others</option>
                            </select>
                            <?= $errors['city'] ?? ''; ?>
                        </div>
                        <div class="form-group">
                            <label for="Number Of Varieties" class="text-primary h5">Number Of Varieties</label>
                            <input type="number" name="number" value="<?= $_POST['number']??''; ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <?= $errors['number'] ?? ''; ?>
                        </div>
                        <button class="btn bg-primary text-light font-weight-bold p-3 col-12">Enter Products</button>
                        <?php if($_POST && $_POST['number'] && $_POST['user'] && $_POST['city']){ ?>
                            <table class="col-12 mt-5">
                                
                                <tbody class="col-12">
                                        <?php 
                                        $price_one_product = 0;
                                        $total  = 0;
                                        for($count = 1; $count <= $_POST['number'] ; ++$count){ ?>
                                            <tr>
                                                <td scope="row" class="p-1">
                                                    <input type="text" name="nameOfProduct<?= $count?>" value="<?= $_POST["nameOfProduct$count"] ??false ?>" id="" class="col-12" style='border-radius:3px; border:1px solid #b9bbbd; <?= $_POST["nameOfProduct$count"] ? "border:0" : "" ?>'>
                                                </td>
                                                <td class="p-1">            
                                                    <input type="number" name="priceOfProduct<?= $count?>" value="<?= $_POST["priceOfProduct$count"] ??false ?>" id="" class="col-12" style='border-radius:3px; border:1px solid #b9bbbd; <?= $_POST["priceOfProduct$count"] ? "border:0" : "" ?>'>
                                                </td>
                                                <td class="p-1">
                                                    <input type="number" name="quantitiesOfProduct<?= $count?>" value="<?= $_POST["quantitiesOfProduct$count"] ??false ?>" id="" class="col-12" style='border-radius:3px; border:1px solid #b9bbbd; <?= $_POST["quantitiesOfProduct$count"] ? "border:0" : "" ?>'>
                                                </td>
                                                
                                                <?php
                                        if(!empty($_POST["nameOfProduct$count"]) && !empty($_POST["priceOfProduct$count"]) && !empty($_POST["quantitiesOfProduct$count"] )){
                                            $price_one_product = ($_POST["priceOfProduct$count"]??false)  * ($_POST["quantitiesOfProduct$count"]??false) ;
                                            $total  += $price_one_product;?>
                                            <td class="p-1">
                                                <input type="number" name="priceOfOneProject<?= $count?>" value="<?= $price_one_product ??false ?>" id="" class="col-12" style='border-radius:3px; border:1px solid #b9bbbd; <?= $price_one_product ? "border-color:transparent" : "" ?>'>
                                            </td>
                                        <?php
                                            }
                                    } 
                                    ?>
                                    
                                    </tr>
                                </tbody>
                                <thead class="col-12">
                                    <tr class="text-primary">
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantities</th>
                                        <?php if($price_one_product) {?>
                                                <th>Sub Total</th>
                                            <?php }?>
                                    </tr>
                                </thead>
                            </table>
                            <button class="btn bg-primary text-light font-weight-bold p-3 col-12 mt-3" style='<?= $price_one_product ?"display:none" : "" ?>' >Receipt</button>
                        <?php 
                            if( $total ){
                                ////////total discount////////////////
                                $discount = 0;
                                $total_after_discount =0;
                                if($total <= 1000 && $total > 0 ){
                                    $discount = 0;
                                    $total_discount = $total * $discount;
                                    $total_after_discount = $total -  $total_discount ; 
                                }elseif($total > 1000 && $total <= 3000 ){
                                    $discount = 0.1;
                                    $total_discount = $total * $discount;
                                    $total_after_discount =  $total - $total_discount ;  
                                }elseif($total > 3000 && $total <= 4500 ){
                                    $discount = 0.15;
                                    $total_discount = $total * $discount;
                                    $total_after_discount =  $total - $total_discount ;  
                                }elseif($total > 4500){
                                    $discount = 0.2;
                                    $total_discount = $total * $discount;
                                    $total_after_discount = $total -  $total_discount ; 
                                }
                                ///////////////////////////////////////////
                                $delivery  = 0;
                                if($_POST['city'] == "Cairo"){
                                    $delivery  = 0;
                                    $total_after_delivery  = $total_after_discount  + $delivery ;
                                }elseif($_POST['city'] == "Giza"){
                                    $delivery  = 30;
                                    $total_after_delivery  = $total_after_discount  + $delivery ;
                                }
                                elseif($_POST['city'] == "Alex"){
                                    $delivery  = 50;
                                    $total_after_delivery  = $total_after_discount  + $delivery ;
                                }else{
                                    $delivery  = 100;
                                    $total_after_delivery  = $total_after_discount  + $delivery ;
                                }
                        ?>
                    <table class="table">
                        <tr>
                            <th class="text-primary">Clint Name</th>
                            <td><?= $_POST['user']?></td>
                        </tr>
                        <tr>
                            <th class="text-primary">Total</th>
                            <td><?= $total?></td>
                        </tr>
                        <tr>
                            <th class="text-primary">Discount</th>
                            <td><?= $total_discount ?></td>
                        </tr>
                        <tr>
                            <th class="text-primary">Total After Discount</th>
                            <td><?= $total_after_discount?></td>
                        </tr>
                        <tr>
                            <th class="text-primary">Delivery</th>
                            <td><?= $delivery?></td>
                        </tr>
                        <tr>
                            <th class="text-primary">Net Total</th>
                            <td><?= $total_after_delivery?></td>
                        </tr>
                    </table>
                    <?php }
                
            }?>
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
