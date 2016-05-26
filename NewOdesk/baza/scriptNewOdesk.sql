/*
Created		10. 02. 2015
Modified		19. 05. 2016
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/


Create table users (
	id_u Serial NOT NULL AUTO_INCREMENT,
	id_c Bigint UNSIGNED NOT NULL,
	first_name Varchar(200),
	last_name Varchar(200) NOT NULL,
	email Varchar(200) NOT NULL,
	pass Varchar(100) NOT NULL,
	description Text,
	avatar Varchar(255),
	active Int NOT NULL,
	admin Int NOT NULL,
	score Int,
	UNIQUE (email),
 Primary Key (id_u)) ENGINE = MyISAM;

Create table skills (
	id_s Serial NOT NULL AUTO_INCREMENT,
	title Varchar(100) NOT NULL,
	description Text,
 Primary Key (id_s)) ENGINE = MyISAM;

Create table skills_users (
	id_su Serial NOT NULL AUTO_INCREMENT,
	id_u Bigint UNSIGNED NOT NULL,
	id_s Bigint UNSIGNED NOT NULL,
 Primary Key (id_su)) ENGINE = MyISAM;

Create table countries (
	id_c Serial NOT NULL AUTO_INCREMENT,
	title Varchar(100) NOT NULL,
	short Varchar(10) NOT NULL,
 Primary Key (id_c)) ENGINE = MyISAM;

Create table projects (
	id_p Serial NOT NULL AUTO_INCREMENT,
	id_u Bigint UNSIGNED NOT NULL,
	title Varchar(150) NOT NULL,
	start_date Timestamp NOT NULL,
	end_date Timestamp,
	description Text,
 Primary Key (id_p)) ENGINE = MyISAM;

Create table projects_users (
	id_pu Serial NOT NULL AUTO_INCREMENT,
	id_p Bigint UNSIGNED NOT NULL,
	id_u Bigint UNSIGNED NOT NULL,
 Primary Key (id_pu)) ENGINE = MyISAM;


Alter table projects add Foreign Key (id_u) references users (id_u) on delete  restrict on update  restrict;
Alter table skills_users add Foreign Key (id_u) references users (id_u) on delete  restrict on update  restrict;
Alter table projects_users add Foreign Key (id_u) references users (id_u) on delete  restrict on update  restrict;
Alter table skills_users add Foreign Key (id_s) references skills (id_s) on delete  restrict on update  restrict;
Alter table users add Foreign Key (id_c) references countries (id_c) on delete  restrict on update  restrict;
Alter table projects_users add Foreign Key (id_p) references projects (id_p) on delete  restrict on update  restrict;


