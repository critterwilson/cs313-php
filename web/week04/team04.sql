Users
write notes

Speakers
speak at conferences

Notes
written by Users
have conferences
have Speakers
have notes

Conferences
have multiple speakers


CREATE TABLE note_taker (
	id SERIAL PRIMARY KEY NOT NULL,
	note_id SERIAL REFERENCES note(id) NOT NULL
);

CREATE TABLE speaker (
	id SERIAL NOT NULL PRIMARY KEY,
	conference_id SERIAL NOT NULL REFERENCES conference(id),
	name VARCHAR(50) NOT NULL,
	talk_title VARCHAR(100)
);

CREATE TABLE note 
	id SERIAL NOT NULL PRIMARY KEY,
	user_id SERIAL NOT NULL REFERENCES user(id),
	speaker_id SERIAL NOT NULL REFERENCES speaker(id),
	conference_id SERIAL NOT NULL REFERENCES conference(id),
	content VARCHAR(256) NOT NULL
);

CREATE TABLE conference (
	id SERIAL NOT NULL PRIMARY KEY,
	year SMALLINT NOT NULL,
	april BOOL NOT NULL,
	saturday BOOL NOT NULL,
	morning BOOL NOT NULL
);

INSERT INTO speaker (conference_id, name, talk_title) VALUES (1, 'Holland', 'Of Souls, Symbols, Sacraments');




