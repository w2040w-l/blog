create table commentmies(
    id int auto_increment,
    content text,
    created_at datetime,
    user_id int,
    answer_id int,
    reply int,
    reply_user char(10),
    primary key(id)
)
