<?php	
$dbParams=require(
	'db.php'
);
	
$db=new PDO (
	"mysql:host=localhost;dbname=".$dbParams['database'].";charset=utf8",
	$dbParams['username'],
	$dbParams['password']
);
$students=$db
    // ->query('SELECT * FROM `student` where `status`=0') отчисленные студенты
	// ->query('SELECT * FROM `student` where `status`=1') действующие студенты
	->query('SELECT * FROM `student` where `status`=0')
    ->fetchAll(PDO::FETCH_ASSOC); //возвращается ассоциативный массив, ключи — имена полей
Foreach ($students as $student){
	echo "<p>".htmlspecialchars($student['lastName'])."</p>";
}
?>