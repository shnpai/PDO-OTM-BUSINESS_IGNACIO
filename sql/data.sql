CREATE TABLE lenders (
    lender_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    contact_info VARCHAR(100),
    home_address VARCHAR(50),
    max_borrowers INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE borrowers (
    borrower_id INT AUTO_INCREMENT PRIMARY KEY,
    borrower_name VARCHAR(100),
    loan_amount DECIMAL(10, 2),
    interest_rate DECIMAL(5, 2),
    repayment_schedule VARCHAR(100),
    lender_id INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
