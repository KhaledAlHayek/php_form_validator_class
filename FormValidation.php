<?php
  require_once("classes/ValidatorClass.php");
  $errors = [];
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $validation = new UserValidator($_POST);
    $errors = $validation->validate_form();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validation Class</title>
  <link rel="stylesheet" href="css/index.css">
</head>
<body>

  <main class="add-user">
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
      <h1>Add New User</h1>
      <div class="input">
        <label for="username">
          UserName
        </label>
        <input 
          id="username"
          type="text" 
          placeholder="enter your username" 
          name="username" 
          autocomplete="off"
          value="<?php echo $_POST["username"] ?? "" ?>"
          >
      </div>
      <div class="error">
        <?php echo $errors["username"] ?? "" ?>
      </div>
      <div class="input">
        <label for="email">Email</label>
        <input 
          id="email"
          type="text" 
          placeholder="enter your email" 
          name="email" 
          autocomplete="off"
          value="<?php echo $_POST["email"] ?? "" ?>"
          >
      </div>
      <div class="error">
        <?php echo $errors["email"] ?? "" ?>
      </div>
      <div class="input">
        <input type="submit" value="Send Data">
      </div>
    </form>
  </main>

</body>
</html>