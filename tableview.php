<table class="table align-middle mb-0 bg-white my-4 bg-dark">
    <thead class="bg-dark text-light border">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Work Profile</th>
            <th>Rate</th>
            <th>Advance</th>
            <th>Total Salary</th>
            <th>Days</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php     
            $sql = "SELECT * FROM `worker's details`"; 
            $result = mysqli_query($conn, $sql);
            

            while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $name = $row['name'];
                            $gender = $row['gender'];
                            $rate = $row['rate'];
                            $advance = $row['advance'];
                            $days = $row['days'];
                            $total = $row['total'];
                            $finaltotal = $row['finaltotal'];
                            echo '
                            <tr>
                            <td>'.$id.'</td>
            <td>
                <div class="d-flex align-items-center">
                    <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px"
                        class="rounded-circle" />
                    <div class="ms-3">
                        <p class="fw-bold mb-1">'.$name.'</p>
                        <p class="text-muted mb-0">john.doe@gmail.com</p>
                    </div>
                </div>
            </td>
            <td>
                <p class="fw-normal mb-1">Software engineer</p>
                <p class="text-muted mb-0">IT department</p>
            </td>
            <td>'.$rate.'</td>
            <td>'.$advance.'</td>
            <td>'.$finaltotal.'</td>
            <td>'.$days.'</td>
            <td>
                <button type="button" class="btn btn-link btn-sm btn-rounded">
                    Edit
                </button>
            </td>
        </tr>
                            ';
                            // $i+=1;
                        } 
    
            ?>



    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>
</body>

</html>