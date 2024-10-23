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
    
    <a href="index.php"class="return-home-btn">Return to home</a>
    <h1>Are you sure you want to delete this lender?</h1>
    <?php $getLenderByID = getLenderByID($pdo, $_GET['lender_id']); ?>
    <div>
        <h2>First Name: <?php echo $getLenderByID['first_name']; ?></h2>
        <h2>Last Name: <?php echo $getLenderByID['last_name']; ?></h2>
        <h2>Contact Information: <?php echo $getLenderByID['contact_info']; ?></h2>
        <h2>Home Address: <?php echo $getLenderByID['home_address']; ?></h2>
        <h2>Max Borrowers: <?php echo $getLenderByID['max_borrowers']; ?></h2>
        <h2>Date Added: <?php echo $getLenderByID['date_added']; ?></h2>

        <div>
            <form action="core/handleForms.php?lender_id=<?php echo $_GET['lender_id']; ?>" method="POST">
                <input type="submit" name="deleteLenderBtn" value="Delete">
            </form>			
        </div>	
    </div>
</body>
</html>
