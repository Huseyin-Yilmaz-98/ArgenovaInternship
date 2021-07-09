create table users
(
	uid int auto_increment
		primary key,
	username text not null,
	password text not null,
	constraint users_username_uindex
		unique (username) using hash
);

