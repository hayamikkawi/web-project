<?php
@$dbA= new mysqli('localhost', 'root', '', 'pawfectHouse1');
$data=$_GET['id'];
$type=$_GET['type'];
echo $data;
if($type=='cat') {
    $queryA = "delete from cat where catId=$data";
    $dbA->query($queryA);
}
elseif ($type=='dog') {
    $queryA = "delete from dog where dogId=$data";
    $dbA->query($queryA);
}
elseif ($type=='items') {
    $queryA = "delete from items where itemId=$data";
    $dbA->query($queryA);
}

$dbA->commit();
$dbA->close();
?>
