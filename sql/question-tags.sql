create table question_tags(
    id int auto_increment,
    created_at datetime,
    tag_id int,
    question_id int,
    primary key(id)
)
