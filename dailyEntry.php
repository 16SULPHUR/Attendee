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
                <form action="dailyEntry.php" method="post" class="container m-2 my-5">
                    <div class="container">
                        <select name="id" onchange="getid()" id="id" class="form-select"
                            aria-label="Default select example">
                            <option selected>Select Worker ID</option>
                            <?php 
                        // $namearray = array() ;
                        // $i = 0;
                        $sql = "SELECT * FROM `worker's details`"; 
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            // echo $row['category_id'];
                            // echo $row['category_name'];
                            $id = $row['id'];
                            // $name = $row['name'];
                            // array_push($namearray,$name);
                            //   $desc = $row['category_description'];
                            echo '<option value="'.$id.'">'.$id.'</option>';
                            // $i+=1;
                        } 
                ?>
                        </select>
                        <button type="submit" class="mt-5 btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-sm-6 col-md-9 border border-secondary bg-dark">
                <?php include 'fill.php';?>
            </div>
        </div>

    </div>



    <script src="dailyEntry.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>