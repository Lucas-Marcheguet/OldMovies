CREATE TABLE IF NOT EXISTS Movie (
    Title       CHAR(40) PRIMARY KEY,
    thumbUrl    CHAR(200) PRIMARY KEY,
    releaseDate Date,
    ratingScore CHAR(5),
    country     CHAR(15),
    plot        CHAR(500),

);

CREATE TABLE IF NOT EXISTS Genre (
    Id          INT(2) PRIMARY KEY,
    Genre       CHAR(20)
);

CREATE TABLE IF NOT EXISTS Realisator (
    firstName   CHAR(50) PRIMARY KEY,
    lastName    CHAR(50) PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS PossessGenre (
    Id          INT(2),
    Title       CHAR(40),
    thumbUrl    CHAR(200),
    FOREIGN KEY (Id) REFERENCES Genre(Id),
    FOREIGN KEY (Title, thumbUrl) REFERENCES Movie(Title, thumbUrl)
);

CREATE TABLE IF NOT EXISTS PossessRealisator (
    firstName   CHAR(50),
    lastName    CHAR(50) ,
    Title       int(40),
    thumbUrl    CHAR(200),
    FOREIGN KEY (firstName, lastName) REFERENCES Realisator(firstName, lastName),
    FOREIGN KEY (Title, thumbUrl) REFERENCES Movie(Title, thumbUrl)
);