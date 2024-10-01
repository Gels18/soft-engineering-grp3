
CREATE TABLE Users (
	id INT PRIMARY KEY AUTO_INCREMENT,
	fname VARCHAR(100),
	lname VARCHAR(100),
	email VARCHAR(100),
	password VARCHAR(255),
	role VARCHAR(255)
);

CREATE TABLE Notification (
	id INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name TEXT,
    file_type TEXT,
    status VARCHAR(50) DEFAULT "Pending",
    submission_type VARCHAR(50),
    file_data LONGBLOB NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);