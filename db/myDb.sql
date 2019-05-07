CREATE TABLE course (
id SERIAL NOT NULL PRIMARY KEY, 
prefix VARCHAR(10) NOT NULL,
postfix SMALLINT NOT NULL,
name VARCHAR(100)
);

CREATE TABLE professor (
id SERIAL NOT NULL PRIMARY KEY,
name_first VARCHAR(20),
name_last VARCHAR(20),
adjunct bool
);

CREATE TABLE section (
id SERIAL NOT NULL PRIMARY KEY,
course_id SERIAL REFERENCES course(id) NOT NULL,
section_number SMALLINT NOT NULL,
professor_id SERIAL REFERENCES professor(id) NOT NULL
);

INSERT INTO course (prefix, postfix, name) VALUES ('REL','100', 'Introduction to the Church of Jesus Christ of Latter-day Saints');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','121', 'Book of Mormon pt.1');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','122', 'Book of Mormon pt.2');
INSERT INTO course (prefix, postfix, name) VALUES ('REC','130', 'Missionary Preparation');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','190', 'Special Topics in Scripture');
INSERT INTO course (prefix, postfix, name) VALUES ('RELC','200', 'The Eternal Family');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','211', 'New Testament pt.1');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','212', 'New Testament pt.2');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','215', 'Scripture Study');
INSERT INTO course (prefix, postfix, name) VALUES ('RELC','225', 'Foundations of the Restoration');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','234', 'Preparing for Eternal Marriage');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','235', 'Building an Eternal Marriage');
INSERT INTO course (prefix, postfix, name) VALUES ('RELC','250', 'Jesus Christ and the Everlasting Gospel');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','261', 'Introduction to Family History');
INSERT INTO course (prefix, postfix, name) VALUES ('RELC','275', 'The Teachings and Doctrine of the Book of Mormon');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','301', 'Old Testament pt.1');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','302', 'Old Testament pt.2');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','324', 'Doctrine and Covenants pt.1');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','325', 'Doctrine and Covenants pt.2');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','327', 'Pearl of Great Price');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','333', 'Teachings of the Living Prophets');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','341', 'Church History pt.1');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','342', 'Church History pt.2');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','343', 'Church History pt.3');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','345', 'Presidents of the Church');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','351', 'World Religions');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','352', 'Christian History');
INSERT INTO course (prefix, postfix, name) VALUES ('RELR','390', 'Special Topics in Religion');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','397', 'Religious Research');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','404', 'Writings of Isaiah');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','431', 'Doctrines of the Gospel');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','471', 'Methods of Teaching Seminary');
INSERT INTO course (prefix, postfix, name) VALUES ('REL','475', 'Seminary Teaching Seminar');

INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Philip','Allred','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Rex','Butterfield','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Chris','Allison','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Ron','Anderson','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Kirk','Astel','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Boyd','Baggett','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Ross','Baron','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Kyle','Black','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Michael','Bolingbroke','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Curtis','Castillow','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Fernando','Castro','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Robert','Chambers','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Jeff','Chapman','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Tomm','Chapman','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Shawn','Dorman','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Rob','Eaton','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Doug','Edmonds','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Ryan','Gardner','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Ezra','Gwilliam','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Todd','Hammond','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Randy','Hayes','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Roy','Huff','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Brian','Kinghorn','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Stan','Kivett','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Torrey','Morrill','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Greg','Palmer','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('John','Parker','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('David','Peck','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Nathan','Peterson','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Gary','Purse','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Lon','Pyper','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Bill','Riggins','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Jacob','Romney','0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('BJ','Rowe', '0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Bruce','Satterfield', '0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Tiffany','Savage', '0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Brent','Schmidt', '0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Shauna','Seamons', '0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Dale','Sturm', '0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Matt','Taylor', '0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('John','Thomas', '0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Greg','Venema', '0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Robert','Wahlquist', '0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Layne','Walker', '0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Laryssa','Waldron', '0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Greg','Williams', '0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Nate','Williams', '0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Scott','Woodward', '0');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Craig','Bell','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Wes','Belnap','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Kelly','Burgener','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Gary','Chelson','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Van','Crawford','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Mindy','Davis','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Rick','Davis','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Christine','Geddes','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Lynda','Hawkes','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Joshua','Holt','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Kelly','McCoy','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Kevin','Packard','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Rudy','Puzey','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Tim','Rarick','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Rhonda','Seamons','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Scott','Steed','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Vaughn','Stephenson','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Reed','Stoddard','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Sean','Tippetts','1');
INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Kyle','Walker','1');







