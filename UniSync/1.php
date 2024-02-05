<?php
function calculateEndOfService($salary, $serviceYears) {
    if ($serviceYears <= 1) {
        return 0;
    } elseif ($serviceYears > 1 && $serviceYears <= 5) {
        return 0.5 * $salary * $serviceYears;
    } else {
        return (0.5 * 5 * $salary) + ($salary * ($serviceYears - 5));
    }
}


$basicSalary = 7400;
$yearsOfService = 0;
$eosAmount = calculateEndOfService($basicSalary, $yearsOfService);

if (isset($_POST['calculate'])) {
    $yearsOfService = $_POST['years_of_service'];
    $eosAmount = calculateEndOfService($basicSalary, $yearsOfService);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Unisync assessment - part one</title>
</head>
<body>
    <form method="post" action="">
        <label for="years_of_service"><b>Years of Service:</b></label>
        <input type="number" name="years_of_service" id="years_of_service" value="<?php echo $yearsOfService; ?>" required>
        <button type="submit" name="calculate">Calculate</button>
    </form>
    <p><b>End of Service Amount:</b> <?php echo $eosAmount; ?></p>
</body>
</html>
