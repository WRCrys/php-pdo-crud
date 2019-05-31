<?php 
    require_once('dbcon.php');

    if(isset($_POST['btn_submit'])) {
        $id = $_POST['txt_id'];
        $name = $_POST['txt_student_name'];
        $age = $_POST['txt_age'];
        $email = $_POST['txt_email'];
        if(!empty($name) && !empty($age) && $email) {
            try {
                $stmt = $con->prepare("UPDATE tb_students set student_name = :name, age = :age, email = :email WHERE student_id = :id");
                $stmt->execute(array(':name'=>$name, ':age'=>$age, ':email'=>$email, ':id'=>$id));
                if($stmt) {
                    header('Location:index.php');
                }
            } catch (PDOException $error) {
                echo $error->getMessage();
            }
        } else {
            echo 'INPUT_NAME';
        }

        
    }
    $student_id = 0;
        $name = '';
        $age = 0;
        $email = '';

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $con->prepare('SELECT * FROM tb_students WHERE student_id = :id');
            $stmt->execute(array(':id'=>$id));
            $row = $stmt->fetch();
            $student_id = $row['student_id'];
            $name = $row['student_name'];
            $age = $row['age'];
            $email = $row['email'];
        }
?>
<h2>Edit Student</h2>
<form action="" method="post">
    <table cellpading="5px">
        <tr>
            <td>Student Name</td>
            <td><input type="text" name="txt_student_name" value="<?=$name;?>"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="number" name="txt_age" value="<?=$age?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="txt_email" value="<?=$email;?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="txt_id" value="<?=$student_id;?>"></td>
            <td><input type="submit" name="btn_submit"></td>
        </tr>
    </table>
</form>