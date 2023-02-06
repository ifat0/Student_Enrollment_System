<?php
$servername = "localhost";
$username = "root";
$password = "";

//for spring 
$sec10 = $sec20 = $sec30 =$sec35 = $sec40 = $sec50 = $sec55 =$sec65 = "";
$cl6_10 = $cl6_20 = $cl6_30 =$cl6_35 = $cl6_40 = $cl6_50 = $cl6_55 =$cl6_65 = "";
$cl7_10 = $cl7_20 = $cl7_30 =$cl7_35 = $cl7_40 = $cl7_50 = $cl7_55 =$cl7_65 = "";

//for summer

$sec10_sm = $sec20_sm = $sec30_sm =$sec35_sm = $sec40_sm = $sec50_sm = $sec55_sm =$sec65_sm = "";
$cl6_10_sm = $cl6_20_sm = $cl6_30_sm =$cl6_35_sm = $cl6_40_sm = $cl6_50_sm = $cl6_55_sm =$cl6_65_sm = "";
$cl7_10_sm = $cl7_20_sm = $cl7_30_sm =$cl7_35_sm = $cl7_40_sm = $cl7_50_sm = $cl7_55_sm =$cl7_65_sm = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=ums", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //range 1-10
  $stmt = $conn->prepare("SELECT count(ROOM_CAPACITY) as sections FROM course where ENROLLED BETWEEN 1 and 10 and SEMESTER = 'SPRING'");   
  $stmt->execute();
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($arr as $k=>$v) 
  {
    $sec10 = $v['sections'];
  }
  $cl6_10 = $sec10 /12;
  $cl7_10 = $sec10 /14;
  //range 11-20
  $stmt = $conn->prepare("SELECT count(ROOM_CAPACITY) as sections FROM course where ENROLLED BETWEEN 11 and 20 and SEMESTER = 'SPRING'");   
  $stmt->execute();
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($arr as $k=>$v) 
  {
    $sec20 = $v['sections'];
  }
  $cl6_20 = $sec20 /12;
  $cl7_20 = $sec20 /14;
  //range 21-30
  $stmt = $conn->prepare("SELECT count(ROOM_CAPACITY) as sections FROM course where ENROLLED BETWEEN 21 and 30 and SEMESTER = 'SPRING'");   
  $stmt->execute();
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($arr as $k=>$v) 
  {
    $sec30 = $v['sections'];
  }
  $cl6_30 = $sec30 /12;
  $cl7_30 = $sec30 /14;

  //range 31-35 
  $stmt = $conn->prepare("SELECT count(ROOM_CAPACITY) as sections FROM course where ENROLLED BETWEEN 31 and 35 and SEMESTER = 'SPRING'");   
  $stmt->execute();
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($arr as $k=>$v) 
  {
    $sec35 = $v['sections'];
  }
  $cl6_35 = $sec35 /12;
  $cl7_35 = $sec35 /14;

  //range 36-40
  $stmt = $conn->prepare("SELECT count(ROOM_CAPACITY) as sections FROM course where ENROLLED BETWEEN 36 and 40 and SEMESTER = 'SPRING'");   
  $stmt->execute();
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($arr as $k=>$v) 
  {
    $sec40 = $v['sections'];
  }
  $cl6_40 = $sec40 /12;
  $cl7_40 = $sec40 /14;
  //range 41-50
  $stmt = $conn->prepare("SELECT count(ROOM_CAPACITY) as sections FROM course where ENROLLED BETWEEN 41 and 50 and SEMESTER = 'SPRING'");   
  $stmt->execute();
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($arr as $k=>$v) 
  {
    $sec50 = $v['sections'];
  }
  $cl6_50 = $sec50 /12;
  $cl7_50 = $sec50 /14;

  //range 51-55
  $stmt = $conn->prepare("SELECT count(ROOM_CAPACITY) as sections FROM course where ENROLLED BETWEEN 51 and 55 and SEMESTER = 'SPRING'");   
  $stmt->execute();
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($arr as $k=>$v) 
  {
    $sec55 = $v['sections'];
  }
  $cl6_55 = $sec55 /12;
  $cl7_55 = $sec55 /14;

  //range 56-65
  $stmt = $conn->prepare("SELECT count(ROOM_CAPACITY) as sections FROM course where ENROLLED BETWEEN 56 and 65 and SEMESTER = 'SPRING'");   
  $stmt->execute();
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($arr as $k=>$v) 
  {
    $sec65 = $v['sections'];
  }
  $cl6_65 = $sec65 /12;
  $cl7_65 = $sec65 /14;

//////////end of spring/////////////
///////////summer start/////////////

//range 1-10
$stmt = $conn->prepare("SELECT count(ROOM_CAPACITY) as sections FROM course where ENROLLED BETWEEN 1 and 10 and SEMESTER = 'Summer'");   
$stmt->execute();
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($arr as $k=>$v) 
{
  $sec10_sm = $v['sections'];
}
$cl6_10_sm = $sec10_sm /12;
$cl7_10_sm = $sec10_sm /14;
//range 11-20
$stmt = $conn->prepare("SELECT count(ROOM_CAPACITY) as sections FROM course where ENROLLED BETWEEN 11 and 20 and SEMESTER = 'Summer'");   
$stmt->execute();
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($arr as $k=>$v) 
{
  $sec20_sm = $v['sections'];
}
$cl6_20_sm = $sec20_sm /12;
$cl7_20_sm = $sec20_sm /14;
//range 21-30
$stmt = $conn->prepare("SELECT count(ROOM_CAPACITY) as sections FROM course where ENROLLED BETWEEN 21 and 30 and SEMESTER = 'Summer'");   
$stmt->execute();
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($arr as $k=>$v) 
{
  $sec30_sm = $v['sections'];
}
$cl6_30_sm = $sec30_sm /12;
$cl7_30_sm = $sec30_sm /14;

