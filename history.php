<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <script src="./assets/js/jquery.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<?php
            include 'assets/includes/navbar.php';
?>

	<div class="container">
        <h2 class="text-center pt-4" style="color : white;"><b>Transaction History</b></h2>
        
       <br>
       <div class="table-responsive-sm">
    <table class="table table-hover table-striped table-condensed table-bordered">
        <thead class="color-white">
            <tr>
                
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date & Time</th>
                <th class="text-center">View</th>
                
            </tr>
        </thead>
        <tbody>
        <?php

            include 'assets/includes/config.php';

            $sql ="select * from transaction";

            $query =mysqli_query($conn, $sql);
            
            if ($query->num_rows > 0) {
		
            while($rows = mysqli_fetch_assoc($query))
            {
        ?>
          
          <?php  ?>
            <tr class="color-white">
            
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2"><?php echo $rows['balance']; ?> </td>
            <td class="py-2"><?php echo $rows['datetime']; ?> </td>
            <td>
                                       <!-- Button to Open the Modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows['id']; ?>">
                                        Transaction History
                                        </button>&nbsp;&nbsp;&nbsp;
                                  <a href="assets/includes/delete.php?id=<?php echo $rows['id']; ?>"><button class="btn btn-danger"><span><i class="fa fa-trash-o"></i></span></button></a>      
                                </td>  


                        
    
  <!-- The Modal -->
  <div class="modal" id="myModal<?php echo $rows['id']; ?>">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <!-- <h1 class="modal-title"><?php // echo $rows['sender']; echo " - "; echo $rows['receiver'];?></h1> -->
          <h3>Transaction History</h3>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

       
        <div class="card">
            <div class="card-body">
                <p class="card-text mt-4">Sender - <?php echo $rows['sender']; ?></p>
                <a href="javascript:void(0);" class="card-link">Receiver - <?php echo $rows['receiver']; ?></a>
                <br>
                <a href="javascript:void(0);" class="card-link"><?php echo $rows['balance']; ?></a>
                <br><a href="javascript:void(0);" class="card-link"><?php echo $rows['datetime']; ?></a>
               
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

  <!-- modal end -->

        <?php
            }
            

          }

          else{
             ?>
              <tr>
                <th>no data</th>
                <th></th>
                <th></th>
                <th></th>
                <th style="float: right;"><b><a href="index.php"><button class="btn btn-danger"><i class="fa fa-home" style="font-size:25px"></i>
</button></a></b></th>
            </tr>
             <?php
          }

        ?>
        </tbody>
    </table>

    


    </div>
</div>
</body>
</html>