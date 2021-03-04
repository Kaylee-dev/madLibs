<?php
// Lege variabelen
    $animal =  $person = $country = $bored = $play = $teacher =  $buy = $do = "";
    $animalError = $personError = $countryError = $boredError = $playError = $teacherError = $buyError = $doError = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["animal"])){
            $animalError = "required";
        } else {
            $animal = test_input($_POST["animal"]);
        }

        if(empty($_POST["person"])){
            $personError = "required";
        } else {
            $person = test_input($_POST["person"]);
        }
        
        if(empty($_POST["country"])){
            $countryError = " is required";
        } else {
            $country = test_input($_POST["country"]);
        }

        if(empty($_POST["bored"])){
            $boredError = " is required";
        } else {
            $bored = test_input($_POST["bored"]);
        }

        if(empty($_POST["play"])){
            $playError = " is required";
        } else {
            $play = test_input($_POST["play"]);
        }

        if(empty($_POST["teacher"])){
            $teacherError = " is required";
        } else {
            $teacher = test_input($_POST["teacher"]);
        }

        if(empty($_POST["buy"])){
            $buyError = " is required";
        } else {
            $buy = test_input($_POST["buy"]);
        }

        if(empty($_POST["do"])){
            $doError = " is required";
        } else {
            $do = test_input($_POST["do"]);
        }

    }

     // test_input is een functie die voor je de code checkt op speciale tekens
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/madLibs.css">
        <title>MadLibs</title>
    </head>
    <body>
    <h1>Mad Libs</h1>
		<div class="block">
            <div class="menu">
                <ul>
                    <a href="paniek.php"><li>Er heerst paniek...</li></a>
                    <a href="onkunde.php"><li>Onkunde</li></a>
                </ul>
            </div>
			<div class="inputs">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                
                <label>Welk dier zou je nooit als huisdier willen hebben?</label>
                <input type="text" id="animal" name="animal" value="<?php echo $animal ?>">
                <span class="error">* <?php echo $animalError;?></span>
                <br>
                <label>Wie is de belangerijkste persoon in je leven?</label>
                <input type="text" id="person" name="person" value="<?php echo $person ?>">
                <span class="error">* <?php echo $personError;?></span>
                <br>
                <label>In welk land zou je graag willen wonen?</label>
                <input type="text" id="country" name="country" value="<?php echo $country ?>">
                <span class="error">* <?php echo $countryError;?></span>
                <br>
                <label>Wat doe je als je je verveelt?</label>
                <input type="text" id="bored" name="bored" value="<?php echo $bored ?>">
                <span class="error">* <?php echo $boredError;?></span>
                <br>
                <label>Met welk speelgoed speelde je als kind het meest?</label>
                <input type="text" id="play" name="play" value="<?php echo $play ?>">
                <span class="error">* <?php echo $playError;?></span>
                <br>
                <label>Bij welke docent spijbel je het liefst?</label>
                <input type="text" id="teacher" name="teacher" value="<?php echo $teacher ?>">
                <span class="error">* <?php echo $teacherError;?></span>
                <br>
                <label>Als je 100.000 had, wat zou je dan kopen?</label>
                <input type="text" id="buy" name="buy" value="<?php echo $buy ?>">
                <span class="error">* <?php echo $buyError;?></span>
                <br>
                <label>Wat is je favoriete bezigheid?</label>
                <input type="text" id="do" name="do" value="<?php echo $do ?>">
                <span class="error">* <?php echo $doError;?></span>
                <br>
				
				<input type="submit" id="submit" name="submit" value="Submit">
                </form>
			</div>
		</div>
        <div class="input">
            <h2>Verhaal:</h2>
            <?php
            if($animalError || $personError || $countryError || $boredError|| $playError || $teacherError || $buyError || $doError  == true){
                "";
            };
            ?>
            <div class="story">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){ ?>
                    Er heerst paniek in het koninkrijk <?php echo $_POST["country"];?>. Koning <?php echo $_POST["teacher"];?> is ten einde raad en als koning <?php echo $_POST["teacher"];?> ten einde raad is, dan roept hij zijn ten-einde-raadsheer <?php echo $_POST["person"];?>. <br> "<?php echo $_POST["teacher"];?>!" Het is een ramp! Het is een schande!" <br> "Sire, Majesteit. Uwe luidruchtigheid, wat is er aan de hand?" <br>"Mijn <?php echo $_POST["animal"];?> is verdwenen! Zo maar, zonderwaarschuwing. En ik had net <?php echo $_POST["play"];?> voor hem gekocht!" <br> "Majesteit, uw <?php echo $_POST["animal"];?> komt vast vanzelf weer terug!" <br>"Ja, da's leuk en aardig, maar hoe moet ik in de tussentijd <?php echo $_POST["do"];?> leren?" <br> "Maar Sire, daar kunt u toch uw <?php echo $_POST["buy"];?> voor gebruiken." <br>"<?php echo $_POST["person"];?>, je hebt helemaal gelijk! Wat zou ik doen als ik jou niet had" <br> "Mij <?php echo $_POST["bored"];?>, Sire".
                <?php } ?>
           

            </div>

        </div>
        
    </body>
</html>