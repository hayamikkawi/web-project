<!--   ----------------------------------------insert added item into database------------------------------>
<?php
session_start();
if (isset($_SESSION['member'])){
    if ($_SESSION['member']!=1)
        header("location: login.php");
}
else{
    header("location: login.php");
}
if(isset($_POST["items-name"])) {

        @$db = new mysqli ('localhost', 'root', '', 'pawfecthouse1');
        if (mysqli_connect_errno()) {
            echo 'error connecting';
            die();
        }
    //new code for file uploading///////////////////////
    $good=false;
    $file = $_FILES['items-pic'];
    $fileName= $file['name'];
    $fileTempLoc=$file['tmp_name'];
    $fileError= $file['error'];
    $fileExt= explode('.' , $fileName);
    $fileExactExt= strtolower(end($fileExt));
    $allowed =array('jpg', 'jpeg', 'png');
    if (in_array($fileExactExt, $allowed)){
        if ($fileError===0){
            $fileNameNew="dog". uniqid('', true).".".$fileExactExt;
            $fileDest= 'uploads/'.$fileNameNew;
            move_uploaded_file($fileTempLoc, $fileDest);
            $good=true;

        }

    }
    $file2 = $_FILES['items-pic2'];
    $fileName2= $file2['name'];
    $fileTempLoc2=$file2['tmp_name'];
    $fileError2= $file2['error'];
    $fileExt2= explode('.' , $fileName2);
    $fileExactExt2= strtolower(end($fileExt2));
    $allowed2 =array('jpg', 'jpeg', 'png');
    if (in_array($fileExactExt, $allowed)){
        if ($fileError2===0){
            $fileNameNew2="dogt". uniqid('', true).".".$fileExactExt;
            $fileDest2= 'uploads/'.$fileNameNew2;
            move_uploaded_file($fileTempLoc2, $fileDest2);
            $good=true;
        }

    }
    //end of new code, ps: some changes are made in values below |  /////


        $name = $_POST["items-name"];
        $pic = $fileNameNew;
        $pic2=$fileNameNew2;
        $price = doubleval($_POST["items-price"]);
        $des = $_POST["items-des"];
        $id = doubleval($_POST["items-price"]);
        $forwhome = $_POST["items-gender"];
        $email = $_POST['Adder-email'];
//        echo $_POST['Adder-email'];

        $strQry = "INSERT INTO items VALUES ('" . $name . "' , '" . $des . "' ,0 , 1,'" . $pic . "','" . $id . "' , '" . $price . "' , '" . $forwhome . "' , '".$email."' , '".$pic2."')";

        $res = $db->query($strQry);
        $_POST = array();
//    }

//    {$_POST["pets-name"]}

}
else{
    $test='';
    $num='';
}
?>

<!--   ----------------------------------------end insert added dog for adoption into database------------------------------>

