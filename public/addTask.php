<?php
    require_once('../vendor/autoload.php');
    $connect = new App\Connection();
    $connect = $connect->connect();
?>

<html>
    <head>
        <title>Добавление задачи</title>
        <link rel="stylesheet" href="../css/style.css"/>
    </head>
    <body>
        <div class="form-container">
            <div class="form-body">
                <a href="<?php echo URL?>index.php">Назад</a>
                <div class="container-polei">
                    <h2>Добавление задачи</h2>
                </div>
                <form action="../app/taskADD.php" method="post">
                    <div class="container-polei">
                        <label>Название: </label>
                        <input name="name" type="text">
                    </div>
                    <div class="container-polei">
                        <label>Описание: </label>
                        <textarea name="description" type="text"></textarea>
                    </div>
                    <div class="container-polei">
                        <label>Статус: </label>
                        <select name="status">
                            <?php $request = new App\RequestBD;
                            $request = $request->selectRequest($connect, 'taskstatus');
                            $rows = $request;
                                foreach ($rows as $row){ ?>
                            <option><?php echo $row['status_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="container-polei">
                        <label>Срок сдачи: </label>
                        <input name="deadline" type="date">
                    </div>
                    <div class="container-polei">
                        <input name="add" class="submit" type="submit" value="Сохранить">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>