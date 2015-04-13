


Install: 

0. create mysql database

1. create mysql table

  CREATE TABLE IF NOT EXISTS `short_urls` (
  `serial` int(11) NOT NULL,
    `shortUrl` varchar(20) NOT NULL,
    `longUrl` varchar(2000) NOT NULL,
    `timeStamp` int(11) NOT NULL
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
  ALTER TABLE `shortUrls`
   ADD PRIMARY KEY (`serial`), ADD KEY `serial` (`serial`);
  ALTER TABLE `shortUrls`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT;

2. Setup apache : The url redirect service. That so simple! The second best way a simple apache config
 mod_dbd + mod_rewrite.
  </VirtualHost>
     ServerName shorturl.com
     ServerAlias  shorturl.com
     RewriteEngine on
     RewriteLogLevel 9  
     RewriteMap myquery "fastdbd:SELECT redirect FROM ?database?.url_shorter WHERE urlId = %{([A-Za-z0-9]+)}s"
     CustomLog /var/log/apache/shorturl-acces.log combined
     ErrorLog /var/log/apache/shorturl-error.log
  </VirtualHost>


3. Create mysql user and set up cake.



