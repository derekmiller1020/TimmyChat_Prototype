TimmyChat
=========

TimmyChat Prototype- THIS IS JUST A PROTOTYPE. This was just a quick demonstration of how the messaging service should
work, during medical brigades.

IMPORTANT NOTE: In order to have any 'Everyone' row, the user_id for everyone must equal 1. You will run into syntax
errors, if you do not do this.

CREATE TABLE users
(
user_id int(8) NOT NULL AUTO_INCREMENT,
username varchar(255),
password varchar(255),
);

CREATE TABLE chat
(
message_id int(8) NOT NULL AUTO_INCREMENT,
user_id int(8),
message text,
timestamp int(11),
user_1 varchar(50),
user_2 varchar(50),
read int(5),
new_msg int(4)
);


