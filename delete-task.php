<?php
    include("database.php");
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $query = "DELETE FROM homeworks3roi WHERE id=$id";
        $result = mysqli_query($connection,$query);
        echo $result;
    }
?>