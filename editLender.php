<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<a href="index.php" class="return-home-btn">Return to home</a>
	<?php $getLenderByID = getLenderByID($pdo, $_GET['lender_id']); ?>
	<h1>Modify Lender details</h1>
	<form action="core/handleForms.php?lender_id=<?php echo $_GET['lender_id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getLenderByID['first_name']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getLenderByID['last_name']; ?>">
		</p>
		<p>
			<label for="ContactInfo">Contact Information</label> 
			<input type="text" name="ContactInfo" value="<?php echo $getLenderByID['contact_info']; ?>">
		</p>
		<p>
			<label for="homeAddress">Home Address</label> 
			<input type="text" name="homeAddress" value="<?php echo $getLenderByID['home_address']; ?>">
		</p>
		<p>
			<label for="maxBorrowers">Max Borrowers</label> 
			<input type="text" name="maxBorrowers" value="<?php echo $getLenderByID['max_borrowers']; ?>">
		</p>
		<p>
			<input type="submit" name="editLenderBtn">
		</p>
	</form>
</body>
</html>