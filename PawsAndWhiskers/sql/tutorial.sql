CREATE TABLE users(
    Id int PRIMARY KEY AUTO_INCREMENT,
    Username varchar(200),
    Email varchar(200),
    Age int,
    Password varchar(200)
);
CREATE TABLE products(
    Id int PRIMARY KEY AUTO_INCREMENT,
    pname varchar(200),
    pbrand varchar(200),
    pprice float(200),
    pimg varchar(200),
);