
INSERT INTO `journalists` (`id`, `login`, `firstname`, `lastname`, `privilege`, `hashed_password`, `salt`) VALUES
(1, 'admin', 'Peter', 'Parker', 2, 'f1c827fb69dfc45fe7f8779c9a828b5b5db267f8dee71c18555c8fcf63870182', '09E21687DA54C3FB'),
(2, 'journo1', 'Ray', 'Martinez', 1, '8aa9d9f29afbf223d747e2cba8a4b662f7d6382c49d37b3ff46c2043230785c1', '1289450D67AECFB3');


INSERT INTO `tags` (`tag_id`, `tag_text`) VALUES
(1, 'Australia'),
(2, 'World'),
(3, 'Technology'),
(4, 'Sport'),
(5, 'General');

INSERT INTO `articles` (`article_id`, `headline`, `data`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Canadian Royal Wedding', '  In sodales pulvinar massa, at bibendum augue suscipit sed. Integer pharetra lectus vitae massa tempus, eu euismod velit interdum. Suspendisse efficitur nec libero ut dapibus. Ut a purus turpis. Praesent molestie elit id tortor vulputate, eleifend accumsan magna bibendum. Quisque pretium porta mauris et maximus. Vestibulum id varius purus, in pulvinar quam. In laoreet urna placerat erat rhoncus lacinia. In hac habitasse platea dictumst.\r\n\r\n', 1, '2018-05-26 03:27:53', '2018-05-26 04:44:07'),
(2, 'Big Game Grand Final', '  Vestibulum vitae semper tortor, varius aliquet lorem. Nullam magna orci, venenatis ut pellentesque id, laoreet ac velit. Duis vel blandit nibh. Donec semper pretium turpis sit amet laoreet. Nullam euismod molestie ipsum, vitae volutpat ligula ultricies a. Nullam volutpat posuere urna, vel laoreet sem pellentesque non. Sed non imperdiet diam, dignissim congue lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ornare lorem ut turpis hendrerit luctus. Nulla facilisis, arcu sed lacinia egestas, dui ipsum pellentesque justo, quis scelerisque ante mauris ac ex. Sed sed odio leo. Nullam eget libero nec nisi fermentum vehicula eget lacinia augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non enim nec dui ornare blandit. Phasellus dignissim vehicula sapien, vel aliquam velit volutpat ut.', 1, '2018-05-26 03:28:36', '2018-05-26 04:44:14'),
(3, 'Mobile Phone Reviews', '  Mauris pellentesque est nec consectetur laoreet. In sit amet pulvinar dolor. Nullam cursus vulputate lectus non pretium. Nulla tincidunt risus et magna dapibus, et cursus libero sodales. Integer sit amet mi facilisis, vestibulum ipsum eu, ultrices libero. Nulla hendrerit posuere tortor eu hendrerit. Aliquam euismod mollis velit, eu tristique sem elementum a. Pellentesque vitae dolor at lacus venenatis pellentesque. Vestibulum sem risus, efficitur sit amet urna sed, rutrum porta augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer a sagittis nulla, mattis imperdiet velit.', 1, '2018-05-26 03:29:35', '2018-05-26 04:44:20'),
(4, 'Election Results', '  Cras quis molestie tortor, ut elementum urna. Proin hendrerit ultrices magna vel commodo. Cras non nunc sit amet nisi malesuada posuere. Vestibulum id nulla mi. Aliquam hendrerit, augue quis laoreet lacinia, mi nisi commodo magna, ut congue ligula dui at ligula. Sed metus arcu, pharetra viverra feugiat ac, accumsan id mi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque tincidunt metus nec est pharetra, id lobortis orci scelerisque. Vestibulum eu purus fermentum, ultrices justo id, scelerisque arcu. Aliquam nec ex tempor, faucibus neque at, pulvinar nunc. Nullam in vestibulum dolor, sed bibendum risus. Nunc eget ornare nunc.', 1, '2018-05-26 03:30:45', '2018-05-26 04:47:34'),
(5, 'Badminton Scandal', '  Pellentesque mi tortor, iaculis vel rhoncus vitae, tincidunt eget libero. Aenean rutrum sem libero, nec dapibus purus consequat non. In viverra diam sit amet placerat euismod. Aliquam venenatis, nunc eu tempor iaculis, est leo pulvinar libero, ut rhoncus ligula leo id sapien. Quisque volutpat vulputate magna vel fermentum. Mauris quis pharetra magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas finibus risus ac mauris dapibus venenatis. Nam convallis lectus eget diam ornare ultricies a vitae ex.\r\n\r\n', 2, '2018-05-26 03:31:35', '2018-05-26 04:48:18'),
(6, 'Nuclear War Imminent', '  Integer a sodales justo. Etiam fringilla maximus lectus, eget lobortis augue consectetur pretium. Proin ut odio et leo auctor luctus. Suspendisse lacinia pellentesque aliquet. Vestibulum finibus, metus sit amet venenatis facilisis, nisi mi luctus arcu, ut aliquam enim arcu id nunc. Integer odio nibh, euismod vitae eros vel, ultricies maximus urna. Praesent non laoreet odio, et ullamcorper neque. Praesent dui nibh, accumsan sit amet lorem non, tincidunt pretium ante. Etiam vulputate turpis justo, nec venenatis est ultricies vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi aliquet urna quam, eget convallis nisl molestie ac.', 2, '2018-05-26 03:32:05', '2018-05-26 04:48:22'),
(7, 'Eggs are Bad Again', '  Nullam ultricies neque a metus congue, vitae venenatis orci molestie. Maecenas feugiat massa id sapien auctor cursus sed iaculis magna. Donec et condimentum tellus. Morbi commodo ligula a turpis pellentesque, eu blandit est efficitur. Maecenas sit amet neque odio. Nullam efficitur feugiat ex id finibus. Maecenas fermentum imperdiet odio a iaculis. Suspendisse lobortis elit purus, id maximus mi feugiat sit amet. Phasellus tristique tortor ut dui rutrum, in interdum tellus consectetur. Vivamus euismod tortor vel malesuada consequat. Aliquam vulputate at ligula non elementum. Nunc vehicula ut urna a hendrerit. Vestibulum risus arcu, malesuada sit amet scelerisque vitae, porta non massa. Mauris faucibus nisl in tellus mollis auctor. Morbi quis ligula aliquet, tincidunt libero non, consequat quam. Cras convallis enim quis metus faucibus placerat.', 2, '2018-05-26 03:32:35', '2018-05-26 04:48:33');


INSERT INTO `article_tags` (`article_id`, `tag_id`) VALUES
(2, 1),
(4, 1),
(5, 1),
(1, 2),
(6, 2),
(7, 2),
(2, 4),
(5, 4),
(3, 5),
(4, 5),
(5, 5),
(7, 5);
