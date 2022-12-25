<?php
require 'config.php';
if (!($_SESSION["login"] == true)) {
  header("Location: index.php");
} else {
  $user_id = $_SESSION["user_id"];
}

$query_array = mysqli_query($conn, "SELECT * FROM tb_appointment WHERE user_id = '$user_id'")->fetch_all();

var_dump($query_array);
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Просмотр ваших записей на прием</title>
</head>
<h1>Просмотр ваших записей на прием</h1>
<body>
<?php
$no = 1;
foreach ($query_array as $value) {

    $doctor_branch_id = mysqli_query($conn, "SELECT branch_id FROM tb_doctor WHERE doctor_id = '$value[1]'")->fetch_array()['branch_id'];

    $branch_adress = mysqli_query($conn, "SELECT address FROM tb_branch WHERE branch_id = '$doctor_branch_id'")->fetch_array()['address'];

    $service_name = mysqli_query($conn, "SELECT name FROM tb_service WHERE service_id = '$value[2]'")->fetch_array()['name'];

    $service_price = mysqli_query($conn, "SELECT price FROM tb_service WHERE service_id = '$value[2]'")->fetch_array()['price'];
    
    $doctor_name = mysqli_query($conn, "SELECT fullname FROM tb_doctor WHERE doctor_id = '$value[1]'")->fetch_array()['fullname'];
    
    printf('<div> %s. </div>', $no);
    printf('<div> Услуга: %s </div>', $service_name);
    printf('<div> Филиал: %s </div>', $branch_adress);
    printf('<div> Врач: %s </div>', $doctor_name);
    printf('<div> Дата и время: %s</div>', $value[4]);
    printf('<div> Стоимость: %s рублей</div>', $service_price);
    printf('<div> Результат: %s</div>', $value[5]);
    $no += 1;
}
?>
<div>
    <a href="user_lk.php">Назад к личному кабинету</a>
</div>
</body>

</html>