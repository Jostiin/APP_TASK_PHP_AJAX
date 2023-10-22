<?php
    include("database.php");
    
    $query = "SELECT * FROM homeworks3roi";
    $result = mysqli_query($connection,$query);
    
    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id'=>$row['id'],
            'task' => $row['Title'],
            'description' => $row['Description']
        );
       
    };
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>