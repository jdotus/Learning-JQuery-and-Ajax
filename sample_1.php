<?php
    include 'db_con.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMPLE 1</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
        
          $('button').on("click", function() {
            id = $(this).attr("id");
            $.ajax({
              url: "modal_sample.php",
              method: "get",
              data: {id:id},
              success: function(result){
              $(".modal-body").html(result)
            }});
          })

          $("#submit-form").on("click", function() {
            var id = $("#id").val();
            var fullname = $("#fullname").val();
            $.ajax({
              url: "process.php",
              method: "post",
              data: {
                id: id, 
                fullname: fullname
              },
              success:function(result) {
                alert(result);
              }})
          })
        });
    </script>
    
</head>
    <body>
      <div id="test" class="container">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Fullname</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            
            <?php 
              $sql = "SELECT * FROM sample";
              $result = mysqli_query($conn, $sql);
              
              if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr>
                    <td><?php echo $row["id"]?></td>
                    <td><?php echo $row["fullname"]?></td>
                    <td><button id='<?php echo $row["id"]?>' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Show

                    </button></td>
                </tr>
                <?php
                }
              }else {
                echo "0 Results";
              }

              ?>

              
          </tbody>
        </table>
        
        <form action="process.php" method="post">
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-sm">ID</span>
                  <input type="text" name="id" id="id" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Fullname</span>
                  <input type="text" name="fullname" id="fullname" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                <button id="submit-form" type="submit" class="btn btn-success">submit</button>
          </form>
        
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Detail</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>

          </div>
        </div>
      </div>


    </body>
</html>