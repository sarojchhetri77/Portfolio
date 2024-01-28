<?php 
session_start();
unset($_SESSION['name']);
?>
<script>
    location.replace('http://localhost/portfolio/login.php');
</script>
<?php

?>