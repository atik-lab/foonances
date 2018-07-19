--
-- Foonances project
--

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Entries
--

DROP TABLE IF EXISTS `entries`;
CREATE TABLE `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `positive` tinyint(1) NOT NULL,
  `price` float NOT NULL,
  `category` int(11) NOT NULL,
  `description` varchar(1023) NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=435 ;

--
-- Categories
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Categories entries
--

INSERT INTO `categories` (`id`, `name`) VALUES
  (1, 'Supermercado'),
  (2, 'Transporte'),
  (3, 'Bares and restaurantes'),
  (4, 'Alquiler y consumo'),
  (5, 'Hogar'),
  (6, 'Personal/Ropa'),
  (7, 'Eventos');

--
-- Quotes
--

DROP TABLE IF EXISTS `quote`;
CREATE TABLE `quote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(32) NOT NULL,
  `quote` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Quotes entries
--

INSERT INTO `quote` (`id`, `author`, `quote`) VALUES
  (1, 'Dick Cavett', 'Show people tend to treat their finances like their dentistry. They assume the man handling it knows what he is doing.'),
  (2, 'Adam Smith', 'All money is a matter of belief.'),
  (3, 'Maria Bartiromo', 'Most women outlive their spouses. Divorce remains at record rates. It''s important for a woman to be able to control her finances.'),
  (4, 'Leif Garret', 'Stay on top of your finances. Don''t leave that up to others.'),
  (5, 'Andy Williams', 'We teach about how to drive in school, but not how to manage finances.'),
  (6, 'Anita Roddick', 'If I had learned more about business ahead of time, I would have been shaped into believing that it was only about finances and quality management.'),
  (7, 'Epictetus', 'Wealth consists not in having great possessions, but in having few wants.'),
  (8, 'Will Rogers', 'Don''t gamble; take all your savings and buy some good stock and hold it till it goes up, then sell it. If it don''t go up, don''t buy it.'),
  (9, 'Donald Trump', 'Money was never a big motivation for me, except as a way to keep score. The real excitement is playing the game.'),
  (10, 'J. Paul Getty', 'Money is like manure. You have to spread it around or it smells.'),
  (11, 'William Feather ', 'One of the funny things about the stock market is that every time one person buys, another sells, and both think they are astute.'),
  (12, 'Greer Garson', 'Starting out to make money is the greatest mistake in life. Do what you feel you have a flair for doing, and if you are good enough at it, the money will come.'),
  (13, 'Jules Renard', 'I finally know what distinguishes man from the other beasts: financial worries.'),
  (14, 'George Reisman', 'Under capitalism each individual engages in economic planning.'),
  (15, 'Martin Cruz Smith', 'As a novelist, I tell stories and people give me money. Then financial planners tell me stories and I give them money.'),
  (16, 'Mario Puzo', 'Finance is a gun. Politics is knowing when to pull the trigger.'),
  (17, 'Tadao Ando', 'But now, more and more, its society is concerned with economy and finance.'),
  (18, 'Sanjay Kumar', 'Finance is critical. If sufficient investment is made in infrastructure and venture capital is made available, there will be a big improvement in the situation.'),
  (19, 'Merton Miller', 'I had some of the students in my finance class actually do some empirical work on capital structures, to see if we could find any obvious patterns in the data, but we couldn''t see any.'),
  (20, 'Steve Israel', 'As you know, Social Security functions under the premise that today''s workers will help finance benefits for retirees and that these workers will then be supported by the next generation of workers paying into the same system.'),
  (21, 'Benjamin Franklin', 'A penny saved is a penny earned.'),
  (22, 'Jackie Mason', 'Money is not the most important thing in the world. Love is. Fortunately, I love money.'),
  (23, 'Benjamin Franklin', 'If you would be wealthy, think of saving as well as getting.'),
  (24, 'Rebecca Johnson', 'Money is the opposite of the weather. Nobody talks about it, but everybody does something about it.'),
  (25, 'Kin Hubbard', 'The safest way to double your money is to fold it over and put it in your pocket.'),
  (26, 'Katharine Whitehorn', '"The easiest way for your children to learn about money is for you not to have any.'),
  (27, 'Will Smith', 'Too many people spend money they haven''t earned, to buy things they don''t want, to impress people they don''t like.'),
  (28, 'James W. Frick', 'Don''t tell me where your priorities are. Show me where you spend your money and I''ll tell you what they are.');
