DROP TABLE modes;
DROP TABLE users;
DROP TABLE products;
DROP TABLE activities;
DROP TABLE activities_products;
DROP TABLE preferences;
DROP TABLE orders;
DROP TABLE times_in_out;

CREATE TABLE modes(
	mode_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	mode_name VARCHAR( 30 ) NOT NULL
) ENGINE = MYISAM;

CREATE TABLE users (
	user_id VARCHAR( 10 ) NOT NULL PRIMARY KEY ,
	user_name VARCHAR( 30 ) NOT NULL ,
	user_login VARCHAR( 10 ) NULL ,
	user_pass VARCHAR( 10 ) NULL ,
	user_date DATE NULL ,
	user_money INT NULL DEFAULT '0' ,
	mode_id INT NOT NULL ,
	FOREIGN KEY (mode_id) REFERENCES modes(mode_id)
) ENGINE = MYISAM;

CREATE TABLE products (
	prod_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	prod_name VARCHAR( 20 ) NOT NULL ,
	prod_desc VARCHAR( 30 ) NULL ,
	prod_cost FLOAT NOT NULL
) ENGINE = MYISAM;

CREATE TABLE activities (
	act_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	act_name VARCHAR( 20 ) NOT NULL ,
	act_ini DATETIME NOT NULL ,
	act_end DATETIME NOT NULL ,
	user_id VARCHAR( 10 ) NOT NULL ,
	FOREIGN KEY (user_id) REFERENCES users(user_id)
) ENGINE = MYISAM;

CREATE TABLE activities_products (
	act_id INT NOT NULL ,
	prod_id INT NOT NULL ,
	FOREIGN KEY (act_id) REFERENCES activities(act_id) ,
	FOREIGN KEY (prod_id) REFERENCES products(prod_id) ,
	PRIMARY KEY (act_id, prod_id)
) ENGINE = MYISAM;

CREATE TABLE preferences (
	user_id VARCHAR( 10 ) NOT NULL ,
	prod_id INT NOT NULL ,
	pref_quantity INT NOT NULL ,
	FOREIGN KEY (user_id) REFERENCES users(user_id) ,
	FOREIGN KEY (prod_id) REFERENCES products(prod_id) ,
	PRIMARY KEY (user_id, prod_id)
) ENGINE = MYISAM;

CREATE TABLE orders (
	user_id VARCHAR( 10 ) NOT NULL ,
	prod_id INT NOT NULL ,
	act_id INT NULL ,
	ord_quantity INT NOT NULL ,
	ord_date DATE NOT NULL ,
	FOREIGN KEY (user_id) REFERENCES users(user_id) ,
	FOREIGN KEY (prod_id) REFERENCES products(prod_id) ,
	FOREIGN KEY (act_id) REFERENCES activities(act_id) ,
	PRIMARY KEY (user_id, prod_id, ord_date)
) ENGINE = MYISAM;

CREATE TABLE times_in_out (
	user_id VARCHAR( 10 ) NOT NULL PRIMARY KEY ,
	time_mark TIME NOT NULL ,
	time_date DATE NULL ,
	FOREIGN KEY (user_id) REFERENCES users(user_id)
) ENGINE = MYISAM;

