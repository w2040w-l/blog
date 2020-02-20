create table trecords(
    id int auto_increment,
    content text,
    created_at datetime,
    previous_trecord int,
    tag_id int,
    user_id int,
    primary key(id)
)
