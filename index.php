<?php

require 'vendor/autoload.php';

$update = json_decode(file_get_contents('php://input'));

if (isset($update)){
    require 'bot/bot.php';
    return;
}
require 'src/DB.php';

require 'src/Todo.php';

require 'src/User.php';

$todo = new Todo();

if (!empty($_POST)){
    if (strlen($_POST['text'])){
        $todo->setTodo($_POST['text']);
        header('Location: index.php');
    }
}

if (!empty($_GET)){
    if (isset($_GET['update'])){
        $todo->Update($_GET['update']);
    }

    if (isset($_GET['delete'])){
        $todo->Delete($_GET['delete']);
    }
}

require 'view/view.php';
?>
