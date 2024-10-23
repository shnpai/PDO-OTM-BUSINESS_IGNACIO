<?php 

// Include database configuration and models for database operations
require_once 'dbConfig.php'; 
require_once 'models.php';

// Insert a new lender
if (isset($_POST['insertLenderBtn'])) {
	$query = insertLender($pdo, $_POST['firstName'], 
		$_POST['lastName'], $_POST['ContactInfo'], $_POST['homeAddress'], $_POST['maxBorrowers']);

	if ($query) {
		header("Location: ../index.php"); // Redirect on success
	} else {
		echo "Insertion failed"; // Error message
	}
}

// Edit an existing lender
if (isset($_POST['editLenderBtn'])) {
	$query = updateLender($pdo, $_POST['firstName'], 
		$_POST['lastName'], $_POST['ContactInfo'], $_POST['homeAddress'], $_POST['maxBorrowers'], $_GET['lender_id']);

	if ($query) {
		header("Location: ../index.php"); // Redirect on success
	} else {
		echo "Edit failed"; // Error message
	}
}

// Delete a lender
if (isset($_POST['deleteLenderBtn'])) {
	$query = deleteLender($pdo, $_GET['lender_id']);

	if ($query) {
		header("Location: ../index.php"); // Redirect on success
	} else {
		echo "Deletion failed"; // Error message
	}
}

// Insert a new borrower
if (isset($_POST['insertNewBorrowerBtn'])) {
	$query = insertBorrower($pdo, $_POST['borrowerName'], $_POST['loanAmount'], $_POST['interestRate'], $_GET['lender_id'], $_POST['repaymentSchedule']);

	if ($query) {
		header("Location: ../viewBorrowers.php?lender_id=" .$_GET['lender_id']); // Redirect on success
	} else {
		echo "Insertion failed"; // Error message
	}
}

// Edit an existing borrower
if (isset($_POST['editBorrowerBtn'])) {
	$query = updateBorrower($pdo, $_POST['borrowerName'], $_POST['loanAmount'], $_POST['interestRate'], $_POST['repaymentSchedule'], $_GET['borrower_id']);

	if ($query) {
		header("Location: ../viewBorrowers.php?lender_id=" .$_GET['lender_id']); // Redirect on success
	} else {
		echo "Update failed"; // Error message
	}
}

// Delete a borrower
if (isset($_POST['deleteBorrowerBtn'])) {
	$query = deleteBorrower($pdo, $_GET['borrower_id']);

	if ($query) {
		header("Location: ../viewBorrowers.php?lender_id=" .$_GET['lender_id']); // Redirect on success
	} else {
		echo "Deletion failed"; // Error message
	}
}

?>
