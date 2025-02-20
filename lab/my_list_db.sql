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
    content TEXT NOT NULL,
    state ENUM('note', 'nothing') NOT NULL DEFAULT 'note',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE list(
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    content TEXT NOT NULL,
    state ENUM('active', 'done') NOT NULL DEFAULT 'active',
    priority ENUM('important', 'normal') NOT NULL DEFAULT 'normal',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (user_name, password) VALUES 
    ('test', '1234'),
    ('test1', '1234');

INSERT INTO notes (user_id, content) VALUES 
    (1, 'This is note 1'),
    (1, 'This is note 2');

INSERT INTO list (user_id, content, state) VALUES 
    (1, 'This is list 1', 'active'),
    (1, 'This is list 2', 'done');
