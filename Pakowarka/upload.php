<?php
if(isset($_FILES['obrazy'])){
$zip=new ZipArchive();
$nazwa="paczka_".time().".zip";
$zip->open($nazwa,ZipArchive::CREATE);
foreach($_FILES['obrazy']['tmp_name'] as $i=>$tmp){
$nazwa_org=$_FILES['obrazy']['name'][$i];
$ext=strtolower(pathinfo($nazwa_org,PATHINFO_EXTENSION));
if($ext=="jpg"||$ext=="jpeg"||$ext=="png"){
$zip->addFile($tmp,$nazwa_org);
}
}
$zip->close();
echo "<a href='$nazwa'>Pobierz paczkę</a>";
}
?>