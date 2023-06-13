<?php

//CHECK IS WE HAVE A POST  AND POST DATA  
if(!empty($_POST)){
    if(isset($_POST["title"], $_POST["description"]) && !empty($_POST["title"]) &&!empty($_POST["description"]) && !empty($_GET['id'])){

        //INCLUDE THE CONNECTION TO THE DB
        require_once "../connection/connection.php";

        //SAVE DATA 
        $title = strip_tags($_POST["title"]);
        $description = strip_tags($_POST["description"]);
        $id = strip_tags($_GET['id']);

        //CREATE STATEMENT
        $sql = "UPDATE `list-todo` SET `title` = :title, `description` = :description WHERE `id` = :id";

        //PREPARE CONNECTION
        $statement = $db->prepare($sql);

        //BIND THE VALUES
        $statement->bindValue(":title", $title, PDO::PARAM_STR);
        $statement->bindValue(":description", $description, PDO::PARAM_STR);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);

        //EXECUTE STATEMENT
        $statement->execute();

        //RETURN TO THE INDEX.PHP PAGE
        header("location:../views/index.php");
    }else{
        die ("Please enter a title and description");
    }
}