<?php require_once 'core/dbConfig.php'; ?>
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
    <h1>Welcome to P2P Money Lending Management System. Add a Lender here.</h1>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="firstName">First Name:</label> 
            <input type="text" name="firstName" required>
        </p>
        <p>
            <label for="lastName">Last Name:</label> 
            <input type="text" name="lastName" required>
        </p>
        <p>
            <label for="ContactInfo">Contact Information:</label> 
            <input type="text" name="ContactInfo" required>
        </p>
        <p>
            <label for="homeAddress">Home Address:</label> 
            <input type="text" name="homeAddress" required>
        </p>
        <p>
            <label for="maxBorrowers">Max Borrowers:</label>
            <input type="text" name="maxBorrowers" required>
        </p>
        <p>
            <input type="submit" name="insertLenderBtn">
        </p>
    </form>

    <?php $getAllLenders = getAllLenders($pdo); ?>
    <?php foreach ($getAllLenders as $row) { ?>
        <div class = "container">
            <h3>Lender's ID: <?php echo $row['lender_id']; ?></h3>
            <h3>First Name: <?php echo $row['first_name']; ?></h3>
            <h3>Last Name: <?php echo $row['last_name']; ?></h3>
            <h3>Contact Information: <?php echo $row['contact_info']; ?></h3>
            <h3>Home Address: <?php echo $row['home_address']; ?></h3>
            <h3>Max Borrowers: <?php echo $row['max_borrowers']; ?></h3>
            <h3>Date Added: <?php echo $row['date_added']; ?></h3>

            <div class = "action">
                <a href="viewBorrowers.php?lender_id=<?php echo $row['lender_id']; ?>">View Borrowers</a>
                
                <a href="editLender.php?lender_id=<?php echo $row['lender_id']; ?>">Edit</a>
                
                <a href="deleteLender.php?lender_id=<?php echo $row['lender_id']; ?>">Delete</a>
            </div>
        </div> 
    <?php } ?>
</body>
</html>
