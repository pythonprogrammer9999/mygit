<?php
//ДЗ:
//* Создайте подготовленный запрос на удаление данных.
//** Удалите все строки у которых четные числа по столбцу ID
//*** Создайте подготовленный запрос с редактированием строки



//Запросы к БД MySQL используя PDO
try {
$dbh = new PDO('mysql:host=127.0.0.1;port=8889;dbname=test;charset=utf8', "root", "root");
} catch (PDOException $exception){
    print_r('Ошибка при подключении к базе данных');
}

$table = 'table_test';
$name= 'dima';
$age= '23';
$login= 'rod';


//$param = [
//    'name' => $name,
//    'age' => $age,
//    'login' => $login
//];
//$sql_insert = "INSERT INTO `table_test` (`id`, `name`, `age`, `login`) VALUES (NULL, :name, :age, :login)";
//$select = $dbh->prepare($sql_insert);
//$select->execute(['name'=>'dimaa', 'age'=>21, 'login'=>'rod']);


//находим максимальный id
$sql_max_id= "SELECT (`id`) FROM `$table` ORDER BY `id` DESC LIMIT 1";
//$sql_max_id = "SELECT max(`id`) FROM `$table`";
$max_id = $dbh->prepare($sql_max_id);
$max_id->execute();
while($row=$max_id->fetch()){
    $result = ($row['id']);
    echo($row['id']);
}
//Удаляем из таблицы все не четные id
for($i=0; $i<=$result; $i++){
    if ($i%2==0){
        $slq_delete = "DELETE FROM `table_test` WHERE `id`=:id";
        $delete = $dbh->prepare($slq_delete);
        $delete->execute(['id'=>$i]);
    }
}


$sql_update = "UPDATE `table_test` SET `name` = :name WHERE `table_test`.`id` = :id";
$update = $dbh->prepare($sql_update);
$update->execute(['name'=>'hi','id'=>7]);






