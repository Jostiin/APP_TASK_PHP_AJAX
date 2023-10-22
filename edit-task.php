<?php
    include("database.php");
    if(isset($_POST['id']) && isset($_POST['edit'])==false ){
        $id = $_POST['id'];
        $query = "SELECT * FROM homeworks3roi WHERE id=$id";
        $result = mysqli_query($connection,$query);
        
        $json = array();
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'id' =>  $row['id'],
                'task' => $row['Title'],
                'description' => $row['Description']
            );
        };
        $jsonencode = json_encode($json);
        echo $jsonencode;
    }else{
        $id = $_POST['id'];
        $task = $_POST['task'];
        $description = $_POST['description'];
        $query = "UPDATE homeworks3roi SET Title='$task',Description='$description' WHERE id=$id";
        $result = mysqli_query($connection,$query);
        echo $id;
    }
?>