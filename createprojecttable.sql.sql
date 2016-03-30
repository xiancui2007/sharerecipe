CREATE TABLE project2 (
 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
 dishname VARCHAR(60) NOT NULL, 
 type CHAR(20) NOT NULL,
 cooktime int(5) NOT NULL,
 difficulty char(10) NOT NULL,
 recipe varchar(3000) NOT NULL,
 dishimage VARCHAR(80) NOT NULL
 ) Engine InnoDB Charset utf8;