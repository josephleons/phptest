
/*before create database/table make user to drop the exist one */
DROP DATABASE IF EXISTS `BOOK_STORE`;
CREATE DATABASE `BOOK_STORE`;
USE `BOOK_STORE`;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`(
        id int(10)not null auto_increment primary key,
        username varchar(100) not null ,
        password varchar(60) not null,
        role varchar(20) not null
);

CREATE TABLE `books`(
        id int(10)not null auto_increment primary key,
        title varchar(100) not null ,
        author varchar(100) not null ,
        genre varchar(100) not null ,
        publication_year varchar(100) not null ,
        user_id int(10) not null 
      
);
