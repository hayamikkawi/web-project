<!--   ----------------------------------------insert added dog for adoption into database------------------------------>
<?php
session_start();
if (isset($_SESSION['member'])){
    if ($_SESSION['member']!=1)
        header("location: login.php");
}
else{
    header("location: login.php");
}
if(isset($_POST["pets-name"])) {
    if ($_POST["pets-type"] == 'Dog') {
        @$db = new mysqli ('localhost', 'root', '', 'pawfecthouse1');
        if (mysqli_connect_errno()) {
            echo 'error connecting';
            die();
        }

       //new code for file uploading///////////////////////
        $good=false;
        $file = $_FILES['pets-pic'];
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
        $file2 = $_FILES['pets-pic2'];
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

        if ($good){

        $name = $_POST["pets-name"];
        $age = doubleval($_POST["pets-birthday"]);
        $des = $_POST["pets-description"];
        $id = doubleval($_POST["pets-birthday"]);
        $breed = $_POST["pets-breed"];
        $gender = $_POST["pets-gender"];
        $month = $fileNameNew;
        $pic2 = $fileNameNew2;
        $email = $_POST['Adder-pet-email'];
        $strQry = "INSERT INTO dog VALUES ('" . $name . "' , '" . $age . "' ,'" . $des . "','" . $id . "','" . $breed . "','" . $gender . "' , '" . $month . "' , 0 , 1 , '".$email."','".$pic2."' )";

        $res = $db->query($strQry);
        $_POST = array();
    }

//    {$_POST["pets-name"]}
    } elseif ($_POST["pets-type"] == 'Cat') {
        @$db = new mysqli ('localhost', 'root', '', 'pawfecthouse1');
        if (mysqli_connect_errno()) {
            echo 'error connecting';
            die();
        }
//new code for cat files upload//////////
        $good=false;
        $file = $_FILES['pets-pic'];
        $fileName= $file['name'];
        $fileTempLoc=$file['tmp_name'];
        $fileError= $file['error'];
        $fileExt= explode('.' , $fileName);
        $fileExactExt= strtolower(end($fileExt));
        $allowed =array('jpg', 'jpeg', 'png');
        if (in_array($fileExactExt, $allowed)){
            if ($fileError===0){
                $fileNameNew="cat". uniqid('', true).".".$fileExactExt;
                $fileDest= 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTempLoc, $fileDest);
                $good=true;

            }

        }
        $file2 = $_FILES['pets-pic2'];
        $fileName2= $file2['name'];
        $fileTempLoc2=$file2['tmp_name'];
        $fileError2= $file2['error'];
        $fileExt2= explode('.' , $fileName2);
        $fileExactExt2= strtolower(end($fileExt2));
        $allowed2 =array('jpg', 'jpeg', 'png');
        if (in_array($fileExactExt, $allowed)){
            if ($fileError2===0){
                $fileNameNew2="catt". uniqid('', true).".".$fileExactExt;
                $fileDest2= 'uploads/'.$fileNameNew2;
                move_uploaded_file($fileTempLoc2, $fileDest2);
                $good=true;
            }

        }




        $name = $_POST["pets-name"];
        $age = doubleval($_POST["pets-birthday"]);
        $des = $_POST["pets-description"];
        $pic = 'pic src here';
        $id = doubleval($_POST["pets-birthday"]);
        $gender = $_POST["pets-gender"];
        $breed = $_POST["pets-breed"];
        $month = $fileNameNew;
        $pic2 = $fileNameNew2;
        $email = $_POST['Adder-pet-email'];

        $strQry = "INSERT INTO cat VALUES ('" . $name . "' , '" . $age . "' ,'" . $des . "','" . $id . "','" . $breed . "','" . $gender . "' , '" . $month . "' , 0 , 1 , '".$email."','".$pic2."' )";

        $res = $db->query($strQry);
        $_POST = array();
//    }

//    {$_POST["pets-name"]}
    }
}
else{
    $test='';
    $num='';
}
?>

