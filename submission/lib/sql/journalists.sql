
CREATE TABLE `journalists` (
  `id` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `privilege` int(11) NOT NULL DEFAULT '1',
  `hashed_password` char(64) NOT NULL,
  `salt` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `journalists` (`id`, `login`, `firstname`, `lastname`, `privilege`, `hashed_password`, `salt`) VALUES
(1, 'admin', 'Peter', 'Parker', 2, 'f1c827fb69dfc45fe7f8779c9a828b5b5db267f8dee71c18555c8fcf63870182', '09E21687DA54C3FB'),
(2, 'journo1', 'Ray', 'Martinez', 1, '8aa9d9f29afbf223d747e2cba8a4b662f7d6382c49d37b3ff46c2043230785c1', '1289450D67AECFB3');


ALTER TABLE `journalists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);


ALTER TABLE `journalists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
