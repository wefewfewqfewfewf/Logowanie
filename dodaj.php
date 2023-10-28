<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="styl.css"> 

<title>Stwórz konto</title>
</head>
<body>
  
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Stwórz konto</h1>
                        <form method="post">
                            Nazwa użytkownika:<br>
                            <input type="text" name="nazwa" class="form-control"><br>
                            Hasło:<br>
                            <input type="password" name="haslo" class="form-control"><br>
                            <input type="submit" name="submit" value="Stwórz konto" class="btn btn-primary btn-block"><br>
                            <a href="loguj.php">  <input type="button" name="submit" value="Zaloguj się"   class="btn btn-primary btn-block"></a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php
    if (isset($_POST["submit"])) {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "mediu";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Błąd połączenia z bazą danych: " . $conn->connect_error);
      }

      $nazwa = $_POST["nazwa"];
      $haslo = $_POST["haslo"];

      $nazwa = mysqli_real_escape_string($conn, $nazwa);
      $haslo = mysqli_real_escape_string($conn, $haslo);

      $sql = "INSERT INTO forma (nazwa, haslo) VALUES ('$nazwa', '$haslo')";

      if ($conn->query($sql) === TRUE) {
      
        echo '<script>alert("Stworzono użytkownika");</script>';
        header("Location:index.html");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
    }
  ?>
</body>
</html>
