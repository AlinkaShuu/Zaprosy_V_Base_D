<html>
<a href="появилисьСсылки.php?status=1"> Текущие студенты</a>
<a href="появилисьСсылки.php?status=0"> Отчисленные студенты</a>
</html>
<?php	
$dbParams=require(
	'db.php'
);
$db=new PDO (
	"mysql:host=localhost;dbname=".$dbParams['database'].";charset=utf8",
	$dbParams['username'],
	$dbParams['password']
);
// !!!!!!!!!! при этом запросе в адресной строке пишем http://localhost/?status=1
if(isset($_GET['status'])){ //на проверку введения
	$studentsQuery=$db
		->prepare('SELECT * FROM `student` where `status`=:status'); //заготовка запроса на SQL, но поле статус не заполенено
	$studentsQuery
		->execute(['status'=>$_GET['status']]); //выполнение запроса
	$students=$studentsQuery //результат 
		->fetchAll(PDO::FETCH_ASSOC);  //PDO это экранирование результатов, извлечение массива всех студентов
	Foreach ($students as $student){
		echo "<p>".htmlspecialchars($student['lastName'])."</p>"; //вывод
	}
}

?>
