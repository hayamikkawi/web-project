<?php
session_start();
if (isset($_SESSION['member'])){
    if ($_SESSION['member']!=1)
        header("location: login.php");
}
else{
    header("location: login.php");
}
@$db = new mysqli('localhost', 'root', '', 'pawfecthouse1');
if (mysqli_connect_errno()) {
    echo "error connecting to the database";
    die();
}
$queryC="Select * from cat where Accepted= '0'; ";
$catRes= $db->query($queryC);
$total=0;
$total+= $catRes->num_rows;
$queryD= "Select * from dog where Accepted='0'";
$dogRes= $db->query($queryD);
$total+= $dogRes->num_rows;
$queryI="select * from items where Accepted='0'";
$itemRes= $db->query($queryI);
$totalI= $itemRes->num_rows;
$queryR="select * from catadopt";
$resRes=$db->query($queryR);
$totalR= $resRes->num_rows;
$queryR="select * from dogadopt";
$resRes2=$db->query($queryR);
$totalR+= $resRes2->num_rows;
$queryR="select * from customer";
$resRes3=$db->query($queryR);
$cusTotal= $resRes3->num_rows;
$catPer=0;
$dogPer=0;
if ($totalR!=0){
    $catPer= $resRes->num_rows/ $totalR;
    $dogPer= $resRes2->num_rows/$totalR;
}
$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <link rel="stylesheet" href="Astyle.css">
    <script type="text/javascript">
        function logOut(){
            location.replace("login.php");
        }
        function removeFromDb(v,t){
            let i = v.id.substring(t.length, v.length);
            var xhttp = new XMLHttpRequest();
            xhttp.open("Get", "accept2.php?id="+i+"&type="+t, true);
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Response
                    var response = this.responseText;

                }
            };

            xhttp.send();
        }
        function changeAvailable(v,t){
            let i = v.id.substring(t.length, v.length);
            var xhttp = new XMLHttpRequest();
            xhttp.open("Get", "deny2.php?id="+i+"&type="+t, true);
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Response
                    var response = this.responseText;

                }
            };

            xhttp.send();
        }

        function acceptBtn(v,t) {

                let i = v.id.substring(1,v.length);
                var xhttp = new XMLHttpRequest();
                   xhttp.open("Get", "accept.php?id="+i+"&type="+t, true);
                   xhttp.setRequestHeader("Content-Type", "application/json");
                   xhttp.onreadystatechange = function() {
                       if (this.readyState == 4 && this.status == 200) {
                           // Response
                           var response = this.responseText;

                       }
                   };

                   xhttp.send();



            document.getElementById(v.id).style.display="none";
        }

        function denyBtn(v,t) {
            let x= v.id;
            var xhttp = new XMLHttpRequest();
            xhttp.open("Get", "denny.php?id="+x+"&type="+t, true);
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Response
                    var response = this.responseText;

                }
            };

            xhttp.send();

            document.getElementById(v.id).style.display="none";
          }


    </script>
</head>
<body>
<div style="width: 100%; height: 7px; background-color: rgba(89, 180, 211, 0.44)"></div>

