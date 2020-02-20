create database blog character set = utf8mb4 collate = utf8mb4_unicode_ci;
use blog;
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
);
create table answers(
    id int auto_increment,
    content text,
    created_at datetime,
    updated_at datetime,
    question_id int,
    user_id int,
    primary key(id)
);
create table approves(
    id int auto_increment,
    created_at datetime,
    answer_id int,
    user_id int,
    primary key(id)
);
create table commentmies(
    id int auto_increment,
    content text,
    created_at datetime,
    user_id int,
    answer_id int,
    primary key(id)
);
create table follows(
    id int auto_increment,
    followed_id int,
    follower_id int,
    created_at datetime,
    primary key(id)
);
create table qrecords(
    id int auto_increment,
    title char(30),
    content text,
    created_at datetime,
    previous_qrecord int,
    question_id int,
    user_id int,
    primary key(id)
);
create table questions(
    id int auto_increment,
    status int,
    created_at datetime,
    qrecord_id int,
    user_id int,
    primary key(id)
);
create table question_tags(
    id int auto_increment,
    created_at datetime,
    tag_id int,
    question_id int,
    primary key(id)
);
create table tags(
    id int auto_increment,
    title char(20),
    status int,
    created_at datetime,
    trecord_id int,
    primary key(id)
);
create table trecords(
    id int auto_increment,
    content text,
    created_at datetime,
    previous_trecord int,
    tag_id int,
    user_id int,
    primary key(id)
);
create table watches(
    id int auto_increment,
    created_at datetime,
    question_id int,
    user_id int,
    primary key(id)
);
