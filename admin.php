<?php
ini_set("session.cookie_secure", 1);
session_start();

CheckAuth();
UpdateData();

function CheckAuth() {
  if ($_POST["password"]) {
    setcookie("password", $_POST["password"]);
  }
  
  
  // Check to be logged in.
  $password = isset($_POST["password"]) ? $_POST["password"] : $_COOKIE["password"];
  if ($password !== "1239123h1edaDOI!JHD)@N!YBOD!@ND1k28") {
    echo "<form method=\"post\"><input name=\"password\"></form>";
    exit();
  }
}

function UpdateData() {
  if (isset($_POST["submit"])) {
    file_put_contents("data.json", json_encode($_POST, JSON_UNESCAPED_UNICODE));
  }
}

?>

<?php
$data = json_decode(file_get_contents("data.json"));
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/Mulish/stylesheet.css">
    <link rel="stylesheet" href="admin.css">
    <title>Admin</title>
  </head>

  <body>
    <main>
      <form class="form" method="post">
        <div class="form__group">
          <label class="input">
            <span>Дата матча</span>
            <input name="matchDate" value="<?=$data->matchDate?>" placeholder="16 февраля">
          </label>
        </div>
        <div class="form__group">
          <label class="input">
            <span>Название блока</span>
            <input name="blockTitle" value="<?=$data->blockTitle?>" placeholder="Инсайдерский прогноз">
          </label>
          <label class="input">
            <span>Описание блока</span>
            <textarea name="blockDesc"><?=$data->blockDesc?></textarea>
          </label>
        </div>
        <div class="form__group">
          <h2>Комманда 1</h2>
          <div class="form__group">
            <label class="input">
              <span>Картинка</span>
              <input name="team1Image" value="<?=$data->team1Image?>" placeholder="https://google.com/fcb.png">
            </label>
            <label class="input">
              <span>Коэффициент</span>
              <input name="team1Coef" value="<?=$data->team1Coef?>" placeholder="1,75">
            </label>
          </div>
          <h2>Комманда 2</h2>
          <div class="form__group">
            <label class="input">
              <span>Картинка</span>
              <input name="team2Image" value="<?=$data->team2Image?>" placeholder="https://google.com/fcb.png">
            </label>
            <label class="input">
              <span>Коэффициент</span>
              <input name="team2Coef" value="<?=$data->team2Coef?>" placeholder="1,75">
            </label>
          </div>
        </div>
        <div class="form__group">
          <label class="input">
            <span>Дополнительная информация</span>
            <textarea name="extraInfo"><?=$data->extraInfo?></textarea>
          </label>
        </div>
        <div class="form__group">
          <label class="input">
            <span>Кнпока 1</span>
            <input name="button1Text" value="<?=$data->button1Text?>" placeholder="Поставить на победителя">
          </label>
          <label class="input">
            <span>Кнпока 2</span>
            <input name="button2Text" value="<?=$data->button2Text?>" placeholder="Забрать бонус">
          </label>
        </div>
      <div class="form__group">
          <label class="input">
            <span>Дополнительная информация</span>
            <textarea name="extraInfo"><?=$data->extraInfo?></textarea>
          </label>
        </div>
        <div class="form__group">
          <label class="input">
            <span>Кнпока 1 Ссылка</span>
            <input name="button1Url" value="<?=$data->button1Url?>" placeholder="Поставить на победителя">
          </label>
          <label class="input">
            <span>Кнпока 2 Ссылка</span>
            <input name="button2Url" value="<?=$data->button2Url?>" placeholder="Забрать бонус">
          </label>
        </div>
        <button class="form__submit" name="submit" type="submit">Сохранить</button>
      </form>
    </main>
  </body>

</html>
