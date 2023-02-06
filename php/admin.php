<?php
    // session_start();
    // if (isset($_SESSION['id'])){
    include "dbh.class.php";
    $data=new dbh();
    $sql=$data->getdata("SELECT COUNT(id) from student; ");
    $sql1=$data->getdata("SELECT COUNT(fid) from faculty; ");
    $sql2=$data->getdata("SELECT COUNT(hdid) from hod; ");
    $sql3=$data->getdata("SELECT COUNT(smid) from schoolmanager; ");
    $sql4=$data->getdata("SELECT COUNT(uaid) from universityauthority; ");
    $row=$sql->fetch(PDO::FETCH_ASSOC);
    $row1=$sql1->fetch(PDO::FETCH_ASSOC);
    $row2=$sql2->fetch(PDO::FETCH_ASSOC);
    $row3=$sql3->fetch(PDO::FETCH_ASSOC);
    $row4=$sql4->fetch(PDO::FETCH_ASSOC);
    
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>
    <header>
        <span>
            Admin Dashboard
        </span>
        <a class="log" href="logout.php"><button>Log Out</button></a>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <div class="sidebar">
                    <a href="studentreg.php">+ Add Student</a>
                    <a href="facultyreg.php">+ Add Faculty</a>
                    <a href="schoolM_Reg.php">+ Add School Manager</a>
                    <a href="hod_reg.php">+ Add HOD</a>
                    <a href="uareg.php">+Add Univeristy Authority</a>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="student">
                            <p>Total HOD</p>

                            <span><?php echo $row2['COUNT(hdid)']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="student">
                            <p>Total Students</p>
                            <span><?php echo $row['COUNT(id)']; ?></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="student">
                            <p>Total Faculties</p>
                            <span><?php echo $row1['COUNT(fid)']; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="student">
                            <p>Total School Managers</p>
                            <span><?php echo $row3['COUNT(smid)']; ?></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="student">
                            <p>Total University Authorities</p>
                            <span><?php echo $row4['COUNT(uaid)']; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
<?php 
// }else{
//     header("Location: ../index.php");

// }

?>