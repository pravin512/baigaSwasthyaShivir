<?php

$html = '<!doctype html>
    <html lang="en">
    
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
            <meta name="generator" content="Hugo 0.108.0">
            <title></title>
        
            <link href="../template/assets/dist/css/bootstrap.min.css" rel="stylesheet">
        
            <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }
        
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
            }
        
            .b-example-divider {
                height: 3rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }
        
            .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
            }
        
            .bi {
                vertical-align: -.125em;
                fill: currentColor;
            }
        
            .nav-scroller {
                position: relative;
                z-index: 2;
                height: 2.75rem;
                overflow-y: hidden;
            }
        
            .nav-scroller .nav {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 1rem;
                margin-top: -1px;
                overflow-x: auto;
                text-align: center;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }
            
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }
        
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
            }
        
            .b-example-divider {
                height: 3rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }
        
            .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
            }
        
            .bi {
                vertical-align: -.125em;
                fill: currentColor;
            }
        
            .nav-scroller {
                position: relative;
                z-index: 2;
                height: 2.75rem;
                overflow-y: hidden;
            }
        
            .nav-scroller .nav {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 1rem;
                margin-top: -1px;
                overflow-x: auto;
                text-align: center;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }
            </style>
            <link href="../template/checkout.css" rel="stylesheet">
        
            
            <!-- Custom styles for this template -->
            <link href="../template/dashboard.css" rel="stylesheet">
        </head>
        <body>
        
            <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">बैगा स्वास्थ्य परीक्षण शिविर</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search"> -->
            
            <div class="navbar-nav flex-row px-3">
                <div class="nav-item">
                    <a class="nav-link" aria-current="page">
                        LoggedIn As: Admin
                    </a>
                </div>
                <div class="nav-item mx-3">
                    <a class="nav-link" aria-current="page">
                        |
                    </a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" aria-current="page" href="logout.php">
                        Logout
                    </a>
                </div>
            </div>
            </header>
            
            <div class="container-fluid">
                <div class="row">
                    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                        <div class="position-sticky pt-3 sidebar-sticky">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="#">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="#">
                                        Add User
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                        
                    </main>
                </div>
            </div>
            
            <script src="../template/assets/dist/js/bootstrap.bundle.min.js"></script>
        
            <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
        
            </script>
            <script src="../template/dashboard.js"></script>
            <script src="../template/checkout.js" ></script>
        </body>
    </html>
    ';
echo $html;
?>