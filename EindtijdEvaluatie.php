<?php
    include_once("functions.php");
    include_once("dbFunctions.php");
    ini_set( "display_errors", 0);
?>

<!DOCTYPE html>

<html>
    <head>

        <link rel="stylesheet" type="text/css" href="style.css">
        <title></title>

    </head>
    <body>

        
        <div id="container">
            <div id="header">
            </div>
            
            <div id="menu">
                <?php
                    menuFunction();
                ?>
                <div class="clear"></div>
            </div>
            
            <div id="content">
                <p>
                    Kruis voor elke vraag s.v.p. &#233;&#233;n vakje aan en geef een korte toelichting.
                </p>
                <form name='reviewForm' action='insertendReview.php' method='POST'>

                <input type="hidden" name="id" value="<?php echo($_GET["id"]); ?>"/> <!--Id uit URL opvragen.  TODO: Ergens een check of id wel ingevuld/ correct is-->

                    <table id='Tinhoud'>
                <tr >
                    <td class='titel'>
                    1.  Wat beschrijft het best uw mening over de volgende onderwerpen? 
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td class='center'>
                        5. Uitstekend
                    </td>
                    <td class='center'>
                        4. Goed
                    </td>
                    <td class='center'>
                        3.Ruim voldoende
                    </td>
                    <td class='center'>
                        2.Voldoende
                    </td>
                    <td class='center'>
                        1.Onvoldoende
                    </td>
                </tr>
                <tr>
                    <td>
                        a.  Passende moeilijkheidsgraad
                    </td>
                    <td class='center'>
                        <input type="radio" name="group1a" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group1a" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group1a" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group1a" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group1a" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        b.  Toepasbaarheid op uw situatie
                    </td>
                    <td class='center'>
                        <input type="radio" name="group1b" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group1b" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group1b" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group1b" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group1b" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        c.  Kwaliteit van de lesstof
                    </td>
                    <td class='center'>
                        <input type="radio" name="group1c" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group1c" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group1c" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group1c" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group1c" value="1">
                    </td>
                </tr>
                <tr>
                    <td class='open'>               
                        <p>Suggesties  en opmerkingen: </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas1" name='txtarea1'></textarea>
                    </td>
                </tr>

                <tr>
                    <td class='titel'>
                    Structuur van de cursus
                    </td>
                </tr>
                <tr>
                    <td>
                    2.  Wat beschrijft het best uw mening over de volgende onderwerpen?
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td class='center'>
                        5. Uitstekend
                    </td>
                    <td class='center'>
                        4. Goed
                    </td>
                    <td class='center'>
                        3.Ruim voldoende
                    </td>
                    <td class='center'>
                        2.Voldoende
                    </td>
                    <td class='center'>
                        1.Onvoldoende
                    </td>
                </tr>
                <tr>
                    <td>
                        a.  Volgorde
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2a" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2a" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2a" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2a" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2a" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        b.  Tempo
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2b" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2b" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2b" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2b" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2b" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        c.  Omvang
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2c" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2c" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2c" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2c" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2c" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        d.  Verhouding theorie/praktijk
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2d" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2d" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2d" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2d" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2d" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        e.  Niveau
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2e" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2e" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2e" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2e" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2e" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        f.   Nut van de gebruikte werkvormen
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2f" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2f" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2f" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2f" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group2f" value="1">
                    </td>
                </tr>
                <tr>
                    <td class='open'>               
                        <p>Suggesties  en opmerkingen: </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas2" name='txtarea2'></textarea>
                    </td>
                </tr>

                <tr>
                    <td class='titel'>
                    Algemeen
                    </td>
                </tr>
                <tr>
                    <td>
                    3.   Wat beschrijft het best uw mening over het cursusmateriaal? 
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td class='center'>
                        5. Uitstekend
                    </td>
                    <td class='center'>
                        4. Goed
                    </td>
                    <td class='center'>
                        3.Ruim voldoende
                    </td>
                    <td class='center'>
                        2.Voldoende
                    </td>
                    <td class='center'>
                        1.Onvoldoende
                    </td>
                </tr>
                <tr>
                    <td>
                        a.  Kwaliteit 
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3a" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3a" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3a" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3a" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3a" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        b.  Taalgebruik
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3b" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3b" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3b" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3b" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3b" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        c.  Inhoud
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3c" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3c" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3c" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3c" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3c" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        d.  Duidelijkheid
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3d" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3d" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3d" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3d" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3d" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        e.  Toepasbaarheid
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3e" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3e" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3e" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3e" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group3e" value="1">
                    </td>
                </tr>
                <tr>
                    <td class='open'>               
                        <p>Suggesties  en opmerkingen: </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas3" name='txtarea3'></textarea>
                    </td>
                </tr>
                <tr>
                    <td class='titel'>
                    Algemeen
                    </td>
                </tr>
                <tr>
                    <td>
                    4.  Wat beschrijft het best uw mening over de docent / trainer met betrekking tot de volgende aspecten? 
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td class='center'>
                        5. Uitstekend
                    </td>
                    <td class='center'>
                        4. Goed
                    </td>
                    <td class='center'>
                        3.Ruim voldoende
                    </td>
                    <td class='center'>
                        2.Voldoende
                    </td>
                    <td class='center'>
                        1.Onvoldoende
                    </td>
                </tr>
                <tr>
                    <td>
                        a.  Persoonlijke presentatie
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4a" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4a" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4a" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4a" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4a" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        b.  Uitleg doel cursus/training
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4b" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4b" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4b" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4b" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4b" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        c.  Effici&euml;nt gebruik van materiaal en oefeningen
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4c" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4c" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4c" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4c" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4c" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        d.  Duidelijke uitleg
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4d" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4d" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4d" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4d" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4d" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        e.  Tempo
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4e" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4e" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4e" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4e" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4e" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        f. &#160;Gehanteerde werkvormen
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4f" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4f" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4f" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4f" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4f" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        g.  Kennis
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4g" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4g" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4g" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4g" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group4g" value="1">
                    </td>
                </tr>
                <tr>
                    <td class='open'>               
                        <p>Suggesties  en opmerkingen: </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas4" name='txtarea4'></textarea>
                    </td>
                </tr>
                 <tr>
                    <td>
                    5. Algemeen
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td class='center'>
                        5. Uitstekend
                    </td>
                    <td class='center'>
                        4. Goed
                    </td>
                    <td class='center'>
                        3.Ruim voldoende
                    </td>
                    <td class='center'>
                        2.Voldoende
                    </td>
                    <td class='center'>
                        1.Onvoldoende
                    </td>
                </tr>
                <tr>
                    <td>
                        a.  Wat is uw algemene oordeel over de cursus?
                    </td>
                    <td class='center'>
                        <input type="radio" name="group5a" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group5a" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group5a" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group5a" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group5a" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        b.  Heeft de cursus voldaan aan uw verwachtingen? Zo niet, gaarne toelichten:
                    </td>
                    <td class='center'>
                        <input type="radio" name="group5b" value="5">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group5b" value="4">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group5b" value="3">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group5b" value="2">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group5b" value="1">
                    </td>
                </tr>
                <tr>
                    <td class='open'>               
                        <p>Suggesties  en opmerkingen: </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas5" name='txtarea5'></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                    6.  Zou u anderen aanbevelen deze  cursus te volgen? Zo niet, gaarne toelichten:
                    </td>
                    <td class='center'>
                         ja
                    </td>
                    <td class='center'>
                         nee
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td class='center'>
                        <input type="radio" name="group6" value="Ja">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group6" value="Nee">
                    </td>
                </tr>
                <tr>
                    <td class='open'>               
                        <p>7.  Welke onderdelen hebben u het meest aangesproken en waarom? </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas7" name='txtarea7'></textarea>
                    </td>
                </tr>
                <tr>
                    <td class='open'>               
                        <p>8.  Waren er onderdelen die u overbodig vond? Indien van toepassing, gaarne toelichten. </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas8" name='txtarea8'></textarea>
                    </td>
                </tr>
                 <tr>
                    <td class='open'>               
                        <p>9.  Bij welke onderdelen heeft u nieuwe vaardigheden opgedaan of uw vaardigheden verbeterd? Gaarne toelichten. </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas9" name='txtarea9'></textarea>
                    </td>
                </tr>
                <tr>
                    <td class='open'>               
                        <p>10.  Hoeveel tijd (in uren) heeft u  in totaal besteed aan de voorbereiding van de cursus/training? </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas10" name='txtarea10'></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                    11. De lengte van de cursus was:
                    </td>
                    <td class='center'>
                        Net goed
                    </td>
                    <td class='center'>
                        Te lang
                    </td>
                    <td class='center'>
                        Te kort
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td class='center'>
                        <input type="radio" name="group11" value="Net goed">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group11" value="Te lang">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group11" value="Te kort">
                    </td>
                </tr>
                <tr>
                    <td>
                    12.  Bent u ge&iuml;nteresseerd in een vervolgcursus?
                    </td>
                    <td class='center'>
                        ja
                    </td>
                    <td class='center'>
                        nee
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td class='center'>
                        <input type="radio" name="group12" value="ja">
                    </td>
                    <td class='center'>
                        <input type="radio" name="group12" value="nee">
                    </td>
                </tr>
                <tr>
                    <td class='open'>               
                        <p>Specifieke wensen: </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas12" name='txtarea12'></textarea>
                    </td>
                </tr>
                <tr>
                    <td class='open'>               
                        <p></p>
                    </td>
                    <td class='open'>
                    <input name='testvalues' type='hidden' value='1'>
                    <input type='submit' name='submit' />
                    </td>
                </tr>           
            </table>
            <p STYLE="color: red;">Let op! na het verzenden ga je direct terug naar het profiel menu.</p>
            </form>
                <div class="clear"> </div>
            </div>
        </div>
        
    </body>

</html>

