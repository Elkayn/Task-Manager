<?php 
namespace App;

class RequestBD{
    public function selectRequest($connect, $nameTable){
        try{
            $sql = "SELECT * FROM $nameTable";
            $select = $connect->prepare($sql);
            $select->execute();
            $rows = $select->fetchAll(\PDO::FETCH_ASSOC);
            return $rows;
        } catch(\Exception $e){
            exit ($e -> getMessage());
        }
    }

    public function nameStatus($connect, $id, $column){
        try{
            $sql = "SELECT $column FROM taskstatus WHERE id = :id";
            $select = $connect->prepare($sql);
            $select->bindParam(':id', $id);
            $select->execute();
            $row = $select->fetch(\PDO::FETCH_ASSOC);
            return $row[$column];
        } catch(\Exception $e){
            exit ($e -> getMessage());
        }
    }

    public function idStatus($connect, $status){
        try{
            $sql = "SELECT id FROM taskstatus WHERE status_name = '$status'";
            $result = $connect->prepare($sql);
            $result->execute();
            $statusID = $result->fetch(\PDO::FETCH_ASSOC);
            return $statusID['id'];
        } catch(\Exception $e){
            exit ($e -> getMessage());
        }
    }
    
    public function selectTask($connect, $taskId){
        try{
            $sql = "SELECT * FROM tasks WHERE id = :id";
            $select = $connect->prepare($sql);
            $select->bindParam(':id', $taskId);
            $select->execute();
            $row = $select->fetch(\PDO::FETCH_ASSOC);
            return $row;
        } catch(\Exception $e){
            exit ($e -> getMessage());
        }
    }
}

?>