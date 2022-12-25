<?php
require 'config.php';
if (!($_SESSION["login"] == true)) {
    header("Location: index.php");
} else {
    $doctor_id = $_SESSION["doctor_id"];
}

$query_array = mysqli_query($conn, "SELECT * FROM tb_appointment WHERE doctor_id = '$doctor_id'")->fetch_all();

//var_dump($query_array);

if (isset($_POST["submit"])) {
    $appointment_no = $_POST["appointment_no"];
    $appointment_result = $_POST["appointment_result"];
    $real_appointment_id = $query_array[$appointment_no][0];
    $add_result = mysqli_query($conn, "UPDATE tb_appointment SET result = '$appointment_result' WHERE appointment_id = $real_appointment_id");
    header("Refresh:0");
}
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Просмотр записей и добавление результатов</title>
</head>

<body>
    <h1>Просмотр записей и добавление результатов</h1>
    <?php
    $no = 1;
    foreach ($query_array as $value) {

        $service_name = mysqli_query($conn, "SELECT name FROM tb_service WHERE service_id = '$value[2]'")->fetch_array()['name'];

        $service_price = mysqli_query($conn, "SELECT price FROM tb_service WHERE service_id = '$value[2]'")->fetch_array()['price'];

        $client_name = mysqli_query($conn, "SELECT fullname FROM tb_user WHERE user_id = '$value[3]'")->fetch_array()['fullname'];

        printf('<div> %s. </div>', $no);
        printf('<div> Услуга: %s </div>', $service_name);
        printf('<div> Врач: %s </div>', $client_name);
        printf('<div> Дата и время: %s</div>', $value[4]);
        printf('<div> Стоимость: %s рублей</div>', $service_price);
        printf('<div> Результат: %s</div>', $value[5]);
        $no += 1;
    }
    ?>
    <form class="" action="" method="post" autocomplete="off">
        <label for="appointment_no">Выбор приема для добавления результата :</label>
        <select name="appointment_no" id="appointment_no">
            <?php
        $no = 1;
        foreach ($query_array as $n) {
            printf('<option value="%s">%s</option>', $no - 1, $no);
            $no += 1;
        }
        ?>
        </select>
        <div><textarea name="appointment_result" id="appointment_result"></textarea></div>
        <div><button type="submit" name="submit">Добавить</button></div>
    </form>
    <div>
        <a href="doctor_lk.php">Назад к личному кабинету</a>
    </div>
</body>

</html>