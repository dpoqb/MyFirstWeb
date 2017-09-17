DROP TABLE IF EXISTS literatures;
CREATE TABLE literatures (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	article_title VARCHAR(80) NOT NULL DEFAULT '<尚未添加文献标题>',
	first_author_name VARCHAR(20) NOT NULL DEFAULT '无',
	second_author_name VARCHAR(20) NOT NULL DEFAULT '无',
	periodical VARCHAR(50) NOT NULL DEFAULT '无',
	abstract TEXT NOT NULL,
	key_words VARCHAR(50) NOT NULL DEFAULT '无',
	ptime VARCHAR(20) NOT NULL DEFAULT 0 COMMENT '发表时间',
	upload_time DATETIME NOT NULL COMMENT '上传时间',
	INDEX literatures_title(article_title),
	INDEX literatures_periodical(periodical),
	INDEX literatures_author(first_author_name,second_author_name)
)ENGINE=InnoDB