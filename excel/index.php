
<!DOCTYPE html>
<?php require_once('./mysqli_connect.php'); ?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Import Excel To Mysql Database Using PHP </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Import Excel File To MySql Database Using php">

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="css/bootstrap-custom.css">


	</head>
	<body>    

	<!-- Navbar
    ================================================== -->

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container"> 
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Import Excel To Mysql Database Using PHP</a>
				
			</div>
		</div>
	</div>

	<div id="wrap">
	<div class="container">
		<div class="row">
			<div class="span3 hidden-phone"></div>
			<div class="span6" id="form-login">
				<form class="form-horizontal well" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Import CSV/Excel file</legend>
						<div class="control-group">
							<div class="control-label">
								<label>CSV/Excel File:</label>
							</div>
							<div class="controls">
								<input type="File" name="File" id="File" class="input-large">
							</div>
						</div>
						
						<div class="control-group">
							<div class="controls">
							<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="span3 hidden-phone"></div>
		</div>
		

		<table width="100%" border="1">
			<tr>
				<th>ID</th>
				<th>Member ID</th>
				<th>Payment Status</th>
				<th>Date Applied</th>
				<th>Result</th>
			</tr>
			<?php
			
			//get rows query
			$query = mysqli_query($con, "SELECT * FROM application ORDER BY applicationID DESC");
			
			//number of rows
			$rowCount = mysqli_num_rows($query);
			
			$sno = 1;
			if($rowCount > 0)
			{
				while($row = mysqli_fetch_assoc($query))
			{
			?>
			<tr>
				<td align="center"><?php echo $sno; ?>)</td>
				<td><?php echo ucfirst($row["MemberID"]); ?></td>
				<td><?php echo ucfirst($row["PaymentStatus"]); ?></td>
				<td><?php echo ucfirst($row["DateApplied"]); ?></td>
				<td><?php echo ucfirst($row["Result"]); ?></td>
			</tr>
			<?php $sno++;
				}
			} ?>
		</table>
	</div>

	</div>

	</body>
</html>