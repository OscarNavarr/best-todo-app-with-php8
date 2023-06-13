<?php
if (empty($_GET['action']) || empty($_GET["id"])) {
    header("location:../views/index.php");
    exit("No action specified");
}

$action = $_GET['action'];
$id = $_GET['id'];
if ($action === "create-todo") {
    $formAction = "../helpers/create_todo.php";
} else {
    $formAction = "../helpers/edit_todo.php?id=".$id;
}
?>

<div class="w-full flex justify-center mt-[12rem]">
    <form action="<?= $formAction ?>" method="post">
        <div>
            <label for="title" class="mr-[2rem]">Title</label>
            <input class="border-b-[0.1rem] border-b-black" type="text" name="title" id="title">
        </div>
        <div class="mt-[1rem]">
            <label for="description" class="mr-[0.5rem]">Content</label>
            <input class="border-b-[0.1rem] border-b-black" type="text" name="description" id="description">
        </div>
        
        <div class="flex">
            <button class="border-[0.1rem] border-black bg-green-300 w-[8rem] mt-[1rem] mr-2" type="submit">Send</button>
            <a href="./index.php" class="bg-black text-white py-[0.1rem] w-[7rem] h-[1.6rem] mt-[1rem] text-center">Go Back</a>
        </div>
    </form>
</div>
