<?php
// Lege variabelen
    $skill =  $person = $number = $vacation = $personal =  $worst = $bad ="";
    $skillError = $personError = $numberError = $vacationError = $personalError = $worstError = $badError = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["skill"])){
            $skillError = " is required";
        } else {
            $skill = test_input($_POST["skill"]);
        }

        if(empty($_POST["person"])){
            $personError = " is required";
        } else {
            $person = test_input($_POST["person"]);
        }
        
        if(empty($_POST["number"])){
            $numberError = " is required";
        } else {
            $number = test_input($_POST["number"]);
        }

        if(empty($_POST["vacation"])){
            $vacationError = " is required";
        } else {
            $vacation = test_input($_POST["vacation"]);
        }

        if(empty($_POST["personal"])){
            $personalError = " is required";
        } else {
            $personal = test_input($_POST["personal"]);
        }

        if(empty($_POST["worst"])){
            $worstError = " is required";
        } else {
            $worst = test_input($_POST["worst"]);
        }

        
        if(empty($_POST["bad"])){
            $badError = " is required";
        } else {
            $bad = test_input($_POST["bad"]);
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
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $skillError == "" && $personError == "" && $numberError == "" && $badError == "" && $vacationError == "" && $personalError == "" && $worstError == "" && $doError == "" ){ ?>
                <div class="input">
                    <h2>Verhaal:</h2>
                    <br>
                    <div class="story">
                            Er zijn veel mensen die niet kunnen <?php echo $_POST["skill"];?>. Neem nou <?php echo $_POST["person"];?>. Zelfs met de hulp van een <?php echo $_POST["vacation"];?> of zelfs <?php echo $_POST["number"];?> kan 
                            <?php echo $_POST["person"];?> niet <?php echo $_POST["skill"];?>. 
                            Dat heeft niet te maken met een gebrek aan <?php echo $_POST["personal"];?>, maar met een teveel aan <?php echo $_POST["worst"];?>. Te veel <?php echo $_POST["worst"];?> leidt tot <?php echo $_POST["bad"];?> en dat is niet goed als je wilt <?php echo $_POST["skill"];?>. Helaas voor <?php echo $_POST["person"];?>.
                    </div>
                </div>
            <?php } else { ?>
                <div class="inputs">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                    <label>Wat zou je graag willen kunnen?</label>
                    <input type="text" id="skill" name="skill" value="<?php echo $skill ?>">
                    <span class="error">* <?php echo $skillError;?></span>
                    <br>
                    <label>Met welk persoon kun je goed opschieten?</label>
                    <input type="text" id="person" name="person" value="<?php echo $person ?>">
                    <span class="error">* <?php echo $personError;?></span>
                    <br>
                    <label>Wat is je favoriete getal?</label>
                    <input type="text" id="number" name="number" value="<?php echo $number ?>">
                    <span class="error">* <?php echo $numberError;?></span>
                    <br>
                    <label>Wat heb je altijd bij je als je op vakantie gaat?</label>
                    <input type="text" id="vacation" name="vacation" value="<?php echo $vacation ?>">
                    <span class="error">* <?php echo $vacationError;?></span>
                    <br>
                    <label>Wat is je beste persoonlijke eigenschap?</label>
                    <input type="text" id="personal" name="personal" value="<?php echo $personal ?>">
                    <span class="error">* <?php echo $personalError;?></span>
                    <br>
                    <label>Wat is je slechtste persoonlijke eigenschap?</label>
                    <input type="text" id="worst" name="worst" value="<?php echo $worst ?>">
                    <span class="error">* <?php echo $worstError;?></span>
                    <br>
                    <label>Wat is het ergste dat je kan overkomen?</label>
                    <input type="text" id="bad" name="bad" value="<?php echo $bad ?>">
                    <span class="error">* <?php echo $badError;?></span>
                    <br>
                    <input type="submit" id="submit" name="submit" value="Submit">
                    </form>
                </div>
            <?php } ?>
		</div>
    </body>
</html>