<!-- Begin .page-heading -->
<div class="page-heading">
    <div class="media clearfix">
        <div class="media-left pr30">
            <a href="#">
                <img class="media-object mw150" src="https://eshendetesia.com/images/user-profile.png" alt="...">
            </a>
        </div>
        <div class="media-body va-m">
            <h2 class="media-heading"><?php echo $_COOKIE['adminsName'];?>
                <small> - Profile</small>
            </h2>
            <p class="lead"> Welcome <?php echo $_COOKIE['adminsName'];?>, Here you find the latest adoption requests in addition to items' requests. <br>
            Please Accept/ Deny requests according to what you find suitable.</p>


        </div>
        <button class="log_button" onclick="logOut();">
        <span class="logout_span" >LogOut</span>
        <img class="logout" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTMyMC44MjAzMTIgMzcxLjc5Mjk2OWgzOS45ODA0Njl2NzkuOTU3MDMxYzAgMzMuMDY2NDA2LTI2LjkwMjM0MyA1OS45NjQ4NDQtNTkuOTY4NzUgNTkuOTY0ODQ0aC0yNDAuODY3MTg3Yy0zMy4wNjI1IDAtNTkuOTY0ODQ0LTI2Ljg5ODQzOC01OS45NjQ4NDQtNTkuOTY0ODQ0di0zOTEuNzg1MTU2YzAtMzMuMDYyNSAyNi45MDIzNDQtNTkuOTY0ODQ0IDU5Ljk2NDg0NC01OS45NjQ4NDRoMjQwLjg2NzE4N2MzMy4wNjY0MDcgMCA1OS45Njg3NSAyNi45MDIzNDQgNTkuOTY4NzUgNTkuOTY0ODQ0djc5Ljk1NzAzMWgtMzkuOTgwNDY5di03OS45NTcwMzFjMC0xMS4wMTk1MzItOC45NjQ4NDMtMTkuOTg4MjgyLTE5Ljk4ODI4MS0xOS45ODgyODJoLTI0MC44NjcxODdjLTExLjAxOTUzMiAwLTE5Ljk4ODI4MiA4Ljk2ODc1LTE5Ljk4ODI4MiAxOS45ODgyODJ2MzkxLjc4NTE1NmMwIDExLjAxOTUzMSA4Ljk2ODc1IDE5Ljk4ODI4MSAxOS45ODgyODIgMTkuOTg4MjgxaDI0MC44NjcxODdjMTEuMDIzNDM4IDAgMTkuOTg4MjgxLTguOTY4NzUgMTkuOTg4MjgxLTE5Ljk4ODI4MXptOTYuOTQ5MjE5LTIxMC4xNjc5NjktMjguMjY5NTMxIDI4LjI2OTUzMSA0NS45NzI2NTYgNDUuOTc2NTYzaC0yNTguNTcwMzEydjM5Ljk3NjU2MmgyNTguNTcwMzEybC00NS45NzI2NTYgNDUuOTcyNjU2IDI4LjI2OTUzMSAyOC4yNjk1MzIgOTQuMjMwNDY5LTk0LjIzMDQ2OXptMCAwIiBmaWxsPSIjNTliNGQzIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+PC9nPjwvc3ZnPg==" />
        </button>
    </div>
</div>

