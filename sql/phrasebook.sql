---
--- This is an SQL file for use with a PostgreSQL DB system.
---
DROP TABLE tblLanguageList CASCADE;
CREATE TABLE tblLanguageList (
       lang_id SERIAL PRIMARY KEY,
       lang_iso TEXT,
       lang_locale TEXT,
       friendly_iso_name TEXT,
       friendly_iso_locale_name TEXT
);

DROP TABLE tblphrase  CASCADE;
CREATE TABLE tblphrase (
       phrase_id SERIAL PRIMARY KEY,
       phrase_lang_id INTEGER 
       		REFERENCES tblLanguageList (lang_id)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
       phrase TEXT,
       audio_location TEXT, -- decided to go with file pointer, rather than binary storage.
       up_votes INTEGER,
       down_votes INTEGER,
       active BOOLEAN DEFAULT TRUE
);

DROP TABLE tblphrasemapping  CASCADE;
CREATE TABLE tblphrasemapping (
       lang_phrase_a INTEGER
       		REFERENCES tblphrase (phrase_id)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
       lang_phrase_b INTEGER
       		REFERENCES tblphrase (phrase_id)
		ON UPDATE CASCADE
		ON DELETE CASCADE
);

---- of basic phrase functions ----

---- Start of contributor / project section ----

DROP TABLE tblcontributor  CASCADE;
CREATE TABLE tblcontributor (
       contributor_id SERIAL PRIMARY KEY,
       handle TEXT,
       cookie TEXT,
       contributor_password TEXT,
       native_lang INTEGER -- only going to allow one native langage to work with, if you have more than one, sorry.
       		REFERENCES tblLanguageList (lang_id)
		ON UPDATE CASCADE
		ON DELETE CASCADE
);


DROP TABLE tblproject  CASCADE;
--- Create a project table who's primary key is a composite key of the two languages
--- which are going to be put together. This includes the project managers contributor id.
CREATE TABLE tblproject (
       project_manager_id INTEGER
       		REFERENCES tblcontributor (contributor_id)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
       project_lang_a INTEGER 
       		REFERENCES tblLanguageList (lang_id),
       project_lang_b INTEGER 
       		REFERENCES tblLanguageList (lang_id),
       project_name TEXT,
       PRIMARY KEY (project_lang_a, project_lang_b)
);

DROP TABLE tblcontributions  CASCADE;
CREATE TABLE tblcontributions (
       contributor_id INTEGER 
                REFERENCES tblcontributor (contributor_id)
                ON UPDATE CASCADE
                ON DELETE CASCADE,
       project_lang_a INTEGER,
       project_lang_b INTEGER,
       FOREIGN KEY (project_lang_a, project_lang_b) REFERENCES tblproject (project_lang_a, project_lang_b)

);

