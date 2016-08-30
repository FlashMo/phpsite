create database if not exists easyphp default character set utf8 collate utf8_general_ci;
use easyphp;

create table if not exists administrator (
	id 				int not null auto_increment,
	username 		varchar(32) not null,
	password 		varchar(128) not null,
	createtime 		datetime not null,
	lastlogintime 	datetime,
	primary key 	(id)	
);
-- insert into administrator(username, password, createtime) values('mcj', 'mcj', now()), ('zaqwsx20', 'a8354023', now())

create table if not exists pvuv	(
	cdate		date,
	pv			int default 0,
	uv			int default 0,
	primary key	(cdate)
);
