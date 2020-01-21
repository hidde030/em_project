<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/tickets.css">
</head>

<body>
    <div id="container">
        <header class="header-event">
            <p>Buy Tickets</p>
        </header>
        <div id="eventform">
            <div id="innerform">
                <form>
                    <label for="event">Full name</label><br>
                    <input class="labelwidth" type="text" name="field_voornaam" placeholder="voornaam" required><br>
                    <input class="labelwidth" type="text" name="field_tussenv" placeholder="tussenv..." required><br>
                    <input class="labelwidth" type="text" name="field_achternaam" placeholder="achternaam" required><br>
                    <label for="eventcode">Email:</label><br>
                    <input class="labelwidth" type="text" name="field_email" placeholder="example@hotmail.nl"
                        required><br>
                    <label for="eventvendor">Telefoon nummer</label><br>
                    <input class="labelwidth" type="text" name="field_eventvendor" placeholder="06-28290022"
                        required><br><br><br>
                    <label for="eventvendor">Aantal beschikbare tickets:</label><br><Br>
                    <label for="eventvendor">Aantal tickets (Max 15 stuks): </label><br>
                    <input class="labelwidth" type="text" name="field_eventvendor" placeholder="1, 2, 3" required><br>
                    <label for="eventpresentor">Terms and Conditions</label>
                    <input type="checkbox" required><br><br>
                    <input class="submit" type="submit" name="submit" value="Buy Tickets" />
                </form>
            </div>
        </div>

    </div>
</body>

</html>