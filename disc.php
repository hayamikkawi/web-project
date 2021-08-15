<?php
$flag=false;
$flag2=false;
session_start();
if (isset($_SESSION['member'])){
    if ($_SESSION['member']!=1)
    header("location: login.php");
}
else{
    header("location: login.php");
}
if (isset($_POST['name'])&& isset($_POST['email']) && isset($_POST['phone'])&&isset($_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $number = $_POST['phone'];
    if ($name != "" && $email!="" && $message!=""&& $number!="") {

        $to = 'test@gmail.com';
        $subject = 'A question from one of Pawfect house friends';
        $headers = "From: " . $name . " <" . $email . "> Phone Number" . $number . "\r\n";
        $send_email = mail($to, $subject, $message, $headers);

        echo ($send_email) ? $flag = true : $flag = false;
    }
    else {
        $flag2=true;
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/3420af7598.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"  href="discuss.css" type="text/css">
     <title>Questions</title>
    <script type="text/javascript">
        (function($) {
            'use strict';

            jQuery(document).on('ready', function(){

                $('a.page-scroll').on('click', function(e){
                    var anchor = $(this);
                    $('html, body').stop().animate({
                        scrollTop: $(anchor.attr('href')).offset().top - 50
                    }, 1500);
                    e.preventDefault();
                });

            });


        })(jQuery);
    </script>
</head>
<body>

<div class="container1">

    <header>

        <!-----------------------------------menu-------------------------------------------------->

        <nav>
            <ul class="menu">
                <li><a href="index2.php">Home</a></li>
                <li><a href="Adopt.php">Adopt</a></li>
                <li><a href="Items.php">Shop</a></li>
                <li><a href="disc.php">Questions</a></li>
                <li><a href="login.php">Register</a></li>

            </ul>
        </nav>

    </header>


    <div class="row">

    </div>
    <div class="row">
        <h1>Send your question</h1>
        <h4 style="text-align:center">We'd love to help you take care of your pet!</h4>
    </div>
    <form method="post" action="disc.php" class="myform">
    <div class="row input-container">
        <div class="col-xs-12">
            <div class="styled-input wide">
                <input type="text" name="name" id="name" />
                <label>Name</label>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="styled-input">
                <input type="email" name="email" id="email" />
                <label>Email</label>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="styled-input" style="float:right;">
                <input type="number" name="phone" id="phone"  />
                <label>Phone Number</label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="styled-input wide">
                <textarea name="message" id="message" ></textarea>
                <label>Question</label>
            </div>
        </div>

        <div class="col-xs-12">
            <input type="submit" value="Send My Message" class="btn-lrg submit-btn" onclick="verify();">
        </div>
    </div>
        <?php if ($flag)

       echo"<p  style='color: green; text-align: center; font-size: 20px;' ><i class='fas fa-check-circle'></i>&nbsp; Your Email was successfully sent!</p>";?>
       <?php if ($flag2)
       echo" <p id='errpar' style='color: darkred; text-align: center; font-size: 20px;'><i class='fas fa-exclamation-circle '></i>Please fill all fields!</p>";?>
    </form>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title text-center wow zoomIn">
                <h1 id="h11">Frequently Asked Questions</h1>
                <span></span>
                <p style="color: white">Our Frequently Asked Questions here.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Does my pet have a food allergy?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <p>  "Only about 10% of pets have real food allergies," Nelson said. "The other 90% of itchy, uncomfortable pets are typically some sort of inhaled allergen just like us, or a flea allergy." </p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Why does my pet's breath smell so bad?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <p>
                                The most likely explanation for a pet's stinky breath is dental disease. By the age of three, 70% of cats and 80% of dogs have some form of dental disease.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Why does my dog eat grass?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <p>
                                Dogs eat grass to satisfy dietary needs or to provide treatment for themselves when feeling sick. Usually, you don’t have to worry about any harm coming to your pet if he eats grass, but as a good pet owner you do want to ask yourself “why” if you see him doing so! Perhaps the diet he is currently on is not providing him the nutrients he needs; so he is looking for those needs to be met with the grass that he eats.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Should I brush my pet’s teeth?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="panel-body">
                            <p>It is very important to brush your pet’s teeth on a regular basis, using pet toothbrushes and pet toothpaste of course! You may want to know why teeth cleaning is so important. See the facts below to further understand why your pet needs his pearly whites in mint condition!

                                -Signs of teeth and gum diseases begin occurring in 80% of dogs after reaching the age of 3. Cats also face risk of developing dental disease, the most common of these being Periodontal disease. <br>

                                -Because of the facts above, veterinarians recommend yearly professional cleanings, especially as your pet gets older, along with daily brushing by pet owners to combat this. <br>
                                -The serious effects of dental problems can be prevented by proactive, preventative care. Help your pet with his beautiful smile; in doing so you will be promoting overall good health!
                       </p>
                        </div>
                    </div>
                </div>

            </div>
        </div><!--- END COL -->
    </div><!--- END ROW -->
</div>

<div class="row dark-blue " >
    <div>
        <svg id="" preserveAspectRatio="xMidYMax meet" class="svg-separator sep3" viewBox="0 0 1600 100" style="display: block;" data-height="100">
            <path class="" style="opacity: 1;fill: white;" d="M-40,71.627C20.307,71.627,20.058,32,80,32s60.003,40,120,40s59.948-40,120-40s60.313,40,120,40s60.258-40,120-40s60.202,40,120,40s60.147-40,120-40s60.513,40,120,40s60.036-40,120-40c59.964,0,60.402,40,120,40s59.925-40,120-40s60.291,40,120,40s60.235-40,120-40s60.18,40,120,40s59.82,0,59.82,0l0.18,26H-60V72L-40,71.627z"></path>
            <path class="" style="opacity: 1;fill:white;" d="M-40,83.627C20.307,83.627,20.058,44,80,44s60.003,40,120,40s59.948-40,120-40s60.313,40,120,40s60.258-40,120-40s60.202,40,120,40s60.147-40,120-40s60.513,40,120,40s60.036-40,120-40c59.964,0,60.402,40,120,40s59.925-40,120-40s60.291,40,120,40s60.235-40,120-40s60.18,40,120,40s59.82,0,59.82,0l0.18,14H-60V84L-40,83.627z"></path>
            <path class="" style="fill: white;" d="M-40,95.627C20.307,95.627,20.058,56,80,56s60.003,40,120,40s59.948-40,120-40s60.313,40,120,40s60.258-40,120-40s60.202,40,120,40s60.147-40,120-40s60.513,40,120,40s60.036-40,120-40c59.964,0,60.402,40,120,40s59.925-40,120-40s60.291,40,120,40s60.235-40,120-40s60.18,40,120,40s59.82,0,59.82,0l0.18,138H-60V96L-40,95.627z"></path></svg>
    </div>
</div>
<div class="try" style="background-color: white; margin: 0; padding :0;">
    <h1>Tips for becoming the best pet owner!</h1>
    <div class="row" style="margin: 5%;">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="./imgs/portrait-woman-with-her-beautiful-dog_1157-36171.jpg" alt="...">
                <div class="caption">
                    <h3>Don't leave them alone for a long time</h3>
                    <p>Your pets can function independently, but it's not a good idea to leave them home alone frequently. It's possible for both dogs and cats to develop separation anxiety, which can lead to destructive or attention-grabbing behaviors. </p>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="./imgs/walking.jpg" alt="...">
                <div class="caption">
                    <h3>Going for walks and exercising your pet</h3>
                     <p> According to the American Veterinary Medical Association, about 35% of pets are overweight or obese, and that can lead to respiratory disease, diabetes, and liver disease. Regular exercise can prevent health issues</p>


                </div>
            </div>
        </div>






        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="./imgs/toys.jpg" alt="...">
                <div class="caption">
                    <h3>Buy safe toys for them</h3>
                    <p>
                        Your pet can potentially choke on rawhide chews or bones if they swallow pieces that are too large. Don't buy toys that are too small because they could be eaten. Rotating toys can keep your pet intrigued while preserving the toys they have. spoil your pet because they deserve it!
                    </p>
                </div>
            </div>
        </div>



</div>



    <div class="row" style="margin: 5%;">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="./imgs/mess.jpg" alt="...">
                <div class="caption">
                    <h3>Clean up after their messes</h3>
<p>
    Cleaning up the yard or litter box after your pet goes to the bathroom is essential for keeping your home clean. Dogs are generally motivated to go to the bathroom in places they've already relieved themselves, while cats tend to avoid their litter box entirely if it is too dirty.
</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="./imgs/walking.jpg" alt="...">
                <div class="caption">
                    <h3>Going for walks and exercising your pet</h3>
                    <p> According to the American Veterinary Medical Association, about 35% of pets are overweight or obese, and that can lead to respiratory disease, diabetes, and liver disease. Regular exercise can prevent health issues</p>


                </div>
            </div>
        </div>






        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="./imgs/toys.jpg" alt="...">
                <div class="caption">
                    <h3>Buy safe toys for them</h3>
                    <p>
                        Your pet can potentially choke on rawhide chews or bones if they swallow pieces that are too large. Don't buy toys that are too small because they could be eaten. Rotating toys can keep your pet intrigued while preserving the toys they have. spoil your pet because they deserve it!
                    </p>
                </div>
            </div>
        </div>



    </div>
</div>

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


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>
<!------------------------------------------------------------------------------------------------>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>