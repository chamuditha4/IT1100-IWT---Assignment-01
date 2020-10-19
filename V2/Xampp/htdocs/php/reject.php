<?php
    include_once 'config.php';
    $sql = "UPDATE cv SET status='rejected' WHERE id='" . $_GET["id"] . "'";
    if (mysqli_query($db, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($db);
    header('location: ApproveCv.php');
?>