

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_text` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `tags` (`tag_id`, `tag_text`) VALUES
(1, 'Australia'),
(2, 'World'),
(3, 'Technology'),
(4, 'Sport'),
(5, 'General');


ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);


ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
