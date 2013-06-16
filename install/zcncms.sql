DROP TABLE IF EXISTS `{tablepre}adflash`;
CREATE TABLE `{tablepre}adflash` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `linkurl` varchar(100) default NULL,
  `thumb` varchar(100) default NULL,
  `orders` int(11) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}ads`;
CREATE TABLE `{tablepre}ads` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `content` text,
  `classid` int(8) NOT NULL default '0',
  `starttime` varchar(50) default NULL,
  `endtime` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}ads_class`;
CREATE TABLE `{tablepre}ads_class` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `orders` int(8) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}articles`;
CREATE TABLE `{tablepre}articles` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `seotitle` varchar(100) default NULL,
  `seokeyword` varchar(100) default NULL,
  `seointro` text,
  `filename` varchar(100) default NULL,
  `fromtitle` varchar(100) default NULL,
  `fromlinkurl` varchar(100) default NULL,
  `titlecolor` varchar(10) default NULL,
  `linkurl` varchar(100) default NULL,
  `template` varchar(100) default NULL,
  `intro` text,
  `content` text,
  `author` varchar(50) default NULL,
  `classid` int(11) NOT NULL default '0',
  `thumb` text,
  `clicks` int(11) NOT NULL default '0',
  `isplay` int(11) NOT NULL default '1',
  `istop` int(11) NOT NULL default '0',
  `ishot` int(11) NOT NULL default '0',
  `isgood` int(11) NOT NULL default '0',
  `addtime` int(11) NOT NULL default '0',
  `authortime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}articles_class`;
CREATE TABLE `{tablepre}articles_class` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `seotitle` varchar(100) default NULL,
  `seokeyword` varchar(100) default NULL,
  `seointro` text,
  `filename` varchar(100) default NULL,
  `listnum` varchar(50) default NULL,
  `linkurl` varchar(100) default NULL,
  `thumb` varchar(100) default NULL,
  `template` varchar(100) default NULL,
  `intro` text,
  `rootid` int(11) NOT NULL default '0',
  `parentid` int(11) NOT NULL default '0',
  `level` int(11) NOT NULL default '0',
  `orders` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}books`;
CREATE TABLE `{tablepre}books` (
  `id` integer unsigned NOT NULL auto_increment,
  `memberid` int(4) NOT NULL default '0',
  `classid` int(8) NOT NULL default '1',
  `niname` varchar(50) default NULL,
  `email` varchar(100) default NULL,
  `qq` varchar(100) default NULL,
  `msn` varchar(100) default NULL,
  `addr` varchar(100) default NULL,
  `tel` varchar(100) default NULL,
  `mobile` varchar(100) default NULL,
  `title` varchar(100) default NULL,
  `content` text,
  `backcontent` text,
  `frommodel` varchar(50) default NULL,
  `fromid` int(11) NOT NULL default '0',
  `isok` int(11) NOT NULL default '0',
  `isplay` int(11) NOT NULL default '0',
  `ipaddr` varchar(50) default NULL,
  `addtime` int(11) NOT NULL default '0',
  `backtime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}books_class`;
CREATE TABLE `{tablepre}books_class` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `orders` int(8) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}downloads`;
CREATE TABLE `{tablepre}downloads` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `seotitle` varchar(100) default NULL,
  `seokeyword` varchar(100) default NULL,
  `seointro` text,
  `filename` varchar(100) default NULL,
  `fromtitle` varchar(100) default NULL,
  `fromlinkurl` varchar(100) default NULL,
  `titlecolor` varchar(10) default NULL,
  `linkurl` varchar(100) default NULL,
  `template` varchar(100) default NULL,
  `dlinkname` varchar(100) default NULL,
  `dlink` varchar(100) default NULL,
  `intro` text,
  `content` text,
  `author` varchar(50) default NULL,
  `classid` int(11) NOT NULL default '0',
  `thumb` text,
  `clicks` int(11) NOT NULL default '0',
  `isplay` int(11) NOT NULL default '1',
  `istop` int(11) NOT NULL default '0',
  `ishot` int(11) NOT NULL default '0',
  `isgood` int(11) NOT NULL default '0',
  `addtime` int(11) NOT NULL default '0',
  `authortime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{tablepre}downloads_class`;

CREATE TABLE `{tablepre}downloads_class` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `seotitle` varchar(100) default NULL,
  `seokeyword` varchar(100) default NULL,
  `seointro` text,
  `filename` varchar(100) default NULL,
  `listnum` varchar(50) default NULL,
  `linkurl` varchar(100) default NULL,
  `thumb` varchar(100) default NULL,
  `template` varchar(100) default NULL,
  `intro` text,
  `rootid` int(11) NOT NULL default '0',
  `parentid` int(11) NOT NULL default '0',
  `level` int(11) NOT NULL default '0',
  `orders` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}keys`;
