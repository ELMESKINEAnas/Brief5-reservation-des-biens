-- Create Database
CREATE DATABASE hotel_booking;
-- Create Visitor table
CREATE TABLE visitor (
  idVisitor INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR (255) UNIQUE,
  passcode VARCHAR (255),
  accType VARCHAR (255)
);
-- Create Admin table
CREATE TABLE admin (
  idAdmin int,
  FOREIGN KEY (idAdmin) REFERENCES visitor(idVisitor)
);
-- Create Customer table
CREATE TABLE customer (
  firstName VARCHAR (255) NOT NULL,
  lastName VARCHAR (255) NOT NULL,
  numChildren int NOT NULL,
  idCustomer int NOT NULL,
  FOREIGN KEY (idCustomer) REFERENCES visitor(idVisitor)
);
-- Create Accommodation table
CREATE TABLE accommodation (
  idAccom int AUTO_INCREMENT PRIMARY KEY,
  accomName VARCHAR (255) NOT NULL,
  accomType VARCHAR (255) NOT NULL,
  accomView VARCHAR (255) NOT NULL,
  accomPrice int NOT NULL
);
-- Create Board table
CREATE TABLE board (
  idBoard int AUTO_INCREMENT PRIMARY KEY,
  boardName VARCHAR (255) NOT NULL,
  boardType VARCHAR (255) NOT NULL,
  boardPrice int NOT NULL
);
-- Create Children table
CREATE TABLE children (
  idChild int AUTO_INCREMENT PRIMARY KEY,
  childAge VARCHAR (255) NOT NULL,
  childOpt int NOT NULL,
  idBooking int NOT NULL,
  FOREIGN KEY (childOpt) REFERENCES childOpt(idChildOpt),
  FOREIGN KEY (idBooking) REFERENCES booking(idBooking)
);
-- Create ChildOption table
CREATE TABLE childOpt (
  idChildOpt int AUTO_INCREMENT PRIMARY KEY,
  nameOpt VARCHAR (255) NOT NULL,
  optPrice int NOT NULL
);
-- Create Booking table
CREATE TABLE booking (
  idBooking int AUTO_INCREMENT PRIMARY KEY,
  checkIn date NOT NULL,
  checkOut date NOT NULL,
  idCustomer int,
  bookingKey int NOT NULL,
  FOREIGN KEY (idCustomer) REFERENCES visitor(idVisitor)
);
-- Create Booking table
CREATE TABLE cart (
  idBooking int,
  idAccom int,
  idboard int,
  bookingKey int NOT NULL,
  FOREIGN KEY (idBooking) REFERENCES booking(idBooking),
  FOREIGN KEY (idAccom) REFERENCES accommodation(idAccom),
  FOREIGN KEY (idboard) REFERENCES board(idBoard)
);
INSERT INTO
  accommodation(accomName, accomType, accomView, accomPrice)
VALUES
  ('Apartment', 'None', 'None', 300),
  ('Bungalow', 'None', 'None', 500),
  ('Single Room', 'None', 'Internal View', 100),
  ('Single Room', 'None', 'External View', 120),
  (
    'Double Room',
    'Double bed',
    'Internal View',
    200
  ),
  (
    'Double Room',
    'Double bed',
    'External View',
    240
  ),
  (
    'Double Room',
    '2 Single beds',
    'Internal View',
    200
  );
INSERT INTO
  board(boardName, boardType, boardPrice)
VALUES
  ('No Board', 'None', 0),
  ('Full Board', 'None', 80),
  ('Half Board', 'Breakfast + Lunch', 40),
  ('Half Board', 'Breakfast + Dinner', 40);
INSERT INTO
  childOpt(nameOpt, optPrice)
VALUES
  ('Add Bed 25%', 25),
  ('No Additional Bed', 0),
  ('Add Bed 50%', 50),
  ('Add Room', 100),
  ('Add Bed 70%', 70);