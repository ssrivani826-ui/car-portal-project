<?php include "config/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Car Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>

/* BODY */
body{
    font-family:'Poppins', sans-serif;
    background:#0b0f1a;
    color:#e2e8f0;
}

/* TOP BAR */
.topbar{
    background:#070a13;
    color:#cbd5e1;
    padding:8px 0;
    font-size:14px;
}
.topbar i{
    color:#ff4d6d;
}

/* LOGIN BUTTON */
.login-btn{
    background: linear-gradient(45deg,#ff4d6d,#7c3aed);
    color:white !important;
    padding:6px 16px;
    border-radius:25px;
    font-size:13px;
    font-weight:500;
}
.login-btn:hover{
    transform:scale(1.05);
}

/* SOCIAL */
.topbar a{
    color:#cbd5e1;
    margin-left:12px;
}
.topbar a:hover{
    color:#ff4d6d;
}

/* NAVBAR */
.navbar{
    background:#0f172a;
    box-shadow:0 5px 20px rgba(0,0,0,0.4);
}
.navbar-brand{
    font-family:'Playfair Display', serif;
    font-size:26px;
    color:#c4b5fd !important;
}
.nav-link{
    color:#cbd5e1 !important;
}
.nav-link:hover{
    color:#ff4d6d !important;
}

/* HERO */
.hero{
    height:80vh;
    background: linear-gradient(rgba(11,15,26,0.8),rgba(11,15,26,0.9)),
    url('assets/images/cars/Fortuner.jpg') center/cover no-repeat;
    display:flex;
    align-items:center;
    padding-left:10%;
}
.hero-content{
    background:rgba(15,23,42,0.7);
    padding:40px;
    border-radius:12px;
}
.hero h1{
    font-family:'Playfair Display';
    font-size:50px;
    color:#c4b5fd;
}

/* BUTTON */
.btn-main{
    background: linear-gradient(45deg,#ff4d6d,#7c3aed);
    color:white;
    border:none;
    padding:10px 25px;
    border-radius:30px;
}
.btn-main:hover{
    transform:scale(1.05);
}

/* SECTION */
.section-title{
    text-align:center;
    margin:50px 0 30px;
    font-family:'Playfair Display';
    color:#c4b5fd;
}

/* CARDS */
.card{
    background:#0f172a;
    border:1px solid rgba(255,255,255,0.05);
    border-radius:12px;
    transition:0.3s;
}
.card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(124,58,237,0.3);
}
.card img{
    height:220px;
    object-fit:cover;
}

/* Fix car name color */
.card-body h5 {
    color: #c4b5fd;
    font-weight: 600;
    margin-bottom: 10px;
}

.price{
    color:#ff4d6d;
    font-weight:600;
}

/* CUSTOM BUTTON */
.btn-view{
    border:1px solid #7c3aed;
    color:#c4b5fd;
    transition: background-color 0.3s, color 0.3s;
}
.btn-view:hover{
    background:#7c3aed;
    color:white;
}

/* FEATURES */
.feature-box{
    text-align:center;
    padding:20px;
}
.feature-box i{
    font-size:30px;
    color:#7c3aed;
}

/* FOOTER */
footer{
    background:#070a13;
    color:#94a3b8;
    text-align:center;
    padding:20px;
}

/* MOBILE */
@media(max-width:768px){
    .topbar{
        text-align:center;
    }
}

</style>
</head>

<body>

<!-- TOP BAR -->
<div class="topbar">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">

        <div>
            <i class="fas fa-phone"></i> +91 9876543210
            <span class="ms-3"><i class="fas fa-envelope"></i> info@carportal.com</span>
        </div>

        <div class="d-flex align-items-center">
            <a href="admin/login.php" class="login-btn me-3">
                <i class="fas fa-user"></i> Login
            </a>

            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>

    </div>
</div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg px-4">
    <a class="navbar-brand" href="#">CarPortal</a>

    <button class="navbar-toggler bg-light" data-bs-toggle="collapse" data-bs-target="#menu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#cars">Cars</a></li>
        </ul>
    </div>
</nav>

<!-- HERO -->
<div class="hero">
    <div class="hero-content">
        <h1>Drive Into the Future</h1>
        <p>Discover premium cars with modern technology</p>
        <a href="#cars" class="btn-main">Explore Cars</a>
    </div>
</div>

<!-- CARS -->
<div class="container" id="cars">
    <h2 class="section-title">Featured Cars</h2>
    <div class="row">
    <?php
    $result = $conn->query("SELECT * FROM cars LIMIT 6");
    while($row = $result->fetch_assoc()){
    ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="assets/images/cars/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                <div class="card-body text-center">
                    <h5><?= htmlspecialchars($row['name']) ?></h5>
                    <p class="price">₹<?= number_format($row['price']) ?></p>
                    <a href="view_car.php?id=<?= intval($row['id']) ?>" class="btn btn-view btn-sm">View</a>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>

<!-- FEATURES -->
<div class="container">
    <h2 class="section-title">Why Choose Us</h2>
    <div class="row">
        <div class="col-md-3"><div class="feature-box"><i class="fas fa-gem"></i><p>Premium Quality</p></div></div>
        <div class="col-md-3"><div class="feature-box"><i class="fas fa-shield"></i><p>Secure Deals</p></div></div>
        <div class="col-md-3"><div class="feature-box"><i class="fas fa-car"></i><p>Luxury Cars</p></div></div>
        <div class="col-md-3"><div class="feature-box"><i class="fas fa-headset"></i><p>24/7 Support</p></div></div>
    </div>
</div>

<!-- FOOTER -->
<footer>
    <p>© 2026 CarPortal | Modern Experience</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>