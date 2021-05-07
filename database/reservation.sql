CREATE TABLE `user` (
  `id_user` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `login` varchar(50) NOT NULL UNIQUE,
  `password` varchar(50) NOT NULL,
  `role` tinyint(1) NOT NULL
);

INSERT INTO `user` (`id_user`, `password`, `role`, `login`) VALUES
(1, '202cb962ac59075b964b07152d234b70', 1, 'oussama@gmail.com'),
(3, '202cb962ac59075b964b07152d234b70', 0, 'hassan@gmail.com'),
(4, '202cb962ac59075b964b07152d234b70', 0, 'ali@gmail.com'),
(5, '202cb962ac59075b964b07152d234b70', 0, 'salhi@gmail.com'),
(6, '202cb962ac59075b964b07152d234b70', 0, 'ilyas@gmail.com'),
(7, '202cb962ac59075b964b07152d234b70', 0, 'farouk@gmail.com'),
(8, '202cb962ac59075b964b07152d234b70', 0, 'steve@gmail.com'),
(9, '202cb962ac59075b964b07152d234b70', 0, 'sara@gmail.com'),
(10, '202cb962ac59075b964b07152d234b70', 0, 'fadoua@gmail.com'),
(11, '202cb962ac59075b964b07152d234b70', 0, 'mariam@gmail.com'),
(13, '202cb962ac59075b964b07152d234b70', 0, 'chafik@gmail.com'),
(14, '202cb962ac59075b964b07152d234b70', 0, 'khadija@gmail.com'),
(15, '202cb962ac59075b964b07152d234b70', 0, 'sir@gmail.com'),
(16, '202cb962ac59075b964b07152d234b70', 0, 'jilali@gmail.com'),
(17, '202cb962ac59075b964b07152d234b70', 0, 'khalid@gmail.com'),
(18, '202cb962ac59075b964b07152d234b70', 0, 'azzouz@gmail.com');

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom_client` varchar(25) NOT NULL,
  `prenom_client` varchar(25) NOT NULL,
  `email_client` varchar(30) NOT NULL UNIQUE,
  `phone_client` varchar(30) DEFAULT NULL,
  `fk_user` int(11) NOT NULL
);

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `email_client`, `phone_client`, `fk_user`) VALUES
(1, 'AB55774466', 'hassan', 'Ali', 'hassan@gmail.com', '0625143658', 3),
(2, 'AB54879652', 'Ali', 'ilyas', 'ali@gmail.com', '0658472435', 4),
(3, 'AB33556324', 'SALHI', 'Steve','salhi@gmail.com', '0222555447', 5),
(4, 'AB47483647', 'ilyas', 'Fadoua','ilyas@gmail.com', '0655442211', 6),
(5, 'AB74583247', 'farouk', 'farouk','farouk@gmail.com', '0655442211', 7),
(6, 'AB48345647', 'steve', 'steve','steve@gmail.com', '0655442211', 8),
(7, 'AB36444322', 'sara', 'sara','sara@gmail.com', '0655442211', 9),
(8, 'AB74836471', 'fadoua', 'fadoua','fadoua@gmail.com', '0655442211', 10);

CREATE TABLE `Administrateur` (
  `id_admin` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom_admin` varchar(25) NOT NULL,
  `prenom_admin` varchar(25) NOT NULL,
  `email_admin` varchar(25) NOT NULL UNIQUE,
  `fk_user` int(11) NOT NULL
);


INSERT INTO `Administrateur` (`id_admin`, `nom_admin`, `prenom_admin`, `email_admin`, `fk_user`) VALUES
(1, 'anas', 'anas', 'anas@gmail.com', 1);



CREATE TABLE `Pension` (
  `id_pension` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `prix_pension` int(11) NOT NULL,
  `type_pension` varchar(25) NOT NULL,
  `fk_bien` int(11) NOT NULL
);

--
-- Constraints for table administrateur
--
ALTER TABLE administrateur
  ADD CONSTRAINT FK_adm FOREIGN KEY (fk_user) REFERENCES user (id_user) ON DELETE CASCADE;

--
-- Constraints for table client
--
ALTER TABLE client
  ADD CONSTRAINT FK_cli FOREIGN KEY (fk_user) REFERENCES user (id_user) ON DELETE CASCADE;