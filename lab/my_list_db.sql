CREATE DATABASE my_list_db;

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(254) NOT NULL,
    email VARCHAR(254),
    password VARCHAR(100) NOT NULL,
    UNIQUE (user_name),
    PRIMARY KEY(id)
);

CREATE TABLE notes (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    title VARCHAR(254) NOT NULL,
    note_content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE list(
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    list_content TEXT NOT NULL,
    state ENUM('active', 'done') NOT NULL DEFAULT 'active',
    priority ENUM('important', 'normal') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
)