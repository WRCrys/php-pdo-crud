<?php 
    require_once('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP PDO</title>
</head>
<body>
    <h2>Student List</h2>
    <a href="add.php">New</a><br/><br/>
    <table border="1px" cellpadding="5px" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
            $stmt = $con->prepare("SELECT * FROM tb_students ORDER BY student_id ASC");
            $stmt->execute();
            $result = $stmt->fetchAll();

            foreach($result as $row) {
                $id = $row['student_id'];            
        ?>
        <tr>
            <td><?=$row['student_id'];?></td>
            <td><?=$row['student_name'];?></td>
            <td><?=$row['age'];?></td>
            <td><?=$row['email'];?></td>
            <td>
                <a href="edit.php?id=<?=$row['student_id'];?>">Edit</a>
                <a href="delete.php?id=<?=$row['student_id'];?>">Delete</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>