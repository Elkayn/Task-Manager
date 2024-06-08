<?php
namespace App;
require_once('../vendor/autoload.php');
$request = new RequestBD;
$connect = new Connection();
$connect = $connect->connect();
class TaskADD{
    public function taskAdd($connect, $name, $description, $statusID, $deadline){
        try{
            $sqlAdd = "INSERT INTO tasks (task_name, task_description, status_id, deadline) VALUES ('$name', '$description', '$statusID', '$deadline')";
            $resultAdd = $connect->prepare($sqlAdd);
            $resultAdd->execute();
            $resultAdd->fetch(\PDO::FETCH_ASSOC);
            header('Location: ../public/index.php');
            return;
        } catch (\Exception $e){
            exit($e->getMessage());
        }
    }
}

if (isset($_POST['add'])){
    if($_POST['name'] != '' && $_POST['description'] != '' && $_POST['deadline'] != ''){
        $addTask = new TaskADD;
        $addTask->taskAdd($connect, $_POST['name'], $_POST['description'], $request->idStatus($connect, $_POST['status']), $_POST['deadline']);
    }
    else {
        echo "Заполните все поля!";
    }
}
?>