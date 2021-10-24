-- Our database for this lesson folder is called "session_lesson"
-- Running multiple SQL Statement at once, we have to end each one with ;

DROP DATABASE IF EXISTS session_lesson; 

CREATE DATABASE IF NOT EXISTS session_lesson;

# is also a comment in MySQL Editor Window :-)
# populate data into our database 'session_lesson'

USE session_lesson;
--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS members (
  member_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(40) NOT NULL,
  last_name  VARCHAR(40) NOT NULL,
  username VARCHAR(25) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(12) NOT NULL
  CONSTRAINT login_unique UNIQUE (username, email)
);

-- To Review:
-- To Modify any column/field => Table structure, we use ALTER statment
-- Example: Adding the constraint "UNIQUE" for both fields: username and email
ALTER TABLE members ADD UNIQUE(username, email);
-- Read more: https://www.w3schools.com/sql/sql_unique.asp
-- https://www.techonthenet.com/mysql/unique.php

--
-- Dumping data for table `members`
--
INSERT INTO members
(first_name, last_name, username, email, password)
VALUES
('Alex', 'Chow', 'alexchow', 'alexchow@learningphpnow.ca ', 'alex1234'),
('Alexa', 'Chow', 'alexachow', 'alexachow@learningpython.ca ', 'alexa1234');

