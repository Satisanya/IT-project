<?php
require 'config.php';

if (isset($_POST["submit"])) {
    $last_id = mysqli_query($conn, "SELECT count(*) FROM tb_branch")->fetch_array();
    $branch_id = intval($last_id[0]) + 1;
    $address = $_POST["address"];
    $unformatted_schedule = [
        $_POST["monday-open"], $_POST["monday-close"],
        $_POST["tuesday-open"], $_POST["tuesday-close"],
        $_POST["wednesday-open"], $_POST["wednesday-close"],
        $_POST["thursday-open"], $_POST["thursday-close"],
        $_POST["friday-open"], $_POST["friday-close"],
        $_POST["saturday-open"], $_POST["saturday-close"],
        $_POST["sunday-open"], $_POST["sunday-close"]
    ];
    $schedule = implode(" ", $unformatted_schedule);
    $query = "INSERT INTO tb_branch (branch_id, address, schedule) VALUES('$branch_id', '$address', '$schedule')";
    $result = mysqli_query($conn, $query);
    if (false === $result) {
        printf("error: %s\n", mysqli_error($conn));
    } else {
        echo "<script> alert('Филиал добавлен!') </script>";
        header("Location: sysadmin_lk.php");
    }
}
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Добавление филиала</title>
</head>

<body>
    <h2>Добавление филиала</h2>
    <form class="" action="" method="post" autocomplete="off">
        <label for="address">Адрес : </label>
        <input type="text" name="address" id="address" required value=""> <br>
        <div>График работы (если выходной - оставить два прочерка):</div>
        <div> ПН
            <label for="monday-open">Открытие : </label>
            <select name="monday-open" id="monday-open">
                <option>-</option>
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
                <option>24-00</option>
            </select>
            <label for="monday-close">Закрытие : </label>
            <select name="monday-close" id="monday-close">
                <option>-</option>
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
                <option>24-00</option>
            </select>
        </div>
        <div> ВТ
            <label for="tuesday-open">Открытие : </label>
            <select name="tuesday-open" id="tuesday-open">
                <option>-</option>
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
                <option>24-00</option>
            </select>
            <label for="tuesday-close">Закрытие : </label>
            <select name="tuesday-close" id="tuesday-close">
                <option>-</option>
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
                <option>24-00</option>
            </select>
        </div>
        <div> СР
            <label for="wednesday-open">Открытие : </label>
            <select name="wednesday-open" id="wednesday-open">
                <option>-</option>
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
                <option>24-00</option>
            </select>
            <label for="wednesday-close">Закрытие : </label>
            <select name="wednesday-close" id="wednesday-close">
                <option>-</option>
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
                <option>24-00</option>
            </select>
        </div>
        <div> ЧТ
            <label for="thursday-open">Открытие : </label>
            <select name="thursday-open" id="thursday-open">
                <option>-</option>
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
                <option>24-00</option>
            </select>
            <label for="thursday-close">Закрытие : </label>
            <select name="thursday-close" id="thursday-close">
                <option>-</option>
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
                <option>24-00</option>
            </select>
        </div>
        <div> ПТ
            <label for="friday-open">Открытие : </label>
            <select name="friday-open" id="friday-open">
                <option>-</option>
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
                <option>24-00</option>
            </select>
            <label for="friday-close">Закрытие : </label>
            <select name="friday-close" id="friday-close">
                <option>-</option>
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
                <option>24-00</option>
            </select>
        </div>
        <div> СБ
            <label for="saturday-open">Открытие : </label>
            <select name="saturday-open" id="saturday-open">
                <option>-</option>
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
                <option>24-00</option>
            </select>
            <label for="saturday-close">Закрытие : </label>
            <select name="saturday-close" id="saturday-close">
                <option>-</option>
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
                <option>24-00</option>
            </select>
        </div>
        <div> ВС
            <label for="sunday-open">Открытие : </label>
            <select name="sunday-open" id="sunday-open">
                <option>-</option>
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
                <option>24-00</option>
            </select>
            <label for="sunday-close">Закрытие : </label>
            <select name="sunday-close" id="sunday-close">
                <option>-</option>
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
                <option>24-00</option>
            </select>
        </div>
        <button type="submit" name="submit">Добавить</button>
    </form>
    <br>
    <div>
        <a href="sysadmin_lk.php">Перейти к личному кабинету</a>
    </div>
</body>

</html>