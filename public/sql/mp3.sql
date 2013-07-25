CREATE TABLE mp3 (
	id int(11) NOT NULL auto_increment,
	area varchar(100) NOT NULL,
	title varchar(100) NOT NULL,
	quiztime int(11) NOT NULL ,
	PRIMARY KEY (id)
);
INSERT INTO mp3 (area, title)
VALUES ('The Military Wives', 'In My Dreams');
INSERT INTO mp3 (area, title)
VALUES ('Adele', '21');
INSERT INTO mp3 (area, title)
VALUES ('Bruce Springsteen', 'Wrecking Ball (Deluxe)');
INSERT INTO mp3 (area, title)
VALUES ('Lana Del Rey', 'Born To Die');
INSERT INTO mp3 (area, title)
VALUES ('Gotye', 'Making Mirrors');
