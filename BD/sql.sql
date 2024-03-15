create database estore;

use estore;

create table user(
    id int auto_increment,
    firstname varchar(100),
    email varchar(100),
    lastname varchar(100),
    pass varchar(100),
    isAdmin bool,
    isSeller bool,
    isVerified bool,
    contact varchar(20),
    profile_pic varchar(100),
    seller_status enum('enabled','disabled') default 'enabled',
    constraint pk_id primary key(id)
    );

create table product(
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
);

create table cart(
	cart_id int auto_increment,
    product_id int,
    product_name varchar(25),
    product_price long,
    product_image varchar(200),
	product_quantity long,
    product_total int,
    user_id INT,
    foreign key (user_id) references user(id),
    foreign key (product_id) references product(product_id),
    constraint pk_id primary key(cart_id)
);

CREATE TABLE seller_details (
    seller_id INT PRIMARY KEY AUTO_INCREMENT,
    id INT UNIQUE,
    store_name VARCHAR(50),
    citizenship VARCHAR(100),
    PAN INT,
    certificate VARCHAR(100),
    CONSTRAINT fk_seller_user_role FOREIGN KEY (id) REFERENCES user(id) ON DELETE CASCADE
);

create table Category(
	c_id int auto_increment,
    c_name varchar(50),
	constraint pk_id primary key(c_id)
);

CREATE table AddressBook(
	address_id int auto_increment,
    user_id int,
	phone varchar(20),
    province varchar(100),
    city varchar(100),
    area varchar(100),
    address varchar(100),
    Landmark varchar(100),
    delivery_label varchar(100),
    defaultdeliveryaddress bool,
    defaultbillingaddress bool,
    address_status enum('active' , 'deleted'),
    constraint pk_id primary key(Address_id),
	foreign key (user_id) references user(id)
);

create table orders(
	order_id  int AUTO_INCREMENT,
    user_id int,
    seller_id int,
    product_id int,
    cart_id int,
    address_id int,
    order_date TIMESTAMP,
    order_status varchar(100),
    constraint pk_id PRIMARY KEY(order_id),
    foreign key (user_id) references user(id),
    foreign key (seller_id) references user(id),
    order_status enum('pending' , 'canceled' , 'delivered'),
    foreign key (product_id) references product(product_id),
    foreign key (address_id) references addressbook(address_id),
    foreign key (cart_id) references cart(cart_id)
);


SELECT * FROM estore.user;
    
SELECT * FROM estore.product;

SELECT * FROM estore.cart;

SELECT * from estore.category;

SELECT * from estore.addressbook;

SELECT * FROM estore.orders;	

alter table orders 
add  column order_status enum('pending' , 'canceled' , 'delivered');

alter table user 
add column seller_status enum('enabled','disabled') default 'enabled';

alter table product  add column product_status enum('active','draft');

alter table user
add column profile_pic varchar(100);


-- Notification table

use estore;


create table payment(
    payment_id int auto_increment,
    product_name varchar(25),
    product_id int,
    amount int,
    constraint pk_id primary key(payment_id)
);




     