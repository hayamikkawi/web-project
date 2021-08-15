<?php
session_start();
$ff=true;
if (isset($_SESSION['member'])) {
    if ($_SESSION['member'] != 1) {
        $ff = false;
    }
}
else{
    $ff=false;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawfectHouse-HomePage</title>
    <!--Ion Icons-->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aldrich&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css" >
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@300&display=swap" rel="stylesheet">
<!------------------------------------------------------------------------------------------------>
<!-- for counter up -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> -->
<!------------------------------------------------------------------------------------------------>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Finger+Paint&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Love+Ya+Like+A+Sister&display=swap" rel="stylesheet">
<script>
    function loggingOut(){
        var xhttpL = new XMLHttpRequest();
        xhttpL.open("Get", "logOut.php", true);
        xhttpL.setRequestHeader("Content-Type", "application/json");
        xhttpL.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Response
                var response = this.responseText;

            }
        };

        xhttpL.send();
    }
</script>


</head>




<body>
    <script src="js/jquery.min.js"></script>

    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
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

<!----------------------------------header video------------------------------------------------->

          <section class="header_video">
              <video autoplay loop class="video-background" muted plays-inline >
                    <source src="imgs/video.mp4" type="video/mp4">
              </video>
<!------------------------------------profile window----------------------------------------------->
<div class="profilecontainer" style="display:none;" id="pp1">
  <div class="email" onclick="this.classList.add('expand')">
    <div class="from">
      <div class="from-contents">
        <div class="avatar me"></div>
        <div class="name"><?php if ($ff){echo $_COOKIE['username'];}?></div>
      </div>
    </div>
    <div class="to">
      <div class="to-contents">
        <div class="top">
          <div class="avatar-large me"></div>
          <div class="name-large"><?php if ($ff){echo $_COOKIE['username'];}?></div>
          <div class="x-touch" onclick="document.querySelector('.email').classList.remove('expand');event.stopPropagation();">
            <div class="x">
              <div class="line1"></div>
              <div class="line2"></div>
            </div>
          </div>
        </div>
        <div class="bottom">
            <div class="row">
                <svg class="Out">

                </svg>
                <i class="fa fa-lock" style="font-size:20px;"></i>
                <div class="link"><a href="index2.php" onclick="loggingOut();">Log Out</a></div>
            </div>

            <!--          <div class="row">-->
<!--            <svg class="medium" viewBox="0 0 24 24">-->
<!--             -->
<!--            </svg>-->
<!--            <i class="fa fa-key" style="font-size:20px;"></i>-->

<!--            <div class="link"><a href="#">Change Password</a></div>-->
<!--          </div>-->

<!--          <div class="row">-->
<!--            <svg class="Out">-->
<!--             -->
<!--            </svg>-->
<!--            <i class="fa fa-lock" style="font-size:20px;"></i>-->
<!--            <div class="link"><a href="#">Log Out</a></div>-->
<!--          </div>-->



        </div>
      </div>
    </div>
  </div>
</div>
              <?php
              if($ff){?>
              <script>
                  document.getElementById('pp1').style.display='block';
              </script>

             <?php }
?>
<!-------------------------------end profile window----------------------------->

              <div class="text">
                <p>
                  Unconditional <span>love<br></span> is as close as<br> your nearest shelter!
                </p>
                <p id="paragraph">In PawfectHouse We are here for you and for your Pets!</p>
               
              </div>
              <!-- join button -->
              <div id="btn" onclick=" location.replace('login.php');"><span class="noselect">Join Us</span><div id="circle"></div></div>
 <!----------------------social media buttons------------------------------------------------->

              <div class="social-container">
                <ul class="social-icons">
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-codepen"></i></a></li>
                </ul>
              </div>
          </section>

          
          
         

<!-- !------------------------------------------------------------------------------------------------> 

