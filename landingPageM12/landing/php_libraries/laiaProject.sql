DROP DATABASE IF EXISTS laiaProject;
CREATE DATABASE  IF NOT EXISTS laiaProject;
USE laiaProject;

DROP TABLE IF EXISTS rols;
CREATE TABLE rols (
  id_rol int auto_increment,
  name_rol varchar(50) NOT NULL,
  PRIMARY KEY (id_rol)
);

DROP TABLE IF EXISTS games;
CREATE TABLE games (
  id_game int auto_increment,
  name_game varchar(50) NOT NULL,
  PRIMARY KEY (id_game)
);
  
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id_user int auto_increment,
  user_name varchar(50) NOT NULL,
  user_password varchar(50) NOT NULL,
  userRol int,
  PRIMARY KEY (id_user)
);
  
DROP TABLE IF EXISTS stats;
CREATE TABLE stats (
  id_user int not null,
  id_game int not null,
  score varchar(50) not null,
  PRIMARY KEY (id_user, id_game),
  FOREIGN KEY (id_user) REFERENCES users (id_user),
  FOREIGN KEY (id_game) REFERENCES games (id_game)
  );
  
INSERT INTO rols (name_rol) values
('player'),
('admin'),
('superAdmin');
  
  
INSERT INTO users (user_name, user_password, userRol) values
('Jordi', '1234', 1),
('Isaac', '12345', 2),
('Ivan', '123456', 3);


  
  