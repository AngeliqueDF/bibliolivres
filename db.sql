CREATE DATABASE IF NOT EXISTS bibliolivres;

USE bibliolivres;

CREATE TABLE IF NOT EXISTS users(
   id INT NOT NULL AUTO_INCREMENT,
   username VARCHAR(255),
   user_password VARCHAR(255),
   user_mail VARCHAR(255),
   CONSTRAINT PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS books(
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

-- users
--     id
--     username
--     user_password
--     user_email
--     nb_books_added
--     nb_books_reviewed
--     nb_comments

-- books
--     title
--     author
--     genre
--     book_description
    
--     cover_image
--     date_published
--     isbn
--     editor
--     comments
    
--     added_by
--     reviewed_by

-- reviews comment
    -- book
    -- user
    -- datetime

-- review
    -- date
    -- content
    -- book
    -- user

-- analytics
    -- links clicked
        -- user_id
        -- links_clicked
    -- visits
        -- id
        -- visitor
        -- entry_date
        -- referrer
        -- visitor
        -- exit_date