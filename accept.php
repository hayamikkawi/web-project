<?php
@$dbA= new mysqli('localhost', 'root', '', 'pawfectHouse1');
$data=$_GET['id'];
$type=$_GET['type'];
if($type=='cat') {
    $queryA = "update cat set Accepted=1 where catId=$data";
    $dbA->query($queryA);
}
elseif ($type=='dog') {
    $queryA = "update dog set Accepted=1 where dogId=$data";
    $dbA->query($queryA);

}
elseif ($type=='items'){
    $queryA = "update items set Accepted=1 where itemId=$data";
    $dbA->query($queryA);
}
$dbA->commit();
$dbA->close();
?>
