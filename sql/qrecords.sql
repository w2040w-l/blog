create table qrecords(
    id int auto_increment,
    title char(30),
    content text,
    created_at datetime,
    previous_qrecord int,
    question_id int,
    user_id int,
    primary key(id)
)
