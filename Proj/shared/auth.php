<?php
$section=$_SESSION['section'];
if($section=="admin" || $section=="employee"){

}
else{
header('location:/Proj/alterPages/signin/signin.php');
}

?>