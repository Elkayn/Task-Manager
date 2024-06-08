<?php
    require_once('../vendor/autoload.php');
    $connect = new App\Connection();
    $connect = $connect->connect();
    $task = new App\TaskUpdate;
    $request = new App\RequestBD;

    if (isset($_POST['update'])){
        $idTask = $_POST['id'];
    }
    else echo "NO";

    $selectTask = $request->selectTask($connect, $idTask);
?>

<html>
    <head>
        <title>Редактирование задачи</title>
        <link rel="stylesheet" href="../css/style.css"/>
    </head>
    <body>
        <div class="form-container">
            <div class="form-body">
                <a href="<?php echo URL?>index.php">Назад</a>
                <div class="container-polei">
                    <h2>Редактирование задачи</h2>
                </div>
                <form action="../app/taskUpdate.php" method="post">
                    <div class="container-polei">
                        <label>Название: </label>
                        <input name="name" type="text" value="<?php echo $selectTask['task_name']?>">
                        <input type="hidden" name="id" value="<?php echo $idTask ?>">
                    </div>
                    <div class="container-polei">
                        <label>Описание: </label>
                        <textarea name="description" type="text"><?php echo $selectTask['task_description']?></textarea>
                    </div>
                    <div class="container-polei">
                        <label>Статус: </label>
                        <select name="status">
                            <option selected="selected"><?php echo $selected = $request->nameStatus($connect, $selectTask['status_id'], 'status_name'); ?></option>
                            <?php
                            $rows = $request->selectRequest($connect, 'taskstatus');
                                foreach ($rows as $row){ 
                                    if($selected != $row['status_name']) {?>
                            <option><?php echo $row['status_name']; ?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="container-polei">
                        <label>Срок сдачи: </label>
                        <input name="deadline" type="date" value="<?php echo $selectTask['deadline']?>">
                    </div>
                    <div class="container-polei">
                        <input name="submit" class="submit" type="submit" value="Сохранить">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>