<!--   ----------------------------------------end insert added dog for adoption into database------------------------------>

<!--   ----------------------------------------filtering-------------------------------------------------------------------->
<?php
//if(isset($_POST['filter'])){
//    echo 'its a dog';
//}
//elseif (!isset($_POST)){
//    echo 'it is a cat';
//
//
//}
//
//
//?>

<!-----------------------------------------------adopt this bet------------------------------------------------------------->
<?php
if(isset($_POST['adopter_name'])){
    @$db = new mysqli ('localhost', 'root', '', 'pawfecthouse1');
    if (mysqli_connect_errno()) {
        echo 'error connecting';
        die();
    }
//                                $strQry = "INSERT INTO dog (firstname, lastname, email)VALUES ('John', 'Doe', 'john@example.com')";
//    echo $_POST['hiddenInput'];
//    echo $_POST['PETS'];
    $pet_type = $_POST['hiddenadoptType'];
    $pet_id = $_POST["hiddenadoptId"];
    $adopter_name = $_POST['adopter_name'];
    $adopter_phone = intval($_POST["adopter_phone"]);
    $adopter_address = $_POST["adopter_address"];

    if($pet_type == 'dog'){

      $strQry = "INSERT INTO dogadopt VALUES ('" . $pet_id . "' , '" . $adopter_name . "' ,'" . $adopter_phone . "','" . $adopter_address . "'  )";
      $res = $db->query($strQry);
        $query = "UPDATE dog SET Available=0 WHERE dogId=?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('s', $pet_id );
        $stmt->execute();
        $db->commit();


    }
    elseif ($pet_type=='cat'){

        $strQry = "INSERT INTO catadopt VALUES ('" . $pet_id . "' , '" . $adopter_name . "' ,'" . $adopter_phone . "','" . $adopter_address . "'  )";
        $res = $db->query($strQry);
        $query = "UPDATE cat SET Available=0 WHERE catId=?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('s', $pet_id );
        $stmt->execute();


    }



    $_POST = array();
}



?>

<!---->




<!------------------------------------------------------------------------------------------------------------------->



<?php
if(isset($_GET['testing'])){
    echo $_GET['testing'];
}


?>




<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawfectHouse-Adopt</title>
    <link rel="stylesheet" href="adopt1.css">
    <link rel="stylesheet" href="adopt_this_pet.css">
    <link rel="stylesheet" href="slider.css">


    <!--    <script src="adopt.js"></script>-->
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
              <li><a href="#!">Adopt</a></li>
              <li><a href="Items.php">Shop</a></li>
              <li><a href="disc.php">Question</a></li>
              <li><a href="login.php">Register</a></li>
    
            </ul>
          </nav>
<!--        </div>-->
          </header>


  <!-- ----------------------------beginning section-------------------------------------------- -->
          <section class="begin_sec" >
            <div class="begin">
                <img  id="begin_img" src="./imgs/young-african-american-woman-with-glitter-face-her-dog_273609-10297-removebg-preview.png">
                <p id="adopt_sen" class="text"> Adopt your new <span id="text_span">FRIEND</span></p>
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

                <form action="Adopt.php" method="post" >
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


          <h5 class="section-title h1" id="pawfect_title">PawfectHouse Pets</h5>
        <!-- #3 -->

<!--        <form action="" class="searchform">-->
<!--            <input type="search" class="searchinput">-->
<!--            <i class="fa fa-search searchicon"></i>-->
<!--          </form>-->
        </div>
        <!-- #4 -->
        <a class="button" href="#popup">Add pet for adoption</a>
    

