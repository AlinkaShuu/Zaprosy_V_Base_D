<?php	
$dbParams=require(
	'db.php'
);
	
$db=new PDO (
	"mysql:host=localhost;dbname=".$dbParams['database'].";charset=utf8",
	$dbParams['username'],
	$dbParams['password']
);

if($db
	->query('UPDATE `student` SET `status` = "0" WHERE `student`.`id` = 5') //запрос на изменение
	->execute()){
	echo 'Выполнено!';
} else {
	echo 'Ошибка!';
}
	


?>
