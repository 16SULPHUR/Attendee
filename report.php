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
    <nav class="navbar p-0 bg-body-tertiary">
        <form class="container-fluid justify-content-end bg-dark pt-3">
            <a href="?view=card">
                <button class="btn btn-sm btn-outline-secondary me-3" type="button">Card View</button>
            </a>
            <a href="?view=table">
                <button class="btn btn-sm btn-outline-secondary" type="button">Table View</button>
            </a>
        </form>
    </nav>
    <?php include 'partials/_connectdb.php';?>
    <?php 

    if(isset($_GET['view'])){
        $view = $_GET['view'];
        
        if($view === 'card'){
            include 'cardview.php';            
        }
        else{
            include 'tableview.php';             
        }
    }
    
    else{
        include 'cardview.php'; 
    }
    ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script>
    function openprofile(cardid) {
        window.location.href = "profile.php?id=" + cardid;
    }
    </script>
</body>

</html>