<!-------------------------------fancy wide cards------------------------------------------------>
<div class="container-fluid">
  <div class="col-lg-6 col-lg-offset-0 col-md-6 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
    <figure>
      <div class="fancymedia" style="background-image:url(imgs/bg2.jpg)"></div>
      <figcaption>
        <svg viewBox="0 0 200 200" version="1.1" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <mask id="mask" x="0" y="0" width="100%" height="100%">
              <rect id="alpha" x="0" y="0" width="100%" height="100%"></rect>
              <text class="title" dx="50%" dy="2.5em">KNOW</text>
              <text class="title" dx="50%" dy="3.5em">ABOUT</text>
              <text class="title" dx="50%" dy="4.5em">US</text>
            </mask>
          </defs>
          <rect id="base" x="0" y="0" width="100%" height="100%"></rect>
        </svg>
        <div class="fancybody">
          <p>Discover our shop, get new stuff for your pet or send your question to our professional veterinarians.</p>
        </div>
      </figcaption><a href="#"></a>
    </figure>
  </div>
  <div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
    <figure>
      <div class="fancymedia" style="background-image:url(imgs/portrait-woman-.jpg)"></div>
      <figcaption>
        <svg viewBox="0 0 200 200" version="1.1" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <mask id="mask" x="0" y="0" width="100%" height="100%">
              <rect id="alpha" x="0" y="0" width="100%" height="100%"></rect>
              <text class="title" dx="50%" dy="2.5em">JOIN</text>
              <text class="title" dx="50%" dy="3.5em">EVERY</text>
              <text class="title" dx="50%" dy="4.5em">MOMENT</text>
            </mask>
          </defs>
          <rect id="base" x="0" y="0" width="100%" height="100%"></rect>
        </svg>
        <div class="fancybody">
          <p>Adopt your new pet now and make your house a Pawfect house.</p>
        </div>
      </figcaption><a href="#"></a>
    </figure>
  </div>
  
</div>


  <!-- !------------------------------------dividor----------------------------------------------> 
<div class="dividor">
        <div class="skew-c"></div>
        <div class="colour-block">
          <h1>Join our family</h1>
          <p> Every animal deserves the chance to leave Pawprints on someone's heart. Be a part of our family, adopt your next best fiend on Pawfect House.</p>
        </div>
        
      </div>


<!-- !-----------------------------------counter up--------------------------------------------------> 

 
        
   <!-- <div class="grey-bg c-no container-fluid" class="out">
           
    <div class="container" class="out">
      <span id="counter_title"><span id="pawspan">PawfectHouse</span> Sad Numbers</span>
        <div class="row" id="counter" class="out">

            <div class="col-sm-4 counter-Txt counter"> 
              <i class="fa fa-paw fa-2x" aria-hidden="true"></i>

             <span class="counter-value" data-count="400">0</span> 
             <p class="count-text ">Homeless Pets</p>
            </div>

              <div class="col-sm-4 counter-Txt counter"> 
                <i class="fa fa-heartbeat fa-2x" aria-hidden="true"></i>
                 <span class="counter-value" data-count="255">0</span> 
                 <p class="count-text ">Die Every 3 months</p>
                </div>

              <div class="col-sm-4 counter-Txt margin-bot-35  counter"> 
                <i class="fa fa-medkit fa-2x" aria-hidden="true"></i>
                 <span class="counter-value" data-count="302">0</span> 
                 <p class="count-text ">Ill pets</p>
                </div>
          </div>
      </div>
  </div> -->

<!-------------------------------info cards------------------------------------------------>
<div class="info">
<div class="blog-card c1">
  <div class="meta">
    <div class="photo" style="background-image: url(imgs/bb3.jpg)"></div>
    <ul class="details">
      <!-- <li class="author"><a href="#">John Doe</a></li> -->
      <!-- <li class="date">Aug. 24, 2015</li> -->
      <li class="tags">
        <ul>
          <li><a href="Adopt.php">Details</a></li>
          <li><a href="Adopt.php">Dogs</a></li>
          <li><a href="Adopt.php">Cats</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="description">
    <h1>Adopt a new friend</h1>
    <h2>your fluffy friend is waiting </h2>
    <p>Find the pet that best matches your needs and send an adoption request now!!</p>
    <p class="read-more">
      <a href="#">Read More</a>
    </p>
  </div>
