<?php

if(!empty($_POST)){
    if(isset($_POST["title"], $_POST["description"]) && !empty($_POST["title"]) && !empty($_POST["description"])){
        
        
        //INCLUDE THE CONNECTION TO THE DB
        include_once "../connection/connection.php";

        //SAVE THE FORM'S VALUES
        $title = strip_tags($_POST["title"]);
        $description = strip_tags($_POST["description"]);

        //CREATE THE STATEMENT
        $sql = "INSERT INTO `list-todo` (`title`, `description`) VALUES (:title, :description)";
        

        //PREPARE CONNECTION
        $statement = $db->prepare($sql);

        //BIND THE VALUE TO THE STATEMENT
        $statement->bindValue(":title", $title, PDO::PARAM_STR);
        $statement->bindValue(":description", $description, PDO::PARAM_STR);

        //EXECUTE THE STATEMENT

        $statement->execute();

        //RETURN TO THE INDEX.PHP PAGE
        header("location:../views/index.php");
        
    }else{
        die ("Please enter a title and description");
    }
}