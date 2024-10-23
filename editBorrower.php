<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<a href="viewBorrowers.php?lender_id=<?php echo $_GET['lender_id']; ?>">
	View the borrowers</a>
	<h1>Modify borrower details</h1>
	<?php $getBorrowerByID = getBorrowerByID($pdo, $_GET['borrower_id']); ?>
	<form action="core/handleForms.php?borrower_id=<?php echo $_GET['borrower_id']; ?>&lender_id=<?php echo $_GET['lender_id']; ?>" method="POST">
		<p>
			<label for="borrowerName">Borrower Name</label> 
			<input type="text" name="borrowerName" value="<?php echo $getBorrowerByID['borrower_name']; ?>">
		</p>
		<p>
			<label for="loanAmount">Loan Amount</label> 
			<input type="text" name="loanAmount" value="<?php echo $getBorrowerByID['loan_amount']; ?>">
		</p>
		<p>
			<label for="interestRate">Interest Rate</label> 
			<input type="text" name="interestRate" value="<?php echo $getBorrowerByID['interest_rate']; ?>">
		</p>
		<p>
			<label for="repaymentSchedule">Repayment Schedule</label> 
			<input type="date" name="repaymentSchedule" value="<?php echo $getBorrowerByID['repayment_schedule']; ?>">

		</p>
		<p>
			<input type="submit" name="editBorrowerBtn">
		</p>
	</form>
</body>
</html>