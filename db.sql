CREATE TABLE taskStatus (
  id int(10) PRIMARY KEY AUTO_INCREMENT,
  status_name varchar(50) NOT NULL
);

CREATE TABLE tasks(
  id int(10) PRIMARY KEY AUTO_INCREMENT,
  task_name varchar(50) NOT NULL,
  task_description varchar(150) DEFAULT NULL,
  status_id int NOT NULL,
  FOREIGN KEY (status_id) REFERENCES taskStatus(id)
);

INSERT INTO taskStatus (status_name) VALUES 
('Готово'), ('В работе');