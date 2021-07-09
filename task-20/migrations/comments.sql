create table comments
(
	cid int auto_increment
		primary key,
	author_name text not null,
	author_email text not null,
	created_at timestamp default current_timestamp() not null,
	comment text not null,
	post_id int not null,
	constraint comments_blog_entries_beid_fk
		foreign key (post_id) references blog_entries (beid)
			on update cascade on delete cascade
);

