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
                    <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8dXNlcnxlbnwwfHwwfHw%3D&w=1000&q=80" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-light">'.$row['id'].') '.$row['name'].'</h5>
                    </div>
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item text-success bg-dark">Days: '.$row['days'].'</li>
                        <li class="list-group-item text-success bg-dark">Total Advance: '.$row['advance'].'</li>
                        <li class="list-group-item text-success bg-dark">Final Total: '.$row['finaltotal'].'</li>
                    </ul>
                    <div class="card-body">
                        <a href="#"  onclick = "openprofile('.$row['id'].')" class="card-link">View Profile</a>
                        <a href="#" class="card-link">Edit</a>
                    </div>
                </div>
            </div>

                            ';
                            // $i+=1;
                        } 
    
            ?>


    </div>