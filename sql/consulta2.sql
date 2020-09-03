CREATE TABLE domains (
	domains_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	domains_name VARCHAR(25) NOT NULL UNIQUE,
	domains_date DATETIME NOT NULL,
	domains_active TINYINT DEFAULT 0,
	PRIMARY KEY(domains_id)
);