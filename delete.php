<?php
include "config.php";
$id = $_GET['id'];

$query = "DELETE FROM properties WHERE properties.id = '$id' ";
$data = mysqli_query($conn,$query);

if($data){
    echo
    "
    <script>
      alert('Deleted successfully');
      document.location.href = 'view.php';
    </script>
    ";
     
}
else{
    echo "failed!";
}
?>