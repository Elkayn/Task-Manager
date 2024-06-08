<?php
namespace App;
require_once('../vendor/autoload.php');
$connect = new Connection();
$connect = $connect->connect();

class DeleteTask{
    public function delete($connect, $id){
        try{
            $sql = "DELETE FROM tasks WHERE id = '$id'";
            $row = $connect->prepare($sql);
            $row->execute();
            header('Location: ../public/index.php');
            return;
        } catch (\Exception $e){
            exit( $e->getMessage());
        }
    }
}

if(isset($_POST['delete'])){
    $delete = new DeleteTask;
    $delete->delete($connect, $_POST['id']);
}
else echo "Ошибка";

?>