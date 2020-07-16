<?php
if (isset($_GET['pokeName'])) {
    $pokeInfo = file_get_contents("https://pokeapi.co/api/v2/pokemon/" . $_GET['pokeName']);
    $decode = json_decode($pokeInfo,true);
    $moves = array_slice($decode['moves'],0,4);
    //$name = $moves['move']['name'];
    /*foreach ($moves as $name);{
        echo $name;
    }

    //$move = $moves[0]['move'];
    //$randomMoves = array_rand($moves);
    //$moveName = $moves[0]['move']['name'];
    //$moveName1 = $moves[1]['move']['name'];
    //$moveName2 = $moves[2]['move']['name'];
    //$moveName3 = $moves[3]['move']['name'];


      /*for($i = 0; $i < 4; $i++){
     echo $moves[$i]['move']['name'];
    };*/



}
//var_dump($decode);
/*$input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
$rand_keys = array_rand($input, 2);
echo $input[$rand_keys[0]] . "\n";
echo $input[$rand_keys[1]] . "\n";
*/
$evolution = $_GET['pokeName'];
$evolutionInfo = file_get_contents("https://pokeapi.co/api/v2/pokemon-species/" . $_GET['pokeName']);
$evolutionDecode = json_decode($evolutionInfo, true);
$pokeChild =($evolutionDecode['evolves_from_species']['name']);
//var_dump($pokeChild);

$evolutionNext = $_GET['pokeName'];
$evolutionChain = file_get_contents("https://pokeapi.co/api/v2/evolution-chain/" . $_GET['pokeName']);
$evolutionDecodeChain = json_decode($evolutionChain, true);
$pokeParent = ($evolutionDecodeChain['chain']['evolves_to'][0]['species']);
//ar_dump($pokeParent);


//var_dump($evolutionDecode);

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Ajax Pokédex">
    <meta name="keywords" content="Pokémon game">
    <meta name="author" content="Yuri & Said">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <title>Pokémon Game</title>
</head>
<body>

<div class="container">
    <!-- Header -->
    <header>
        <span><img src="img/pokeball.png"></span><img src="img/pokemon.png" id="pokemon"><span><img
                    src="img/pokeball.png"></span></h1>
    </header>
    <!-- Main -->
    <main>
        <form method="get" action="index.php" class="input-field">
            <input id="input" type="text" autocomplete="off" name="pokeName" placeholder="ID or Name Pokemon">
            <input id="button" aria-label="startSearch" type="submit" class="btn btn-danger" value="I choose you">
        </form>
        <section id="background">
            <div class="img-text" id="img-photo">
                <div id="pokeId" class="text-center"><?php echo $decode['id']; ?></div>
                <div id="name" class="text-center"><?php echo $decode['name']; ?></div>
                <div id="sprite"><img src="<?php echo $decode['sprites']['front_default']; ?>"></div>
                <div id="moves" class="text-center"><?php /*echo $moveName. ' '. $moveName1. ' '. $moveName2. ' '. $moveName3;*/
                    for($i = 0; $i < 4; $i++){
                        echo $moves[$i]['move']['name']. "<br>";
                    }
                    ?></div>
                <a href="<?php echo "http://pokedex.local/index.php?pokeName=".$pokeChild?>" id="prev"  type="" class="btn btn-primary">child</a>
                <a href="<?php echo "http://pokedex.local/index.php?pokeName=".$pokeParent?>" id="next"  type="" class="btn btn-danger">parent</a>
            </div>
        </section>
    </main>
</div>

</body>
</html>