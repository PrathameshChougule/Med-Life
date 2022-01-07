<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'dbconnect.php';
  $doc_id = $_POST["doc_id"];
  $password = $_POST["password"];  
  $sql = "Select * from doc where doc_id='$doc_id' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1){

    $login = true;
    // session_start();
    // $_SESSION['loggedin'] = true;
    // $_SESSION['DOC_ID'] = $DOC_ID;
    header("location: user.php");

  }
  else{
    $showError = "Invalid credentials";
  }
}
else{
  $showError = "Invalid credentials";

}





?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assets/stylesheet.css" />

    <title>Med Life</title>
  </head>
  <body class="bg-warning bg-opacity-10 doc">
  <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>
    <header>
      <div class="container-fluid" style="background-color: white;">
        <img src="images/header.jpeg" class="mx-auto d-block" alt="image header" style="width: 300px; height: 60px; object-fit: fill;"></img>
      </div>
      <div class="sticky-top">
        <nav class="navbar navbar-expand-sm navbar-light bg-secondary bg-gradient">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Home</a>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">help</a>
                </li>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <main>
      <section>
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">
                    <form action="/dbms_miniproject/doctor.php" method ="POST">
                      <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                      <div class="input-group flex-nowrap">
                        <span class="input-group-text"  id="doc_id">DOCTOR ID :</span>
                        <input type="text" class="form-control" name = "doc_id" pattern=".{10,10}" required placeholder="eg : BEG9543210" aria-label="doc_id" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group pt-3 flex-nowrap">
                        <span class="input-group-text"   id="password">PASSWORD :</span>
                        <input type="password" class="form-control" name="password" minlength="4" required aria-label="password" aria-describedby="addon-wrapping">
                    </div>
                      <div class="pt-3 mb-4">
                        <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                      </div>
                      <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="sign_in.php" style="color: #393f81;">Register here</a></p>
                      
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </main>
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
  ></script>
  <script async src="assets/script.js"></script>
</html>