CREATE TABLE `{tablepre}keys` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `linkurl` varchar(255) default NULL,
  `orders` int(11) NOT NULL default '0',
  `replacenum` int(11) NOT NULL default '0',
  `starttime` varchar(50) default NULL,
  `endtime` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}links`;
CREATE TABLE `{tablepre}links` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `linkurl` varchar(255) default NULL,
  `thumb` text default NULL,
  `classid` int(11) NOT NULL default '0',
  `starttime` varchar(50) default NULL,
  `endtime` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}links_class`;
CREATE TABLE `{tablepre}links_class` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `orders` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}members`;
CREATE TABLE `{tablepre}members` (
  `id` integer unsigned NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) default NULL,
  `tname` varchar(50) default NULL,
  `scard` varchar(50) default NULL,
  `tel` varchar(50) default NULL,
  `mobile` varchar(50) default NULL ,
  `addr` varchar(100) default NULL,
  `headpic` varchar(150) default NULL,
  `qqnum` varchar(50) default NULL,
  `province` varchar(50) default NULL,
  `city` varchar(50) default NULL,
  `county` varchar(100) default NULL,
  `question1` varchar(100) default NULL,
  `answer1` varchar(100) default NULL,
  `question2` varchar(100) default NULL,
  `answer2` varchar(100) default NULL,
  `classid` int(8) NOT NULL default '0',
  `integration` int(11) NOT NULL default '0',
  `isf` int(11) NOT NULL default '0',
  `ism` int(11) NOT NULL default '0',
  `isc` int(11) NOT NULL default '0',
  `addtime` int(11) NOT NULL default '0',
  `starttime` varchar(50) default NULL,
  `endtime` varchar(50) default NULL,
  `ipaddr` varchar(100) default NULL,
  `logintime` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}members_class`;
CREATE TABLE `{tablepre}members_class` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(50) default NULL,
  `orders` int(8) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}members_log`;
CREATE TABLE `{tablepre}members_log` (
  `id` integer unsigned NOT NULL auto_increment,
  `memberid` int(4) NOT NULL default '0',
  `action` text default NULL,
  `addtime` int(4) NOT NULL default '0',
  `ipaddr` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}menus`;

CREATE TABLE `{tablepre}menus` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `linkurl` varchar(100) default NULL,
  `target` varchar(50) default '_self',
  `rootid` int(11) NOT NULL default '0',
  `parentid` int(11) NOT NULL default '0',
  `level` int(11) NOT NULL default '0',
  `orders` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{tablepre}pages`;

CREATE TABLE `{tablepre}pages` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `seotitle` varchar(100) default NULL,
  `seokeyword` varchar(100) default NULL,
  `seointro` text,
  `filename` varchar(100) default NULL,
  `fromtitle` varchar(100) default NULL,
  `fromlinkurl` varchar(100) default NULL,
  `titlecolor` varchar(10) default NULL,
  `linkurl` varchar(100) default NULL,
  `template` varchar(100) default NULL,
  `intro` text,
  `content` text,
  `author` varchar(50) default NULL,
  `thumb` text,
  `clicks` int(11) NOT NULL default '0',
  `isplay` int(11) NOT NULL default '1',
  `istop` int(11) NOT NULL default '0',
  `ishot` int(11) NOT NULL default '0',
  `isgood` int(11) NOT NULL default '0',
  `addtime` int(11) NOT NULL default '0',
  `authortime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{tablepre}pictures`;

CREATE TABLE `{tablepre}pictures` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `seotitle` varchar(100) default NULL,
  `seokeyword` varchar(100) default NULL,
  `seointro` text,
  `filename` varchar(100) default NULL,
  `fromtitle` varchar(100) default NULL,
  `fromlinkurl` varchar(100) default NULL,
  `titlecolor` varchar(10) default NULL,
  `linkurl` varchar(100) default NULL,
  `template` varchar(100) default NULL,
  `intro` text,
  `content` text,
  `author` varchar(50) default NULL,
  `classid` int(11) NOT NULL default '0',
  `thumb` text,
  `clicks` int(11) NOT NULL default '0',
  `isplay` int(11) NOT NULL default '1',
  `istop` int(11) NOT NULL default '0',
  `ishot` int(11) NOT NULL default '0',
  `isgood` int(11) NOT NULL default '0',
  `addtime` int(11) NOT NULL default '0',
  `authortime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{tablepre}pictures_class`;

CREATE TABLE `{tablepre}pictures_class` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `seotitle` varchar(100) default NULL,
  `seokeyword` varchar(100) default NULL,
  `seointro` text,
  `filename` varchar(100) default NULL,
  `listnum` varchar(50) default NULL,
  `linkurl` varchar(100) default NULL,
  `thumb` varchar(100) default NULL,
  `template` varchar(100) default NULL,
  `intro` text,
  `rootid` int(11) NOT NULL default '0',
  `parentid` int(11) NOT NULL default '0',
  `level` int(11) NOT NULL default '0',
  `orders` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{tablepre}pictures_photo`;

