<?php
    include "src/Database/connect.php";

    $usertable = "
    CREATE TABLE IF NOT EXISTS user(
    id int auto_increment,
    firstname varchar(100),
    email varchar(100),
    lastname varchar(100),
    pass varchar(100),
    isAdmin bool,
    isSeller bool,
    isVerified bool,
    gender varchar(10),
    contact varchar(20),
    profile_pic varchar(100),
    seller_status enum('enabled','disabled') default 'enabled',
    constraint pk_id primary key(id)
    )";

$producttable = "
    CREATE TABLE IF NOT EXISTS product(
        product_id int auto_increment,
        title varchar(25),
        short_des varchar(500),
        des varchar(1000),
        image varchar(200),
        user_id INT,
        price long,
        product_type varchar(25),
        vendor varchar(25),
        brand varchar(25),
        quantity long,
        product_status enum('active','draft'),
        foreign key (user_id) references user(id),
        constraint pk_id primary key(product_id)
    )";

$carttable = "
    CREATE TABLE IF NOT EXISTS cart(
        cart_id int auto_increment,
        product_id int,
        product_name varchar(25),
        product_price long,
        product_image varchar(200),
        product_quantity long,
        product_total int,
        user_id INT,
        foreign key (user_id) references user(id),
        cart_status enum('incart','deleted'),
        foreign key (product_id) references product(product_id),
        constraint pk_id primary key(cart_id)
    );";

$sellerdetailstable = "
    CREATE TABLE IF NOT EXISTS seller_details (
        seller_id INT PRIMARY KEY AUTO_INCREMENT,
        id INT UNIQUE,
        store_name VARCHAR(50),
        citizenship VARCHAR(100),
        PAN INT,
        certificate VARCHAR(100),
        CONSTRAINT fk_seller_user_role FOREIGN KEY (id) REFERENCES user(id) ON DELETE CASCADE
    )";
    $addressbooktable = "
    CREATE TABLE IF NOT EXISTS AddressBook(
        address_id int auto_increment,
        user_id int,
        phone varchar(20),
        province varchar(100),
        city varchar(100),
        area varchar(100),
        address varchar(100),
        Landmark varchar(100),
        effectivedelivery varchar(100),
        address_status enum('active','deleted'),
        constraint pk_id primary key(Address_id),
        foreign key (user_id) references user(id)
    );
    ";
$ordertable = "
    CREATE TABLE IF NOT EXISTS orders(
        order_id  int AUTO_INCREMENT,
        user_id int,
        seller_id int,
        product_id int,
        cart_id int,
        address_id int,
        order_date TIMESTAMP,
        constraint pk_id PRIMARY KEY(order_id),
        foreign key (user_id) references user(id),
        foreign key (seller_id) references user(id),
        order_status enum('pending' , 'canceled' , 'delivered'),
        foreign key (product_id) references product(product_id),
        foreign key (address_id) references addressbook(address_id),
        foreign key (cart_id) references cart(cart_id)
    )";

    $categorytable = "
    CREATE TABLE IF NOT EXISTS Category(
        c_id int auto_increment,
        c_name varchar(50),
        constraint pk_id primary key(c_id)
    )
    
    ";

    // create table
    if ($conn->query($usertable) === TRUE) {
        echo "Table user created successfully <br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    if ($conn->query($producttable) === TRUE) {
        echo "Table product created successfully <br>";
    } else {
        echo "Error creating table: " . $conn->error ."<br>";
    }

    if ($conn->query($carttable) === TRUE) {
        echo "Table cart created successfully <br>";
    } else {
        echo "Error creating table: " . $conn->error ."<br>";
    }

    if ($conn->query($sellerdetailstable) === TRUE) {
        echo "Table seller_details created successfully <br>";
    } else {
        echo "Error creating table: " . $conn->error ."<br>";
    }
    if ($conn->query($addressbooktable) === TRUE) {
        echo "Table AddressBook created successfully <br>";
    } else {
        echo "Error creating table: " . $conn->error ."<br>";
    }


    if ($conn->query($ordertable) === TRUE) {
        echo "Table orders created successfully <br>";
    } else {
        echo "Error creating table: " . $conn->error ."<br>";
    }

  
    if ($conn->query($categorytable) === TRUE) {
        echo "Table Category created successfully <br>";
    } else {
        echo "Error creating table: " . $conn->error ."<br>";
    }
    
    $conn->close();

?>