<?php
include_once 'dbh.class.php';
// if(isset($_POST['submit'])) header("location:login.class.php");
// else{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faculty Registration</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="../fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../css/reg_style.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h3 class="form-title">Faculty Registration</h3>
                        <form action="facultyreg.php" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="number" name="fid" id="fid" placeholder="Enter Faculty ID" />
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Enter Faculty's Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Enter Email" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat password" />
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-lock"></i></label>
                                <input type="number" name="phone" id="num" placeholder="Phone Number" />
                            </div>
                            <div class="form-group">
                                <label for="Address"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="address" id="address" placeholder="Enter Address" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                    statements in <a href="terms.class.php" class="term-service">Terms of
                                        service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../images/signup-image.jpg" alt="sign up image"></figure>
                        <a href="admin.php" class="signup-image-link">
                            <h3>Admin Dashboard</h3>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>

<?php
// }
class Registration extends Dbh{
    public $fid;
    public $name;
    public $phone;
    public $address;
    public $email;
    public $password;
}


$data=new Registration();
//below 5 lines are written if a email is already exist or not and later we used a condition to check that.
if(isset($_POST['email'])){
    $sql=$data->getData("select f_Email from faculty where f_Email='".$_POST['email']."' ");
    $rows=$sql->fetch(PDO::FETCH_ASSOC);
}

//Generating a random string for email verification
if (isset($_POST['fid']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address'])){

//If email is not registered yet
    if($rows==null){

        //checking if the password and confirm password are same
        if($_POST['pass']==$_POST['re_pass']){

            // if (!empty($_POST['name']) && !empty( $_POST['phone']) && !empty($_POST['address']) && !empty($_POST['email']) && !empty($_POST['pass'])){
                $database=new Dbh();

                //Inserting Data into faculty table
                $database->connect($sql="Insert into faculty(f_Id, f_Name, f_Email, f_Phone, f_Address, f_Pass) values('".$_POST['fid']."','".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['address']."','".$_POST['pass']."')");
                
            // }
        }
        else{
            echo '<script>alert("Password not matched")</script>';
        }
    }

}

?>