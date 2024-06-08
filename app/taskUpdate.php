<?php
namespace App;
require_once('../vendor/autoload.php');
$request = new RequestBD;
$connect = new Connection();
$connect = $connect->connect();
class TaskUpdate{
    public function update($connect, $id, $name, $description, $deadline, $status){
        try{
            $sql = "UPDATE tasks SET task_name='$name', task_description = '$description', status_id = '$status', deadline='$deadline' WHERE id = '$id'";
            $row = $connect->prepare($sql);
            $row->execute();
            header('Location: ../public/index.php');
            return;
        } catch(\Exception $e){
            exit ($e -> getMessage());
        }
    }
}           

if (isset($_POST['submit'])){
    if($_POST['name'] != '' && $_POST['description'] != '' && $_POST['deadline'] != ''){
        $task = new TaskUpdate;
        $task->update($connect, $_POST['id'], $_POST['name'], $_POST['description'], $_POST['deadline'], $request->idStatus($connect, $_POST['status']));
    }
    else {
        echo "Заполните все поля!";
    }
}
?>