<?php 
include "config.php";

// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$user_id = $_GET['id'];

	// write delete query
	$sql = "DELETE FROM `transaction` WHERE `id`='$user_id'";

	// Execute the query

	$result = $conn->query($sql);
     $yourURL = "../../history.php";
	if ($result == TRUE) {
		echo ("<script>location.href='$yourURL'</script>");
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}

?>