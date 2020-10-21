<?php

include "connection.php"; 


// get id through query string
$BookID = $_GET['BookID'];


echo $BookID;

/*$delete = "DELETE FROM status WHERE b_id = '$Bid' AND m_id = '$Mid' ";
$del = mysqli_query($conn,$delete); // delete query


if($del)
{
    mysqli_close($conn); // Close connection
    header("location:admin.php"); // redirect to admin page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>

*/