<?php	
$dbParams=require(
	'db.php'
);
	
$db=new PDO (
	"mysql:host=localhost;dbname=".$dbParams['database'].";charset=utf8",
	$dbParams['username'],
	$dbParams['password']
);

$result=$db
	->query('SELECT count(*) count  FROM student where status=1')
	->fetch(PDO::FETCH_ASSOC); 
echo "<p>".'У нас учатся студентов '.$result['count']."</p>";
	


?>
