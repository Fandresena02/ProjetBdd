<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Page de connexion</title>
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous"
    />
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400"
        rel="stylesheet"
    />
	<link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
  <div id="form_wrapper">
    <div id="form_left">
        <img src="../images/icon.webp" alt="computer icon" />
    </div>
    <div id="form_right">
        <form action="../controlleur/index.php?action=validerConnexion" method = "POST">
            <h1>Se connecter</h1><br>
            <div class="input_container">
                <i class="fas fa-envelope"></i>
                <input
                placeholder="Email"
                type="email"
                name="Email"
                id="field_email"
                class="input_field"
                required
                />
            </div><br>
            <div class="input_container">
                <i class="fas fa-lock"></i>
                <input
                placeholder="Mot de passe"
                type="password"
                name="Password"
                id="field_password"
                class="input_field"
                required
                />
            </div><br>
            <input
                type="submit"
                value="Login"
                name="login"
                id="input_submit"
                class="input_field"
            />
        </form>
      <span>Vous avez oubliez <a href="#"> Email / Mot de passe ?</a></span>
      <span id="create_account">
        <a href="#">Créer un compte ➡ </a>
      </span>
    </div>
  </div>
</body>
</html>