create table questions(
    id int auto_increment,
    status int,
    created_at datetime,
    qrecord_id int,
    user_id int,
    primary key(id)
)
