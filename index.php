<?php
$data = json_decode(file_get_contents("data.json"));
?>


<!DOCTYPE html>
<html lang="ru">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/Mulish/stylesheet.css">
    <link rel="stylesheet" href="style.css">
    <title>Матчи</title>
  </head>

  <body>
    <main>
      <div class="match">
        <div class="match__header">
          <h1>Дата матча: <em><?=$data->matchDate?></em></h1>
          <div class="text-box">
            <h2><?=$data->blockTitle?>:</h2>
            <p><?=$data->blockDesc?></p>
          </div>
        </div>
        <div class="match__teams">
          <div class="match-team">
            <div class="match-team-image">
              <img src="<?=$data->team1Image?>" alt="club" class="match-team-image__shadow">
              <div class="match-team-image__circle"></div>
              <img src="<?=$data->team1Image?>" alt="club" class="match-team-image__image">
            </div>
            <div class="match-team__number"><?=$data->team1Coef?></div>
            <div class="match-team__text">Коэффициент</div>
          </div>
          <div class="match__versus">VS</div>
          <div class="match-team">
            <div class="match-team-image">
              <img src="<?=$data->team2Image?>" alt="Manchester" class="match-team-image__shadow">
              <div class="match-team-image__circle"></div>
              <img src="<?=$data->team2Image?>" alt="Manchester" class="match-team-image__image">
            </div>
            <div class="match-team__number"><?=$data->team2Coef?></div>
            <div class="match-team__text">Коэффициент</div>
          </div>
        </div>
        <div class="match__footer">
          <p><?=$data->extraInfo?></p>
          <div class="buttons">
            <button class="button" onclick="window.location.href='<?=$data->button1Url?>'" ><?=$data->button1Text?></button>
            <button onclick="window.location.href='<?=$data->button2Url?>'" class="button button--outline"><?=$data->button2Text?></button>
          </div>
        </div>
      </div>
    </main>
  </body>

</html>
