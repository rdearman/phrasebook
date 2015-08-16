---
--- This is an SQL file for use with a PostgreSQL DB system.
---
DROP TABLE tblLanguageList;
CREATE TABLE tblLanguageList (
       lang_id SERIAL PRIMARY KEY,
       lang_iso TEXT,
       lang_locale TEXT,
       friendly_iso_name TEXT,
       friendly_iso_locale_name TEXT
);

DROP TABLE tblphrase;
CREATE TABLE tblphrase (
       phrase_id SERIAL PRIMARY KEY,
       phrase_lang_id INTEGER 
       		REFERENCES tblLanguageList (lang_id)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
       phrase TEXT,
       audio_location TEXT -- decided to go with file pointer, rather than binary storage.
);
