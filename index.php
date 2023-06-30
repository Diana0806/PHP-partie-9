<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier</title>
</head>
<body>
<form method="post" action="">
        <label for="month">Month:</label>
        <select name="month" id="month">
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>

        <label for="year">Year:</label>
        <select name="year" id="year">
            <?php
            $currentYear = date("Y");
            for ($i = $currentYear - 10; $i <= $currentYear + 10; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>

        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedMonth = $_POST["month"];
        $selectedYear = $_POST["year"];

        $firstDayOfMonth = mktime(0, 0, 0, $selectedMonth, 1, $selectedYear);
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $selectedMonth, $selectedYear);
        $dayOfWeek = date("N", $firstDayOfMonth);

        echo "<h2>" . date("F Y", $firstDayOfMonth) . "</h2>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Mon</th>";
        echo "<th>Tue</th>";
        echo "<th>Wed</th>";
        echo "<th>Thu</th>";
        echo "<th>Fri</th>";
        echo "<th>Sat</th>";
        echo "<th>Sun</th>";
        echo "</tr>";

        echo "<tr>";
        for ($i = 1; $i < $dayOfWeek; $i++) {
            echo "<td></td>";
        }

        $dayCounter = 1;
        while ($dayCounter <= $daysInMonth) {
            for ($i = $dayOfWeek; $i <= 7; $i++) {
                if ($dayCounter > $daysInMonth) {
                    break;
                }
                echo "<td>$dayCounter</td>";
                $dayCounter++;
            }
            echo "</tr>";
            echo "<tr>";
            $dayOfWeek = 1;
        }

        while ($dayCounter <= $daysInMonth) {
            echo "<td>$dayCounter</td>";
            $dayCounter++;
        }

        echo "</tr>";
        echo "</table>";
    }
    ?>
</body>
</html>

<!-- Exercice 1 -->

<?php
$date = date("d/m/Y");
echo $date;
?>
<br>

<!-- Exercice 2 -->

<?php
$date = date("d-m-y");
echo $date;
?>
<br>

<!-- Exercice 3 -->

<?php
setlocale(LC_TIME, "fr_FR.UTF-8");
$date = new DateTime();
$formattedDate = $date->format("l j F Y");
echo $formattedDate;
?>
<br>

<!-- Exercice 4 -->

<?php
$timestampToday = time();
$timestampSpecific = strtotime("2016-08-02 15:00:00");
echo $timestampToday . "<br>";
echo $timestampSpecific;
?>
<br>

<!-- Exercice 5 -->

<?php
$today = time();
$dateToCompare = strtotime("2016-05-16");
$daysDifference = ($today - $dateToCompare) / (60 * 60 * 24);
echo $daysDifference;
?>
<br>

<!-- Exercice 6 -->

<?php
$daysInFebruary2016 = cal_days_in_month(CAL_GREGORIAN, 2, 2016);
echo $daysInFebruary2016;
?>
<br>

<!-- Exercice 7 -->

<?php
$date = strtotime("+20 days");
echo date("d/m/Y", $date);
?>
<br>

<!-- Exercice 8 -->

<?php
$date = strtotime("-22 days");
echo date("d/m/Y", $date);
?>