<!-- --------------------------------- popup menu add dog ------------------------------------------- -->

        <div class="container">
            <!-- <a class="button" href="#popup">Open Modal</a> -->
            <div class="popup" id="popup">
              <div class="popup-inner" style="height: 571px">
                <div class="popup__photo">
                  <div class='puppy'>
                    <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/38816/image-from-rawpixel-id-542207-jpeg.png'>
                  </div>
               
                </div> 
                <div class="popup__text">
                  
                  <div class='right-container' style="height: 561px; top: -5px;">
                    <header>
                      <h3>Yay, puppies! Ensure your pup gets the best care!</h3>
                      <div class='set'>
                        <div class='pets-name'>
<!--  ------------------------------------start form----------------------------------->
                            <form action="Adopt.php" method="post" enctype="multipart/form-data">
                          <label for='pets-name'>Name</label>
                          <input id='pets-name' name='pets-name' placeholder="Pet's name" type='text' required>
                        </div>
                          <div class='pets-photo' style="display: flex; margin-bottom: 7px; flex-direction: column; gap: 10px; position: relative; top: 4px; left: 0px;">

                            <input type="file" name="pets-pic" style=" overflow: hidden; height: 36px " required>
                            <input type="file" name="pets-pic2" style=" overflow: hidden; height: 36px" required>

                            <!--                          <label for='pets-upload'>Upload a photo</label>-->
                        </div>

<!--                          <div class='pets-photo' style="display: flex;  flex-direction: column; gap: 20px; position: relative; top: 30px; left: 20px;">-->
<!--                              <input type="file" size="60" name="items-pic"  style=" overflow: hidden; " required />-->
<!---->
<!--                              <input type="file" name="items-pic2"  style=" overflow: hidden;"  required />-->
<!--                              <br>-->
<!--                          </div>-->



                      </div>
                      <div class='set'>
                        <div class='pets-breed'>
                          <label for='pets-breed'>Breed</label>
                          <input id='pets-breed' name='pets-breed' placeholder="Pet's breed" type='text' required>
                        </div>
                        <div class='pets-birthday'>
                          <label for='pets-birthday'>Age</label>
                          <input id='pets-birthday' name='pets-birthday' placeholder="Pet's Age" type='text' required>
                        </div>
                      </div>
                      <div class='set'>
                        <div class='pets-gender'>
                          <label for='pet-gender-female'>Gender</label>
                          <div class='radio-container'>
                            <input checked='' id='pet-gender-female' name='pets-gender' type='radio' value='female'>
                            <label for='pet-gender-female'>Female</label>
                            <input id='pet-gender-male' name='pets-gender'  type='radio' value='male'>
                            <label for='pet-gender-male'>Male</label>
                          </div>
                        </div>
                        <div class='pets-spayed-neutered'>
                          <label for='pet-spayed'>Pet's Type</label>
                          <div class='radio-container'>
                            <input checked='' id='pet-spayed' name='pets-type' type='radio' value='Dog'>
                            <label for='pet-spayed'>Dog</label>
                            <input id='pet-neutered' name='pets-type' type='radio' value='Cat'>
                            <label for='pet-neutered'>Cat</label>
                          </div>
                        </div>
                      </div>
                      <div class='pets-weight'>
                        <label for='pet-weight-0-25'>Description</label>
                        <textarea cols="55" name="pets-description"></textarea>
                      </div>


                        <div style="display: flex; gap: 30px; position: relative; top: 21px;">
                        <div class='pets-birthday'>
                            <label for='pets-birthday'>Email Address</label>
                            <input id='pets-birthday' name='Adder-pet-email' placeholder="Email Address" type='text' required>
                        </div>
                        <input type="submit" id='nextadopt' style="  background: #807182;
                                                        border: 1px solid transparent;
                                                        width: 170px;
                                                        position: relative;
                                                        top: 28px;
                                                        cursor: pointer;
                                                        color: #fff;" value="Send Request">

                        </div>
                        </form>





                    </header>
                    <footer>

                    </footer>
                  </div>
                </div>
                <a class="popup__close" href="#">X</a>
              </div>
            </div>
          </div>
          


