create table users(
    id int auto_increment,
    username char(10),
    password Binary(60),
    status int,
    intro text,
    created_at datetime,
    remember_token Binary(60),
    isroot int,
    primary key(id)
)
