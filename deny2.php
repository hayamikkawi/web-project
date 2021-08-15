<?php
@$dbA= new mysqli('localhost', 'root', '', 'pawfectHouse1');
$data=$_GET['id'];
$type=$_GET['type'];
if($type=='cat') {
    $queryA = "update cat set Available='1' where catId=$data";
    $dbA->query($queryA);
}
elseif ($type=='dog') {
    $queryA = "update dog set Available='1' where dogId=$data";
    $dbA->query($queryA);
}
$dbA->commit();
$dbA->close();
?>