<!-- --------------------------------- end popup menu add dog ------------------------------------------- -->

        <!-- --------------------------------- adopt this dog ------------------------------------------- -->


        <?php
        if (isset($_GET['hidden-id'])){


            ?>



            <div class="container">
                <div class="popup" id="adopt">
                    <div class="adopt_popup-inner">
                        <div class="popup__photo">
                            <div class='puppy'>
                                <!--            <img  id="adopt_photo" src='./imgs/2222.jpg'>-->
                                <!--            <div class="infoadopt">Name:</div>-->
                                <!--            <div class="infoadopt">Age:</div>-->
                                <!--            <div class="infoadopt">Vaccine:</div>-->

                                <form action="Adopt.php" method="post">
                                    <div class="dropDownList">
                                        <input type="hidden" id="hiddenInput" name="hiddenInput">

                                        <input type="hidden" id="hiddenadoptType" name="hiddenadoptType" value="<?php echo $_GET['hidden-type'] ?>">
                                        <input type="hidden" id="hiddenadoptId" name="hiddenadoptId" value="<?php echo $_GET['hidden-id'] ?>">



                                        <?php
                                        @$db= new mysqli ('localhost' , 'root' , '' , 'pawfecthouse1');
                                        if(mysqli_connect_errno()){
                                            echo 'error connecting' ;
                                            die();
                                        }
                                        $HID = $_GET['hidden-id'];
                                        $strQry = "select * from dog WHERE dogId=$HID";    //e7teyat
                                        if($_GET['hidden-type'] == 'dog') {
                                            $strQry = "select * from dog WHERE dogId=$HID";

                                        }
                                        elseif ($_GET['hidden-type'] == 'cat'){
                                            $strQry = "select * from cat WHERE catId=$HID";

                                        }
                                        $res = $db -> query($strQry);
                                        for($i=0; $i<$res-> num_rows ;$i++){
                                            $row = $res -> fetch_array();
                                            ?>

<!--                                            <img src="--><?php //$var = $row[10]; echo $var; ?><!--" style="width: 100px; height: 100px;" >-->






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
                                                        <img src="./uploads/<?php $var = $row[6]; echo $var; ?>" style="width: 350px; height:450px;">

                                                    </li>
                                                    <li class="carousel__slide">
                                                        <img src="./uploads/<?php $var = $row[10]; echo $var; ?>" style="width: 350px; height: 450px;">

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


<!--                                        <span>--><?php //echo $_GET['hidden-id'] ?><!--</span>-->
<!--                                        <span>--><?php //echo $_GET['hidden-type'] ?><!--</span>-->

                                        <?php } ?>


                                    </div>

                                    <div id="InfoDiv"  ></div>
                            </div>

                        </div>

                        <div class="adopt_form">
                            <h6 style="position: relative; top: -10px; line-height: 30px; letter-spacing: 3px">Thank you for choosing me,<br> Please Add Your Information</h6>
                            <div class="question">
                                <input type="text" name="adopter_name" required/>
                                <label id="thislabel">
                                    Name

                                </label>
                            </div>

                            <div class="question">
                                <input type="text" name="adopter_phone" required/>
                                <label>Phone Number</label>
                            </div>
                            <div class="question">
                                <input type="text" name="adopter_address" required/>
                                <label>Email Address</label>
                            </div>
                            <button type="submit">Send Adoption Request</button>
                        </div>

                    </form>

                        <a class="popup__close" href="#pawfect_title" >X</a>
                    </div>
                </div>
            </div>

            <script>
                window.open('#adopt','_self');
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

            $flag = 1 ;

        if((isset($_POST['filter']) && isset($_POST['catFilter'])) ){    //here if two checkboxes is checked

            $flag = 0 ;

//            --------------------------display dogs ------------------------------

        $strQry='select * from dog WHERE Accepted=1 AND Available=1';
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
                                    <p><img class=" img-fluid" src="./uploads/<?php $var = $row[6]; echo $var;  ?>" alt="card image"></p>
                                    <h4 class="card-title"> <?php $var = $row[0]; echo $var;  ?></h4>
                                    <p class="card-text">Age:<?php $var = $row[1]; echo $var;  ?> <br> Breed:<?php $var = $row[4]; echo $var;  ?> <br> Gender:<?php $var = $row[5]; echo $var;  ?></p>
                                    <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>

                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title"><?php $var = $row[0]; echo $var;  ?></h4>
                                    <p class="card-text"><?php $var = $row[2]; echo $var;  ?></p>

                                    <form action="Adopt.php" method="get">
                                        <input type="hidden" value="<?php $var = $row[3]; echo $var;  ?>" name="hidden-id">
                                        <input type="hidden" value="dog" name="hidden-type">
                                        <button  id="<?php $var = $row[3]; echo $var;  ?>"  type="submit"  style="background: transparent; border: none;font-size: 18px;color: #007b5e; cursor: pointer; outline: none; ">Adopt this pet</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <?php }

            // -------------------------------------display cats ------------------------------
        $strQry='select * from cat WHERE Accepted=1 AND Available=1';
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
                                    <p><img class=" img-fluid" src="./uploads/<?php $var = $row[6]; echo $var;  ?>" alt="card image"></p>
                                    <h4 class="card-title"> <?php $var = $row[0]; echo $var;  ?></h4>
                                    <p class="card-text">Age:<?php $var = $row[1]; echo $var;  ?> <br> Breed:<?php $var = $row[4]; echo $var;  ?> <br> Gender:<?php $var = $row[5]; echo $var;  ?></p>
                                    <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>

                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title"><?php $var = $row[0]; echo $var;  ?></h4>
                                    <p class="card-text"><?php $var = $row[2]; echo $var;  ?></p>

                                    <form action="Adopt.php" method="get">
                                        <input type="hidden" value="<?php $var = $row[3]; echo $var;  ?>" name="hidden-id">
                                        <input type="hidden" value="cat" name="hidden-type">
                                        <button  id="<?php $var = $row[3]; echo $var;  ?>"  type="submit"  style="background: transparent; border: none;font-size: 18px;color: #007b5e; cursor: pointer; outline: none; ">Adopt this pet</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
<?php
        }
        }
