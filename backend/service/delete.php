<?php require('../../process/db.php');
require('../../process/secure.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $delete="DELETE FROM service WHERE id='$id'";
    $delete_result=mysqli_query($conn,$delete);


?>
<script>
    location.replace("http://localhost/portfolio/backend/service/manage.php");
</script>
<?php
}
?>
