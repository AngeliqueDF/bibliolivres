CREATE DATABASE IF NOT EXISTS bibliolivres;

USE bibliolivres;

CREATE TABLE IF NOT EXISTS users(
   id INT NOT NULL AUTO_INCREMENT,
   username VARCHAR(255),
   user_password VARCHAR(255),
   user_mail VARCHAR(255),
   CONSTRAINT PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS users(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255),
    author VARCHAR(255),
    genre VARCHAR(255),
    cover_image VARCHAR(255),
    date_published VARCHAR(255),
    ISBN VARCHAR(255),
    comments VARCHAR(255),
    CONSTRAINT PRIMARY KEY (id)
)ENGINE=InnoDB;