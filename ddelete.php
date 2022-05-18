<?php
include "../owners/config.php";
$id = $_GET['id'];

$query = "DELETE FROM adverts WHERE adverts.id = '$id' ";
$data = mysqli_query($conn,$query);

if($data){
    echo
    "
    <script>
      alert('Deleted successfully');
      document.location.href = 'requests.php';
    </script>
    ";
     
}
else{
    echo "failed!";
}
?>