<?php
@$dbA= new mysqli('localhost', 'root', '', 'pawfectHouse1');
$data=$_GET['id'];
$type=$_GET['type'];
if($type=='cat') {
    $queryA = "delete from catadopt where catId=$data";
    $dbA->query($queryA);
}
elseif ($type=='dog') {
    $queryA = "delete from dogadopt where dogId=$data";
    $dbA->query($queryA);

}
$dbA->commit();
$dbA->close();
?>