//           if((isset($_POST['filter']) && isset($_POST['catFilter']))){
//               $strQry='SELECT * FROM dog where Accepted=1 and Available=1 UNION ALL SELECT * from cat where Accepted=1 and Available=1';
//
//            }

            elseif(isset($_POST['filter'])){
                $flag = 0 ;

                $strQry='select * from dog WHERE Accepted=1 AND Available=1';
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
                                            <p><img class=" img-fluid" src="./uploads/<?php $var = $row[6]; echo $var;  ?>" alt="card image"></p>
                                            <h4 class="card-title"> <?php $var = $row[0]; echo $var;  ?></h4>
                                            <p class="card-text">Age:<?php $var = $row[1]; echo $var;  ?> <br> Breed:<?php $var = $row[4]; echo $var;  ?> <br> Gender:<?php $var = $row[5]; echo $var;  ?></p>
                                            <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>

                                        </div>
                                    </div>
                                </div>
                                <div class="backside">
                                    <div class="card">
                                        <div class="card-body text-center mt-4">
                                            <h4 class="card-title"><?php $var = $row[0]; echo $var;  ?></h4>
                                            <p class="card-text"><?php $var = $row[2]; echo $var;  ?></p>

                                            <form action="Adopt.php" method="get">
                                                <input type="hidden" value="<?php $var = $row[3]; echo $var;  ?>" name="hidden-id">
                                                <input type="hidden" value="dog" name="hidden-type">
                                                <button  id="<?php $var = $row[3]; echo $var;  ?>"  type="submit"  style="background: transparent; border: none;font-size: 18px;color: #007b5e; cursor: pointer; outline: none; ">Adopt this pet</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./Team member -->
                <?php }



                }


            elseif (isset($_POST['catFilter'])){
                $flag = 0 ;

                $strQry='select * from cat WHERE Accepted=1 AND Available=1';
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
                                    <p><img class=" img-fluid" src="./uploads/<?php $var = $row[6]; echo $var;  ?>" alt="card image"></p>
                                    <h4 class="card-title"> <?php $var = $row[0]; echo $var;  ?></h4>
                                    <p class="card-text">Age:<?php $var = $row[1]; echo $var;  ?> <br> Breed:<?php $var = $row[4]; echo $var;  ?> <br> Gender:<?php $var = $row[5]; echo $var;  ?></p>
                                    <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>

                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title"><?php $var = $row[0]; echo $var;  ?></h4>
                                    <p class="card-text"><?php $var = $row[2]; echo $var;  ?></p>

                                    <form action="Adopt.php" method="get">
                                        <input type="hidden" value="<?php $var = $row[3]; echo $var;  ?>" name="hidden-id">
                                        <input type="hidden" value="cat" name="hidden-type">
                                        <button  id="<?php $var = $row[3]; echo $var;  ?>"  type="submit"  style="background: transparent; border: none;font-size: 18px;color: #007b5e; cursor: pointer; outline: none; ">Adopt this pet</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <?php
            }
            }


        if($flag==1){

            //            --------------------------display dogs ------------------------------

        $strQry='select * from dog WHERE Accepted=1 AND Available=1';
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
                                    <p><img class=" img-fluid" src="./uploads/<?php $var = $row[6]; echo $var;  ?>" alt="card image"></p>
                                    <h4 class="card-title"> <?php $var = $row[0]; echo $var;  ?></h4>
                                    <p class="card-text">Age:<?php $var = $row[1]; echo $var;  ?> <br> Breed:<?php $var = $row[4]; echo $var;  ?> <br> Gender:<?php $var = $row[5]; echo $var;  ?></p>
                                    <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>

                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title"><?php $var = $row[0]; echo $var;  ?></h4>
                                    <p class="card-text"><?php $var = $row[2]; echo $var;  ?></p>

                                    <form action="Adopt.php" method="get">
                                        <input type="hidden" value="<?php $var = $row[3]; echo $var;  ?>" name="hidden-id">
                                        <input type="hidden" value="dog" name="hidden-type">
                                        <button  id="<?php $var = $row[3]; echo $var;  ?>"  type="submit"  style="background: transparent; border: none;font-size: 18px;color: #007b5e; cursor: pointer; outline: none; ">Adopt this pet</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <?php }

            // -------------------------------------display cats ------------------------------
        $strQry='select * from cat WHERE Accepted=1 AND Available=1';
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
                                    <p><img class=" img-fluid" src="./uploads/<?php $var = $row[6]; echo $var;  ?>" alt="card image"></p>
                                    <h4 class="card-title"> <?php $var = $row[0]; echo $var;  ?></h4>
                                    <p class="card-text">Age:<?php $var = $row[1]; echo $var;  ?> <br> Breed:<?php $var = $row[4]; echo $var;  ?> <br> Gender:<?php $var = $row[5]; echo $var;  ?></p>
                                    <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>

                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title"><?php $var = $row[0]; echo $var;  ?></h4>
                                    <p class="card-text"><?php $var = $row[2]; echo $var;  ?></p>

                                    <form action="Adopt.php" method="get">
                                        <input type="hidden" value="<?php $var = $row[3]; echo $var;  ?>" name="hidden-id">
                                        <input type="hidden" value="cat" name="hidden-type">
                                        <button  id="<?php $var = $row[3]; echo $var;  ?>"  type="submit"  style="background: transparent; border: none;font-size: 18px;color: #007b5e; cursor: pointer; outline: none; ">Adopt this pet</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
<?php
        }
        }
        ?>

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