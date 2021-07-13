<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transfer Money</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <script src="./assets/js/jquery.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
</head>

<body>
<?php
include 'assets/includes/config.php';
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<!-- navbar start -->
  <?php include 'assets/includes/navbar.php';?>
<!-- navbar end -->

<div class="container">
<br><br>
<h2 class="text-center pt-4"><b>Transfer Money<b></h2>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center py-2">Id</th>
                            <th scope="col" class="text-center py-2">Name</th>
                            <th scope="col" class="text-center py-2">Balance</th>
							<th scope="col" class="text-center py-2">Click to view</th>

                            </tr>
                        </thead>
                        <tbody>
                <?php
while ($rows = mysqli_fetch_assoc($result)) {
    ?>
                    <tr>
                        <td class="py-2"><?php echo $rows['id'] ?></td>
                        <td class="py-2"><?php echo $rows['name'] ?></td>
                        <td class="py-2"><?php echo $rows['balance'] ?></td>
                        <td>
                                       <!-- Button to Open the Modal -->
                                        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows['id']; ?>">
                                        Transfer
                                        </button>
                            </a>
                        </td>
                    </tr>

  <!-- The Modal -->
  <div class="modal" id="myModal<?php echo $rows['id']; ?>">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title"><?php echo $rows['name']; ?></h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

       
        <div class="card">
            <div class="card-body">
                <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/img_avatar1.png" alt="Card image" style="width:100%">
                
                <p class="card-text mt-4"><?php echo $rows['name']; ?></p>
                <a href="javascript:void(0);" class="card-link"><?php echo $rows['email']; ?></a>
                <a href="javascript:void(0);" class="card-link"><?php echo $rows['balance']; ?></a>
                <br><br>
                <a href="selecteduserdetail.php?id= <?php echo $rows['id']; ?>"> <button type="button" class="btn btn-success"><b>Transfer</b></button></a>

            </div>
        </div>

    </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>


                <?php
}
?>

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
         </div>

</body>
</html>
