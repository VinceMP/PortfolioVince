<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="style.css">
    <title>Contact</title>
    
</head>
<body>

  <div id="entete">



    <div id="logo">
       <img src="Image/logo.png" alt="">
    </div>

    <div id="Menu">
       <a href="index.html">Accueil</a>
       <a href="index.html#about-me">Expériences</a>
       <a href="index.html#all-projets">Projets</a>
       <button> <a href="Image/CV_Officielle.pdf" target="_blank">Mon CV</a> </button>
    </div>

</div>
  <div class="container">
    <form method="post">
      <p>Contactez-moi</p>
      <input type="text" name="name" placeholder="Nom" required>
      <input type="email" name="email" placeholder="Email" required>
      
      <br>
      
      <textarea name="message" id="message" cols="30" rows="10" placeholder="Message" required></textarea> <br>
      <input type="submit" name="submit" value="Envoyer">
    </form>
  
   
  </div>


<?php

include 'controleur/database.php';
global $db;
$messageEnvoie = 'Le formulaire a bien était envoyé'; // Variable pour stocker le message

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  try {
      $stmt = $db->prepare("INSERT INTO users (nom, email, message) VALUES (:name, :email, :message)");
      
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':message', $message);
      
      $stmt->execute();

      echo '<h2>' . $messageEnvoie . '<h2>';
  } catch (PDOException $e) {
      echo "Erreur lors de l'insertion des données: " . $e->getMessage();
  }

}

?>
</body>
</html>

