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

<body class="bg-dark">
    <?php include 'partials/_header.php';?>
    <?php include 'partials/_connectdb.php';?>
    <div class="container text-center">
        <div class="row text-start">

            <?php     
            $sql = "SELECT * FROM `worker's details`"; 
            $result = mysqli_query($conn, $sql);
            // $name = $row['name'];
            // $gender = $row['gender'];
            // $rate = $row['rate'];
            // $advance = $row['advance'];
            // $days = $row['days'];
            // $total = $row['total'];
            // $finaltotal = $row['finaltotal'];

            while($row = mysqli_fetch_assoc($result)){
                            // echo $row['category_id'];
                            // echo $row['category_name'];
                            // $id = $row['id'];
                            // $name = $row['name'];
                            // array_push($namearray,$name);
                            //   $desc = $row['category_description'];
                            echo '
                                <div class="col my-3">
                <div class="card border-success text-success bg-dark" style="width: 18rem;">
                    <img src="user.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">'.$row['id'].') '.$row['name'].'</h5>
                    </div>
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item text-success bg-dark">Days: '.$row['days'].'</li>
                        <li class="list-group-item text-success bg-dark">Total Advance: '.$row['advance'].'</li>
                        <li class="list-group-item text-success bg-dark">Final Total: '.$row['finaltotal'].'</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">View</a>
                        <a href="#" class="card-link">Edit</a>
                    </div>
                </div>
            </div>

                            ';
                            // $i+=1;
                        } 
    
            ?>


        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
</body>

</html>