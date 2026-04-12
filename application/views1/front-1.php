<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al Abrar Group of Travelers</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>front/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url()?>front/fontawesome/css/all.min.css" type="text/css" /> 
    <link rel="stylesheet" href="<?php echo base_url()?>front/css/slick.css" type="text/css" />   
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>front/css/tooplate-simply-amazed.css" type="text/css" /> -->
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f8f9fa; }
        .header {
            background: transparent;
            color: #fff;
            padding: 0;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1001;
        }
        .header:hover {
            background: rgba(0, 51, 102, 0.8);
        }
        .navbar {
            background: transparent;
            transition: background 0.3s;
        }
        .navbar.scrolled {
            background: rgba(0, 51, 102, 0.7);
        }
        .navbar-nav .nav-link { color: #fff !important; font-weight: 500; }
        .navbar-brand { font-size: 2rem; font-weight: bold; letter-spacing: 2px; }
        .main-banner {
            position: relative;
            text-align: center;
            height: 800px;
            background: #e9ecef url('<?php echo base_url()?>front/img/banner1.png') no-repeat center center fixed;
            /* background: #e9ecef url('<?php echo base_url()?>front/img/banner.jpg') no-repeat center center fixed; */
            background-size: cover;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .nav-item:hover .nav-link { color: #ffd700 !important; }
        .main-banner img.site-logo { width: 120px; margin-bottom: 20px; }
        .main-banner .site-title { font-size: 6.5rem; font-weight: bold; color: #003366; margin-bottom: 10px; }
        .main-banner .logo-row { display: flex; justify-content: center; align-items: center; gap: 30px; margin-top: 20px; }
        .main-banner .logo-row img { height: 60px; background: #fff; border-radius: 8px; padding: 5px 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); }
        .gallery-section, .packages-section { padding: 40px 0; }
        .gallery-section h2, .packages-section h2 { color: #003366; font-weight: bold; margin-bottom: 30px; }
        .gallery-images, .package-images { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
        .gallery-images img { width: 400px; height: 340px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .package-images img { width: 400px; height: auto; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .footer { background: #003366; color: #fff; padding: 30px 0 10px 0; }
        .footer .footer-links { margin-bottom: 15px; }
        .footer .footer-links a { color: #fff; margin: 0 12px; text-decoration: none; font-weight: 500; }
        .footer .footer-links a:hover { text-decoration: underline; }
        .footer .company-info { margin-bottom: 10px; }
        .footer .company-logo { width: 60px; vertical-align: middle; margin-right: 10px; }
        .footer .social-links a { color: #fff; margin: 0 8px; font-size: 1.3rem; }
        .footer .social-links a:hover { color: #ffd700; }
        @media (max-width: 768px) {
            .main-banner .site-title { font-size: 1.5rem; }
            .gallery-images img, .package-images img { width: 100px; height: 70px; }
        }
    </style>
</head>
<body>
    <!-- Header and Menu Bar -->
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Al Abrar Group of Traverlers</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" style="background: transparent;">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#packages">Packages</a></li>
                        <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="#hotels">Hotels</a></li>
                        <li class="nav-item">
                            <button class="btn btn-outline-light btn-sm mx-1" data-toggle="modal" data-target="#loginModal">Login</button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-warning btn-sm mx-1" data-toggle="modal" data-target="#registerModal">Register</button>
                        </li>
                    </header>

                    <!-- Login Modal -->
                    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo base_url(); ?>loginMe" method="post" >
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control" placeholder="email" required="required">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control" placeholder="Password" required="required">
                                        </div>
                                        <div id="loginMsg" class="text-danger mb-2"></div>
                                        <div class="form-group text-right">
                                            <input type="submit" class="btn btn-primary" value="Login">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Register Modal -->
                    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="registerForm">
                                        <div class="form-group">
                                            <label for="registerName">Name</label>
                                            <input type="text" class="form-control" id="registerName" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="registerEmail">Email address</label>
                                            <input type="email" class="form-control" id="registerEmail" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="registerPassword">Password</label>
                                            <input type="password" class="form-control" id="registerPassword" name="password" required>
                                        </div>
                                        <div id="registerMsg" class="text-danger mb-2"></div>
                                        <button type="submit" class="btn btn-success btn-block">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Banner -->
    <section class="main-banner">
        <img src="<?php echo base_url()?>front/img/31ALABRAR.jpg" alt="Company Logo" class="site-logo">
        <div class="site-title">Al Abrar Group of Travelers</div>
        <div class="logo-row">
            <img src="<?php echo base_url()?>front/img/iata.png" alt="IATA Logo">
            <span style="font-size:4.2rem; font-weight:600; color:#003366;">IATA &amp; PSA Approved</span>
            <img src="<?php echo base_url()?>front/img/psa.jpg" alt="PSA Logo">
        </div>
    </section>


    <!-- Gallery Section -->
    <section class="gallery-section" id="gallery">
        <div class="container">
            <h2>Gallery</h2>
            <div class="gallery-images">
                <?php
                    $aos = ['fade-up', 'fade-right', 'fade-left', 'zoom-in', 'flip-left', 'flip-right', 'fade-down', 'zoom-out', 'fade-up-right', 'fade-up-left', 'fade-down-right', 'fade-down-left'];
                    $i = 0;
                    foreach($images as $img) {
                    ?>
                    <img src="<?php echo base_url('assets/images/'.$img->filename); ?>" alt="Gallery Image" loading="lazy" data-aos="<?php echo $aos[$i % count($aos)]; ?>">
                    <?php $i++; } ?>
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section class="packages-section" id="packages">
        <div class="container">
            <h2>Umrah Packages</h2>
            <div class="package-images">
                <?php
                    $aos = ['fade-up', 'fade-right', 'fade-left', 'zoom-in', 'flip-left', 'flip-right', 'fade-down', 'zoom-out', 'fade-up-right', 'fade-up-left', 'fade-down-right', 'fade-down-left'];
                    $i = 0;
                    foreach($packages as $img) {
                    ?>
                    <div class="package-img-wrapper" data-aos="<?php echo $aos[$i % count($aos)]; ?>">
                        <img src="<?php echo base_url('assets/images/'.$img->filename); ?>" alt="Package Image" loading="lazy">
                        <div class="img-overlay">
                            <a href="<?php echo base_url('assets/images/'.$img->filename); ?>" target="_blank" class="zoom-btn">Zoom</a>
                        </div>
                    </div>
                        <style>
                            .package-img-wrapper {
                                position: relative;
                                display: inline-block;
                            }
                            .package-img-wrapper img {
                                display: block;
                                width: 400px;
                                height: auto;
                                object-fit: cover;
                                border-radius: 8px;
                                box-shadow: 0 2px 8px rgba(0,0,0,0.08);
                                transition: filter 0.3s;
                            }
                            .package-img-wrapper .img-overlay {
                                position: absolute;
                                top: 0; left: 0; right: 0; bottom: 0;
                                background: rgba(0,0,0,0.45);
                                color: #fff;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                opacity: 0;
                                border-radius: 8px;
                                transition: opacity 0.3s;
                                z-index: 2;
                            }
                            .package-img-wrapper:hover .img-overlay {
                                opacity: 1;
                            }
                            .package-img-wrapper:hover img {
                                filter: blur(2px) brightness(0.8);
                            }
                            .zoom-btn {
                                background: #ffd700;
                                color: #003366;
                                padding: 10px 28px;
                                border-radius: 30px;
                                font-weight: bold;
                                font-size: 1.2rem;
                                text-decoration: none;
                                box-shadow: 0 2px 8px rgba(0,0,0,0.12);
                                transition: background 0.2s, color 0.2s;
                            }
                            .zoom-btn:hover {
                                background: #003366;
                                color: #ffd700;
                            }
                        </style>
                    <?php $i++; } ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" id="contact">
        <div class="container text-center">
            <div class="footer-links">
                <a href="#contact">Contact</a>|
                <a href="#packages">Packages</a>|
                <a href="#hotels">Hotels</a>|
                <a href="#gallery">Gallery</a>
            </div>
            <div class="company-info">
                <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Company Logo" class="company-logo">
                <span>Al Abrar Group of Travelers, 123 Main Street, City, Country</span>
            </div>
            <div class="social-links">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-whatsapp"></i></a>
            </div>
            <div style="margin-top:10px; font-size:0.95rem;">&copy; 2026 Al Abrar Group of Travelers. All rights reserved.</div>
        </div>
    </footer>

        <script src="<?php echo base_url()?>front/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url()?>front/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url()?>front/js/jquery.singlePageNav.min.js"></script>
        <script src="<?php echo base_url()?>front/js/slick.js"></script>
        <script src="<?php echo base_url()?>front/js/parallax.min.js"></script>
        <script src="<?php echo base_url()?>front/js/templatemo-script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <script>
        AOS.init({ duration: 900, once: true });
        </script>

        <script>
        // Navbar background on scroll
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 50) {
                $('.navbar').addClass('scrolled');
            } else {
                $('.navbar').removeClass('scrolled');
            }
        });
        // Login form AJAX
        $(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    url: 'front.php',
                    type: 'POST',
                    data: data + '&action=login',
                    success: function(response) {
                        if(response === 'success') {
                            $('#loginMsg').removeClass('text-danger').addClass('text-success').text('Login successful!');
                            setTimeout(function(){ location.reload(); }, 1000);
                        } else {
                            $('#loginMsg').removeClass('text-success').addClass('text-danger').text(response);
                        }
                    },
                    error: function() {
                        $('#loginMsg').removeClass('text-success').addClass('text-danger').text('Server error.');
                    }
                });
            });

            // Register form AJAX
            $('#registerForm').on('submit', function(e) {
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    url: 'front.php',
                    type: 'POST',
                    data: data + '&action=register',
                    success: function(response) {
                        if(response === 'success') {
                            $('#registerMsg').removeClass('text-danger').addClass('text-success').text('Registration successful!');
                            setTimeout(function(){ location.reload(); }, 1000);
                        } else {
                            $('#registerMsg').removeClass('text-success').addClass('text-danger').text(response);
                        }
                    },
                    error: function() {
                        $('#registerMsg').removeClass('text-success').addClass('text-danger').text('Server error.');
                    }
                });
            });
        });
        </script>
    
</body>
</html>
