drop database if exists phpsite;
create database if not exists phpsite;
use phpsite;

create table if not exists category
(
	id int auto_increment,
	name varchar(64) not null,
	primary key (id)
);

create table if not exists article
(
	id int auto_increment,
	title varchar(64) not null,
	content text not null,
	categoryID int,
	createTime datetime not null,
	primary key (id),
	foreign key (categoryID) references category (id)
);

create table if not exists adminProfile
(
	id int auto_increment,
	username varchar(32) not null,
	lastlogin datetime default null,
	primary key(id)
);

create table if not exists adminLogin
(
	username varchar(32) not null,
	password varchar(256),
	adminProfileID int not null,
	primary key (username),
	unique key (adminProfileID),
	foreign key (adminProfileID) references adminProfile(id)
);

insert into adminProfile (id, username) values (1, 'root');
insert into adminLogin (username, password, adminProfileID) values ('root', null, 1);