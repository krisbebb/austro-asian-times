--
-- Table structure for table `journalists`
--

CREATE TABLE `journalists` (
  `id` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `privilege` int(11) NOT NULL DEFAULT '1',
  `hashed_password` char(64) NOT NULL,
  `salt` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-
-- Indexes for table `journalists`
--
ALTER TABLE `journalists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journalists`
--
- --------------------------------------------------------

--
-- Table structure for table `tags`
--

ALTER TABLE `journalists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

  DROP TABLE IF EXISTS `tags`;
  CREATE TABLE `tags` (
    `tag_id` int(11) NOT NULL,
    `tag_text` char(50) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  --

  --
  -- Indexes for dumped tables
  --

  --
  -- Indexes for table `tags`
  --
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


  -- --------------------------------------------------------

  --
  -- Table structure for table `articles`
  --

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `headline` varchar(70) NOT NULL,
  `data` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD UNIQUE KEY `headline` (`headline`),
  ADD KEY `created_by_fk1` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `created_by_fk1` FOREIGN KEY (`created_by`) REFERENCES `journalists` (`id`);

  -- --------------------------------------------------------

  --
  -- Table structure for table `article_tags`
  --


CREATE TABLE `article_tags` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--


--
-- Indexes for table `article_tags`
--
ALTER TABLE `article_tags`
  ADD PRIMARY KEY (`article_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_tags`
--
ALTER TABLE `article_tags`
  ADD CONSTRAINT `article_tags_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE;
