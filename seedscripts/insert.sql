INSERT INTO users (fName, lName, dob, city, mobileNumber, email, hashedPassword, maritalStatus, sex, description)
      VALUES ('Pete', 'Meltzer', '12/12/88', 'London', '07842173569', 'pete@meltzer.com', PASSWORD('pasSVSFSDAVAG343532424sword'), 'single', 'M', 'Lover of fresh air.');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, hashedPassword, maritalStatus, sex, description)
      VALUES ('Beth', 'Meltzer', '10/11/91', 'London', '07777777777', 'beth2@meltzer.com', PASSWORD('pass2386792384756word'), 'single', 'F', 'Pete\'s sista!');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, hashedPassword, maritalStatus, sex, description)
      VALUES ('Isabel', 'Rosina', '20/03/86', 'London', '0788888888', 'isabel@rosina.com', PASSWORD('p981624g2assword'), 'married', 'F', 'hai');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, hashedPassword, maritalStatus, sex, description)
      VALUES ('Thomas', 'Meltzer', '12/10/92', 'London', '07867665384', 'thomas@meltzer.com', PASSWORD('passwor1923846d'), 'single', 'M', 'PhD!');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, hashedPassword, maritalStatus, sex, description)
      VALUES ('David', 'Blaine', '12/10/92', 'London', '07999665384', 'david@blaine.com', PASSWORD('passwo7541098rd'), 'single', 'M', 'Creepy fucker');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, hashedPassword, maritalStatus, sex, description)
      VALUES ('Esther', 'Lol', '10/10/92', 'London', '07867667334', 'esther@lol.com', PASSWORD('pa3728497ssword'), 'single', 'F', 'Queen of the nigt');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, hashedPassword, maritalStatus, sex, description) 
      VALUES ('Kevin', 'Bryson', '12/10/92', 'London', '07867660384', 'kevin@bryson.com', PASSWORD('pass9871324word'), 'married', 'M', 'Oh noooooooooo!');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, hashedPassword, maritalStatus, sex, description) 
      VALUES ('Gandalf', 'Grey', '12/10/92', 'London', '07867467384', 'gandalf@grey.com', PASSWORD('passw928374ord'), 'divorced', 'M', 'He\'s a wizard, Harry.');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, hashedPassword, maritalStatus, sex, description) 
      VALUES ('Colonel', 'Ovid', '12/10/92', 'London', '07867567384', 'colonel@ovid.com', PASSWORD('passwo987rd'), 'married', 'M', 'Serious');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, hashedPassword, maritalStatus, sex, description)
      VALUES ('Femi', 'Bants', '12/10/92', 'London', '07999367384', 'femi@bants.com', PASSWORD('passwo234rd'), 'single', 'M', 'Fucking legend.');

INSERT INTO albums (userId, albumName) VALUES (4, "boom");
INSERT INTO album_users (albumId, userId) VALUES (1, 1);
INSERT INTO album_users (albumId, userId) VALUES (1, 2);
INSERT INTO album_users (albumId, userId) VALUES (1, 3);


DELETE FROM albums
WHERE albumId = 1; 

SELECT * FROM album_users;


-- INSERT INTO albums (userId, albumName) VALUES (14, "awesome");



-- (userId, fName, lName, dob, city, lang, mobileNumber, email, hashedPassword, maritalStatus, sex, description)


-- UPDATE users
-- SET sex='F'
-- WHERE userId=1;
