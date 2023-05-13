<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>



<?php


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST["id"];

    if($id == "Select Worker ID"){
      echo '<div class=\"alert alert-success m-5\" role=\"alert\">
  Please select ID!
</div>';
    }
    else{
      $sql = "SELECT * FROM `worker's details` WHERE `id` = '$id'"; 
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $gender = $row['gender'];
        $rate = $row['rate'];
        $advance = $row['advance'];
        $days = $row['days'];
        $total = $row['total'];
        $finaltotal = $row['finaltotal'];
        //     $id = $row['id'];
        //     $name = $row['name'];
        echo '<form  action="entrydone.php" method="post"  class="container m-1 bg-dark p-3">
        <div class="input-group mb-3 w-25">
  <span class="input-group-text" id="basic-addon1">Date</span>
  <input class="form-control" type="date" id="birthday" name="date">
</div>
        
        <div class="input-group mb-3">
        <span class="input-group-text">ID</span>
        <input type="text" name="id" class="form-control" value="'. $id.'"
        aria-label="Username" readonly>
        <span class="input-group-text">Name</span>
        <input type="text" value="'. $name .'" class="form-control" aria-label="Server" readonly>
        <span class="input-group-text">Gender</span>
        <input type="text" value="'. $gender .'" class="form-control" aria-label="Server" readonly>
        
        </div>
        
        
        <div class="input-group mb-3">
        <span class="input-group-text">Day</span>
        <input type="number" name="days" value="'. $days .'" class="form-control" aria-label="Server" readonly>
        <span class="input-group-text">Total advance</span>
        <input type="number" name="total advance" value="'. $advance .'" class="form-control" aria-label="Server" readonly>
        <span class="input-group-text">Final Total</span>
        <input type="number" name="finaltotal" value="'. $finaltotal .'" class="form-control" aria-label="Server" readonly>
        </div>
<div class="flex  d-flex">

<div class="input-group mb-3">
<span class="input-group-text">Rate</span>
<input type="number" name="rate" value="'. $rate .'" class="form-control" aria-label="Amount (to the nearest dollar)" readonly>
<span class="input-group-text">.00</span>
</div>
<div class="input-group mb-3 ms-3">
<span class="input-group-text">Advance</span>
<input type="number" value="0" name="advance" placeholder="0" class="form-control" aria-label="Amount (to the nearest dollar)">
<span class="input-group-text">.00</span>
</div>
</div>



<div class="flex  d-flex">

<div class="input-group mb-3">
<span class="input-group-text">In Time</span>
<input class="form-control" id="intime" name="intime" type="time" value = "10:00">
</div>
<div class="input-group mb-3 ms-3">
<span class="input-group-text">Out Time</span>
<input class="form-control" id="outtime" name="outtime" type="time" value = "20:00">
</div>
</div>
        
        <div class="d-flex w-100">
          <button name="submit_form2" type="submit" class="mt-5 me-auto btn btn-success">Submit</button>
          <a href="#" onclick = "openprofile('.$id.')"><button type="button" class="mt-5 btn btn-success">View Profile</button></a>
        </div> 
        </form>';
    }
    }
    else{
        echo "<div class=\"alert alert-success m-5\" role=\"alert\">
  Please select ID!
</div>";
    }





           



?>
<script>
function openprofile(cardid) {
    window.location.href = "profile.php?id=" + cardid;
}
</script>