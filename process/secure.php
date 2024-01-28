<?php 
 session_start();
 if($_SESSION['email'] && $_SESSION['name']){

 }
 else{
?>
<script>
location.replace("http://localhost/portfolio/login.php");
</script>

<?php
 }
?>