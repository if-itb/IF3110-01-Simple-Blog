CREATE DATABASE IF NOT EXISTS lolibook;

CREATE TABLE IF NOT EXISTS posts (
    id INT PRIMARY KEY AUTO_INCREMENT, 
    title VARCHAR(256),
    date DATETIME,
    content TEXT
);

CREATE TABLE IF NOT EXISTS comments (
    id INT PRIMARY KEY AUTO_INCREMENT, 
    post_id INT NOT NULL,
    name VARCHAR(64),
    email VARCHAR(64),
    date DATETIME,
    content TEXT,
    FOREIGN KEY (post_id) REFERENCES posts(id)
);