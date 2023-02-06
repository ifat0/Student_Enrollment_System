<?php
    session_start();
    include "dbh.class.php"; 
    if(!empty($_POST['c_Id'])) {
        $database=new Dbh();
        $courseid=$_POST['c_Id'];
        $len=count($_POST['c_Id']);
        for($i=0;$i<$len;$i++){
            $a=$courseid[$i];
            // var_dump( $a);
            $database->connect("Insert into registercourse(s_Id,c_Id) values('".$_SESSION['id']."',$a)");
            $sql1=$database->getdata("SELECT ENROLLED FROM course where c_Id=$a;");
            $row1=$sql1->fetch(PDO::FETCH_ASSOC);
            $b=$row1['ENROLLED']+1;
            echo $b;
            $database->connect("Update course set ENROLLED=$b where c_Id=$a;");
        }
    }

    $data=new Dbh();
    $sql=$data->getdata("SELECT course.COFFER_COURSE_ID, course.SECTION,course.CREDIT_HOUR, course.CAPACITY, course.ENROLLED,course.FACULTY_FULL_NAME,course.Day,course.STRAT_TIME,course.END_TIME from course,registercourse where registercourse.c_Id=course.c_Id");

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

    <title>Student Dashboard</title>
</head>

<body>
    <header>
        <span>
            Registered Courses
        </span>
        <a class="log" href="logout.php"><button>Log Out</button></a>
    </header>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Select</th>
                <th scope="col">Course ID</th>
                <th scope="col">Section</th>
                <th scope="col">Cr Hour</th>
                <th scope="col">Faculty</th>
                <th scope="col">Day</th>
                <th scope="col">Start Time</th>
                <th scope="col">End time</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row=$sql->fetch(PDO::FETCH_ASSOC)){
                    $i=1;
            ?>
            <tr>
                <th scope="row"><?php echo $i?></th>
                <td><?php echo $row['COFFER_COURSE_ID']?></td>
                <td><?php echo $row['SECTION']?></td>
                <td><?php echo $row['CREDIT_HOUR']?></td>
                <td><?php echo $row['FACULTY_FULL_NAME']?></td>
                <td><?php echo $row['Day']?></td>
                <td><?php echo $row['STRAT_TIME']?></td>
                <td><?php echo $row['END_TIME']?></td>
            </tr>
            <?php
                }
            ?>


        </tbody>
    </table>


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