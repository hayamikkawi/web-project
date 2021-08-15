<?php
$isAmember=true;
$passIsOkay=true;
$isUserOkay= true;
session_start();
$_SESSION['member']=0;
if (isset($_POST['username'])&&isset($_POST['Password'])) {
    $isAmember=false;


    @$db = new mysqli('localhost', 'root', '', 'pawfecthouse1');
    if (mysqli_connect_errno()) {
        echo "error connecting to the database";
        die();
    }
    $query = "select * from admin";
    $results = $db->query($query);
    for ($i = 0; $i < $results->num_rows; $i++) {
        $row = $results->fetch_array();
        if ($row[0] == $_POST['username'] && $row[1] == $_POST['Password']) {
            setcookie('adminsName', $_POST['username']);
            header("location: admin.php");
            $isAmember=true;
            $_SESSION['member']=1;
        }
    }
     if ($isAmember==false){
         $query1= "select * from users";
         $results1=$db->query($query1);
         for ($j=0; $j< $results1->num_rows; $j++){
             $row1= $results1->fetch_array();
             if($row1[0]== $_POST['username']&& $row1[1]==$_POST['Password']){

                 $_SESSION['member']=1;
                 $isAmember=true;
                 setCookie('username',$_POST['username']);
                 header("location: index2.php");
             }
         }
     }

}
elseif (isset($_POST['username1']) && isset($_POST['password1']) &&isset($_POST['password2'])){
    $user= $_POST['username1'];
    $pass= $_POST['password1'];
    $confirmPass= $_POST['password2'];
    if ($pass != $confirmPass){
        $passIsOkay=false;
     }
    else{
        @$db = new mysqli('localhost', 'root', '', 'pawfecthouse1');
        $query2="SELECT * FROM admin UNION ALL SELECT * from users";
        $results2=$db->query($query2);
        for ($m=0; $m< $results2->num_rows; $m++){
            $row2= $results2->fetch_array();
            if ($row2[0]==$_POST['username1']){
                $isUserOkay=false;
            }

        }
        if ($isUserOkay && $passIsOkay){
            header("location: index2.php");
            $_SESSION['member']=1;
            $query3= "INSERT INTO users (username, password) VALUES ('$user', '$pass')";
            $db->query($query3);
        }
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login-signup</title>
    <script
            src="https://kit.fontawesome.com/64d58efce2.js"
            crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./Style.css" />
    <link  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aldrich&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel=stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@300&display=swap" rel="stylesheet">
    <style>
        .wrongLog{
            color:  rgba(117, 51, 51, 0.9);
            text-align: center;
        }
    </style>

</head>
<body>
  <div class="container">

      <div>
          <a href='' class="goback"><i class="fas fa-long-arrow-alt-left"></i> </a>
      </div>

      <div class="forms-container">
          <div class="signin-signup">
             <form action="login.php" method="post" class="sign-in-form">
                 <h2 class="tilte">Sign in</h2>
                 <div class="input-field">
                     <i class="fas fa-user"></i>
                     <input type="text" name="username" placeholder="Username">
                 </div>
                 <div class='input-field'>
                     <i class="fas fa-lock"></i>
                     <input type="password" name="Password" placeholder="Password">
                 </div>
                 <input type="submit" value="Login" class="btn solid">
                <?php if ($isAmember==false){

               echo "<p class='wrongLog'><i class='fas fa-exclamation-circle '></i>&nbsp;Wrong username and/or password.</p>";}?>
             </form>

              <form action="login.php" method="post" class="sign-up-form">
                  <h2 class="tilte">Sign up</h2>
                  <div class="input-field">
                      <i class="fas fa-user"></i>
                      <input type="text" placeholder="Username" name='username1'>
                  </div>
                  <div class="input-field">
                      <i class="fas fa-lock"></i>
                      <input type="password" placeholder="Password" name='password1'>
                  </div>
                  <div class="input-field">
                      <i class="fas fa-check"></i>
                      <input type="password" placeholder="Confirm Password" name='password2'>
                  </div>
                  <input type="submit" value="Sign up" class="btn solid" id="sign_up">
                <?php if ($passIsOkay==false){
                        echo"<p class='wrongLog'><i class='fas fa-exclamation-circle'></i>&nbsp;The two passwords should match</p>";
                        echo "<script>document.querySelector(\".container\").classList.add(\"sign-up-mode\");</script>";}
                      if ($isUserOkay==false){
                          echo "<p class='wrongLog'><i class='fas fa-exclamation-circle'></i>&nbsp;This Username is already taken, Please choose another one</p>";
                          echo "<script>document.querySelector(\".container\").classList.add(\"sign-up-mode\");</script>";}

                ?>
              </form>
          </div>


      </div>
  <div class="panel-container">
      <div class="panel left-panel">
          <div class="content">
              <h3>New Here?</h3>
              <p>Sign up Now, it's Free!!</p>
              <button class="btn transparent" id="sign-up-button">Sign up</button>
          </div>

          <img src="imgs/number2.png" class="image" alt=''>
      </div>

      <div class='panel right-panel'>
          <div class='content'>
              <h3>One of us?</h3>
              <p>Login to your account</p>
              <button class='btn transparent' id='sign-in-button'>Sign in</button>
          </div>

          <img src="imgs/e.png" class="image second" alt="">
      </div>
  </div>

  </div>


<script src="app.js"></script>
</body>
</html>
