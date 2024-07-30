<?php
    include 'db_con.php';

if(isset($_GET['id'])){
    
    $output = '';

    $query = "SELECT * FROM sample WHERE id = '" .$_GET["id"]. "'";

    $newResult = $_GET['id'];
    echo $newResult + 5;
    // $query = "SELECT * FROM sample";

    $result = mysqli_query($conn, $query);

    $output .= '
        <div class="table-responsive">  
        <table class="table table-bordered">';
    while($row = mysqli_fetch_assoc($result)) { 

        $output .= 
        '
        <tr>
            <td width= "30%"><h6>ID</h6></td>
            <td width= "70%">' . $row["id"] . '</td>
        </tr>
        <tr>
            <td width= "30%"><h6>Full Name</h6></td>
            <td width= "70%">' . $row["fullname"] . '</td>
        </tr>
        ';
    }
    
    $output .= '</table></div>';
    echo $output;
}