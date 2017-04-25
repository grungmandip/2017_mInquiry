--問い合わせテーブル
DROP TABLE IF EXISTS inquirys;
CREATE TABLE inquirys(
	inquiry_id INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'UNIQUE ID',
	email varchar(320) NOT NULL COMMENT 'Contact person',
	inquiry_body TEXT NOT NULL COMMENT 'area for text',
	name VARCHAR(620) NOT NULL COMMENT 'name of person',
	birthday DATE COMMENT 'date of birth',
	PRIMARY KEY(`inquiry_id`)
)CHARACTER SET 'utf8mb4', ENGINE =InnoDB, COMMENT= 'comment for 1 record（笑）';