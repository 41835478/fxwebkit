--|||

CREATE TABLE IF NOT EXISTS `mt4_closed_actual` (
  `id` int(11) NOT NULL,
  `TICKET` int(11) NOT NULL,
  `server_id` int(11) DEFAULT NULL,
  `LOGIN` int(11) NOT NULL,
  `SYMBOL` char(16) NOT NULL,
  `DIGITS` int(11) NOT NULL,
  `CMD` int(11) NOT NULL,
  `VOLUME` int(11) NOT NULL,
  `OPEN_TIME` datetime NOT NULL,
  `OPEN_PRICE` double NOT NULL,
  `SL` double NOT NULL,
  `TP` double NOT NULL,
  `CLOSE_TIME` datetime NOT NULL,
  `EXPIRATION` datetime NOT NULL,
  `CONV_RATE1` double NOT NULL,
  `CONV_RATE2` double NOT NULL,
  `COMMISSION` double NOT NULL,
  `COMMISSION_AGENT` double NOT NULL,
  `SWAPS` double NOT NULL,
  `CLOSE_PRICE` double NOT NULL,
  `PROFIT` double NOT NULL,
  `TAXES` double NOT NULL,
  `COMMENT` char(32) NOT NULL,
  `INTERNAL_ID` int(11) NOT NULL,
  `MARGIN_RATE` double NOT NULL,
  `TIMESTAMP` int(11) NOT NULL,
  `MODIFY_TIME` datetime NOT NULL,
  `REASON` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



--|||

CREATE TABLE IF NOT EXISTS `mt4_closed_balance` (
  `id` int(11) NOT NULL,
  `TICKET` int(11) NOT NULL,
  `server_id` int(11) DEFAULT NULL,
  `LOGIN` int(11) NOT NULL,
  `SYMBOL` char(16) NOT NULL,
  `DIGITS` int(11) NOT NULL,
  `CMD` int(11) NOT NULL,
  `VOLUME` int(11) NOT NULL,
  `OPEN_TIME` datetime NOT NULL,
  `OPEN_PRICE` double NOT NULL,
  `SL` double NOT NULL,
  `TP` double NOT NULL,
  `CLOSE_TIME` datetime NOT NULL,
  `EXPIRATION` datetime NOT NULL,
  `CONV_RATE1` double NOT NULL,
  `CONV_RATE2` double NOT NULL,
  `COMMISSION` double NOT NULL,
  `COMMISSION_AGENT` double NOT NULL,
  `SWAPS` double NOT NULL,
  `CLOSE_PRICE` double NOT NULL,
  `PROFIT` double NOT NULL,
  `TAXES` double NOT NULL,
  `COMMENT` char(32) NOT NULL,
  `INTERNAL_ID` int(11) NOT NULL,
  `MARGIN_RATE` double NOT NULL,
  `TIMESTAMP` int(11) NOT NULL,
  `MODIFY_TIME` datetime NOT NULL,
  `REASON` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--|||

CREATE TABLE IF NOT EXISTS `mt4_closed_pending` (
  `id` int(11) NOT NULL,
  `TICKET` int(11) NOT NULL,
  `server_id` int(11) DEFAULT NULL,
  `LOGIN` int(11) NOT NULL,
  `SYMBOL` char(16) NOT NULL,
  `DIGITS` int(11) NOT NULL,
  `CMD` int(11) NOT NULL,
  `VOLUME` int(11) NOT NULL,
  `OPEN_TIME` datetime NOT NULL,
  `OPEN_PRICE` double NOT NULL,
  `SL` double NOT NULL,
  `TP` double NOT NULL,
  `CLOSE_TIME` datetime NOT NULL,
  `EXPIRATION` datetime NOT NULL,
  `CONV_RATE1` double NOT NULL,
  `CONV_RATE2` double NOT NULL,
  `COMMISSION` double NOT NULL,
  `COMMISSION_AGENT` double NOT NULL,
  `SWAPS` double NOT NULL,
  `CLOSE_PRICE` double NOT NULL,
  `PROFIT` double NOT NULL,
  `TAXES` double NOT NULL,
  `COMMENT` char(32) NOT NULL,
  `INTERNAL_ID` int(11) NOT NULL,
  `MARGIN_RATE` double NOT NULL,
  `TIMESTAMP` int(11) NOT NULL,
  `MODIFY_TIME` datetime NOT NULL,
  `REASON` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--|||

CREATE TABLE IF NOT EXISTS `mt4_open_actual` (
  `id` int(11) NOT NULL,
  `TICKET` int(11) NOT NULL,
  `server_id` int(11) DEFAULT NULL,
  `LOGIN` int(11) NOT NULL,
  `SYMBOL` char(16) NOT NULL,
  `DIGITS` int(11) NOT NULL,
  `CMD` int(11) NOT NULL,
  `VOLUME` int(11) NOT NULL,
  `OPEN_TIME` datetime NOT NULL,
  `OPEN_PRICE` double NOT NULL,
  `SL` double NOT NULL,
  `TP` double NOT NULL,
  `CLOSE_TIME` datetime NOT NULL,
  `EXPIRATION` datetime NOT NULL,
  `CONV_RATE1` double NOT NULL,
  `CONV_RATE2` double NOT NULL,
  `COMMISSION` double NOT NULL,
  `COMMISSION_AGENT` double NOT NULL,
  `SWAPS` double NOT NULL,
  `CLOSE_PRICE` double NOT NULL,
  `PROFIT` double NOT NULL,
  `TAXES` double NOT NULL,
  `COMMENT` char(32) NOT NULL,
  `INTERNAL_ID` int(11) NOT NULL,
  `MARGIN_RATE` double NOT NULL,
  `TIMESTAMP` int(11) NOT NULL,
  `MODIFY_TIME` datetime NOT NULL,
  `REASON` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--|||

CREATE TABLE IF NOT EXISTS `mt4_open_pending` (
  `id` int(11) NOT NULL,
  `TICKET` int(11) NOT NULL,
  `server_id` int(11) DEFAULT NULL,
  `LOGIN` int(11) NOT NULL,
  `SYMBOL` char(16) NOT NULL,
  `DIGITS` int(11) NOT NULL,
  `CMD` int(11) NOT NULL,
  `VOLUME` int(11) NOT NULL,
  `OPEN_TIME` datetime NOT NULL,
  `OPEN_PRICE` double NOT NULL,
  `SL` double NOT NULL,
  `TP` double NOT NULL,
  `CLOSE_TIME` datetime NOT NULL,
  `EXPIRATION` datetime NOT NULL,
  `CONV_RATE1` double NOT NULL,
  `CONV_RATE2` double NOT NULL,
  `COMMISSION` double NOT NULL,
  `COMMISSION_AGENT` double NOT NULL,
  `SWAPS` double NOT NULL,
  `CLOSE_PRICE` double NOT NULL,
  `PROFIT` double NOT NULL,
  `TAXES` double NOT NULL,
  `COMMENT` char(32) NOT NULL,
  `INTERNAL_ID` int(11) NOT NULL,
  `MARGIN_RATE` double NOT NULL,
  `TIMESTAMP` int(11) NOT NULL,
  `MODIFY_TIME` datetime NOT NULL,
  `REASON` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--|||


CREATE TABLE IF NOT EXISTS `mt4_prices` (
  `SYMBOL` char(16) NOT NULL,
  `TIME` datetime NOT NULL,
  `BID` double NOT NULL,
  `ASK` double NOT NULL,
  `LOW` double NOT NULL,
  `HIGH` double NOT NULL,
  `DIRECTION` int(11) NOT NULL,
  `DIGITS` int(11) NOT NULL,
  `SPREAD` int(11) NOT NULL,
  `MODIFY_TIME` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



--|||

CREATE TABLE IF NOT EXISTS `mt4_users` (
  `uid` int(11) NOT NULL,
  `LOGIN` int(11) NOT NULL,
  `server_id` int(11) NOT NULL,
  `GROUP` char(16) NOT NULL,
  `ENABLE` int(11) NOT NULL,
  `ENABLE_CHANGE_PASS` int(11) NOT NULL,
  `ENABLE_READONLY` int(11) NOT NULL,
  `PASSWORD_PHONE` char(32) NOT NULL,
  `NAME` char(128) NOT NULL,
  `COUNTRY` char(32) NOT NULL,
  `CITY` char(32) NOT NULL,
  `STATE` char(32) NOT NULL,
  `ZIPCODE` char(16) NOT NULL,
  `ADDRESS` char(128) NOT NULL,
  `PHONE` char(32) NOT NULL,
  `EMAIL` char(48) NOT NULL,
  `COMMENT` char(64) NOT NULL,
  `ID` char(32) NOT NULL,
  `STATUS` char(16) NOT NULL,
  `REGDATE` datetime NOT NULL,
  `LASTDATE` datetime NOT NULL,
  `LEVERAGE` int(11) NOT NULL,
  `AGENT_ACCOUNT` int(11) NOT NULL,
  `TIMESTAMP` int(11) NOT NULL,
  `BALANCE` double NOT NULL,
  `PREVMONTHBALANCE` double NOT NULL,
  `PREVBALANCE` double NOT NULL,
  `CREDIT` double NOT NULL,
  `INTERESTRATE` double NOT NULL,
  `TAXES` double NOT NULL,
  `SEND_REPORTS` int(11) NOT NULL,
  `USER_COLOR` int(11) NOT NULL,
  `EQUITY` float NOT NULL DEFAULT '0',
  `MARGIN` float NOT NULL DEFAULT '0',
  `MARGIN_LEVEL` float NOT NULL DEFAULT '0',
  `MARGIN_FREE` float NOT NULL DEFAULT '0',
  `MODIFY_TIME` datetime NOT NULL,
  `API_DATA` blob,
  `MQID` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--|||

create view mt4_closed as select * from mt4_closed_actual UNION SELECT * from mt4_closed_balance UNION select * from mt4_closed_pending;
--|||
create view mt4_closed_actual_balance as select * from mt4_closed_actual UNION SELECT * from mt4_closed_balance;
--|||
create view mt4_open as select * from mt4_open_actual UNION SELECT * from mt4_open_pending;
--|||