<!--   ----------------------------------------filtering-------------------------------------------------------------------->
<?php
if(isset($_POST['customer_name'])){
    @$db = new mysqli ('localhost', 'root', '', 'pawfecthouse1');
    if (mysqli_connect_errno()) {
        echo 'error connecting';
        die();
    }
//                                $strQry = "INSERT INTO dog (firstname, lastname, email)VALUES ('John', 'Doe', 'john@example.com')";
    $item_id = $_POST['hiddenItemtId'];
//    echo $item_id;
    $customer_name = $_POST['customer_name'];
    $customer_phone = intval($_POST["customer_phone"]);
    $customer_address = $_POST["customer_address"];


    $strQry = "INSERT INTO customer VALUES ('" . $item_id . "' , '" . $customer_name . "' ,'" . $customer_phone . "','" . $customer_address . "'  )";


//    "UPDATE MyGuests SET lastname='Doe' WHERE id=2"
    $res = $db->query($strQry);
//    $strQry2 = "UPDATE items SET avaiable=0 WHERE itemId=(?)";
//    $res = $db->query($strQry2);

    $query = "UPDATE items SET available=0 WHERE itemId=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $item_id );
    $stmt->execute();

    $_POST = array();
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Shopping</title>
    <link rel="stylesheet" href="adopt1.css">
    <link rel="stylesheet" href="adopt_this_pet.css">
    <link rel="stylesheet" href="BuyWindow.css">
    <link rel="stylesheet" href="slider.css">


    <script src="adopt.js"></script>
    <!----------------------------------------cards links ------------------>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!----------------------------------------cards links ------------------>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

</head>
<body>
<!-- ---------------------------------Menu nav bar------------------------------------------------------- -->

<header>

    <!--        <div style="display: flex">-->
    <!--        <img src="./imgs/logo%20(2).png" style="width:400px; height: 50px">-->
    <nav>
        <ul class="menu">
            <li><a href="index2.php">Home</a></li>
            <li><a href="Adopt.php">Adopt</a></li>
            <li><a href="#!">Shop</a></li>
            <li><a href="disc.php">Question</a></li>
            <li><a href="login.php">Register</a></li>

        </ul>
    </nav>
    <!--        </div>-->
</header>
<!-- ----------------------------beginning section-------------------------------------------- -->
<section class="begin_sec" >
    <div class="begin">
        <img  id="begin_img_items" src="./imgs/Pets-on-a-Budget-Best-Places-to-Find-Cheap-Dog-Products-removebg-preview.png">
        <p id="adopt_sen" class="text"> Take care of <span id="text_span"> Your FRIEND</span></p>
    </div>
    <img src="./imgs/logo%20(2).png" style="width:230px; height: 70px; position:relative; top: -475px">


</section>


<!-- --------------------------------search--------------------------------------- -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


<!-- ---------------------------------------------------------------------------------------- -->


<!-- card -->
<section id="team" class="pb-5">
    <div class="container">

        <div class="container2">
            <!-- #1 -->
            <div class="mid ">

                <!--            <label class="rocker rocker-small" >-->

                <form action="Items.php" method="post" >
                    <input type="submit" value="" class="filter_btn" >

                    <label class="rocker rocker-small" >
                        <input type="checkbox" name="filter" value="Dog">
                        <span class="switch-left">Dog</span>
                        <span class="switch-right"></span>
                    </label>


                    <!--               <input type="submit" style="width: 100px; height: 50px; position: relative; cursor: pointer;" value="search">-->


                    <!--            </label>-->

            </div>


            <!--            -------------------------------------mid-2222-------------------------->
            <div class="mid secOne">

                <!--            <label class="rocker rocker-small" >-->


                <label class="rocker rocker-small" >
                    <input type="checkbox" name="catFilter" value="Cat">
                    <span class="switch-left">Cat</span>
                    <span class="switch-right"></span>
                </label>

                <!--                    <input type="submit" style="width: 100px; height: 50px; position: relative; float: left; cursor: pointer;" value="search">-->

                </form>
                <!--            </label>-->

            </div>
            <!-- #2 -->


            <h5 class="section-title h1" id="pawfect_title">PawfectHouse Items</h5>
            <!-- #3 -->

<!--            <form action="" class="searchform">-->
<!--                <input type="search" class="searchinput">-->
<!--                <i class="fa fa-search searchicon"></i>-->
<!--            </form>-->
        </div>
        <!-- #4 -->
        <a class="add_item_button" href="#popup">Add Item</a>


        <!-- --------------------------------- popup menu add item ------------------------------------------- -->

        <div class="container">
            <!-- <a class="button" href="#popup">Open Modal</a> -->
            <div class="popup" id="popup" >
                <div class="popup-inner">
                    <div class="popup__photo">
                        <div class='puppy_items'>

                            <img src='imgs/dogbg.png'>

                        </div>

                    </div>
                    <div class="popup__text">

                        <div class='right-container'>
                            <header>
                                <h1>Yay, puppies! Ensure your pup gets the best care!</h1>
                                <div class='set'>
                                    <div class='pets-name'>
                                        <!--  ------------------------------------start form----------------------------------->
                                        <form action="Items.php" method="post" enctype="multipart/form-data">
                                            <label for='items-name'>Name</label>
                                            <input id='items-name' name='items-name' placeholder="Item's name" type='text' required>
                                    </div>


<!--                                        <input type="file" name="items-pic" id="file" class="inputfile" required />-->
<!--                                        <label for="file"><i class="fa fa-camera-retro" style="font-size:22px; position: relative; left: 14px; top: 10px;"></i></label>-->
<!---->
<!--                                        <input type="file" name="items-pic2" id="file2" class="inputfile" required />-->
<!--                                        <label for="file2"><i class="fa fa-camera-retro" style="font-size:22px; position: relative; left: 14px; top: 10px;"></i></label>-->
                                        <div class='pets-birthday'>
                                            <label for='pets-birthday'>Price</label>
                                            <input id='pets-birthday' name="items-price" placeholder="Type Free if it is free" type='text' required>
                                        </div>

<!--                                        <input type="file" size="60" name="items-pic" id="file"  required />-->
<!---->
<!--                                        <input type="file" name="items-pic2" id="file2"  required />-->




                                </div>
                                <div class='set'>
                                    <div class='pets-breed'>
                                        <label for='pets-breed-items'>Description</label>
                                        <textarea id='pets-breed-items' name="items-des" placeholder="Item's Description" type='text' rows="4" cols="30" required> </textarea>
                                    </div>
<!--                                    <div class='pets-birthday'>-->
<!--                                        <label for='pets-birthday'>Price</label>-->
<!--                                        <input id='pets-birthday' name="items-price" placeholder="Type Free if it is free" type='text' required>-->
<!--                                    </div>-->
                                    <div class='pets-photo' style="display: flex;  flex-direction: column; gap: 20px; position: relative; top: 30px; left: 20px;">
                                    <input type="file" size="60" name="items-pic"  style=" overflow: hidden; " required />

                                    <input type="file" name="items-pic2"  style=" overflow: hidden;"  required />
                                    <br>
                                    </div>

                                </div>

                                <div class='set'>
                                    <div class='pets-gender'>
                                        <label for='pet-gender-female'>For:</label>
                                        <div class='radio-container'>
                                            <input checked='' id='pet-gender-female' name='items-gender' type='radio' value='dog'>
                                            <label for='pet-gender-female'>Dogs</label>
                                            <input id='pet-gender-male' name='items-gender' type='radio' value='cat'>
                                            <label for='pet-gender-male'>Cats</label>
                                            <input id='pet-gender-Both' name='items-gender' type='radio' value='both'>
                                            <label for='pet-gender-Both'>Both</label>
                                        </div>
                                    </div>

                                </div>
                                <div style="display: flex; gap: 70px; position: relative; top: 21px;">
                                <div class='pets-birthday'>
                                    <label for='pets-birthday'>Email Address</label>
                                    <input id='pets-birthday' name="Adder-email" placeholder="Enter Your Email" type='text' required>
                                </div>
                                <input type="submit" id='next_items' style="  background: #807182;
                                                        border: 1px solid transparent;
                                                        width: 170px;
                                                        position: relative;
                                                        cursor: pointer;
                                                        top: 28px;
                                                        color: #fff;" value="Send Request">

                                </div>
                                </form>

<!--                                <div style="display: flex; flex-direction: column; gap: 20px;" class="uploads">-->
<!--                                    <span>Upload</span>-->
<!--                                    <span>Upload</span>-->
<!--                                </div>-->



                            </header>
                            <footer>

                            </footer>
                        </div>
                    </div>
                    <a class="popup__close" href="#pawfect_title">X</a>
                </div>
            </div>
        </div>



        <!-- --------------------------------- end popup menu add item ------------------------------------------- -->

        <!-- --------------------------------- by this item ------------------------------------------- -->
        <?php
        if (isset($_GET['hidden-Item-id'])){


        ?>
        <div class="container">
            <div class="popup" id="Buy">
                <div class="adopt_popup-inner " id="buy_popup-inner">
                    <div class="popup__photo">
                        <div class='puppy'>

                            <form  action="Items.php" method="post" >
                                <input type="hidden" id="hiddenItemtId" name="hiddenItemtId" value="<?php echo $_GET['hidden-Item-id'] ?>">


                                <?php
                                @$db= new mysqli ('localhost' , 'root' , '' , 'pawfecthouse1');
                                if(mysqli_connect_errno()){
                                    echo 'error connecting' ;
                                    die();
                                }
                                $HID = $_GET['hidden-Item-id'];
                                $strQry = "select * from items WHERE itemId=$HID";

                                $res = $db -> query($strQry);
                                for($i=0; $i<$res-> num_rows ;$i++){
                                $row = $res -> fetch_array();
                                ?>





                                <!--        --------------------------------------------slider imgs-------------------------------------------->


                                <div class="carousel-container">
                                    <
                                    <div class="carousel my-carousel carousel--translate">
                                        <input class="carousel__activator" type="radio" name="carousel" id="F" checked="checked"/>
                                        <input class="carousel__activator" type="radio" name="carousel" id="G"/>

                                        <div class="carousel__controls">
                                            <label class="carousel__control carousel__control--backward" for="J"></label>
                                            <label class="carousel__control carousel__control--forward" for="G"></label>
                                        </div>
                                        <div class="carousel__controls">
                                            <label class="carousel__control carousel__control--backward" for="F"></label>
                                            <label class="carousel__control carousel__control--forward" for="H"></label>
                                        </div>
                                        <div class="carousel__controls">
                                            <label class="carousel__control carousel__control--backward" for="G"></label>
                                            <label class="carousel__control carousel__control--forward" for="I"></label>
                                        </div>
                                        <div class="carousel__controls">
                                            <label class="carousel__control carousel__control--backward" for="H"></label>
                                            <label class="carousel__control carousel__control--forward" for="J"></label>
                                        </div>
                                        <div class="carousel__controls">
                                            <label class="carousel__control carousel__control--backward" for="I"></label>
                                            <label class="carousel__control carousel__control--forward" for="F"></label>
                                        </div>

                                        <div class="carousel__track">
                                            <li class="carousel__slide">
                                                <img src="./uploads/<?php $var = $row[4]; echo $var; ?>" style="width: 350px; height:450px;">

                                            </li>
                                            <li class="carousel__slide">
                                                <img src="./uploads/<?php $var = $row[9]; echo $var; ?>" style="width: 350px; height: 450px;">

                                            </li>

                                        </div>
                                        <div class="carousel__indicators">
                                            <label class="carousel__indicator" for="F">
                                            </label>
                                            <label class="carousel__indicator" for="G"></label>

                                        </div>
                                    </div>
                                </div>



                                <!--     --------------------------------------------end slider imgs-------------------------------------------->
                                <?php } ?>




<!--                                <div class="buy_form">-->
<!--                                <div class="question">-->
<!--                                    <input type="text" name="customer_name" required/>-->
<!--                                    <label>Name</label>-->
<!--                                </div>-->
<!---->
<!--                                <div class="question">-->
<!--                                    <input type="text" name="customer_phone" required/>-->
<!--                                    <label>Phone Number</label>-->
<!--                                </div>-->
<!--                                <div class="question">-->
<!--                                    <input type="text" name="customer_address" required/>-->
<!--                                    <label>Home Address</label>-->
<!--                                </div>-->
<!--                                <button type="submit">Buy This Item</button>-->
<!--                            </div>-->


                        </div>

                    </div>

                    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600|Abel">

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

                    <div class="grid align__item">


                        <div class="buy_form">
                            <h6 style="position: relative; top: -10px; line-height: 30px; letter-spacing: 3px">Fill your Information, We will drive it home for you</h6>

                            <div class="question">
                                <input type="text" name="customer_name" required/>
                                <label>Name</label>
                            </div>

                            <div class="question">
                                <input type="text" name="customer_phone" required/>
                                <label>Phone Number</label>
                            </div>
                            <div class="question">
                                <input type="text" name="customer_address" required/>
                                <label>Home Address</label>
                            </div>
                            <button type="submit">Buy This Item</button>
                        </div>
<!--                        <div class="visacard">-->
<!---->
<!--                            <header class="card__header">-->
<!--                                <h2 class="card__title">Payment Details</h2>-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" class="card__logo" width="140" height="43" viewBox="0 0 175.7 53.9"><style>.visa{fill:#fff;}</style><path class="visa" d="M61.9 53.1l8.9-52.2h14.2l-8.9 52.2zm65.8-50.9c-2.8-1.1-7.2-2.2-12.7-2.2-14.1 0-24 7.1-24 17.2-.1 7.5 7.1 11.7 12.5 14.2 5.5 2.6 7.4 4.2 7.4 6.5 0 3.5-4.4 5.1-8.5 5.1-5.7 0-8.7-.8-13.4-2.7l-2-.9-2 11.7c3.3 1.5 9.5 2.7 15.9 2.8 15 0 24.7-7 24.8-17.8.1-5.9-3.7-10.5-11.9-14.2-5-2.4-8-4-8-6.5 0-2.2 2.6-4.5 8.1-4.5 4.7-.1 8 .9 10.6 2l1.3.6 1.9-11.3M164.2 1h-11c-3.4 0-6 .9-7.5 4.3l-21.1 47.8h14.9s2.4-6.4 3-7.8h18.2c.4 1.8 1.7 7.8 1.7 7.8h13.2l-11.4-52.1m-17.5 33.6c1.2-3 5.7-14.6 5.7-14.6-.1.1 1.2-3 1.9-5l1 4.5s2.7 12.5 3.3 15.1h-11.9zm-96.7-33.7l-14 35.6-1.5-7.2c-2.5-8.3-10.6-17.4-19.6-21.9l12.7 45.7h15.1l22.4-52.2h-15.1"/><path fill="#F7A600" d="M23.1.9h-22.9l-.2 1.1c17.9 4.3 29.7 14.8 34.6 27.3l-5-24c-.9-3.3-3.4-4.3-6.5-4.4"/></svg>-->
<!---->
<!--                            </header>-->
<!---->
<!--                            <form action="" method="post" class="form">-->
<!---->
<!--                                <div class="card__number form__field">-->
<!--                                    <label for="card__number" class="card__number__label">Card Number</label>-->
<!--                                    <input type="text" id="card__number" class="card__number__input" placeholder="4000 1234 5678 9010">-->
<!--                                </div>-->
<!---->
<!---->
<!--                                <div class="card__expiration form__field">-->
<!--                                    <label for="card__expiration__year">Expiration</label>-->
<!--                                    <select name="" id="card__expiration__year">-->
<!--                                        <option value="january">January</option>-->
<!--                                        <option value="februrary">Februrary</option>-->
<!--                                        <option value="march">March</option>-->
<!--                                        <option value="april">April</option>-->
<!--                                        <option value="may">May</option>-->
<!--                                        <option value="june">June</option>-->
<!--                                        <option value="july">July</option>-->
<!--                                        <option value="august">August</option>-->
<!--                                        <option value="september">September</option>-->
<!--                                        <option value="october">October</option>-->
<!--                                        <option value="november">November</option>-->
<!--                                        <option value="december">December</option>-->
<!--                                    </select>-->
<!---->
<!--                                    <select name="" id="">-->
<!--                                        <option value="2020">2020</option>-->
<!--                                        <option value="2021">2021</option>-->
<!--                                        <option value="2022">2022</option>-->
<!--                                        <option value="2023">2023</option>-->
<!--                                        <option value="2024">2024</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!---->
<!--                                <div class="card__ccv form__field">-->
<!--                                    <label for="">CCV</label>-->
<!--                                    <input type="text" class="card__ccv__input" placeholder="583" >-->
<!--                                </div>-->
<!---->
<!--                            </form>-->
<!---->
<!--                        </div>-->


                        </form>
                    </div>




                    <a class="popup__close" href="#pawfect_title" >X</a>
                </div>
            </div>
        </div>


            <script>
                window.open('#Buy','_self');
            </script>

        <?php }   ?>





        <!-- ---------------------------------end  adopt this dog ------------------------------------------- -->


        <!-- ---------------------------------  connecting to database--------------------------------------->
        <div class="row">
            <?php
            @$db= new mysqli ('localhost' , 'root' , '' , 'pawfecthouse1');
            if(mysqli_connect_errno()){
                echo 'error connecting' ;
                die();
            }
            $strQry='select * from items WHERE accepted=1 AND available=1';

            if((isset($_POST['filter']) && isset($_POST['catFilter']))){
//                echo 'we have both';
//                $strQry='select * from dog AND cat WHERE Accepted=1 AND Available=1';
                $strQry='select * from items WHERE accepted=1 AND available=1';

            }

            elseif(isset($_POST['filter'])){
                $strQry='select * from items WHERE accepted=1 AND available=1 AND forWhome="dog"';
//                      echo 'it is a dog';



            }


            elseif (isset($_POST['catFilter'])){
                $strQry='select * from items WHERE accepted=1 AND available=1 AND forWhome="cat"';
//                echo 'it is a cat';


            }
            //            $strQry='select * from dog WHERE Accepted=1 AND Available=1';
            $res = $db -> query($strQry);
            for($i=0; $i<$res-> num_rows ;$i++){
                $row = $res -> fetch_array();
                ?>
                <!-- Team member -->
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip" >
                        <div class="mainflip flip-0">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img class=" img-fluid" src="./uploads/<?php $var = $row[4]; echo $var;  ?>" alt="card image"></p>
                                        <h4 class="card-title"> <?php $var = $row[0]; echo $var;  ?></h4>
                                        <p class="card-text">Price:<?php $var = $row[6]; echo $var;  ?> <br> For:<?php $var = $row[7]; echo $var;  ?> <br> </p>
                                        <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>

                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h4 class="card-title"><?php $var = $row[0]; echo $var;  ?></h4>
                                        <p class="card-text"><?php $var = $row[1]; echo $var;  ?></p>


                                        <form action="Items.php" method="get">
                                            <input type="hidden" value="<?php $var = $row[5]; echo $var;  ?>" name="hidden-Item-id">
                                            <button  id="<?php $var = $row[5]; echo $var;  ?>"  type="submit"  style="background: transparent; border: none;font-size: 18px;color: #007b5e; cursor: pointer; outline: none; ">Buy Item</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Team member -->
            <?php } ?>

        </div>
</section>
<!-- Team -->


<!--------------------------------footer--------------------------------------------------->


<footer class="container-fluid bg-grey py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="logo-part">
                            <img src="./imgs/logo%20(2).png" class="w-100 logo-footer" >
                            <p>Nablus- Palestine</p>
                            <p>'Happiness starts with a wet nose and ends with a tail'</p>
                        </div>
                    </div>
                    <div class="col-md-6 px-4">
                        <h6> About Company</h6>
                        <p>A non-prifit company that aims to help pets.</p>
                        <a href="#" class="btn-footer"> More Info </a><br>
                        <a href="#" class="btn-footer"> Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 px-4">
                        <h6> Help us</h6>
                        <div class="row ">
                            <div class="col-md-6">
                                <ul>
                                    <li> <a href="index2.php"> Home</a> </li>
                                    <li> <a href="Adopt.php"> Adopt</a> </li>
                                    <li> <a href="Items.php"> shop</a> </li>
                                    <li> <a href="#teams"> Team</a> </li>
                                    <li> <a href="disc.php"> Question</a> </li>

                                </ul>
                            </div>
                            <div class="col-md-6 px-4">
                                <ul>
                                    <li> <a href="#"> Cab Faciliy</a> </li>
                                    <li> <a href="#"> Fax</a> </li>
                                    <li> <a href="#"> Terms</a> </li>
                                    <li> <a href="#"> Policy</a> </li>
                                    <li> <a href="#"> Refunds</a> </li>
                                    <li> <a href="#"> Paypal</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <h6> Newsletter</h6>
                        <div class="social">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                        <form class="form-footer my-3">
                            <input type="text"  placeholder="search here...." name="search">
                            <input type="button" value="Go" >
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>
<!------------------------------------------------------------------------------------------------>



</body>
</html>