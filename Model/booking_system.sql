-- Create Database
CREATE DATABASE booking_system;
-- Create Visitor table
CREATE TABLE visitor (
  idVisitor INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR (255) UNIQUE,
  passcode VARCHAR (255) UNIQUE
);
-- Add FK column to Visitor table
ALTER TABLE
  visitor
ADD
  COLUMN accType int;
-- Add constraint to Visitor table
ALTER TABLE
  visitor
ADD
  CONSTRAINT userType FOREIGN KEY(accType) REFERENCES account_type(idType);
-- Create Account type table
  CREATE TABLE account_type (
    idType int AUTO_INCREMENT PRIMARY KEY,
    accType VARCHAR (255)
  );
-- Create Admin table
  CREATE TABLE admin (
    idAdmin int,
    FOREIGN KEY (idAdmin) REFERENCES visitor(idVisitor)
  );
-- Create Customer table
  CREATE TABLE customer (
    firstName VARCHAR (255),
    lastName VARCHAR (255),
    phone int,
    numChildren int,
    idCustomer int,
    FOREIGN KEY (idCustomer) REFERENCES visitor(idVisitor)
  );
-- Create Children table
  CREATE TABLE children (
    idChild int AUTO_INCREMENT PRIMARY KEY,
    age int
  );
-- Add FK column to Children table
ALTER TABLE
  children
ADD
  COLUMN childParent int;
-- Add constraint to Children table
ALTER TABLE
  children
ADD
  CONSTRAINT childrenParent FOREIGN KEY(childParent) REFERENCES customer(idCustomer);
-- Create Accommodation table
  CREATE TABLE accommodation (
    idAccom int AUTO_INCREMENT PRIMARY KEY,
    accomName VARCHAR (255),
    accomType VARCHAR (255),
    accomView VARCHAR (255)
  );
-- Create Booking table
  CREATE TABLE booking (
    checkIn date,
    checkOut date,
    idCustomer int,
    idAccommodation int,
    FOREIGN KEY (idCustomer) REFERENCES visitor(idVisitor),
    FOREIGN KEY (idAccommodation) REFERENCES accommodation(idAccom)
  );
-- Create Board table
  CREATE TABLE board (
    idBoard int AUTO_INCREMENT PRIMARY KEY,
    boardName VARCHAR (255),
    boardType VARCHAR (255),
    boardPrice int
  );
-- Create Tariffs table
  CREATE TABLE tariffs (
    idTariff int AUTO_INCREMENT PRIMARY KEY,
    tariff int
  );
-- Add FK column to Accommodation table
ALTER TABLE
  tariffs
ADD
  COLUMN idAccomTariff int;
-- Add constraint to Accommodation table
ALTER TABLE
  tariffs
ADD
  CONSTRAINT accommodation_tarrif FOREIGN KEY(idAccomTariff) REFERENCES accommodation(idAccom);
-- Insert Accommodation
INSERT INTO
  accommodation(accomName, accomType, accomView)
VALUES
  ('Apartment', 'None', 'None'),
  ('Bungalow', 'None', 'None'),
  ('Single Room', 'None', 'Internal View'),
  ('Single Room', 'None', 'External View'),
  ('Double Room', 'Double bed', 'Internal View'),
  ('Double Room', 'Double bed', 'External View'),
  ('Double Room', '2 Single beds', 'Internal View');
-- Insert Accommodation Tariffs
INSERT INTO
  tariffs(tariff, idAccomTariff)
VALUES
  (300, 1),
  (500, 2),
  (100, 3),
  (120, 4),
  (200, 5),
  (240, 6),
  (200, 7);
-- Insert Hotel Board
INSERT INTO
  board(boardName, boardType, boardPrice)
VALUES
  ('No Board', 'None', 0),
  ('Full Board', 'None', 80),
  ('Half Board', 'Breakfast + Lunch', 40),
  ('Half Board', 'Breakfast + Dinner', 40);
CREATE TABLE childrenOpts(
    idOpt int PRIMARY KEY AUTO_INCREMENT,
    OptName VARCHAR (255)
  );
ALTER TABLE
  childrenOpts
ADD
  COLUMN idChildOpt int;
-- Add constraint to childrenOpts table
ALTER TABLE
  tariffs
ADD
  CONSTRAINT accommodation_tarrif FOREIGN KEY(idAccomTariff) REFERENCES accommodation(idAccom);