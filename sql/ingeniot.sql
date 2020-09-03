CREATE DATABASE admin_ingeniot
    DEFAULT CHARACTER SET utf8;
    SET TIME_ZONE='-03:00';
USE admin_ingeniot;

CREATE TABLE users (
	users_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	users_name VARCHAR(25) NOT NULL UNIQUE,
	users_email VARCHAR(30) NOT NULL UNIQUE,
	users_password VARCHAR(255) NOT NULL,
	users_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
	users_level VARCHAR(11) NOT NULL,
	users_active TINYINT DEFAULT 0,
	users_firstname VARCHAR(25),
  users_lastname VARCHAR(25),
  users_desciption VARCHAR(25),
  users_customer_id INT,
  users_customer_id INT,
  users_dashboard_id INT,
  users_dashboard_fullscreen TINYINT DEFAULT 0,
	PRIMARY KEY(users_id)
);

CREATE TABLE users_tokens (
	users_tokens_id INT NOT NULL UNIQUE AUTO_INCREMENT,
   users_tokens_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
	users_tokens_token VARCHAR(255) NOT NULL UNIQUE,
   users_tokens_user_id INT NOT NULL,
	PRIMARY KEY(users_tokens_id),
   FOREIGN KEY(users_tokens_user_id)
    REFERENCES users(users_id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE sys_settings (
	sys_settings_id INT NOT NULL UNIQUE AUTO_INCREMENT,
  sys_settings_key VARCHAR(11),
	sys_settings_json VARCHAR(255),
	PRIMARY KEY(sys_settings_id)
);

CREATE TABLE `mqtt_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `salt` varchar(35) DEFAULT NULL,
  `is_superuser` tinyint(1) DEFAULT 0,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mqtt_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `mqtt_acl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `allow` int(1) DEFAULT 1 COMMENT '0: deny, 1: allow',
  `ipaddr` varchar(60) DEFAULT NULL COMMENT 'IpAddress',
  `username` varchar(100) DEFAULT NULL COMMENT 'Username',
  `clientid` varchar(100) DEFAULT NULL COMMENT 'ClientId',
  `access` int(2) NOT NULL COMMENT '1: subscribe, 2: publish, 3: pubsub',
  `topic` varchar(100) NOT NULL DEFAULT '' COMMENT 'Topic Filter',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO 'mqtt_acl' ('id','allow', 'ipaddr', 'username', 'clientid', 'access', 'topic')
VALUES
	(1,1,NULL, '$all', NULL,2,'#'),
	(2,0,NULL,'$all', NULL,1,'$SYS/#'),
	(3,0,NULL,'$all', NULL,1,'eq #'),
	(5,1,'127.0.0.1',NULL, NULL,2,'$SYS/#'),
	(6,1,'127.0.0.1',NULL,NULL,2,'#'),
	(7,1,NULL,'dashboard',NULL,1,'$SYS/#');

CREATE TABLE data (
	data_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	data_date DATETIME CURRENT_TIMESTAMP(),
	data_temp1 FLOAT(5,1)NOT NULL,
	data_temp2 FLOAT(5,1)NOT NULL,
	data_volts INT(11) NOT NULL,
	PRIMARY KEY(data_id)
);

CREATE TABLE domains (
	domains_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	domains_name VARCHAR(25) NOT NULL UNIQUE,
	domains_date DATETIME NOT NULL,
	domains_active TINYINT DEFAULT 0,
  domains_type VARCHAR (25) NOT NULL,
  domains_client_id INT (11) NOT NULL,
  domains_tenant_id INT (11) NOT NULL,
  domains_label VARCHAR (25),
  domains_description VARCHAR (25),
	PRIMARY KEY(domains_id)
);

CREATE TABLE dashboards (
	dashboards_id INT NOT NULL UNIQUE AUTO_INCREMENT,
  dashboards_name VARCHAR(25) NOT NULL UNIQUE,
	dashboards_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
	dashboards_active TINYINT DEFAULT 0,
  dashboards_type VARCHAR(25),
	dashboards_config VARCHAR (1000),
	dashboards_assigned_clients VARCHAR (1000),
	dashboards_search_text VARCHAR (255),
	dashboards_tenant_id INT(11) NOT NULL,
	PRIMARY KEY(dashboards_id)
);

CREATE TABLE devices (
	devices_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	devices_name VARCHAR(25) NOT NULL UNIQUE,
	devices_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
	devices_active TINYINT DEFAULT 0,
	devices_type VARCHAR (25) NOT NULL,
  devices_serial INT (11),
	devices_token VARCHAR (64),
	devices_client_id INT (11) NOT NULL,
  devices_tenant_id INT (11) NOT NULL,
  devices_label VARCHAR (25),
  devices_description VARCHAR (25),
	PRIMARY KEY(devices_id)
);
CREATE TABLE tenants (
	tenants_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	tenants_name VARCHAR(25) NOT NULL UNIQUE,
	tenants_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
	tenants_active TINYINT DEFAULT 0,
	tenants_type VARCHAR (25) NOT NULL,
  tenants_country VARCHAR (25) NOT NULL,
  tenants_state VARCHAR (25) NOT NULL,
	tenants_city VARCHAR (25) NOT NULL,
	tenants_address VARCHAR (25) NOT NULL,
  tenants_phone VARCHAR (25) NOT NULL,
  tenants_email VARCHAR (25) NOT NULL,
	PRIMARY KEY(tenants_id)
);

CREATE TABLE customers (
	customers_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	customers_name VARCHAR(25) NOT NULL UNIQUE,
	customers_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
	customers_active TINYINT DEFAULT 0,
	customers_type VARCHAR (25) NOT NULL,
  customers_country VARCHAR (25) NOT NULL,
  customers_state VARCHAR (25) NOT NULL,
	customers_city VARCHAR (25) NOT NULL,
	customers_address VARCHAR (25) NOT NULL,
  customers_phone VARCHAR (25) NOT NULL,
  customers_email VARCHAR (25) NOT NULL,
  customers_tenant_id INT (11) NOT NULL,
	PRIMARY KEY(customers_id)
);
