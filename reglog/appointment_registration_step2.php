<?php
require 'config.php';

$appointment_branch_id = $_SESSION["appointment_branch_id"];
if (isset($_POST["submit"])) {
    $doctor_name = $_POST["doctor_name"];
    $doctor_id = mysqli_query($conn, "SELECT doctor_id FROM tb_doctor WHERE fullname = '$doctor_name'")->fetch_array()['doctor_id'];
    $_SESSION["appointment_doctor_id"] = $doctor_id;
    #var_dump($doctor_id);
    header("Location: appointment_registration_step3.php");
}
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Запись на прием</title>
</head>

<body>
    <h2>Выберите врача:</h2>
    <form class="" action="" method="post" autocomplete="off">
        <label for="doctor_name">Врач :</label>
        <select name="doctor_name" id="doctor_name">
            <?php
            $dropdown = mysqli_query($conn, "SELECT fullname FROM tb_doctor WHERE branch_id='$appointment_branch_id'")->fetch_all();
            foreach ($dropdown as $n => $opt) {
                printf('<option value="%s">%s</option>', $opt[0], $opt[0]);
            }
            ?>
        </select>
        <button type="submit" name="submit">Далее</button>
    </form>
    <br>
    <div>
        <a href="user_lk.php">Назад к личному кабинету</a>
    </div>
</body>

</html>