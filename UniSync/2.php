<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniSync Assessment - Part 2</title>
</head>
<body>
    <h2>Payslip Calculator</h2>
    <form method="post" action="">
        <label for="employee_name">Employee Name:</label>
        <input type="text" name="employee_name" id="employee_name" required><br><br>
        <label for="monthly_wage">Monthly Wage (SAR):</label>
        <input type="number" name="monthly_wage" id="monthly_wage" value="" required><br><br>
        <label for="unpaid_hours">Unpaid Hours:</label>
        <input type="number" name="unpaid_hours" id="unpaid_hours" value="" required><br><br>
        <button type="submit" name="calculate">Calculate</button>
    </form>
    
    <?php
    if (isset($_POST['calculate'])) {
        $employeeName = $_POST['employee_name'];
        $monthlyWage = $_POST['monthly_wage'];
        $unpaidHours = $_POST['unpaid_hours'];
        $netSalary = calculateNetSalary($monthlyWage, $unpaidHours);
        echo "<p>" . $employeeName . "'s Payslip amount for March: " . $netSalary . " SAR</p>";
    }

    function calculateNetSalary($monthlyWage, $unpaidHours) {
        $dailyRate = $monthlyWage / 30 / 8;
        $unpaidDeduction = $dailyRate * $unpaidHours;
        $netSalary = $monthlyWage - $unpaidDeduction;
        return $netSalary;
    }
    ?>
</body>
</html>
