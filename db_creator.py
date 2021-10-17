import requests
import sqlite3

API_KEY = '89f2f52db7369d1eb5a3423d16f348d8'
THUMB_LINK = "https://image.tmdb.org/t/p/w185/"
connect = sqlite3.connect("./sqlite/movies.sqlite")
cursor = connect.cursor()

def create_tables():
    print("Création de la database")
    cursor.execute("""CREATE TABLE IF NOT EXISTS Movie (
            Title       CHAR(40),
            thumbUrl    CHAR(200),
            releaseDate Date,
            ratingScore CHAR(5),
            language     CHAR(4),
            plot        CHAR(500),
            PRIMARY KEY (Title, thumbUrl)
        );""")
    cursor.execute("""CREATE TABLE IF NOT EXISTS Genre (
    Id          INT(2) PRIMARY KEY,
    Genre       CHAR(20)
    );""")
    cursor.execute("""CREATE TABLE IF NOT EXISTS Director (
    firstName   CHAR(70),
    lastName   CHAR(70),
    PRIMARY KEY (firstName,lastName)
    );""")
    cursor.execute("""CREATE TABLE IF NOT EXISTS PossessGenre (
        Id          INT(2),
        Title       CHAR(40),
        thumbUrl    CHAR(200),
        FOREIGN KEY (Id) REFERENCES Genre(Id),
        FOREIGN KEY (Title, thumbUrl) REFERENCES Movie(Title, thumbUrl)
    );""")
    cursor.execute("""CREATE TABLE IF NOT EXISTS PossessDirector (
        firstName    CHAR(70) ,
        lastName    CHAR(70) ,
        Title       int(40),
        thumbUrl    CHAR(200),
        FOREIGN KEY (firstName,lastName) REFERENCES Director(firstName,lastName),
        FOREIGN KEY (Title, thumbUrl) REFERENCES Movie(Title, thumbUrl)
    );""")
    cursor.execute("""CREATE TABLE IF NOT EXISTS User (
    username CHAR(20),
    password CHAR(50),
    role     INT(2)
    );""")

def get_genres(language):
    print("Ajout des genres")
    req = requests.get("https://api.themoviedb.org/3/genre/movie/list?api_key=" + API_KEY + "&language=" + language)
    for part in req.json()['genres']:
        cursor.execute("INSERT INTO Genre VALUES (?, ?);", (part['id'], part['name']))


def get_movies(language, pages, Nbyears):
    Titres = []
    Directors = []
    print("Ajout des musiques et des directeurs")
    for i in range(Nbyears):
        for y in range(1, pages):
            req = requests.get("https://api.themoviedb.org/3/discover/movie?api_key=89f2f52db7369d1eb5a3423d16f348d8&sort_by=release_date.asc&page="+ str(y) +"&primary_release_year="+ str(1980+i))
            if (req.json()['results']):
                for movie in req.json()['results'] :
                    id = movie['id']
                    if (movie['poster_path']):
                        imgUrl = THUMB_LINK + movie['poster_path']
                    else :
                        imgUrl = "none"
                    title = movie['original_title']
                    releaseDate = movie['release_date']
                    rating = movie['vote_average']
                    genres = movie['genre_ids']
                    plot = movie['overview']
                    language = movie['original_language']
                    producers = []
                    credits = requests.get("https://api.themoviedb.org/3/movie/" + str(id) + "/credits?api_key=89f2f52db7369d1eb5a3423d16f348d8&language=" + language)
                    for crew in credits.json()['crew']:
                        if crew["job"] == "Director":
                            producers.append(crew['name'])
                    if(not title in Titres) :
                        cursor.execute("INSERT INTO Movie VALUES (?, ?, ?, ?, ?, ?);", (title, imgUrl, releaseDate, rating, language, plot))
                        Titres.append(title)
                    for producer in producers :
                        sep = producer.split(" ")
                        print(sep)
                        if(not 1 < len(sep)):
                            sep.append('')
                        if(not 0 < len(sep)):
                            sep.append('', '')
                        if(not (sep[0], sep[1]) in Directors):
                            cursor.execute("INSERT INTO Director VALUES (?, ?)", (sep[0], sep[1]))
                            Directors.append((sep[0], sep[1]))
                        cursor.execute("INSERT INTO PossessDirector VALUES (?, ?, ?, ?)", (sep[0], sep[1], title, imgUrl))
                    for genre in genres :
                        cursor.execute("INSERT INTO PossessGenre VALUES (?, ?, ?)", (genre, title, imgUrl))

#create_tables()
#get_genres('fr-FR')
#get_movies("fr-FR", 20, 10)

#cursor.execute("DROP TABLE User;")
#cursor.execute("""
#CREATE TABLE User(
#    id INT(5),
#    username CHAR(40),
#    password CHAR(64),
#    salt CHAR(64),
#    primary key (id, username)
#);""")
cursor.execute("insert into Director values (?, ?)""", ("Lucas", "Marcheguet"))
connect.commit()
connect.close()

print("fin")