</div>

<div class="blog-card alt c2">
  <div class="meta">
    <div class="photo" style="background-image: url(imgs/items.jpg)"></div>
    <ul class="details">
      <!-- <li class="author"><a href="#">Jane Doe</a></li> -->
      <!-- <li class="date">July. 15, 2015</li> -->
      <li class="tags">
        <ul>
          <li><a href="Items.php">Details</a></li>
          <li><a href="Items.php">Dogs items</a></li>
          <li><a href="Items.php">Cats items</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="description">
    <h1>Shop Animal's Products</h1>
    <h2>Discover our shop now</h2>
    <p>Spoil your pet with our cute, trendy toys and products.</p>
    <p class="read-more">
      <a href="#">Read More</a>
    </p>
  </div>
</div>


<div class="blog-card c3">
  <div class="meta">
    <div class="photo" style="background-image: url(imgs/vet.jpg)"></div>
    <ul class="details">
      <!-- <li class="author"><a href="#">John Doe</a></li> -->
      <!-- <li class="date">Aug. 24, 2015</li> -->
      <li class="tags">
        <ul>
          <li><a href="disc.php">Details</a></li>
          <li><a href="disc.php">Dogs</a></li>
          <li><a href="disc.php">Cats</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="description">
    <h1>Get medical help</h1>
    <h2>Take care of your pet's health</h2>
    <p> Your pet has a health problem? Feel free to contact our veterinarian. </p>
    <p class="read-more">
      <a href="#">Read More</a>
    </p>
  </div>
</div>


<div class="blog-card alt c4">
  <div class="meta">
    <div class="photo" style="background-image: url(imgs/adopt2.jpg)"></div>
    <ul class="details">
      <!-- <li class="author"><a href="#">Jane Doe</a></li> -->
      <!-- <li class="date">July. 15, 2015</li> -->
      <li class="tags">
        <ul>
          <li><a href="Adopt.php">Details</a></li>
          <li><a href="Adopt.php">Dogs</a></li>
          <li><a href="Adopt.php">Cats</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="description">
    <h1>Add animals for adoption</h1>
    <h2>Get benefit and benefit others</h2>
    <p>If you know a pet that needs a shelter, don't hesitate offer it for adoption.</p>
    <p class="read-more">
      <a href="#">Read More</a>
    </p>
  </div>
</div>

</div>