<!-- Demo header-->
<section class="py-5 header" style="height:100%;">
    <div class="container py-4" >
        <div class="row">
            <div class="col-md-3">
                <!-- Tabs nav -->
                <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a  class="nav-link mb-3 p-3 shadow active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">
                        <i class="fa fa-paw mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">Adoption Requests</span>
                        <span class="badge badge-secondary"><?php echo $total?></span>
                    </a>

                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                        <i class="fa fa-bell mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">Products Requests</span>
                        <span class="badge badge-secondary"><?php echo $totalI?></span>
                    </a>

                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages2-tab" data-toggle="pill" href="#v-pills-messages2" role="tab" aria-controls="v-pills-messages2" aria-selected="false">
                        <i class="fa fa-circle mr-2" aria-hidden="true" ></i>
                        <span class="font-weight-bold small text-uppercase">Adoption Responses</span>
                        <span class="badge badge-secondary"><?php echo $totalR?></span>
                    </a>

                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages3-tab" data-toggle="pill" href="#v-pills-messages3" role="tab" aria-controls="v-pills-messages3" aria-selected="false">
                        <i class="fa fa-table mr-2" aria-hidden="true"></i>
                        <span class="font-weight-bold small text-uppercase">Products analysis </span>

                    </a>
                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-charts-tab" data-toggle="pill" href="#v-pills-charts" role="tab" aria-controls="v-pills-charts" aria-selected="false">
                        <i class="fa fa-pie-chart mr-2" aria-hidden="true"></i>
                        <span class="font-weight-bold small text-uppercase">Charts </span>

                    </a>



                </div>
            </div>


            <div class="col-md-9">
                <!-- Tabs content -->
                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane fade shadow rounded  show active p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">


                                    <!-- Team -->
                                    <section id="pets2" class="pb-5">
                                        <div class="container">
                                            <div class="row">
                                                <?php for($i=0; $i<$catRes->num_rows; $i++){
                                                $row= $catRes->fetch_assoc();?>

                                                <!-- Team member -->
                                                <div class="col-xs-12 col-sm-6 col-md-6" id="C<?php echo $row['catId'];?>">
                                                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');" >
                                                        <div class="mainflip"  >
                                                            <div class="frontside">
                                                                <div class="card" >
                                                                    <div class="card-body text-center">
                                                                        <p><img class=" img-fluid" src="./uploads/<?php echo $row['pic']?>" alt="card image"></p>
                                                                        <h4 class="card-title"><?php echo $row['name']; ?></h4>
                                                                        <p class="card-text">Breed: <?php echo $row['breed'];?><br>Gender: <?php echo $row['gender']; ?>
                                                                            <br> Age: <?php echo $row['age'] ; ?><br> Description: <?php echo $row['description'];?>

                                                                        </p>
                                                                        <button class="btn btn-outline-success" onclick="acceptBtn(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode,'cat')">Accept</button>
                                                                        <button class="btn btn-outline-danger"  onclick="denyBtn(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode,'cat')">Deny</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ./Team member -->
                                                <?php }

                                              for ($i=0; $i<$dogRes->num_rows; $i++){
                                                  $rowD= $dogRes->fetch_assoc(); ?>
                                                <!-- Team member -->
                                                <div class="col-xs-12 col-sm-6 col-md-6" id="D<?php echo $rowD['dogId'];?>">
                                                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                                        <div class="mainflip">
                                                            <div class="frontside">
                                                                <div class="card">
                                                                    <div class="card-body text-center">
                                                                        <p><img class=" img-fluid" src="./uploads/<?php echo $rowD['pic']?>" alt="card image"></p>
                                                                        <h4 class="card-title"><?php echo $rowD['name']; ?></h4>
                                                                        <p class="card-text">Breed: <?php echo $rowD['breed'];?><br>Gender: <?php echo $rowD['gender']; ?>
                                                                            <br> Age: <?php echo $rowD['age'] ; ?><br> Description: <?php echo $rowD['description'];?>

                                                                        </p>
                                                                        <button class="btn btn-outline-success" onclick="acceptBtn(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode,'dog')" >Accept</button>
                                                                        <button class="btn btn-outline-danger"  onclick="denyBtn(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode,'dog')">Deny</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ./Team member -->


                                               <?php }?>

                                             </div>
                                        </div>
                                    </section>
                                    <!-- Team -->
                    </div>

                    <div class="tab-pane fade shadow rounded  p-5" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <!-- Team -->
                        <section id="team" class="pb-5">
                            <div class="container">
                                <div class="row">
                                    <?php for($i=0; $i<$itemRes->num_rows; $i++){
                                        $rowI= $itemRes->fetch_assoc();?>

                                        <!-- Team member -->
                                        <div class="col-xs-12 col-sm-6 col-md-6" id="I<?php echo $rowI['itemId'];?>">
                                            <div class="image-flip" ontouchstart="this.classList.toggle('hover');" >
                                                <div class="mainflip"  >
                                                    <div class="frontside">
                                                        <div class="card" >
                                                            <div class="card-body text-center">
                                                                <p><img class=" img-fluid" src="./uploads/<?php echo $rowI['picture']?>" alt="card image"></p>
                                                                <h4 class="card-title"><?php echo $rowI['name']; ?></h4>
                                                                <p class="card-text">
                                                                    Description: <?php echo $rowI['description'];?>
                                                                </p>
                                                                <button class="btn btn-outline-success" onclick="acceptBtn(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode,'items')">Accept</button>
                                                                <button class="btn btn-outline-danger"  onclick="denyBtn(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode,'items')">Deny</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- ./Team member -->
                                    <?php }?>


                                </div>
                            </div>
                        </section>



                    </div>

                    <div class="tab-pane fade shadow rounded  p-5" id="v-pills-messages2" role="tabpanel" aria-labelledby="v-pills-messages2-tab">
                        <!-- Team -->
                        <section id="response" class="pb-5">
                            <div class="container">
                                <div class="row">
                                    <?php for($i=0; $i<$resRes->num_rows; $i++){
                                        $rowR= $resRes->fetch_assoc();
                                        $id= $rowR['catId'];
                                        $queryTemp="select * from cat where catId=$id";
                                        @$db = new mysqli('localhost', 'root', '', 'pawfecthouse1');
                                        $r=$db->query($queryTemp);
                                        $r2=$r->fetch_assoc();
                                        ?>

                                        <!-- Team member -->
                                        <div class="col-xs-12 col-sm-6 col-md-6" id="cat<?php echo $r2['catId'];?>">
                                            <div class="image-flip" ontouchstart="this.classList.toggle('hover');" >
                                                <div class="mainflip"  >
                                                    <div class="frontside">
                                                        <div class="card" >
                                                            <div class="card-body text-center">
                                                                <p><img class=" img-fluid" src="./uploads/<?php echo $r2['pic']?>" alt="card image"></p>
                                                                <h4 class="card-title"><?php echo $r2['name']; ?></h4>
                                                                <p class="card-text">Breed: <?php echo $r2['breed'];?><br>
                                                                    Gender: <?php echo $r2['gender']; ?><br>
                                                                    Age: <?php echo $r2['age'] ; ?><br>
                                                                Owner/Finder's e-mail:<span id="OE<?php echo $r2['catId']  ?>"> <?php echo $r2['email']?></span>
                                                                Adopter's email:<span id="AE<?php echo $r2['catId']  ?>"><?php echo $rowR['email']?> </span>
                                                                </p>
                                                                <button class="btn btn-outline-success"
                                                                        onclick="location.href = 'mailto:'+document.getElementById('OE<?php echo $r2['catId'] ?>').innerHTML+'?cc='+'&subject='+'Your pet has an adoption request!'+'&body='+'For more information, Please contact: &nbsp;'+document.getElementById('AE<?php echo $r2['catId'] ?>').innerHTML;
                                                                        document.getElementById('cat<?php echo $r2['catId'];?>').style.display='none';
                                                                       removeFromDb(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode, 'cat');
                                                                                "
                                                                >Send Accept Email</button>
                                                                <button class="btn btn-outline-danger"
                                                                        onclick="location.href = 'mailto:'+document.getElementById('AE<?php echo $r2['catId'] ?>').innerHTML+'?cc='+'&subject='+'Unfortunately, your request to adopt a pet on PawfectHouse was denied'+'&body='+'';
                                                                                document.getElementById('cat<?php echo $r2['catId'];?>').style.display='none';
                                                                                changeAvailable(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode, 'cat');
                                                                                removeFromDb(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode, 'cat');
                                                                                "
                                                                       >Deny</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- ./Team member -->
                                    <?php }
                                    for($i=0; $i<$resRes2->num_rows; $i++){
                                    $rowR= $resRes2->fetch_assoc();
                                    $id= $rowR['dogId'];
                                    $queryTemp="select * from dog where dogId=$id";
                                    @$db = new mysqli('localhost', 'root', '', 'pawfecthouse1');
                                    $r=$db->query($queryTemp);
                                    $r2=$r->fetch_assoc();
                                    ?>
                                    <!-- Team member -->
                                    <div class="col-xs-12 col-sm-6 col-md-6" id="dog<?php echo $r2['dogId'];?>">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');" >
                                            <div class="mainflip"  >
                                                <div class="frontside">
                                                    <div class="card" >
                                                        <div class="card-body text-center">
                                                            <p><img class=" img-fluid" src="./uploads/<?php echo $r2['pic']?>" alt="card image"></p>
                                                            <h4 class="card-title"><?php echo $r2['name']; ?></h4>
                                                            <p class="card-text">Breed: <?php echo $r2['breed'];?><br>
                                                                Gender: <?php echo $r2['gender']; ?><br>
                                                                Age: <?php echo $r2['age'] ; ?><br>
                                                                Owner/Finder's e-mail:<span id="DOE<?php echo $r2['dogId']  ?>"> <?php echo $r2['email']?></span>
                                                                Adopter's email:<span id="DAE<?php echo $r2['dogId']  ?>"><?php echo $rowR['email']?> </span>
                                                            </p>
                                                            <button class="btn btn-outline-success"
                                                                    onclick="location.href = 'mailto:'+document.getElementById('DOE<?php echo $r2['dogId'] ?>').innerHTML+'?cc='+'&subject='+'Your pet has an adoption request!'+'&body='+'For more information, Please contact: &nbsp;'+document.getElementById('DAE<?php echo $r2['dogId'] ?>').innerHTML;
                                                                            document.getElementById('dog<?php echo $r2['dogId'];?>').style.display='none';
                                                                            removeFromDb(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode, 'dog');
                                                                            "
                                                            >Send Accept Email</button>
                                                            <button class="btn btn-outline-danger"
                                                                    onclick="location.href = 'mailto:'+document.getElementById('DAE<?php echo $r2['dogId'] ?>').innerHTML+'?cc='+'&subject='+'Unfortunately, your request to adopt a pet on PawfectHouse was denied'+'&body='+'';
                                                                            document.getElementById('dog<?php echo $r2['dogId'];?>').style.display='none';
                                                                            changeAvailable(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode, 'dog');
                                                                            removeFromDb(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode, 'dog');
                                                                            "
                                                            >Deny</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Team member -->
                                <?php }?>

                                </div>
                            </div>
                        </section>



                    </div>
                    <div class="tab-pane fade shadow rounded  p-5" id="v-pills-messages3" role="tabpanel" aria-labelledby="v-pills-messages3-tab">
                        <section id="table" class="pb-5">
                        <div class="container1">

                            <ul class="responsive-table">
                                <li class="table-header">
                                    <div class="col col-1">Pro. Name</div>
                                    <div class="col col-2">Pro. Price</div>
                                    <div class="col col-3">Customer's Name</div>
                                    <div class="col col-4">Customer's address</div>
                                    <div class="col col-5">Customer's Phone number</div>
                                </li>

                                <?php
                                for ($i=0; $i<$resRes3->num_rows; $i++) {
                                    $rowC = $resRes3->fetch_assoc();
                                    $iId = $rowC['itemId'];
                                    $queryTemp = "select * from items where itemId=$iId";
                                    @$db = new mysqli('localhost', 'root', '', 'pawfecthouse1');
                                    $rcc = $db->query($queryTemp);
                                    $r2 = $rcc->fetch_assoc(); ?>

                                    <li class="table-row">
                                    <div class="col col-1" data-label="Job Id"><?php echo$r2['name'] ?></div>
                                    <div class="col col-2" data-label="Customer Name"><?php echo  $r2['price'] ?></div>
                                    <div class="col col-3" data-label="Amount"><?php echo $rowC['name'] ?></div>
                                    <div class="col col-4" data-label="Payment Status"><?php echo$rowC['address'] ?></div>
                                    <div class="col col-5" data-label="Payment Status"><?php echo $rowC['phone'] ?></div>
                                    </li>
                         <?php }?>
                            </ul>
                        </div>

                    </section>

                    </div>
                    <div class="tab-pane fade shadow rounded  show rounded p-5" id="v-pills-charts" role="tabpanel" aria-labelledby="v-pills-charts-tab">
                        <section id="charts" class="pb-5">
                            <div class="chart-container" style="position: relative;">
                                <canvas id="myChart" width="400" height="100" " ></canvas>
                            </div>
                            <script>
                                var ctx = document.getElementById('myChart');
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ["cat", "dog"],
                                        datasets: [{
                                            label: 'Percentage of adoption requests',
                                            data: [<?php echo $catPer*100?>, <?php echo $dogPer*100?>],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)'


                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)'

                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true,
                                                    callback: function(value, index, values) {
                                                        return value+'%';
                                                    }

                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<div style="width: 100%; height: 130px; background-color: rgba(89, 180, 211, 0.44)"></div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>