<?php
    session_start();
    include "dbh.class.php"; 
    $data=new Dbh();
        $sql=$data->getdata("SELECT c_Id,COFFER_COURSE_ID, SECTION,CREDIT_HOUR, CAPACITY, ENROLLED,FACULTY_FULL_NAME,Day,STRAT_TIME,END_TIME from course where year=2021 and semester='summer' and SCHOOL_TITLE='".$_SESSION['dept']."'");
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
            Student Dashboard
        </span>
        <a class="log" href="registeredcourse.php"> See Selected Courses</a>
        <a class="log" href="logout.php"><button>Log Out</button></a>
    </header>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Select</th>
                <th scope="col">Course ID</th>
                <th scope="col">Section</th>
                <th scope="col">Cr Hour</th>
                <th scope="col">Capacity</th>
                <th scope="col">Enrolled</th>
                <th scope="col">Free Space</th>
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
                <form action="registeredcourse.php" method="post">
                    <th scope="row"><input type="checkbox" id="c_Id" name="c_Id[]" onClick="check(this)"
                            value="<?php echo $row['c_Id'] ?>"
                            data-freespace="<?php echo $row['CAPACITY']-$row['ENROLLED']?>"
                            data-day="<?php echo $row['Day']?>" data-starttime="<?php echo $row['STRAT_TIME']?>">

                        <input type="hidden" name="" id="<?php echo $row['c_Id']?>" data-day="<?php echo $row['Day']?>"
                            data-starttime="<?php echo $row['STRAT_TIME']?>">

                    </th>
                    <td><?php echo $row['COFFER_COURSE_ID']?></td>
                    <td><?php echo $row['SECTION']?></td>
                    <td><?php echo $row['CREDIT_HOUR']?></td>
                    <td><?php echo $row['CAPACITY']?></td>
                    <td><?php echo $row['ENROLLED']?></td>
                    <td><?php echo $row['CAPACITY']-$row['ENROLLED']?></td>
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

    <button type="submit">Save</button>
    </form>

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
    <script>
    var registered = [];

    function check(e) {
        freespace = e.getAttribute("data-freespace");
        day = e.getAttribute("data-day");
        starttime = e.getAttribute("data-starttime");
        if (freespace <= 0) {
            alert("Section Full");
            e.checked = false;
        } else {
            var lenofcourse = registered.length;
            if (lenofcourse > 0) {
                for (i = 0; i < lenofcourse; i++) {
                    a = document.getElementById(registered[i]).getAttribute("data-day");
                    b = document.getElementById(registered[i]).getAttribute("data-starttime");
                    if (a == day && b == starttime) {
                        alert("Another Course that You've selected is conflicting");
                        e.checked = false;
                    } else {
                        registered.push(e.value);

                    }
                }
            } else {
                registered.push(e.value);
            }
        }
        finalreg = [...new Set(registered)];
    }
    </script>


</body>

</html>