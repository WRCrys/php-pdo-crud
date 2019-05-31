<?php 
    require_once('dbcon.php');

    if(isset($_POST['btn_submit'])) {
        $name = $_POST['txt_student_name'];
        $age = $_POST['txt_age'];
        $email = $_POST['txt_email'];
        if(!empty($name) && !empty($age) && $email) {
            try {
                $stmt = $con->prepare("INSERT INTO tb_students(student_name, age, email) VALUES (:name, :age, :email)");
                $stmt->execute(array(':name'=>$name, ':age'=>$age, ':email'=>$email));
                header('Location:index.php');
            } catch (PDOException $error) {
                echo $error->getMessage();
            }
        } else {
            echo 'INPUT_NAME';
        }
    }
?>
<h2>Add New Student</h2>
<form action="" method="post">
    <table cellpading="5px">
        <tr>
            <td>Student Name</td>
            <td><input type="text" name="txt_student_name"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="number" name="txt_age"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="txt_email"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn_submit"></td>
        </tr>
    </table>
</form>