//range 31-35 
$stmt = $conn->prepare("SELECT count(ROOM_CAPACITY) as sections FROM course where ENROLLED BETWEEN 31 and 35 and SEMESTER = 'Summer'");   
$stmt->execute();
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($arr as $k=>$v) 
{
  $sec35_sm = $v['sections'];
}
$cl6_35_sm = $sec35_sm /12;
$cl7_35_sm = $sec35_sm /14;

//range 36-40
$stmt = $conn->prepare("SELECT count(ROOM_CAPACITY) as sections FROM course where ENROLLED BETWEEN 36 and 40 and SEMESTER = 'Summer'");   
$stmt->execute();
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($arr as $k=>$v) 
{
  $sec40_sm = $v['sections'];
}
$cl6_40_sm = $sec40_sm /12;
$cl7_40_sm = $sec40_sm /14;
//range 41-50
$stmt = $conn->prepare("SELECT count(ROOM_CAPACITY) as sections FROM course where ENROLLED BETWEEN 41 and 50 and SEMESTER = 'Summer'");   
$stmt->execute();
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($arr as $k=>$v) 
{
  $sec50_sm = $v['sections'];
}
$cl6_50_sm = $sec50_sm /12;
$cl7_50_sm = $sec50_sm /14;

//range 51-55
$stmt = $conn->prepare("SELECT count(ROOM_CAPACITY) as sections FROM course where ENROLLED BETWEEN 51 and 55 and SEMESTER = 'Summer'");   
$stmt->execute();
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($arr as $k=>$v) 
{
  $sec55_sm = $v['sections'];
}
$cl6_55_sm = $sec55_sm /12;
$cl7_55_sm = $sec55_sm /14;

//range 56-65
$stmt = $conn->prepare("SELECT count(ROOM_CAPACITY) as sections FROM course where ENROLLED BETWEEN 56 and 65 and SEMESTER = 'Summer'");   
$stmt->execute();
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($arr as $k=>$v) 
{
  $sec65_sm = $v['sections'];
}
$cl6_65_sm = $sec65_sm /12;
$cl7_65_sm = $sec65_sm /14;

}
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart_spr_cl6);
    google.charts.setOnLoadCallback(drawChart_spr_cl7);
    google.charts.setOnLoadCallback(drawChart_smr_cl6);
    google.charts.setOnLoadCallback(drawChart_smr_cl7);


    function drawChart_spr_cl6() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['1-10,', <?php echo  $cl6_10?>],
            ['21-30,', <?php echo $cl6_20?>],
            ['11-20,', <?php echo $cl6_30?>],
            ['31-35,', <?php echo $cl6_35?>],
            ['36-40,', <?php echo $cl6_40?>],
            ['41-50,', <?php echo $cl6_50?>],
            ['51-55,', <?php echo $cl6_55?>],
            ['56-65,', <?php echo $cl6_65?>],
        ]);

        var options = {
            title: 'class 6 requirement(Spring 2021)'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }

    function drawChart_spr_cl7() {

        var data2 = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['1-10,', <?php echo  $cl7_10?>],
            ['21-30,', <?php echo $cl7_20?>],
            ['11-20,', <?php echo $cl7_30?>],
            ['31-35,', <?php echo $cl7_35?>],
            ['36-40,', <?php echo $cl7_40?>],
            ['41-50,', <?php echo $cl7_50?>],
            ['51-55,', <?php echo $cl7_55?>],
            ['56-65,', <?php echo $cl7_65?>],
        ]);

        var options1 = {
            title: 'class 7 requirement(Spring 2021)'
        };

        var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart2.draw(data2, options1);
    }

    function drawChart_smr_cl6() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['1-10,', <?php echo  $cl6_10_sm?>],
            ['21-30,', <?php echo $cl6_20_sm?>],
            ['11-20,', <?php echo $cl6_30_sm?>],
            ['31-35,', <?php echo $cl6_35_sm?>],
            ['36-40,', <?php echo $cl6_40_sm?>],
            ['41-50,', <?php echo $cl6_50_sm?>],
            ['51-55,', <?php echo $cl6_55_sm?>],
            ['56-65,', <?php echo $cl6_65_sm?>],
        ]);

        var options = {
            title: 'class 6 requirement(Summer 2021)'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
    }

    function drawChart_smr_cl7() {

        var data2 = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['1-10,', <?php echo  $cl7_10_sm?>],
            ['21-30,', <?php echo $cl7_20_sm?>],
            ['11-20,', <?php echo $cl7_30_sm?>],
            ['31-35,', <?php echo $cl7_35_sm?>],
            ['36-40,', <?php echo $cl7_40_sm?>],
            ['41-50,', <?php echo $cl7_50_sm?>],
            ['51-55,', <?php echo $cl7_55_sm?>],
            ['56-65,', <?php echo $cl7_65_sm?>],
        ]);

        var options1 = {
            title: 'class 7 requirement(Summer 2021)'
        };

        var chart2 = new google.visualization.PieChart(document.getElementById('piechart4'));

        chart2.draw(data2, options1);
    }
    </script>
</head>

<body>

    <div id="piechart" style="width: 900px; height: 500px;"></div>
    <div id="piechart2" style="width: 900px; height: 500px;"></div>
    <div id="piechart3" style="width: 900px; height: 500px;"></div>
    <div id="piechart4" style="width: 900px; height: 500px;"></div>

</body>

</html>