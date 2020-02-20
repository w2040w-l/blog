create table follows(
    id int auto_increment,
    followed_id int,
    follower_id int,
    created_at datetime,
    primary key(id)
)
