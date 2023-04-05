<?php
$file = fopen('chat.txt', 'a+');

if (isset($_POST['message']) && !empty($_POST['message'])) {


    $message = $_POST['message'];
    fputs($file, $message . "\n");
    echo "ok";
    die();
}


$messages = file_get_contents('chat.txt');


echo $messages;
?>