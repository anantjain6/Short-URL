CREATE TABLE `link` (
  `id` int(100) NOT NULL,
  `url` varchar(500) NOT NULL
);

ALTER TABLE `link` ADD PRIMARY KEY (`id`);
ALTER TABLE `link` MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;