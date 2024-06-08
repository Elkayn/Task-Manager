<?php
    require_once('../vendor/autoload.php');
    $connect = new App\Connection();
    $connect = $connect->connect();
?>

<html>
    <head>
        <title>Главная</title>
        <link rel="stylesheet" href="../css/style.css"/>
    </head>
    <body>
        <div class="table-container">
            <div class="table-body">
                <div class="container-polei">
                    <h2>Список задач</h2>
                </div>
                    <table>
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Описание</t>
                            <th>Срок</th>
                            <th>Статус</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php $object = new App\RequestBD;
                            $rows = $object->selectRequest($connect, 'tasks');
                            $i = 1;
                            foreach($rows as $row){?>
                        <tr>                            
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['task_name']; ?></td>
                            <td><?php echo $row['task_description']; ?></td>
                            <td><?php echo $row['deadline']; ?></td>
                            <td><?php echo $object->nameStatus($connect, $row['status_id'], 'status_name'); ?></td>
                            <form action="updateTask.php" method="post">
                            <input type="hidden" name="id" value="<?php echo($row['id'])?>">
                                <td><input name="update" class="update-button" type="submit" value="Редактировать"></td>
                            </form>
                            <form action="../app/deleteTask.php" method="post">
                                <input type="hidden" name="id" value="<?php echo($row['id'])?>">
                                <td><input name="delete" class="delete-button" type="submit" value="Удалить"></td>
                            </form>
                        </tr>
                        <?php } ?>
                    </table>
                <div class="container-polei">
                    <a href="<?php echo URL?>addTask.php"><input class="submit" type="submit" value="Добавить"></a>
                </div>
            </div>
        </div>
    </body>
</html>