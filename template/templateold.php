<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title><?php page_title(); ?> | <?php site_name(); ?></title>
    <link href="<?php site_url(); ?>/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php site_url(); ?>/template/vendor/bootstrap/js/bootstrap.bundle.min.js" rel="stylesheet" type="text/css" /> 
    <link href="<?php site_url(); ?>/template/style.css" rel="stylesheet" type="text/css" /> 
</head>
<body>
<header class="header">
    
    <h1><?php site_name(); ?></h1>
    <nav class="menu">
        <?php nav_menu(); ?>
    </nav>
    
</header>
<div class="wrap">
    <article>
        <?php page_content(); ?>
    </article>

    <footer>
        <small>&copy;<?php echo date('Y'); ?> <?php site_name(); ?>.<br><?php site_version(); ?></small>
    </footer>

</div>
</body>
</html>