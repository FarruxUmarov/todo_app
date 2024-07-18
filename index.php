<?php

require 'DB.php';
require 'todo.php';

$pdo = DB::connect();
$todo = new Todo($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['text'])) {
        $text = $_POST['text'];
        $todo->setTodo($text);
    }
    header('location: index.php');
    exit();
}

$todoList = $todo->getTodo();

if(!empty($_GET)){
    if(isset($_GET['delete'])){
        $todo->Delete($_GET['delete']);
    }
    
    if(isset($_GET['update'])){
        $todo->Update($_GET['update']);
    }
}

require 'view.php';
?>
