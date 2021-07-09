create table blog_entries
(
	beid int auto_increment
		primary key,
	image_name text not null,
	author int not null,
	created_at timestamp default current_timestamp() null,
	updated_at timestamp default current_timestamp() null,
	category text not null,
	content text not null,
	title text not null,
	seo_description text not null,
	keywords text not null,
	constraint blog_entries_users_uid_fk
		foreign key (author) references users (uid)
			on update cascade on delete cascade
);

