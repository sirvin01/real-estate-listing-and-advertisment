<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<div class="container">
	<div class="row">
		<?php
		include "owners/config.php";
		$query = "SELECT * FROM properties";
		$result = mysqli_query($conn,$query);
		$data = mysqli_num_rows($result)>0;
		if($data){
        while($row = mysqli_fetch_array($result)){
          ?>
		  <div class="col-md-4" style="display: grid;">
			<div class="card">
				<div class="card-body">
					<img src="owners/img/<?php echo  $row['house'] ?>" height="200px" width="200px" alt="" class="card">
					<h2 class="title"><?php echo  $row['username']; ?></h2>
					<p class="card-text" ><?php echo  $row['location']; ?></p>
				</div>
			</div>
		</div>
		<?php
			// echo  $row['username'];
		}
		}
		else{
			echo "no records";
		}
		?>
		
	</div>
</div> 
</body>
</html>