<?php
if (!isset($_SESSION['loggedinManager'])) {
  header('location: homeManager.php');
}elseif (!isset($_SESSION['loggedinAgent'])) {
  header('location: agent.php');
}else {
  session_start();
    header('location: index.php');
}
 ?>
