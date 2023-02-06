<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V1</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css" />
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <!--===============================================================================================-->
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="../images/img-01.png" alt="IMG" />
                </div>

                <form action="studentlogin.php" class="login100-form validate-form" method="POST">
                    <span class="login100-form-title"> Student Login </span>

                    <div class="wrap-input100" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="id" placeholder="Enter ID" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" name="loginbtn" class="login100-form-btn">Login</button>
                    </div>

                    <div class="text-center p-t-136"></div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/tilt/tilt.jquery.min.js"></script>
    <script>
    $(".js-tilt").tilt({
        scale: 1.1,
    });
    </script>
    <!--===============================================================================================-->
    <script src="../js/main.js"></script>
</body>

</html>


<?php

include "dbh.class.php";

$data=new Dbh();
if(isset($_POST['loginbtn'])){
    $sql=$data->getdata("SELECT s_id, pass,s_Dept from student where s_id='".$_POST['id']."' and pass='".$_POST['pass']."'");
    $row=$sql->fetch(PDO::FETCH_ASSOC);
    if($row==null){
        echo '<script>alert(" ID or password is Incorrect")</script>';
    }else{
        while($row){
            $_SESSION['id']=$row['s_Id'];
            $_SESSION['dept']=$row['s_Dept'];?>
<script>
window.location.replace("studentdash.php");
</script>
<?php
        }
    }
}

?>