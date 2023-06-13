<?php

    //INCLUDE CONNECTION TO BD
    include_once "../connection/connection.php";

    //CREATE STATEMENT 
    $sql = "SELECT *  FROM `list-todo` ORDER BY `date` DESC";

    // PREPARE CONNECTION
    $statement = $db->prepare($sql);

    // EXECUTE STATEMENT
    $statement->execute();

    //FETCH ALL DATA
    $todos = $statement->fetchAll(PDO::FETCH_ASSOC);


    if(!empty($_POST)){
        if(isset($_POST['todo_id'])){

            $id = strip_tags($_POST['todo_id']);

            $sql = "DELETE FROM `list-todo` WHERE `id` = :id";

            $statement = $db->prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();

            header("location:./index.php");
        }else{
            die("Error  executing   statement");
        }
    }
?>
<div class="mt-[6rem] w-full flex justify-center ">
    <table class="">
        <thead class="border-[0.1rem] border-black">
        <tr>
            <th class="border-[0.1rem] border-black">Date</th>
            <th class="border-[0.1rem] border-black">Title</th>
            <th class="border-[0.1rem] border-black">Description</th>
            <th class="border-[0.1rem] border-black">Action</th>
        </tr>
        </thead>
        <tbody class="border-[0.1rem] border-black">
            <?php foreach($todos as $todo):?>
                <tr>
                <td class="border-[0.1rem] border-black"><strong><?= $todo["date"]?></strong></td>
                <td class="border-[0.1rem] border-black"><p><?= $todo["title"]?></p></td>
                <td class="border-[0.1rem] border-black"><p><?= $todo["description"]?></p></td>
                <td class="border-[0.1rem] border-black">
                    <div class="flex p-2"> 
                    <a href="../views/edit_todo.php?action=edit-todo&id=<?=$todo["id"]?>" class="bg-green-200 w-[5rem] text-center mr-2">Edit</a>
                    <form method="post">
                        <input type="hidden" name="todo_id" value="<?= $todo["id"]?>">
                        <button type="submit" class="bg-red-500 w-[5rem] text-center">Delete</button>
                    </form>
                    </div>
                </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<div class="flex justify-end mr-[6.8rem] mt-[1.5rem]">
    <a href="./create_todo.php?action=create-todo" class="bg-green-300 w-[8rem] h-[2.5rem] py-2 text-center">Create todo</a>
</div>