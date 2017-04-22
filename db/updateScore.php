<?php
session_start();
$userName=$_POST['userName'];
$score=$_POST['score'];
//$userName='test2';
//$score='win';
//$score='loss';
//$score='draw';
include '../../php/p3dbConnect.php';
$conn=makeConnect();
//DB transactions begins 
if ($score=='win'){
$stmt = $conn->prepare("UPDATE p3.user SET win = win+1 WHERE userName = :username;");
}
else if ($score=='draw'){
$stmt = $conn->prepare("UPDATE p3.user SET win = win+.5 WHERE userName = :username;");
}
else if ($score=='loss'){
$stmt = $conn->prepare("UPDATE p3.user SET loss= loss+1 WHERE userName = :username;");
}
// udpate score execute
$stmt->bindParam(':username', $userName);
$stmt->execute();
$stmt = $conn->prepare("SELECT * FROM p3.user WHERE userName=:username;");
$stmt->bindParam(':username', $userName);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
  $_SESSION['userName']=$result['userName'];
  $_SESSION['displayName']=$result['displayName'];
  $_SESSION['win']=$result['win'];
  $_SESSION['loss']=$result['loss'];
        $myData=array('userName' =>$result['userName'],'displayName' =>$result['displayName'],'win'=>$result['win'],'loss'=>$result['loss']);
        //$myData=$result['userName'];
        $jsonData=json_encode($myData);
echo ($jsonData);
//echo ($myData);
?>
