<?php
require 'config.php';

#$dropdown = mysqli_query($conn, "SELECT address FROM tb_branch")->fetch_all();
#var_dump($dropdown);

if (isset($_POST["submit"])) {
    $_SESSION["appointment_branch_id"] = $_POST["branch_id"];
    header("Location: appointment_registration_step2.php");
}
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Запись на прием</title>
</head>

<body>
    <h2>Выберите филиал клиники:</h2>
    <form class="" action="" method="post" autocomplete="off">
        <label for="branch">Филиал :</label>
        <select name="branch_id" id="branch_id">
            <?php
            $dropdown = mysqli_query($conn, "SELECT address FROM tb_branch")->fetch_all();
            foreach ($dropdown as $n => $opt) {
                printf('<option value="%s">%s</option>', $n + 1, $opt[0]);
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