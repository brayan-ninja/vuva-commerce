<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="img/favicon-32x32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>vuva</title>
</head>
<body>
<section id="home">
<nav class="navbar navbar-expand-lg bg-body-tertiary ">
  <div class="container-fluid ">
  <a class="navbar-brand badge bg-success text-wrap"style="width: 6rem  font-size: 1.5rem; /* Increase the font size */
    font-weight: bold; /* Make the font bold */
    padding: 0.5rem 1rem; /* Add padding for better spacing */
    border-radius: 0.5rem; /* Add rounded corners */
    text-transform: uppercase; /* Convert text to uppercase */
    letter-spacing: 0.1rem; /* Add spacing between letters */
    transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for hover effects */ 
    background-color: #28a745; /* Darker green on hover */
    color: #fff; /* Change text color on hover */
    text-decoration: none; /* Remove underline on hover */"
     href="#">VUVA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-evenly" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">About</a>
        </li>
        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                products
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">clothing</a></li>
                <li><a class="dropdown-item" href="#">electronic gadgets</a></li>
                <li><a class="dropdown-item" href="#">phone accesories</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">products by vuva</a></li>
            </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">contact us</a>
        </li>
        
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container-fluid">
<div id="carouselWithIndicators" class="carousel slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselWithIndicators" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselWithIndicators" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselWithIndicators" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/shoes.jpg" class="d-block w-100" alt="Slide 1">
    </div>
    <div class="carousel-item">
      <img src="img/pants.jpg" class="d-block w-100" alt="Slide 2">
    </div>
    <div class="carousel-item">
      <img src="img/0e107a200ec1761217ba4774cc14a62f.jpg" class="d-block w-100" alt="Slide 3">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselWithIndicators" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselWithIndicators" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
</div>
</section>

<section id="why choose us">
<div class="container-fluid flex-wrap my-4">
          <header class="section-header " style="text-align: center; margin-bottom: 30px; color:green;">
            <h3>Why Choose Us?</h3>
            <p>We have built a large pool of knowledge that we apply</br> to deliver solutions that meet client's needs, expectations & budget.</p>
          </header>
          <div class="mango">
          <div class="container justify-content-center flex-wrap">
            <div class="row flex-wrap">

              <div class="col-lg-4  ">
                <div class="card justify-content-center " style=" background-color: white;  padding-bottom: 20px; width:300px; border-radius: 20px; color: black; "  >
                  <img src="img/why1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h4 class="card-title">fast delivaries</h4>
                  </div>
                </div>
              </div>


              <div class="col-lg-4  ">
                <div class="card justify-content-center " style=" background-color: white;  padding-bottom: 20px; width:300px; border-radius: 20px; color: black; "  >
                  <img src="img/wh2.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h4 class="card-title">order tracking</h4>
                  </div>
                </div>
              </div>

              <div class="col-lg-4  ">
                <div class="card justify-content-center " style=" background-color: white;  padding-bottom: 20px; width:300px; border-radius: 20px; color: black; "  >
                  <img src="img/wh3.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h4 class="card-title">secure payment</h4>
                  </div>
                </div>
              </div>

  
              
  
              
              
            </div>  
          </div>
</section>

<section id="login">
    <div class="container my-4 " style=" background: url('img/back.jpg') center/cover no-repeat fixed;">
        <header class="section-header " style="text-align: center; margin-bottom: 30;
        color: green;">
        <h3>VUVA COMMUNITY<h3>
            <p>Join our community and get access to exclusive deals, offers and more</p>
            <p>We have built a large pool of knowledge that we apply</br> to deliver solutions</p>
        </header>
        <div class="row d-flex">
            <div class="col-md-6 offset-md-3">
                <div class="card" style="background-color: #f7f7f7;
                padding: 20px;
                border-radius: 20px;
                box-shadow: 0 0 10px rgba(0,0,0,0);
                margin-top: 50px;">
                <a href="login.php">Login</a>
            </div>

        </div>
        <div class="row d-flex">
            <div class="col-md-6 offset-md-3">
                <div class="card" style=" color: green; background-color: #f7f7f7;
                padding: 20px;
                
                border-radius: 20px;
                box-shadow: 0 0 10px rgba(0,0,0,0);
                margin-top: 50px;">
                <a href="registration.php">Register</a>
                
            </div>

        </div>


    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>
</html>