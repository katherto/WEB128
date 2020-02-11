CREATE TABLE IF NOT EXISTS employees (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL, 
department VARCHAR(30),
location VARCHAR(50),
added TIMESTAMP
);
INSERT INTO employees values (1,'Krusty', 'Clown', 'clown@outlook.com', 'Sales', 'Midwest', now());
INSERT INTO employees values (2,'Bart', 'Simpson', 'bart@gmail.com', 'Marketing', 'East', now());
INSERT INTO employees values (3,'Moe', 'Syzslak', 'moe@gmail.com', 'Marketing', 'Midwest', now());
INSERT INTO employees values (4,'Ned', 'Flanders', 'ned@acme.com', 'Distribution', 'South', now());
INSERT INTO employees values (5,'Marge', 'Simpson', 'ceo@acme.com', 'Executive', 'South', now());
