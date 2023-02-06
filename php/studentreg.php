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
    <title>Student Registration</title>

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
                        <!-- Title -->
                        <h3 class="form-title">Student Registration</h3>
                        <form action="studentreg.php" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="number" name="sid" id="sid" placeholder="Enter Student ID" />
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="dept" id="dept" placeholder="Enter Student Department" />
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Enter Student's Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Enter Email" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" />
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
                            <!-- Register Button-->
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                            <!-- Register Button-->

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
    public $sid;
    public $dept;
    public $name;
    public $phone;
    public $address;
    public $email;
    public $password;
}

$data=new Registration();
//below 3 lines are written if a Student ID is already exist or not and later we wil use a condition to check that.
if(isset($_POST['sid']) ){
    $sql=$data->getData("select s_Id from student where s_Id='".$_POST['sid']."' ");
    $rows=$sql->fetch(PDO::FETCH_ASSOC);
}
//checking if the Register button is pressed?
if(isset($_POST['signup'])){

// If Register button is pressed then it will check if any of the field is empty?
    if (empty($_POST['sid']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['address']) || empty($_POST['dept'])){
        echo '<script>alert("Please fill up all fields")</script>';    
    }else{

//Every field is filled up. Now we will check if the Student ID is not registered or not? Null means not registered.
        if($rows==null){

            //checking if the password and confirm password are same
            if($_POST['pass']==$_POST['re_pass']){

                    $database=new Dbh();

                    //Inserting Data into Student table
                    $database->connect($sql="Insert into student(s_Id, name, email, p_num, address, pass, s_Dept) values('".$_POST['sid']."','".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['address']."','".$_POST['pass']."','".$_POST['dept']."')");
                    
                // }
            }
            else{
                echo '<script>alert("Password not matched")</script>';
            }
        }else{
            echo '<script>alert("Same Student ID already exists!!")</script>';
        }
    }
}

?>