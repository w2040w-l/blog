create table answers(
    id int auto_increment,
    content text,
    created_at datetime,
    updated_at datetime,
    question_id int,
    user_id int,
    primary key(id)
)
