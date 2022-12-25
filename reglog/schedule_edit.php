<?php
require 'config.php';

$admin_id = $_SESSION["admin_id"];
$admin_branch_id = mysqli_query($conn, "SELECT branch_id FROM tb_admin WHERE admin_id = '$admin_id'")->fetch_array()['branch_id'];
;
$admin_branch_adress = mysqli_query($conn, "SELECT address FROM tb_branch WHERE branch_id = '$admin_branch_id'")->fetch_array()['address'];

if (isset($_POST["submit"])) {

    $unformatted_schedule = [
        $_POST["monday-open"], $_POST["monday-close"],
        $_POST["tuesday-open"], $_POST["tuesday-close"],
        $_POST["wednesday-open"], $_POST["wednesday-close"],
        $_POST["thursday-open"], $_POST["thursday-close"],
        $_POST["friday-open"], $_POST["friday-close"],
        $_POST["saturday-open"], $_POST["saturday-close"],
        $_POST["sunday-open"], $_POST["sunday-close"]
    ];

    $correction_check = true;
    for ($i = 0; $i < 7; $i += 2) {
        $opening = $unformatted_schedule[$i];
        $closing = $unformatted_schedule[$i + 1];
        if ((($opening == 'n') && ($closing != 'n')) || (($opening != 'n') && ($closing == 'n'))) $correction_check = false;

        elseif (((is_numeric($opening) == true) && (is_numeric($closing) == true)) && ($opening >= $closing)){
            $correction_check = false;
        }
    }

    if ($correction_check == false) {
        echo "Вы ввели нестыкующиеся данные - проверьте ввод и повторите снова!";
    } else {
        $branch_id = $admin_branch_id;
        $address = $admin_branch_adress;
        $schedule = implode(" ", $unformatted_schedule);
        $query = mysqli_query($conn, "UPDATE tb_branch SET schedule = '$schedule' WHERE branch_id = $branch_id");
        if (false === $result) {
            printf("error: %s\n", mysqli_error($conn));
        } else {
            echo "<script> alert('Филиал добавлен!') </script>";
            header("Location: admin_lk.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Редактирование расписания</title>
</head>

<body>
    <h2>Редактирование расписания</h2>
    <form class="" action="" method="post" autocomplete="off">
        <?php
    printf('<div> Адрес : %s</div>', $admin_branch_adress);
    ?>
        <div>График работы (если выходной - оставить два значения "n"):</div>
        <div> ПН
            <label for="monday-open">Открытие : </label>
            <select name="monday-open" id="monday-open">
                <option value="n">dayoff</option>
                <option value="0">00-00</option>
                <option value="1">01-00</option>
                <option value="2">02-00</option>
                <option value="3">03-00</option>
                <option value="4">04-00</option>
                <option value="5">05-00</option>
                <option value="6">06-00</option>
                <option value="7">07-00</option>
                <option value="8">08-00</option>
                <option value="9">09-00</option>
                <option value="10">10-00</option>
                <option value="11">11-00</option>
                <option value="12">12-00</option>
                <option value="13">13-00</option>
                <option value="14">14-00</option>
                <option value="15">15-00</option>
                <option value="16">16-00</option>
                <option value="17">17-00</option>
                <option value="18">18-00</option>
                <option value="19">19-00</option>
                <option value="20">20-00</option>
                <option value="21">21-00</option>
                <option value="22">22-00</option>
                <option value="23">23-00</option>
            </select>
            <label for="monday-close">Закрытие : </label>
            <select name="monday-close" id="monday-close">
                <option value="n">dayoff</option>
                <option value="1">01-00</option>
                <option value="2">02-00</option>
                <option value="3">03-00</option>
                <option value="4">04-00</option>
                <option value="5">05-00</option>
                <option value="6">06-00</option>
                <option value="7">07-00</option>
                <option value="8">08-00</option>
                <option value="9">09-00</option>
                <option value="10">10-00</option>
                <option value="11">11-00</option>
                <option value="12">12-00</option>
                <option value="13">13-00</option>
                <option value="14">14-00</option>
                <option value="15">15-00</option>
                <option value="16">16-00</option>
                <option value="17">17-00</option>
                <option value="18">18-00</option>
                <option value="19">19-00</option>
                <option value="20">20-00</option>
                <option value="21">21-00</option>
                <option value="22">22-00</option>
                <option value="23">23-00</option>
                <option value="24">24-00</option>
            </select>
        </div>
        <div> ВТ
            <label for="tuesday-open">Открытие : </label>
            <select name="tuesday-open" id="tuesday-open">
                <option value="n">dayoff</option>
                <option value="0">00-00</option>
                <option value="1">01-00</option>
                <option value="2">02-00</option>
                <option value="3">03-00</option>
                <option value="4">04-00</option>
                <option value="5">05-00</option>
                <option value="6">06-00</option>
                <option value="7">07-00</option>
                <option value="8">08-00</option>
                <option value="9">09-00</option>
                <option value="10">10-00</option>
                <option value="11">11-00</option>
                <option value="12">12-00</option>
                <option value="13">13-00</option>
                <option value="14">14-00</option>
                <option value="15">15-00</option>
                <option value="16">16-00</option>
                <option value="17">17-00</option>
                <option value="18">18-00</option>
                <option value="19">19-00</option>
                <option value="20">20-00</option>
                <option value="21">21-00</option>
                <option value="22">22-00</option>
                <option value="23">23-00</option>
            </select>
            <label for="tuesday-close">Закрытие : </label>
            <select name="tuesday-close" id="tuesday-close">
                <option value="n">dayoff</option>
                <option value="1">01-00</option>
                <option value="2">02-00</option>
                <option value="3">03-00</option>
                <option value="4">04-00</option>
                <option value="5">05-00</option>
                <option value="6">06-00</option>
                <option value="7">07-00</option>
                <option value="8">08-00</option>
                <option value="9">09-00</option>
                <option value="10">10-00</option>
                <option value="11">11-00</option>
                <option value="12">12-00</option>
                <option value="13">13-00</option>
                <option value="14">14-00</option>
                <option value="15">15-00</option>
                <option value="16">16-00</option>
                <option value="17">17-00</option>
                <option value="18">18-00</option>
                <option value="19">19-00</option>
                <option value="20">20-00</option>
                <option value="21">21-00</option>
                <option value="22">22-00</option>
                <option value="23">23-00</option>
                <option value="24">24-00</option>
            </select>
        </div>
        <div> СР
            <label for="wednesday-open">Открытие : </label>
            <select name="wednesday-open" id="wednesday-open">
                <option value="n">dayoff</option>
                <option value="0">00-00</option>
                <option value="1">01-00</option>
                <option value="2">02-00</option>
                <option value="3">03-00</option>
                <option value="4">04-00</option>
                <option value="5">05-00</option>
                <option value="6">06-00</option>
                <option value="7">07-00</option>
                <option value="8">08-00</option>
                <option value="9">09-00</option>
                <option value="10">10-00</option>
                <option value="11">11-00</option>
                <option value="12">12-00</option>
                <option value="13">13-00</option>
                <option value="14">14-00</option>
                <option value="15">15-00</option>
                <option value="16">16-00</option>
                <option value="17">17-00</option>
                <option value="18">18-00</option>
                <option value="19">19-00</option>
                <option value="20">20-00</option>
                <option value="21">21-00</option>
                <option value="22">22-00</option>
                <option value="23">23-00</option>
            </select>
            <label for="wednesday-close">Закрытие : </label>
            <select name="wednesday-close" id="wednesday-close">
                <option value="n">dayoff</option>
                <option value="1">01-00</option>
                <option value="2">02-00</option>
                <option value="3">03-00</option>
                <option value="4">04-00</option>
                <option value="5">05-00</option>
                <option value="6">06-00</option>
                <option value="7">07-00</option>
                <option value="8">08-00</option>
                <option value="9">09-00</option>
                <option value="10">10-00</option>
                <option value="11">11-00</option>
                <option value="12">12-00</option>
                <option value="13">13-00</option>
                <option value="14">14-00</option>
                <option value="15">15-00</option>
                <option value="16">16-00</option>
                <option value="17">17-00</option>
                <option value="18">18-00</option>
                <option value="19">19-00</option>
                <option value="20">20-00</option>
                <option value="21">21-00</option>
                <option value="22">22-00</option>
                <option value="23">23-00</option>
                <option value="24">24-00</option>
            </select>
        </div>
        <div> ЧТ
            <label for="thursday-open">Открытие : </label>
            <select name="thursday-open" id="thursday-open">
                <option value="n">dayoff</option>
                <option value="0">00-00</option>
                <option value="1">01-00</option>
                <option value="2">02-00</option>
                <option value="3">03-00</option>
                <option value="4">04-00</option>
                <option value="5">05-00</option>
                <option value="6">06-00</option>
                <option value="7">07-00</option>
                <option value="8">08-00</option>
                <option value="9">09-00</option>
                <option value="10">10-00</option>
                <option value="11">11-00</option>
                <option value="12">12-00</option>
                <option value="13">13-00</option>
                <option value="14">14-00</option>
                <option value="15">15-00</option>
                <option value="16">16-00</option>
                <option value="17">17-00</option>
                <option value="18">18-00</option>
                <option value="19">19-00</option>
                <option value="20">20-00</option>
                <option value="21">21-00</option>
                <option value="22">22-00</option>
                <option value="23">23-00</option>
            </select>
            <label for="thursday-close">Закрытие : </label>
            <select name="thursday-close" id="thursday-close">
                <option value="n">dayoff</option>
                <option value="1">01-00</option>
                <option value="2">02-00</option>
                <option value="3">03-00</option>
                <option value="4">04-00</option>
                <option value="5">05-00</option>
                <option value="6">06-00</option>
                <option value="7">07-00</option>
                <option value="8">08-00</option>
                <option value="9">09-00</option>
                <option value="10">10-00</option>
                <option value="11">11-00</option>
                <option value="12">12-00</option>
                <option value="13">13-00</option>
                <option value="14">14-00</option>
                <option value="15">15-00</option>
                <option value="16">16-00</option>
                <option value="17">17-00</option>
                <option value="18">18-00</option>
                <option value="19">19-00</option>
                <option value="20">20-00</option>
                <option value="21">21-00</option>
                <option value="22">22-00</option>
                <option value="23">23-00</option>
                <option value="24">24-00</option>
            </select>
        </div>
        <div> ПТ
            <label for="friday-open">Открытие : </label>
            <select name="friday-open" id="friday-open">
                <option value="n">dayoff</option>
                <option value="0">00-00</option>
                <option value="1">01-00</option>
                <option value="2">02-00</option>
                <option value="3">03-00</option>
                <option value="4">04-00</option>
                <option value="5">05-00</option>
                <option value="6">06-00</option>
                <option value="7">07-00</option>
                <option value="8">08-00</option>
                <option value="9">09-00</option>
                <option value="10">10-00</option>
                <option value="11">11-00</option>
                <option value="12">12-00</option>
                <option value="13">13-00</option>
                <option value="14">14-00</option>
                <option value="15">15-00</option>
                <option value="16">16-00</option>
                <option value="17">17-00</option>
                <option value="18">18-00</option>
                <option value="19">19-00</option>
                <option value="20">20-00</option>
                <option value="21">21-00</option>
                <option value="22">22-00</option>
                <option value="23">23-00</option>
            </select>
            <label for="friday-close">Закрытие : </label>
            <select name="friday-close" id="friday-close">
                <option value="n">dayoff</option>
                <option value="1">01-00</option>
                <option value="2">02-00</option>
                <option value="3">03-00</option>
                <option value="4">04-00</option>
                <option value="5">05-00</option>
                <option value="6">06-00</option>
                <option value="7">07-00</option>
                <option value="8">08-00</option>
                <option value="9">09-00</option>
                <option value="10">10-00</option>
                <option value="11">11-00</option>
                <option value="12">12-00</option>
                <option value="13">13-00</option>
                <option value="14">14-00</option>
                <option value="15">15-00</option>
                <option value="16">16-00</option>
                <option value="17">17-00</option>
                <option value="18">18-00</option>
                <option value="19">19-00</option>
                <option value="20">20-00</option>
                <option value="21">21-00</option>
                <option value="22">22-00</option>
                <option value="23">23-00</option>
                <option value="24">24-00</option>
            </select>
        </div>
        <div> СБ
            <label for="saturday-open">Открытие : </label>
            <select name="saturday-open" id="saturday-open">
                <option value="n">dayoff</option>
                <option value="0">00-00</option>
                <option value="1">01-00</option>
                <option value="2">02-00</option>
                <option value="3">03-00</option>
                <option value="4">04-00</option>
                <option value="5">05-00</option>
                <option value="6">06-00</option>
                <option value="7">07-00</option>
                <option value="8">08-00</option>
                <option value="9">09-00</option>
                <option value="10">10-00</option>
                <option value="11">11-00</option>
                <option value="12">12-00</option>
                <option value="13">13-00</option>
                <option value="14">14-00</option>
                <option value="15">15-00</option>
                <option value="16">16-00</option>
                <option value="17">17-00</option>
                <option value="18">18-00</option>
                <option value="19">19-00</option>
                <option value="20">20-00</option>
                <option value="21">21-00</option>
                <option value="22">22-00</option>
                <option value="23">23-00</option>
            </select>
            <label for="saturday-close">Закрытие : </label>
            <select name="saturday-close" id="saturday-close">
                <option value="n">dayoff</option>
                <option value="1">01-00</option>
                <option value="2">02-00</option>
                <option value="3">03-00</option>
                <option value="4">04-00</option>
                <option value="5">05-00</option>
                <option value="6">06-00</option>
                <option value="7">07-00</option>
                <option value="8">08-00</option>
                <option value="9">09-00</option>
                <option value="10">10-00</option>
                <option value="11">11-00</option>
                <option value="12">12-00</option>
                <option value="13">13-00</option>
                <option value="14">14-00</option>
                <option value="15">15-00</option>
                <option value="16">16-00</option>
                <option value="17">17-00</option>
                <option value="18">18-00</option>
                <option value="19">19-00</option>
                <option value="20">20-00</option>
                <option value="21">21-00</option>
                <option value="22">22-00</option>
                <option value="23">23-00</option>
                <option value="24">24-00</option>
            </select>
        </div>
        <div> ВС
            <label for="sunday-open">Открытие : </label>
            <select name="sunday-open" id="sunday-open">
                <option value="n">dayoff</option>
                <option value="0">00-00</option>
                <option value="1">01-00</option>
                <option value="2">02-00</option>
                <option value="3">03-00</option>
                <option value="4">04-00</option>
                <option value="5">05-00</option>
                <option value="6">06-00</option>
                <option value="7">07-00</option>
                <option value="8">08-00</option>
                <option value="9">09-00</option>
                <option value="10">10-00</option>
                <option value="11">11-00</option>
                <option value="12">12-00</option>
                <option value="13">13-00</option>
                <option value="14">14-00</option>
                <option value="15">15-00</option>
                <option value="16">16-00</option>
                <option value="17">17-00</option>
                <option value="18">18-00</option>
                <option value="19">19-00</option>
                <option value="20">20-00</option>
                <option value="21">21-00</option>
                <option value="22">22-00</option>
                <option value="23">23-00</option>
            </select>
            <label for="sunday-close">Закрытие : </label>
            <select name="sunday-close" id="sunday-close">
                <option value="n">dayoff</option>
                <option value="1">01-00</option>
                <option value="2">02-00</option>
                <option value="3">03-00</option>
                <option value="4">04-00</option>
                <option value="5">05-00</option>
                <option value="6">06-00</option>
                <option value="7">07-00</option>
                <option value="8">08-00</option>
                <option value="9">09-00</option>
                <option value="10">10-00</option>
                <option value="11">11-00</option>
                <option value="12">12-00</option>
                <option value="13">13-00</option>
                <option value="14">14-00</option>
                <option value="15">15-00</option>
                <option value="16">16-00</option>
                <option value="17">17-00</option>
                <option value="18">18-00</option>
                <option value="19">19-00</option>
                <option value="20">20-00</option>
                <option value="21">21-00</option>
                <option value="22">22-00</option>
                <option value="23">23-00</option>
                <option value="24">24-00</option>
            </select>
        </div>
        <button type="submit" name="submit">Добавить</button>
    </form>
    <br>
    <div>
        <a href="admin_lk.php">Перейти к личному кабинету</a>
    </div>
</body>

</html>