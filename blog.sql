CREATE DATABASE blog_db CHARACTER SET utf8;
CREATE USER 'blog_user'@'localhost' identified by 'AAAaaa111';
GRANT ALL ON blog_db.* TO 'blog_user'@'localhost';

CREATE TABLE blog (
	id INT AUTO_INCREMENT NOT NULL,
    title VARCHAR(250) NOT NULL,
    content TEXT NOT NULL,
    visibility INT NOT NULL,
    PRIMARY KEY(id)
) engine = innoDB;

CREATE TABLE comments (
	id INT AUTO_INCREMENT,
	commenter VARCHAR(40) NOT NULL,
	comment TEXT NOT NULL,
    blogID INT NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (blogID) REFERENCES blog(id)
) engine = innoDB;

INSERT INTO blog(title, content, visibility) VALUES 
('Cryptocurrency', 'Bitcoin or Ethereum', 1);
