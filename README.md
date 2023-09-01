# ImageGallery
Web Development Final Porject
# Creating database tables

#Users
CREATE TABLE `Users`(
    `user_id` INT,
    `username` VARCHAR(50),
    `contact` INT,
    `address` VARCHAR(50),
    PRIMARY KEY(`user_id`)
);

#Image_Gallery
CREATE TABLE `Image_Gallery`(
    `image_id` INT,
    `image_name` VARCHAR(50),
    `description` VARCHAR(50),
    `uploaded_date` DATE,
    `price` INT,
    PRIMARY KEY(`image_id`)
);

#Orders
CREATE TABLE `Orders`(
    `order_id` INT AUTO_INCREMENT,
    `image_id` INT,
    `user_id` INT,
    `price` INT,
    `order_date` DATE,
    PRIMARY KEY(`order_id`),
    FOREIGN KEY(`image_id`) REFERENCES `Image_Gallery`(`image_id`),
    FOREIGN KEY(`user_id`) REFERENCES `Image_Gallery`(`user_id`)
);

#Authentication
CREATE TABLE `Authentication`(
    `user_id` INT,
    `role` VARCHAR,
    `password` VARCHAR(50),
    FOREIGN KEY `user_id` REFERENCES `Image_Gallery`(`user_id`)
);


