<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="img/favicon-32x32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>vuva</title>
    <style>
       .category-title {
            background-color: #28a745; /* Green */
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-price {
            background-color: #f8f9fa; /* Light grey */
            padding: 10px;
            text-align: center;
            font-weight: bold;
            color: #28a745; /* Green */
        }
        .footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .footer a {
            color: #28a745; /* Green */
            text-decoration: none;
        }
        .footer a:hover {
            color: #218838; /* Darker green */
        }
      </style>
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
<div class="container my-4" style="background: url('img/nike.jpg') center/cover no-repeat fixed; border-radius: 20px; overflow: hidden;">
    <header class="section-header" style="text-align: center; margin-bottom: 30px; color: black;">
        <!-- Your header content here -->
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

 <!-- Products Section -->
 <section id="products" class="container my-5">
        <header class="section-header text-center mb-5">
            <h3>Our Products</h3>
            <p>Explore our wide range of products in different categories.</p>
        </header>

        <?php
        // Fetch products from the database grouped by category
        require 'db.php';
        $categories = $pdo->query("SELECT * FROM category")->fetchAll(PDO::FETCH_ASSOC);

        foreach ($categories as $category) {
            echo '<div class="mb-5">';
            echo '<div class="category-title">' . htmlspecialchars($category['category_name']) . '</div>';
            echo '<div class="row">';

            // Fetch products for this category
            $stmt = $pdo->prepare("SELECT * FROM posts WHERE category_id = ?");
            $stmt->execute([$category['id']]);
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($products)) {
                echo '<div class="col-12 text-center"><p>No products found in this category.</p></div>';
            } else {
                foreach ($products as $product) {
                    echo '<div class="col-md-3 mb-4">';
                    echo '<div class="product-card">';
                    echo '<img src="uploads/' . htmlspecialchars($product['uploads']) . '" alt="' . htmlspecialchars($product['uploads']) . '">';
                    echo '<div class="product-price">$' . htmlspecialchars($product['price']) . '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }

            echo '</div>';
            echo '</div>';
        }
        ?>
    </section>
    <section id="contact us">
    <div class="container mt-5">
    <div class="row">
        <!-- Contact Form -->
        <div class="col-md-6">
            <h2>Contact Us</h2>
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" rows="4" placeholder="Your message" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <!-- Embedded Map -->
        <div class="col-md-6">
            <h2>Our Location</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509198!2d144.9537353153164!3d-37.81627997975157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f0f0f0f%3A0x5045675218ce6e0!2sVuva%20Fashion!5e0!3m2!1sen!2sau!4v1616161616161!5m2!1sen!2sau" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <!-- FAQs Section -->
    <div class="mt-5">
        <h2>Frequently Asked Questions</h2>
        <div class="faq">
            <h5>1. What is the latest fashion trend?</h5>
            <p>The latest fashion trends include oversized clothing, vibrant colors, and sustainable materials.</p>
        </div>
        <div class="faq">
            <h5>2. How do I choose the right outfit for an occasion?</h5>
            <p>Consider the dress code, the weather, and your personal style when choosing an outfit.</p>
        </div>
        <div class="faq">
            <h5>3. Where can I find fashion inspiration?</h5>
            <p>Fashion inspiration can be found on social media platforms, fashion blogs, and magazines.</p>
        </div>
        <div class="faq">
            <h5>4. How do I take care of my clothes?</h5>
            <p>Follow the care labels, wash clothes in cold water, and avoid excessive drying to maintain their quality.</p>
        </div>
    </div>
</div>
      <section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>About Us</h5>
                    <p>Vuva is your one-stop shop for the latest trends in clothing, electronics, and accessories.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="">Home</a></li>
                        <li><a href="">Products</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <p>Email: info@vuva.com</p>
                    <p>Phone: +123 456 7890</p>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>&copy; 2025 Vuva. All rights reserved.</p>
            </div>
        </div>
    </footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>
</html>