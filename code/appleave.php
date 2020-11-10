<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	$sql = "SELECT * FROM `employee` where id = '$id'";
	$result = mysqli_query($conn, $sql);
	$employee = mysqli_fetch_array($result);
	$empName = ($employee['firstName']);
	//echo "$id";
?>


<?php


$sql = "Select employee.id, employee.firstName, employee.lastName, employee_leave.start, employee_leave.end, employee_leave.reason, employee_leave.status From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";
$result = mysqli_query($conn, $sql);
while ($employee = mysqli_fetch_assoc($result)) {
    $date1 = new DateTime($employee['start']);
    $date2 = new DateTime($employee['end']);
    $interval = $date1->diff($date2);
    $interval = $date1->diff($date2);

    echo "<tr>";
    echo "<td>".$employee['id']."</td>";
    echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
    
    echo "<td>".$employee['start']."</td>";
    echo "<td>".$employee['end']."</td>";
    echo "<td>".$interval->days."</td>";
    echo "<td>".$employee['reason']."</td>";
    echo "<td>".$employee['status']."</td>";
    
}


?>