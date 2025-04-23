use bookstore;

create table books
(book_id varchar(50) primary key not null,
title varchar(100) not null,
publish_date date,
price decimal(10,2) not null,
stock_quantity int not null,
book_image varchar(100),
featured boolean default false,
books_description text
);

select * from authors;

describe books;

alter table books
add column book_image varchar(100);

select * from books;
select * from book_authors;
select * from authors;

create table authors
(author_id varchar(50) primary key not null,
first_name varchar(50) not null,
last_name varchar(50),
nationality varchar(50)
);

create table book_authors
(book_id varchar(50),
author_id varchar(50),
foreign key (book_id) references books (book_id)
    on update cascade on delete cascade,
foreign key (author_id) references authors (author_id)
    on update cascade on delete cascade
);

create table customers
(customer_id varchar(50) primary key not null,
first_name varchar(50) not null,
last_name varchar(50),
phone varchar(20),
email varchar(100) not null,
street_address varchar(255) not NULL,
apt_no varchar(20) not NULL,
city varchar(50) not NULL,
province varchar(50) not NULL,
postal_code varchar(20) not NULL
);

create table customers_login
(customer_id varchar(50) not null,
username varchar(50) primary key not null,
pwd varchar(50) not null,
foreign key (customer_id) references customers (customer_id)
    on update cascade on delete cascade
);

create table deals 
(deal_id varchar(50) not null,
book_id varchar(50),
discounted_price decimal(10,2),
foreign key (book_id) references books (book_id)
    on update cascade on delete cascade
);

create table orders
(order_id varchar(50) primary key not null,
customer_id varchar(50) not null,
order_date date not null,
order_status varchar(50) not null,
total_amount decimal(10,2) not null,
foreign key (customer_id) references customers (customer_id)
    on update cascade
);

create table orderitems
(order_item_id varchar(50) primary key not null,
order_id varchar(50) not null,
book_id varchar(50) not null,
quantity int not null,
price decimal(10,2) not null,
foreign key (order_id) references orders (order_id)
    on update cascade,
foreign key (book_id) references books (book_id)
    on update cascade
);

use bookstore;

CREATE TABLE admins (
    id INT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL 
);

create table book_log(
	log_id int primary key,
    book_id varchar(50),
    book_action varchar(50),
    date_added datetime,
    foreign key (book_id) references books(book_id)
);

alter table book_log
modify column log_id int auto_increment;

alter table authors
add genre varchar(50);

select * from books;
select * from customers;
select * from authors;
select * from book_authors;
select * from book_log;
alter table books
add column featured boolean default false;

use bookstore;

INSERT INTO books (book_id, title, publish_date, price, stock_quantity, book_image)
VALUES
    ('B001', 'Way of the Wolf', '2020-01-15', 19.99, 150, 'images/wayofthewolf'),
    ('B002', 'Atomic Habits', '2021-03-22', 25.50, 200, 'images/atomichabits'),
    ('B003', 'Fearless', '2019-07-10', 45.00, 75, 'images/fearless'),
    ('B004', 'Powerful', '2022-09-05', 29.95, 120, 'images/powerful'),
    ('B005', 'Onyx Storm', '2018-05-18', 18.75, 180, 'images/onyxstorm'),
    ('B006', 'Iron Flame', '2023-11-11', 35.60, 50, 'images/ironflame'),
    ('B007', 'The Goal', '2020-06-30', 22.80, 90, 'images/thegoal'),
    ('B008', 'Values', '2017-02-20', 12.99, 300, 'images/values'),
    ('B009', 'Game', '2021-08-16', 40.00, 110, 'images/game'),
    ('B010', 'Spare', '2022-12-01', 15.40, 220, 'images/spare');

update books
set book_image = concat(book_image, '.jpg');

select * from books;

INSERT INTO deals(deal_id, book_id, discounted_price)
VALUES
	('D01', 'B001', 15.00),
    ('D02', 'B005', 15.00);

