<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>


<?php include 'partials/_connectdb.php';?>
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
$id = $_POST["id"];
    $sql = "SELECT * FROM `worker's details` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $advance = $row['advance'];
    $total = $row['total'];
    $advance += $_POST["advance"];
    $in = $_POST["intime"];
    $out = $_POST["outtime"];
    $rate = $_POST['rate'];
    $days = $_POST["days"];
    $finaltotal = $_POST["finaltotal"];


    $indatetime = DateTime::createFromFormat('H:i' , $in);
      $outdatetime = DateTime::createFromFormat('H:i' , $out);

      $interval = $indatetime->diff($outdatetime);

      $hours = $interval->h;

      if($interval->i >= 30){
        $hours += 1;
      }


if($hours == 0){
echo "<div class=\"alert alert-danger m-5\" role=\"alert\">
    Please fill all fields
</div>
<button onclick=\"back()\" class=\"btn btn-success mx-2\" type=\"button\">
    <-- Back</button>";
        }
else if(($hours == 0) && $advance != 0){
    $finaltotal = ($days * $rate) - $advance;
    $sql = "UPDATE `worker's details` SET  `advance` = '$advance', `finaltotal` = '$finaltotal' WHERE `worker's details`.`id` = '$id'";
    $result = mysqli_query($conn, $sql);
    header("Location: dailyEntry.php");
}
else{
    $days += 1;
    $total += $rate;

    $finaltotal = ($days * $rate) - $advance;

    $sql = "UPDATE `worker's details` SET`hours` = '$hours', `days` = '$days', `advance` = '$advance',
            `total` = '$total', `finaltotal` = '$finaltotal' WHERE `worker's details`.`id` = $id";
    $result = mysqli_query($conn, $sql);

    header("Location: dailyEntry.php");       
    }
                    
}
                    
                    ?>


<script>
function back() {
    window.location.href = "dailyEntry.php"
}
</script>