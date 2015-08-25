
INSERT INTO tblphrase (
phrase_lang_id,
phrase,
audio_location
) VALUES (
'2',
'Alright mate?',
'/tmp/EN/GB/1.mp3'
);

INSERT INTO tblphrase (
phrase_lang_id,
phrase,
audio_location
) VALUES (
'1',
'How''s it going?',
'/tmp/EN/US/1.mp3'
);

INSERT INTO tblphrasemapping (
lang_phrase_a,
lang_phrase_b
) VALUES (
'1',
'2'
);
