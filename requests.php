<?php 

include("connexion.php");

$connexion = connect_bd();

function createBasicDB(){
    $GLOBALS['connexion']->exec(
        "
        Drop table Movies;
        create table Movies (
        Titre VARCHAR(50),
        Realisateur VARCHAR(50),
        Genre VARCHAR(50)
    );

    insert into Movies (Titre, Realisateur, Genre) values ('Day He Arrives, The (Book chon bang hyang)', 'Sherline Von Brook', 'Drama|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('Nomi Song, The', 'Aharon Landman', 'Documentary|Musical');
    insert into Movies (Titre, Realisateur, Genre) values ('Showdown in Little Tokyo', 'Cindee Laviss', 'Action|Crime');
    insert into Movies (Titre, Realisateur, Genre) values ('All''s Faire in Love', 'Nat Chessell', 'Comedy');
    insert into Movies (Titre, Realisateur, Genre) values ('Precious Find', 'Freda M''Chirrie', 'Action|Sci-Fi');
    insert into Movies (Titre, Realisateur, Genre) values ('True Love', 'Franklyn Staples', 'Comedy');
    insert into Movies (Titre, Realisateur, Genre) values ('Steve Jobs: The Lost Interview', 'Tandi Benedicto', 'Documentary');
    insert into Movies (Titre, Realisateur, Genre) values ('Prince of Darkness', 'Brittany Drinkel', 'Fantasy|Horror|Sci-Fi|Thriller');
    insert into Movies (Titre, Realisateur, Genre) values ('Monster Squad, The', 'Ammamaria Flott', 'Adventure|Comedy|Horror');
    insert into Movies (Titre, Realisateur, Genre) values ('Tale of Springtime, A (Conte de Printemps)', 'Konstance Salliss', 'Drama|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('Wimbledon', 'Shirley Baszkiewicz', 'Comedy|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('Shogun Assassin', 'Leonelle Symcox', 'Action|Adventure');
    insert into Movies (Titre, Realisateur, Genre) values ('Sword of Desperation (Hisshiken torisashi)', 'Mic Simmans', 'Action|Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Conclave, The', 'Ludvig Diamond', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Tyler Perry''s Madea Goes to Jail', 'Cornelia Lantaff', 'Comedy|Crime|Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Tremors 4: The Legend Begins', 'Stafani Guidini', 'Action|Comedy|Horror|Sci-Fi|Thriller|Western');
    insert into Movies (Titre, Realisateur, Genre) values ('Blithe Spirit', 'Maritsa Jachtym', 'Comedy|Drama|Fantasy|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('66 Scenes From America', 'Freddi Marthen', 'Documentary');
    insert into Movies (Titre, Realisateur, Genre) values ('Fragile', 'Micky Hatliffe', 'Horror|Thriller');
    insert into Movies (Titre, Realisateur, Genre) values ('Steam: The Turkish Bath (Hamam)', 'Ella Greschke', 'Drama|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('Earth Dies Screaming, The', 'Clint Pottberry', 'Horror|Sci-Fi');
    insert into Movies (Titre, Realisateur, Genre) values ('Time to Live, a Time to Die, A (Tong nien wang shi)', 'Mischa Colcomb', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Back Door to Hell', 'Mick Megarrell', 'Drama|War');
    insert into Movies (Titre, Realisateur, Genre) values ('Where Danger Lives', 'Damiano Petican', 'Drama|Film-Noir|Romance|Thriller');
    insert into Movies (Titre, Realisateur, Genre) values ('Zen Noir', 'Giffie Osband', 'Comedy|Drama|Mystery');
    insert into Movies (Titre, Realisateur, Genre) values ('Tabu: A Story of the South Seas', 'Tallou Billyeald', 'Drama|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('Before the Rains', 'Ber Yallop', 'Drama|Romance|Thriller');
    insert into Movies (Titre, Realisateur, Genre) values ('Dust', 'Katinka Gloves', 'Drama|Western');
    insert into Movies (Titre, Realisateur, Genre) values ('Cool It', 'Rene Robinett', 'Documentary');
    insert into Movies (Titre, Realisateur, Genre) values ('Wheel of Time', 'Bobbye McArtan', 'Documentary');
    insert into Movies (Titre, Realisateur, Genre) values ('Viva Cuba', 'Melissa Baccus', 'Comedy|Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Prison (Fängelse) ', 'Pembroke Agron', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('New Town Killers', 'Gretel Spenley', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Greening of Whitney Brown, The', 'Glen Polotti', 'Adventure');
    insert into Movies (Titre, Realisateur, Genre) values ('Boy and the Pirates, The', 'Randi Jenyns', 'Adventure|Fantasy');
    insert into Movies (Titre, Realisateur, Genre) values ('Revenge of the Nerds III: The Next Generation', 'Simona Alphege', 'Comedy');
    insert into Movies (Titre, Realisateur, Genre) values ('Easy Rider', 'Herman Flower', 'Adventure|Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Safety of Objects, The', 'Chan O'' Lone', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Train Ride to Hollywood', 'Marsh Bierman', 'Comedy|Fantasy|Musical');
    insert into Movies (Titre, Realisateur, Genre) values ('Watchmen', 'Hugo Tuckwood', 'Action|Drama|Mystery|Sci-Fi|Thriller|IMAX');
    insert into Movies (Titre, Realisateur, Genre) values ('Masquerade', 'Mikkel Soaper', 'Mystery|Romance|Thriller');
    insert into Movies (Titre, Realisateur, Genre) values ('Mirrors 2', 'Elbertina Berling', 'Horror|Mystery|Thriller');
    insert into Movies (Titre, Realisateur, Genre) values ('Tabu', 'Mab Milne', 'Drama|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('Laurel Canyon', 'Debbie Fominov', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Dangerous Woman, A', 'Fletch Votier', 'Drama|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('East-West (Est-ouest)', 'Page Orwell', 'Drama|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('Narrow Margin, The', 'Torrie Stooders', 'Crime|Drama|Film-Noir');
    insert into Movies (Titre, Realisateur, Genre) values ('Ulee''s Gold', 'Melisa Pumfrey', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Anne of the Thousand Days', 'Michele Gussie', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('The Child and the Policeman', 'Joete Cordeux', 'Comedy');
    insert into Movies (Titre, Realisateur, Genre) values ('Winslow Boy, The', 'Giulietta Vannacci', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('That Hamilton Woman', 'Zsa zsa Royce', 'Drama|Romance|War');
    insert into Movies (Titre, Realisateur, Genre) values ('Boogeyman, The', 'Merill Gaspero', 'Horror');
    insert into Movies (Titre, Realisateur, Genre) values ('Avengers Confidential: Black Widow & Punisher', 'Daisey Armatage', 'Action|Animation|Sci-Fi');
    insert into Movies (Titre, Realisateur, Genre) values ('Iron Man 3', 'Alphonse Goodere', 'Action|Sci-Fi|Thriller|IMAX');
    insert into Movies (Titre, Realisateur, Genre) values ('Gabrielle', 'Herman Zink', 'Drama|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('Once Upon a Warrior (Anaganaga O Dheerudu)', 'Concettina Guilbert', 'Action|Adventure|Fantasy|Musical|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('Othello', 'Dione Block', 'Drama|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('American Zombie', 'Kristopher Baptiste', 'Comedy|Horror');
    insert into Movies (Titre, Realisateur, Genre) values ('Birdemic: Shock and Terror', 'Teriann Ashworth', 'Romance|Thriller');
    insert into Movies (Titre, Realisateur, Genre) values ('Love Without Pity', 'Sophie Kuschek', 'Comedy|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('Season''s Greetings', 'Claire Francescozzi', 'Comedy');
    insert into Movies (Titre, Realisateur, Genre) values ('Faces of Death', 'Odelle Teas', 'Documentary|Horror');
    insert into Movies (Titre, Realisateur, Genre) values ('Joe''s Palace', 'Martainn Gruby', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('12 Storeys (Shier lou)', 'Claresta Menhci', 'Comedy|Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Big Picture, The (L''homme qui voulait vivre sa vie)', 'Gussy Weatherburn', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Pin...', 'Stanislaw Vesque', 'Horror');
    insert into Movies (Titre, Realisateur, Genre) values ('Body/Cialo', 'Jarib Boobier', 'Comedy|Drama|Mystery');
    insert into Movies (Titre, Realisateur, Genre) values ('Wild Angels, The', 'Boothe Reeve', 'Action|Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Great Guy', 'Kinny Mechan', 'Crime|Drama|Mystery');
    insert into Movies (Titre, Realisateur, Genre) values ('Marat/Sade', 'Scot Crother', 'Drama|Musical');
    insert into Movies (Titre, Realisateur, Genre) values ('Defendor', 'Armin Hugenin', 'Comedy|Crime|Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Deadly Outlaw: Rekka (a.k.a. Violent Fire) (Jitsuroku Andô Noboru kyôdô-den: Rekka)', 'Yule Geere', 'Crime|Drama|Thriller');
    insert into Movies (Titre, Realisateur, Genre) values ('The Nautical Chart', 'Shelagh MacConneely', 'Adventure');
    insert into Movies (Titre, Realisateur, Genre) values ('Darkness', 'Maia Furzey', 'Horror|Mystery');
    insert into Movies (Titre, Realisateur, Genre) values ('Hercules and the Lost Kingdom', 'Gigi Disney', 'Action|Adventure|Fantasy|Sci-Fi');
    insert into Movies (Titre, Realisateur, Genre) values ('Scent of Green Papaya, The (Mùi du du xhan - L''odeur de la papaye verte)', 'Davey Schach', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Face', 'Marji Bosma', 'Crime|Drama|Thriller');
    insert into Movies (Titre, Realisateur, Genre) values ('Red Spectacles, The (Jigoku no banken: akai megane)', 'Adelaide Northey', 'Comedy|Drama|Sci-Fi');
    insert into Movies (Titre, Realisateur, Genre) values ('Suspended Vocation, The (La vocation suspendue)', 'Sukey Threader', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('My Winnipeg', 'Randolph Dunk', 'Documentary|Fantasy');
    insert into Movies (Titre, Realisateur, Genre) values ('Wheels on Meals (Kuai can che)', 'Sharona Edmundson', 'Action|Comedy|Crime|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('Tarnished Angels, The', 'Lacy O''Neil', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Bitch Hug (Bitchkram)', 'Way Brusby', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Promised Land (Ziemia Obiecana)', 'Cordelie Rigmand', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Hollow Man', 'Asa Snartt', 'Horror|Sci-Fi|Thriller');
    insert into Movies (Titre, Realisateur, Genre) values ('Last Song, The', 'Donall Rooper', 'Drama|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('Ballistic: Ecks vs. Sever', 'Wallie Rubinlicht', 'Action|Thriller');
    insert into Movies (Titre, Realisateur, Genre) values ('French Minister, The (Quai d''Orsay)', 'Emmerich Shark', 'Comedy');
    insert into Movies (Titre, Realisateur, Genre) values ('Ballerina (La mort du cygne)', 'Cort Minchin', 'Children|Drama|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('Intruder in the Dust', 'Micaela Casolla', 'Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Deadly Advice', 'Lolly Stailey', 'Comedy|Drama');
    insert into Movies (Titre, Realisateur, Genre) values ('Soul Kitchen', 'Raynard Daile', 'Comedy');
    insert into Movies (Titre, Realisateur, Genre) values ('Heat', 'Jackquelin Anshell', 'Action|Crime|Thriller');
    insert into Movies (Titre, Realisateur, Genre) values ('Horrible Bosses', 'Holden Thieme', 'Comedy|Crime');
    insert into Movies (Titre, Realisateur, Genre) values ('Venom', 'Pamelina Stearley', 'Horror|Thriller');
    insert into Movies (Titre, Realisateur, Genre) values ('Ghidorah, the Three-Headed Monster (San daikaijû: Chikyû saidai no kessen)', 'Dareen Chettle', 'Action|Adventure|Fantasy|Sci-Fi');
    insert into Movies (Titre, Realisateur, Genre) values ('Beyond Borders', 'Leonore Tewkesbury', 'Drama|Romance|War');
    insert into Movies (Titre, Realisateur, Genre) values ('Moon Is Blue, The', 'Dania Dixson', 'Comedy|Romance');
    insert into Movies (Titre, Realisateur, Genre) values ('About Face: Supermodels Then and Now', 'Crosby Toulamain', 'Comedy|Documentary');"
    );
}
createBasicDB();

function getMoviesByTitle(){
    $stmt = $GLOBALS['connexion']->prepare(
    "select Titre, Realisateur, Genre
    from Movies
    Order by Titre;");

    $stmt->execute();

    return $stmt->fetchAll();
}

function getMoviesByRealisator(){
    $stmt = $GLOBALS['connexion']->prepare(
    "select Titre, Realisateur, Genre
    from Movies
    Order by Realisateur;");

    $stmt->execute();

    return $stmt->fetchAll();
}

function getMoviesByGenre(){
    $stmt = $GLOBALS['connexion']->prepare(
    "select Titre, Realisateur, Genre
    from Movies
    Order by Genre;");

    $stmt->execute();

    return $stmt->fetchAll();
}
?>