<?php
require 'config.php';

$this_day = getdate()['mday'];
$this_month = getdate()['mon'];

$days_in_months_list = (object) [
    1 => 31,
    2 => 28,
    3 => 31,
    4 => 30,
    5 => 31,
    6 => 30,
    7 => 31,
    8 => 31,
    9 => 30,
    10 => 31,
    11 => 30,
    12 => 31,
  ];

$names_of_months_list = (object) [
    1 => 'January',
    2 => 'February',
    3 => 'March',
    4 => 'April',
    5 => 'May',
    6 => 'June',
    7 => 'July',
    8 => 'August',
    9 => 'September',
    10 => 'October',
    11 => 'November',
    12 => 'December',
  ];


$dropdown_dates = [];
$dropdown_months = [];

for ($i = 1; $i <= 7; $i++) {
    $this_day += 1;
    if ($this_day > $days_in_months_list->$this_month) {
        $this_day = 1;
        if ($this_month == 12) {
            $this_month = 1;
        } else {
            $this_month += 1;
        }
    }
    array_push($dropdown_dates, $this_day);
    array_push($dropdown_months, $names_of_months_list->$this_month);
}

$appointment_branch_id = $_SESSION["appointment_branch_id"];
$doctor_id = $_SESSION["appointment_doctor_id"];

if (isset($_POST["submit"])) {
    $last_id = mysqli_query($conn, "SELECT count(*) FROM tb_appointment")->fetch_array();
    $appointment_id = intval($last_id[0]) + 1;

    $user_id = $_SESSION["user_id"];
    $service_id = $_POST["service_id"];
$unformatted_time = [$_POST["date"], $_POST["time"]];
$time = implode(" ", $unformatted_time);;
var_dump($time);
$result = 'ожидание результатов';

$query = mysqli_query($conn, "INSERT INTO tb_appointment (appointment_id, doctor_id, service_id, user_id, time, result)
VALUES('$appointment_id', '$doctor_id', '$service_id', '$user_id', '$time', '$result')");

header("Location: user_lk.php");
}
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Запись на прием</title>
</head>

<body>
    <h2>Выберите услугу и дату:</h2>
    <form class="" action="" method="post" autocomplete="off">
        <label for="service_id">Услуга :</label>
        <select name="service_id" id="service_id">
            <?php
            $dropdown = mysqli_query($conn, "SELECT name FROM tb_service")->fetch_all();
            foreach ($dropdown as $n => $opt) {
              printf('<option value="%s">%s</option>', $n + 1, $opt[0]);
            }
            ?>
            </select>
            <label for="date">Дата :</label>
            <select name="date" id="date">
                <?php
            $dropdown = $dropdown_dates;
            foreach ($dropdown as $n => $opt) {
                printf('<option value="%s %s">%s %s</option>', $opt, $dropdown_months[$n], $opt, $dropdown_months[$n]);
            }
            ?>
            </select>
            <label for="time">Время :</label>
            <select name="time" id="time">
                <option>00-00</option>
                <option>01-00</option>
                <option>02-00</option>
                <option>03-00</option>
                <option>04-00</option>
                <option>05-00</option>
                <option>06-00</option>
                <option>07-00</option>
                <option>08-00</option>
                <option>09-00</option>
                <option>10-00</option>
                <option>11-00</option>
                <option>12-00</option>
                <option>13-00</option>
                <option>14-00</option>
                <option>15-00</option>
                <option>16-00</option>
                <option>17-00</option>
                <option>18-00</option>
                <option>19-00</option>
                <option>20-00</option>
                <option>21-00</option>
                <option>22-00</option>
                <option>23-00</option>
            </select>
            <button type="submit" name="submit">Далее</button>
    </form>
    <br>
    <div>
        <a href="user_lk.php">Назад к личному кабинету</a>
    </div>
</body>

</html>