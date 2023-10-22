<?php
    include('database.php');
    if(isset($_POST['task']) && isset($_POST['description'])){
       
        $task = $_POST['task'];
        $description = $_POST['description'];
        $query = "INSERT INTO homeworks3roi(Title,Description) VALUES ('$task','$description')";
        $result =mysqli_query($connection,$query);
    };
?>