INSERT INTO authors (author_id, first_name, last_name, nationality, genre)
VALUES
	('A100', 'James', 'Clear', 'American', 'Psychology'),
    ('A101', 'Lauren', 'Roberts', 'American', 'Fiction'),
    ('A102', 'Grant', 'Hill', 'American', 'Memoir'),
    ('A103', 'Rebecca', 'Yarros', 'American', 'Romance'),
    ('A104', 'Prince', 'Harry', 'American', 'Memoir'),
    ('A105', 'Elle', 'Kennedy', 'Canadian', 'Romance'),
    ('A106', 'Mark', 'Carney', 'Canadian', 'Finance'),
    ('A107', 'Jordan', 'Belfort', 'American', 'Psychology'),
    ('A108', 'Haruki', 'Marukami', 'Japanese', 'Fiction'),
    ('A109', 'Paulo', 'Coelho', 'Brazilian', 'Fiction'),
    ('A110', 'Arundhati', 'Roy', 'Indian', 'Political');
    
INSERT INTO book_authors (book_id, author_id)
VALUES
	('B001', 'A107'),
    ('B002', 'A100'),
    ('B003', 'A101'),
    ('B004', 'A101'),
    ('B005', 'A103'),
    ('B006', 'A103'),
    ('B007', 'A105'),
    ('B008', 'A106'),
    ('B009', 'A102'),
    ('B010', 'A104');
    
    
INSERT INTO customers (customer_id, first_name, last_name, phone, email, street_address, apt_no, city, province, postal_code)
VALUES
('C001', 'John', 'Doe', '5551234876', 'john.doe@gmail.com', '123 Elm St', 'Apt 101', 'Toronto', 'ON', 'M5A 1A1'),
('C002', 'Jane', 'Smith', '5555678231', 'jane.smith@gmail.com', '456 Oak St', 'Apt 322', 'Vancouver', 'BC', 'V6B 2B2'),
('C003', 'Alice', 'Johnson', '5558765223', 'alice.johnson@gmail.com', '789 Maple St', 'Apt 342', 'Montreal', 'QC', 'H2X 3X3'),
('C004', 'Bob', 'Brown', '5554321543', 'bob.brown@gmail.com', '101 Pine St', 'Apt 45', 'Calgary', 'AB', 'T2P 4P4'),
('C005', 'Charlie', 'Williams', '5551122987', 'charlie.williams@gmail.com', '202 Birch St', 'Apt 15', 'Ottawa', 'ON', 'K1A 5A5'),
('C006', 'David', 'Taylor', '5553344354', 'david.taylor@gmail.com', '303 Cedar St', 'Apt 601', 'Edmonton', 'AB', 'T5K 6K6'),
('C007', 'Emma', 'Anderson', '5555566997', 'emma.anderson@gmail.com', '404 Redwood St', 'Apt 237', 'Hamilton', 'ON', 'L8N 7N7'),
('C008', 'Frank', 'Martinez', '5557788221', 'frank.martinez@gmail.com', '505 Willow St', 'Apt 548', 'Winnipeg', 'MB', 'R3C 8C8'),
('C009', 'Grace', 'Garcia', '5559900121', 'grace.garcia@gmail.com', '606 Cherry St', 'Apt 900', 'Quebec City', 'QC', 'G1R 9R9'),
('C010', 'Henry', 'Miller', '5552233656', 'henry.miller@gmail.com', '707 Maplewood St', 'Apt 1210', 'London', 'ON', 'N6A 1A1');

INSERT INTO customers_login (customer_id, username, pwd)
VALUES
('C001','john.doe@gmail.com', 'apple'),
('C002', 'jane.smith@gmail.com', 'mirage'),
('C003', 'alice.johnson@gmail.com', 'chair'),
('C004', 'bob.brown@gmail.com', 'sun'),
('C005', 'charlie.williams@gmail.com', 'river'),
('C006', 'david.taylor@gmail.com', 'dog'),
('C007', 'emma.anderson@gmail.com', 'car'),
('C008', 'frank.martinez@gmail.com', 'cloud'),
('C009', 'grace.garcia@gmail.com', 'lovebooks'),
('C010', 'henry.miller@gmail.com', 'universe');

