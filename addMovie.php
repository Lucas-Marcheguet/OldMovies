<?php
include_once("php/requestsHandler.php");

?>

<!DOCTYPE html>
<html lang="fr">
<body>
    <form action="" method="post">
        <label for="title">Titre :</label>
        <input type="text" name="title" id="title" required="required">
        <label for="thumb-url">Adresse de l'image</label>
        <input type="text" name="thumb-url" id="thumb-url">
        <label for="release-date">Date de sortie</label>
        <input type="text" name="release-date" id="release-date" placeholder="YYYY-MM-DD">
        <label for="rating">Note</label>
        <input type="number" name="rating" id="rating" placeholder="(6.4, 4.2, 8.5)..." step='0.1'>
        <label for="lang">Langage</label>
        <select name="lang" id="lang">
            <?php
                $request = new RequestsHandler;
                $langs = $request->getLanguages();

                foreach($langs as $lang){
                    if($lang[0]=='Array'){
                        $lang[0]="Langage";
                    }
                    echo '<option value="'.$lang[0].'">'.$lang[0].'</option>';
                }
            ?>
        </select>
        <label for="plot">Synopsis :</label>
        <input type="text" name="plot" id="plot" required="required">
        <label for="directors">Réalisateur(s) :</label>
        <input type="text" name="directors" id="directors" required="required" placeholder="Prénom nom,...">
        <label for="genres">Genre(s) :</label>
            <?php
                $request = new RequestsHandler;
                $genres = $request->getGenres();

                foreach($genres as $genre){
                    echo "<label for='".$genre[0]."'>".$genre[0]."<input type='checkbox' name='".$genre[0]."' id='".$genre[0]."' value='".$genre[0]."'></label>";
                }
            ?>

    <button name='add'>Ajouter</button>
    </form>
</body>
</html>

<?php
function handleMovieAdd(){
    $request = new RequestsHandler;
    $language = $_POST['lang'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $link = filter_var($_POST['thumb-url'], FILTER_SANITIZE_URL);
    $releaseDate = date('Y-m-d', strtotime($_POST['release-date']));
    $note = filter_var($_POST['rating'], FILTER_SANITIZE_NUMBER_FLOAT);
    $plot = filter_var($_POST['plot'], FILTER_SANITIZE_STRING);
    $directors = explode(",", filter_var($_POST['directors'], FILTER_SANITIZE_STRING));
    $genresReq = $request->getGenresId();
    $listIds= array();
    foreach($genresReq as $req){
        if(isset($_POST[$req['Genre']])){
            $listIds[] = $req['Id'];
        }
    }

    $connect = new ConnectToBD;
    $connexion = $connect->connexion;

    if($link == null){
        $link = 'none';
    }
    if($note == null){
        $note = 0;
    }
    $stmt = $connexion->prepare("Insert into Movie values ('".$title."','".$link."','".$releaseDate. "','".$note. "','".$language."','".$plot."'); ");
    $stmt->execute();
    foreach($directors as $director){
        $splited = explode(" ", $director);
        if(!isset($splited[1])){
            $stmt = $connexion->prepare("
            Insert into PossessDirector values ('".$splited[0]."',' ','".$title."','".$link."');
            Insert ignore into Director values ('".$splited[0]."', ' ');");
            $stmt->execute();
        }
        else {
            $stmt = $connexion->prepare("
            Insert into PossessDirector values ('".$splited[0]."','".$splited[1]."','".$title."','".$link."');
            Insert ignore into Director values ('".$splited[0]."','".$splited[1]."');
            ");
            $stmt->execute();
        }

    }
    foreach($listIds as $id){

        $stmt = $connexion->prepare("
        Insert into PossessGenre values ('".$id."','".$title."','".$link."');");
        $stmt->execute();
    }
}

if(isset($_POST['add'])){
    handleMovieAdd();
}
?>