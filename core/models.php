<?php  

// Insert a new lender into the database
function insertLender($pdo, $first_name, $last_name, 
	$contact_info, $home_address, $max_borrowers) {

	$sql = "INSERT INTO lenders (first_name, last_name, 
		contact_info, home_address, max_borrowers) VALUES(?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $contact_info, $home_address, $max_borrowers]);

	if ($executeQuery) {
		return true; // Successful insertion
	}
}

// Update an existing lender's details
function updateLender($pdo, $first_name, $last_name, $contact_info, $home_address, $max_borrowers, $lender_id) {

	$sql = "UPDATE lenders
				SET first_name = ?,
					last_name = ?,
					contact_info = ?, 
					home_address = ?,
					max_borrowers = ?
				WHERE lender_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $contact_info, $home_address, $max_borrowers, $lender_id]);
	
	if ($executeQuery) {
		return true; // Successful update
	}
}

// Delete a lender and their associated borrowers
function deleteLender($pdo, $lender_id) {
	$deleteBorrower = "DELETE FROM borrowers WHERE lender_id = ?";
	$deleteStmt = $pdo->prepare($deleteBorrower);
	$executeDeleteQuery = $deleteStmt->execute([$lender_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM lenders WHERE lender_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$lender_id]);

		if ($executeQuery) {
			return true; // Successful deletion
		}
	}
}

// Retrieve all lenders from the database
function getAllLenders($pdo) {
	$sql = "SELECT * FROM lenders";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll(); // Return all lenders
	}
}

// Retrieve a specific lender by their ID
function getLenderByID($pdo, $lender_id) {
	$sql = "SELECT * FROM lenders WHERE lender_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$lender_id]);

	if ($executeQuery) {
		return $stmt->fetch(); // Return lender details
	}
}

// Retrieve all information for a lender by their ID
function getAllInfoByLenderID($pdo, $lender_id) {
	$sql = "SELECT * FROM lenders WHERE lender_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$lender_id]);

	if ($executeQuery) {
		return $stmt->fetch(); // Return lender information
	}
}

// Get all borrowers associated with a specific lender
function getBorrowersByLender($pdo, $lender_id) {
	
	$sql = "SELECT 
				borrowers.borrower_id AS borrower_id,
				borrowers.borrower_name AS borrower_name,
				borrowers.loan_amount AS loan_amount,
				borrowers.interest_rate AS interest_rate,
				borrowers.date_added AS date_added,
				CONCAT(lenders.first_name,' ',lenders.last_name) AS lender,
				borrowers.repayment_schedule AS repayment_schedule
			FROM borrowers
			JOIN lenders ON borrowers.lender_id = lenders.lender_id
			WHERE borrowers.lender_id = ?";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$lender_id]);
	if ($executeQuery) {
		return $stmt->fetchAll(); // Return all borrowers for the lender
	}
}

// Insert a new borrower into the database
function insertBorrower($pdo, $borrower_name, $loan_amount, $interest_rate, $lender_id, $repayment_schedule) {
	$sql = "INSERT INTO borrowers (borrower_name, loan_amount, interest_rate, lender_id, repayment_schedule) VALUES(?,?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$borrower_name, $loan_amount, $interest_rate, $lender_id, $repayment_schedule]);
	if ($executeQuery) {
		return true; // Successful insertion
	}
}

// Retrieve a specific borrower by their ID
function getBorrowerByID($pdo, $borrower_id) {
	$sql = "SELECT 
				borrowers.borrower_id AS borrower_id,
				borrowers.borrower_name AS borrower_name,
				borrowers.loan_amount AS loan_amount,
				borrowers.interest_rate AS interest_rate,
				borrowers.repayment_schedule AS repayment_schedule,
				CONCAT(lenders.first_name,' ',lenders.last_name) AS lender,
				borrowers.repayment_schedule AS repayment_schedule,
				borrowers.date_added AS date_added
			FROM borrowers
			JOIN lenders ON borrowers.lender_id = lenders.lender_id
			WHERE borrowers.borrower_id  = ? 
			GROUP BY borrowers.borrower_name";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$borrower_id]);
	if ($executeQuery) {
		return $stmt->fetch(); // Return borrower details
	}
}

// Update an existing borrower's details
function updateBorrower($pdo, $borrower_name, $loan_amount, $interest_rate, $repayment_schedule, $borrower_id) {
	$sql = "UPDATE borrowers
			SET borrower_name = ?,
				loan_amount = ?,
				interest_rate = ?,
				repayment_schedule = ?
			WHERE borrower_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$borrower_name, $loan_amount, $interest_rate, $repayment_schedule, $borrower_id]);

	if ($executeQuery) {
		return true; // Successful update
	}
}

// Delete a borrower from the database
function deleteBorrower($pdo, $borrower_id) {
	$sql = "DELETE FROM borrowers WHERE borrower_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$borrower_id]);
	if ($executeQuery) {
		return true; // Successful deletion
	}
}

?>
