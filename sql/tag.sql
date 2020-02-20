create table tags(
    id int auto_increment,
    title char(20),
    status int,
    created_at datetime,
    trecord_id int,
    primary key(id)
)
