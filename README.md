# ImageGallery
Web Development Final Porject
# Creating database tables

#Admin
CREATE TABLE Admin(
    admin_id INT AUTO_INCREMENT,
    admin_name VARCHAR(50),
    contact INT,
    address VARCHAR(50),
    email VARCHAR(50),
    join_date DATE,
    role VARCHAR(50),
    PASSWORD VARCHAR(50),
    PRIMARY KEY(admin_id)
);

#Customer
CREATE TABLE Customer(
    customer_id INT AUTO_INCREMENT,
    customer_name VARCHAR(50),
    contact INT,
    address VARCHAR(50),
    email VARCHAR(50),
    join_date DATE,
    role VARCHAR(50),
    PASSWORD VARCHAR(50),
    PRIMARY KEY(customer_id)
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


