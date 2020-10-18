<?php
    include_once 'config.php';
    $sql = "UPDATE persons SET email='peterparker_new@mail.com' WHERE id=1";
    if(mysqli_query($db, $sql)){
        echo "Records were updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    mysqli_close($db);
    header('location: deleteVacancy.php');
?>