INSERT INTO orders (order_id, customer_id, order_date, order_status, total_amount)
VALUES
('O001', 'C001', '2025-03-01', 'Shipped', 120.50),
('O002', 'C002', '2025-03-02', 'Pending', 75.30),
('O003', 'C003', '2025-03-03', 'Delivered', 99.99),
('O004', 'C004', '2025-03-04', 'Shipped', 150.00),
('O005', 'C005', '2025-03-05', 'Pending', 45.60),
('O006', 'C006', '2025-03-06', 'Delivered', 200.20),
('O007', 'C007', '2025-03-07', 'Shipped', 85.75),
('O008', 'C008', '2025-03-08', 'Pending', 56.40),
('O009', 'C009', '2025-03-09', 'Delivered', 110.10),
('O010', 'C010', '2025-03-10', 'Shipped', 132.80);

INSERT INTO orderitems (order_item_id, order_id, book_id, quantity, price)
VALUES
('OI001', 'O001', 'B001', 2, 15.50),
('OI002', 'O001', 'B002', 1, 25.99),
('OI003', 'O002', 'B003', 3, 12.45),
('OI004', 'O002', 'B004', 1, 20.75),
('OI005', 'O003', 'B005', 2, 18.00),
('OI006', 'O004', 'B006', 1, 22.30),
('OI007', 'O005', 'B007', 5, 9.99),
('OI008', 'O006', 'B008', 1, 30.00),
('OI009', 'O007', 'B009', 4, 14.60),
('OI010', 'O008', 'B010', 2, 17.45);


INSERT INTO admins (id, username, password)
VALUES (100, 'admin', 'admin');

update books
set book_image = 'images/housemaid.jpg' where book_id='B011';




use bookstore;

update books
set books_description = 'College senior Sabrina James has her whole future planned out: graduate from college, kick butt in law school, and land a high-paying job at a cutthroat firm. Her path to escaping her shameful past certainly doesnt include a gorgeous hockey player who believes in love at first sight. One night of sizzling heat and surprising tenderness is all shes willing to give John Tucker, but sometimes, one night is all it takes for your entire life to change.' where book_id = 'B007';

update books
set books_description = 'CollegeOur world is full of fault lines—growing inequality in income and opportunity; systemic racism; health and economic crises from a global pandemic; mistrust of experts; the existential threat of climate change; deep threats to employment in a digital economy with robotics on the rise. Mark Carney argues that these fundamental problems and others like them stem from a common crisis in values. Drawing on the turmoil of the past decade, he shows how "market economies" have evolved into "market societies" where price determines the value of everything.' where book_id = 'B008';

update books
set books_description = 'Grant Hill always had game. His choice of college was a subject of national interest, and his arrival at Duke University cemented the program’s arrival at the top. In his freshman year, he led the team to its first NCAA championship, and three championship appearances in four years. His Duke career produced some of the most iconic moments in college basketball history, and Coach K proved to be a lifelong mentor.' where book_id = 'B009';

update books
set books_description = 'Before losing his mother, twelve-year-old Prince Harry was known as the carefree one, the happy-go-lucky Spare to the more serious Heir. Grief changed everything. He struggled at school, struggled with anger, with loneliness—and, because he blamed the press for his mother’s death, he struggled to accept life in the spotlight.' where book_id = 'B010';

select * from orders;
select * from books;
select * from orderitems;
select * from customers;
select * from customers_login;

delete from orders where order_id = 'O014';

delete from orderitems where order_item_id = 'OI020';


create or replace view new_books_view as
select b.book_id, b.title, b.publish_date, b.price, b.book_image, b.stock_quantity, b.books_description,
a.first_name, a.last_name
from books b
join book_authors ba on b.book_id = ba.book_id
join authors a on ba.author_id = a.author_id
where b.publish_date >= CURDATE() - interval 100 day
order by b.publish_date desc;

select * from new_books_view;

delimiter //
create trigger after_book_insert
after insert on books
for each row
begin
	insert into book_log(book_id, book_action, date_added)
    values (NEW.book_id, 'ADD', NOW());
end //

delimiter //
create trigger before_book_delete
before delete on books
for each row
begin
	insert into book_log(book_id, book_action, date_added)
    values (OLD.book_id, 'delete', NOW());
end //

delimiter ;



