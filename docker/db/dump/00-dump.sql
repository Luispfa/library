CREATE TABLE IF NOT EXISTS `order` (
  `id` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `total_price` float(4) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `order` VALUES 
('68ba2622-c8da-41d7-9a5c-64a19214d7de', 'order 1 in dataBase', 'email01@mail.com', 'pending', 0),
('68ba2622-c8da-41d7-9a5c-64a19214d7df', 'order 2 in dataBase', 'email02@mail.com', 'pending', 0),
('73a5dffc-907b-48d4-b528-7ba303a5129e', 'order 3 in dataBase', 'email03@mail.com', 'pending', 0),
('d9dfae96-5c80-48e5-9419-06edcbabc95f', 'order 4 in dataBase', 'email04@mail.com', 'pending', 0);