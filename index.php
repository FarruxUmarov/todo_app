<?php

require 'DB.php';

$pdo = DB::connect();
$status = false;

$stmt = $pdo->prepare("INSERT INTO todos(text, status) VALUES(:text, :status)");
$stmt->bindParam(':text', $_POST['text']);
$stmt->bindParam(':status', $status, PDO::PARAM_BOOL);
$stmt->execute();
// header("location: index.php");

$todoList = $pdo->query("SELECT * FROM todos")->fetchAll(PDO::FETCH_ASSOC);
?>

<ul>
    <?php 
    foreach ($todoList as $item):
    echo "<li>{$item['text']}</li>";
    endforeach; ?>
</ul>

<form action="index.php" method="post">
    <input type="checkbox" name="checkbox">
    <input type="text" name="text">
    <button type="Submit">Submit</button>

</form>



