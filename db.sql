CREATE TABLE users( 
    email VARCHAR(50) NOT NULL,
    password VARCHAR(12) NOT NULL,  
    name VARCHAR(30),
    phone VARCHAR(10),
    no_post INT DEFAULT 0,
    created_at DATE DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(email)
);

/* Post Table 
Post Title, Banner, Post Description, Status, Created Date
*/
CREATE TABLE posts(
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(300) NOT NULL,
    banner VARCHAR(100),
    content TEXT,
    views INT DEFAULT 0,
    post_at DATE DEFAULT CURRENT_TIMESTAMP,
    email VARCHAR(50) NOT NULL,
    FOREGIN KEY(email) REFERENCES users(email)
);
ALTER TABLE posts AUTO_INCREMENT=100;
/*UPDATE users SET no_post=no_post+1 WHERE email=
UPDATE posts SET views=views+1 WHERE post_id=?id;
*/