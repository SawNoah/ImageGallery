# ImageGallery
Web Development Final Porject
# Creating database tables

#Users
CREATE TABLE `Users`(
    `user_id` INT AUTO_INCREMENT,
    `username` VARCHAR(50),
    `contact` INT,
    `address` VARCHAR(50),
    `email` VARCHAR(50),
    `join_date` DATE,
    `role` VARCHAR(50),
    `password` VARCHAR(50),
    PRIMARY KEY(`user_id`,`username`,`role`)
);

#Image_Gallery
CREATE TABLE Image_Gallery( 
    `image_id` INT AUTO_INCREMENT, 
    `image_name` VARCHAR(50), 
    `description` VARCHAR(50), 
    `uploaded_date` DATE, 
    `price` INT, 
    `category` VARCHAR(50), 
    PRIMARY KEY(`image_id`) 
);

#Admin
CREATE TABLE `Admin`( 
    `admin_id` INT AUTO_INCREMENT, 
    `user_id` INT, 
    `username` VARCHAR(50), 
    `role` VARCHAR(50), 
    PRIMARY KEY(`admin_id`), 
    FOREIGN KEY(`user_id`, `username`, `role`) REFERENCES `users`(`user_id`,`username`,`role`) 
);

#Customer
CREATE TABLE `Customer`(
    `customer_id` INT AUTO_INCREMENT,
    `user_id` INT,
    `username` VARCHAR(50),
    `role` VARCHAR(50),
    PRIMARY KEY(`customer_id`),
    FOREIGN KEY(`user_id`, `username`, `role`) REFERENCES `users`(`user_id`, `username`, `role`)
);

#Orders
CREATE TABLE `Orders`( 
    `order_id` INT AUTO_INCREMENT, 
    `image_id` INT, 
    `customer_id` INT, 
    `order_date` DATE, 
    PRIMARY KEY(`order_id`), 
    FOREIGN KEY(`image_id`) REFERENCES `Image_Gallery`(`image_id`), 
    FOREIGN KEY(`customer_id`) REFERENCES `Customer`(`customer_id`) 
);


