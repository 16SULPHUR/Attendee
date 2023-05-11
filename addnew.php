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

<body>
    <?php 
    include 'partials/_header.php';
    include 'partials/_connectdb.php';

    $sql = "SELECT MAX(id) AS lastid FROM `worker's details`";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['lastid'] +1;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST["id"];
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $rate = $_POST["rate"];

        $sql = "INSERT INTO `worker's details` (`id`, `name`, `gender`, `rate`, `hours`, `days`, `advance`, `total`, `finaltotal`) VALUES (NULL, '$name', '$gender', '$rate', '', '', '', '', '')";
        $result = mysqli_query($conn, $sql);
        header("Location: addnew.php");
    }
    
    ?>
    <div class="container-fluid">

        <form action="addnew.php" method="post" class="container m-1 bg-dark p-3 w-25">
            <div class="input-group mb-3">
                <span class="input-group-text">ID</span>
                <input type="text" name="id" class="form-control" value="<?php echo $id ?>" aria-label="Username"
                    readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Name</span>
                <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Gender</span>
                <input type="text" name="gender" class="form-control" placeholder="gender" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>
            <div class="flex  d-flex">

                <div class="input-group mb-3">
                    <span class="input-group-text">Rate</span>
                    <input type="number" name="rate" name="rate" value="" class="form-control"
                        aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text">.00</span>
                </div>
            </div>

            <button type="submit" class="mt-5 btn btn-success">Add</button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>