CREATE TABLE `{tablepre}pictures_photo` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `seotitle` varchar(100) default NULL,
  `seokeyword` varchar(100) default NULL,
  `seointro` text,
  `filename` varchar(100) default NULL,
  `fromtitle` varchar(100) default NULL,
  `fromlinkurl` varchar(100) default NULL,
  `titlecolor` varchar(10) default NULL,
  `linkurl` varchar(100) default NULL,
  `template` varchar(100) default NULL,
  `intro` text,
  `content` text,
  `author` varchar(50) default NULL,
  `pictureid` int(11) NOT NULL default '0',
  `thumb` text,
  `clicks` int(11) NOT NULL default '0',
  `isplay` int(11) NOT NULL default '1',
  `istop` int(11) NOT NULL default '0',
  `ishot` int(11) NOT NULL default '0',
  `isgood` int(11) NOT NULL default '0',
  `addtime` int(11) NOT NULL default '0',
  `authortime` int(11) NOT NULL default '0',
  `orders` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{tablepre}products`;

CREATE TABLE `{tablepre}products` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `seotitle` varchar(100) default NULL,
  `seokeyword` varchar(100) default NULL,
  `seointro` text,
  `filename` varchar(100) default NULL,
  `fromtitle` varchar(100) default NULL,
  `fromlinkurl` varchar(100) default NULL,
  `titlecolor` varchar(10) default NULL,
  `linkurl` varchar(100) default NULL,
  `template` varchar(100) default NULL,
  `price` varchar(100) default NULL,
  `standard` varchar(100) default NULL,
  `intro` text,
  `content` text,
  `author` varchar(50) default NULL,
  `classid` int(11) NOT NULL default '0',
  `thumb` text,
  `clicks` int(11) NOT NULL default '0',
  `isplay` int(11) NOT NULL default '1',
  `istop` int(11) NOT NULL default '0',
  `ishot` int(11) NOT NULL default '0',
  `isgood` int(11) NOT NULL default '0',
  `addtime` int(11) NOT NULL default '0',
  `authortime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{tablepre}products_class`;

CREATE TABLE `{tablepre}products_class` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `seotitle` varchar(100) default NULL,
  `seokeyword` varchar(100) default NULL,
  `seointro` text,
  `filename` varchar(100) default NULL,
  `listnum` varchar(50) default NULL,
  `linkurl` varchar(100) default NULL,
  `thumb` varchar(100) default NULL,
  `template` varchar(100) default NULL,
  `intro` text,
  `rootid` int(11) NOT NULL default '0',
  `parentid` int(11) NOT NULL default '0',
  `level` int(11) NOT NULL default '0',
  `orders` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{tablepre}products_photo`;

CREATE TABLE `{tablepre}products_photo` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `seotitle` varchar(100) default NULL,
  `seokeyword` varchar(100) default NULL,
  `seointro` text,
  `filename` varchar(100) default NULL,
  `fromtitle` varchar(100) default NULL,
  `fromlinkurl` varchar(100) default NULL,
  `titlecolor` varchar(10) default NULL,
  `linkurl` varchar(100) default NULL,
  `template` varchar(100) default NULL,
  `intro` text,
  `content` text,
  `author` varchar(50) default NULL,
  `productid` int(11) NOT NULL default '0',
  `thumb` text,
  `clicks` int(11) NOT NULL default '0',
  `isplay` int(11) NOT NULL default '1',
  `istop` int(11) NOT NULL default '0',
  `ishot` int(11) NOT NULL default '0',
  `isgood` int(11) NOT NULL default '0',
  `addtime` int(11) NOT NULL default '0',
  `authortime` int(11) NOT NULL default '0',
  `orders` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{tablepre}services`;

CREATE TABLE `{tablepre}services` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `account` varchar(100) default NULL,
  `classid` int(11) NOT NULL default '1',
  `isplay` int(11) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{tablepre}users`;
CREATE TABLE `{tablepre}users` (
  `id` integer unsigned NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) default NULL,
  `classid` int(50) NOT NULL default '0',
  `power` text default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}users_class`;
CREATE TABLE `{tablepre}users_class` (
  `id` integer unsigned NOT NULL auto_increment,
  `title` varchar(50) default NULL,
  `orders` int(8) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}users_classpower`;
CREATE TABLE `{tablepre}users_classpower` (
  `id` integer unsigned NOT NULL auto_increment,
  `modulename` varchar(50) default NULL,
  `userid` int(8) NOT NULL default '0',
  `classpower` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `{tablepre}users_log`;
CREATE TABLE `{tablepre}users_log` (
  `id` integer unsigned NOT NULL auto_increment,
  `userid` int(4) NOT NULL default '0',
  `action` text,
  `addtime` int(4) NOT NULL default '0',
  `ipaddr` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;