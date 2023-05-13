<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance WebApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="bg-light">
    <?php include 'partials/_header.php';?>
    <?php include 'partials/_connectdb.php';?>



    <div class="container-fluid mt-1  ">
        <div class=" row no-gutters">
            <div class="col-6 col-md-3 border border-secondary bg-dark">

                <p class="display-6 text-light text-center">
                    <?php echo date('d/m/y'); ?>
                </p>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="container m-2 mb-5">
                    <div class="container">
                        <select name="id" onchange="getid()" id="id" class="form-select"
                            aria-label="Default select example">
                            <option selected>Select Worker ID</option>
                            <?php 
                                $sql = "SELECT * FROM `worker's details`"; 
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    echo '<option value="'.$id.'">'.$id.'</option>';
                                } 
                            ?>
                        </select>
                        <button name="submit_form1" type="submit" class="mt-5 btn btn-success">Submit</button>
                    </div>
                </form>
                <!-- <form action="dailyEntry.php" method="post" class="container m-2 mb-5">
                    <div class="container">
                        <select name="id" onchange="getid()" id="id" class="form-select"
                            aria-label="Default select example">
                            <option selected>Select Worker ID</option>
                            <?php 
                                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                                    if(isset($_POST["submit_form1"])){
                                        $sql = "SELECT * FROM `worker's details`"; 
                                        $result = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                            $id = $row['id'];
                                            echo '<option value="'.$id.'">'.$id.'</option>';
                                        }
                                    }

                                    else if(isset($_POST["submit_form2"])){
                                        echo ' HIiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii';
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


                                        header("Location: index.php");
                                        if($hours == 0){
                                            echo "<div class=\"alert alert-danger m-5\" role=\"alert\">Please fill all fields </div>
                                            <button onclick=\"back()\" class=\"btn btn-success mx-2\" type=\"button\"><-- Back</button>";
                                            echo "fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff";
                                        }
                                        else if(($hours == 0) && $advance != 0){
                                            $finaltotal = ($days * $rate) - $advance;
                                            $sql = "UPDATE `worker's details` SET  `advance` = '$advance', `finaltotal` = '$finaltotal' WHERE `worker's details`.`id` = '$id'";
                                            $result = mysqli_query($conn, $sql);
                                        }
                                        else{
                                            $days += 1;
                                            $total += $rate;

                                            $finaltotal = ($days * $rate) - $advance;

                                            $sql = "UPDATE `worker's details` SET`hours` = '$hours', `days` = '$days', `advance` = '$advance',
                                                    `total` = '$total', `finaltotal` = '$finaltotal' WHERE `worker's details`.`id` = $id";
                                            $result = mysqli_query($conn, $sql);

                                            // header("Location: dailyEntry.php");       
                                            
                                            }
                                    }
                                }  
                            ?>
                        </select>
                        <button type=" submit" class="mt-5 btn btn-success">Submit</button>
                    </div>
                </form> -->
            </div>
            <div class="col-12 col-sm-6 col-md-9 border border-secondary bg-dark">

                <?php 
                // include 'fill.php';


                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                        $id = $_POST["id"];

                        if($id == "Select Worker ID"){
                        echo '<div class=\"alert alert-success m-5\" role=\"alert\">Please select ID!</div>';
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
                            echo '
                            <form  action="dailyEntry.php" method="post"  class="container m-1 bg-dark p-3">
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
                    echo "<div class=\"alert alert-success m-5\" role=\"alert\">Please select ID!</div>";
                }
                ?>
            </div>
        </div>

    </div>



    <script src="dailyEntry.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>