<!------------------------------------Customers---------------------------------------------->
<div class="mydiv" id="teams">
    <section class="py-5 text-center"  style="height: 200px;">
      <div class="container py-4 text-white" style="height: 100px;">
          <header>
              <h1 class="display-4">PawfectHouse Team</h1>
              <p class="font-italic mb-1 di">Meet Our Team</p>
              
          </header>
      </div>
  </section>
  
  
  <section class="pb-5">
      <div class="container" >
          <div class="row">
              <div class="col-lg-10 col-xl-8 mx-auto">
                  <div class="p-5 bg-white shadow rounded" style="height: 250px;">
                      <!-- Bootstrap carousel-->
                      <div class="carousel slide" id="carouselExampleIndicators" data-ride="carousel" style="height:200px; ">
                          <!-- Bootstrap carousel indicators [nav] -->
                          <ol class="carousel-indicators mb-0">
                              <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          </ol>
  
  
                          <!-- Bootstrap inner [slides]-->
                          <div class="carousel-inner px-5 pb-4">
                              <!-- Carousel slide-->
                              <div class="carousel-item active">
                                  <div class="media"><img class="rounded-circle img-thumbnail" src="./imgs/Seema.jpg" alt="" width="75">
                                      <div class="media-body ml-3">
                                          <blockquote class="blockquote border-0 p-0">
                                              <p class="font-italic lead"> <i class="fa fa-quote-left mr-3 text-success"></i>The reason I dedicate myself to helping animals so much is because there are already so many people dedicated to hurting them.</p>
                                              <footer class="blockquote-footer">Seema Sbouh.
                                                  <!--<cite title="Source Title">Source Title</cite>-->
                                              </footer>
                                          </blockquote>
                                      </div>
                                  </div>
                              </div>
  
                              <!-- Carousel slide-->
                              <div class="carousel-item">
                                  <div class="media"><img class="rounded-circle img-thumbnail" src="./imgs/Haya.jpg" alt="" width="75">
                                      <div class="media-body ml-3">
                                          <blockquote class="blockquote border-0 p-0">
                                              <p class="font-italic lead"> <i class="fa fa-quote-left mr-3 text-success"></i>The journey of life is sweeter when traveled with a pet.</p>
                                              <footer class="blockquote-footer">Haya Mikkawi.
                                                  <!--<cite title="Source Title">Source Title</cite>-->
                                              </footer>
                                          </blockquote>
                                      </div>
                                  </div>
                              </div>
  
                              <!-- Carousel slide-->
                              <div class="carousel-item">
                                  <div class="media"><img class="rounded-circle img-thumbnail" src="./imgs/Rand.jpg" alt="" width="75">
                                      <div class="media-body ml-3">
                                          <blockquote class="blockquote border-0 p-0">
                                              <p class="font-italic lead"> <i class="fa fa-quote-left mr-3 text-success"></i>Never believe that animals suffer less than humans. Pain is the same for them that it is for us. Even worse, because they cannot help themselves.</p>
                                              <footer class="blockquote-footer">Rand Ghannam
                                                  <cite title="Source Title">Our veterinarian</cite>
                                              </footer>
                                          </blockquote>
                                      </div>
                                  </div>
                              </div>
                          </div>
  
  
                          <!-- Bootstrap controls [dots]-->
                          <a class="carousel-control-prev width-auto" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <i class="fa fa-angle-left text-dark text-lg"></i>
                              <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next width-auto" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <i class="fa fa-angle-right text-dark text-lg"></i>
                              <span class="sr-only">Next</span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>


 <!------------------------------------Team---------------------------------------------->




<!-- <div class="container">
  <div class="row">
    
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="https://picsum.photos/130/130?image=839">
        </div>
        <div class="team-content">
          <h3 class="name">Patricia Knott</h3>
          <h4 class="title">Web Developer</h4>
        </div>
        <ul class="social">
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-facebook" aria-hidden="true"></a></li>
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-twitter" aria-hidden="true"></a></li>
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-google-plus" aria-hidden="true"></a></li>
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-linkedin" aria-hidden="true"></a></li>
        </ul>
      </div>
    </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="https://picsum.photos/130/130?image=856">
        </div>
        <div class="team-content">
          <h3 class="name">Justin Ramos</h3>
          <h4 class="title">Web Developer</h4>
        </div>
        <ul class="social">
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-facebook" aria-hidden="true"></a></li>
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-twitter" aria-hidden="true"></a></li>
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-google-plus" aria-hidden="true"></a></li>
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-linkedin" aria-hidden="true"></a></li>
        </ul>
      </div>
    </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="https://picsum.photos/130/130?image=836">
        </div>
        <div class="team-content">
          <h3 class="name">Mary Huntley</h3>
          <h4 class="title">Web Developer</h4>
        </div>
        <ul class="social">
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-facebook" aria-hidden="true"></a></li>
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-twitter" aria-hidden="true"></a></li>
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-google-plus" aria-hidden="true"></a></li>
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-linkedin" aria-hidden="true"></a></li>
        </ul>
      </div>
    </div>
  </div>
</div> -->

 <!------------------------------------Gallery---------------------------------------------->

    <div class="mycontainer">

     <div class="box">
    <img src="./imgs/gal1.jpeg">
    <!-- <span>CSS</span> -->
  </div>
  <div class="box">
    <img src="./imgs/gal3.jpeg">
    <!-- <span>Image</span> -->
  </div>
  <div class="box">
    <img src="./imgs/gal2.jpeg">
    <!-- <span>Hover</span> -->
  </div>
  <div class="box">
    <img src="./imgs/gal4.jpeg">
    <!-- <span>Effect</span> -->
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



    <script src="js/index2.js"></script>

</body>
</html>