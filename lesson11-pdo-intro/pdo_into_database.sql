CREATE DATABASE IF NOT EXISTS pdo_intro;

# populate data into our database 'pdo_intro'

USE pdo_intro
--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS posts (
  post_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(150) NOT NULL,
  body TEXT NOT NULL,
  author VARCHAR(50) NOT NULL,
  published TINYINT(1) NOT NULL DEFAULT 1,
  released DATE NOT NULL DEFAULT CURRENT_DATE()
);

--
-- Dumping data for table `posts`
--
INSERT INTO posts
(title, body, auther, published, released)
VALUES
('Why Learning JavaScript?', 'JavaScript is the most important language that any developer or programmer should learn.', 'Alex Chow', 1, '2021-09-01'),
('PHP and MySQL', 'PHP is the language that was designed to create web applications. it\'s compatible to work with MySQL.', 'Martin Smith', 1, '2021-09-01'),
('HTML5 and CSS3', 'Working with HTML5 which is the last version of HTML and using CSS Level 3', 'Alex Stevenson', 0, '2021-09-06'),
('Learning Python', 'Python became a very popular language. It\'s built-in in English verses and supports the OOP. ', 'Sarah Grayson', 1, '2021-09-06');
