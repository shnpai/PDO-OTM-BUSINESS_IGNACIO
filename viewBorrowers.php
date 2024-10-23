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
	<a href="index.php" class="return-home-btn">Return to home</a>
	<?php $getAllInfoByLenderID = getAllInfoByLenderID($pdo, $_GET['lender_id']); ?>
	<h1>Lender ID: <?php echo $getAllInfoByLenderID['lender_id']; ?></h1>
	<h3>Add a new Borrower to <?php echo $getAllInfoByLenderID['first_name']; ?></h3>
	<form action="core/handleForms.php?lender_id=<?php echo $_GET['lender_id']; ?>" method="POST">
		<p>
			<label for="borrowerName">Borrower Name</label> 
			<input type="text" name="borrowerName" required>
		</p>
		<p>
		    <label for="loanAmount">Loan Amount</label> 
            <input type="text" name="loanAmount" required>
		</p>
		<p>
		    <label for="interestRate">Interest Rate</label> 
            <input type="text" name="interestRate" required>
		</p>
		<p>
			<label for="repaymentSchedule">Repayment Schedule</label> 
			<input type="date" name="repaymentSchedule">
		</p>
		<p>
			<input type="submit" name="insertNewBorrowerBtn" required>
		</p>
	</form>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Borrower ID</th>
	    <th>Borrower Name</th>
	    <th>Loan Amount</th>
	    <th>Interest Rate</th>
	    <th>Lender</th>
	    <th>Repayment Schedule</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>
	  <?php $getBorrowersByLender = getBorrowersByLender($pdo, $_GET['lender_id']); ?>
	  <?php 
	    if (empty($getBorrowersByLender)) {
    	    echo "<tr><td colspan='8'>No Borrowers found for this Lender.</td></tr>";
    	} 
		?>
	  <?php foreach ($getBorrowersByLender as $row) { ?>
	  <tr>
	  	<td><?php echo $row['borrower_id']; ?></td>	  	
	  	<td><?php echo $row['borrower_name']; ?></td>	  	
	  	<td><?php echo $row['loan_amount']; ?></td>	  	
	  	<td><?php echo $row['interest_rate']; ?></td>	  	
	  	<td><?php echo $row['lender']; ?></td>	  	
	  	<td><?php echo $row['repayment_schedule']; ?></td>	  
	  	<td><?php echo $row['date_added']; ?></td>
	  	<td>
	  		<a href="editBorrower.php?borrower_id=<?php echo $row['borrower_id']; ?>&lender_id=<?php echo $_GET['lender_id']; ?>">Edit</a>
			<a> </a>
	  		<a href="deleteBorrower.php?borrower_id=<?php echo $row['borrower_id']; ?>&lender_id=<?php echo $_GET['lender_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>