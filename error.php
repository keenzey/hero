<?php
require_once dirname(__FILE__). '/config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
    <meta name="robots" content="noindex,follow">
    <title>404</title>
    <meta name="description" content="<?php echo escape_with_html(BASE_description); ?>">
    <meta name="msvalidate.01" content="<?php echo BASE_bing; ?>">
    <meta name="yandex-verification" content="<?php echo BASE_yandex; ?>">
    <meta name="google-site-verification" content="<?php echo BASE_google; ?>">
    <link rel="stylesheet" href="<?php echo BASE_url; ?>/inc/main.css">
    <noscript><style>#preloading{display: none}</style></noscript>
</head>

<body class="bg-light">
<?php
    require_once dirname(__FILE__). '/inc/nav.php';
?>
    <div class="container min-height-62">
        <h1 class="h3 text-info">404 not found</h1>
        <div class="resp-container" id="top_720"></div>
        <div class="col m-auto" style="max-width: 700px;">
<img class="w-100" src="<?php echo BASE_url; ?>/img/err.png">
        </div>
    </div>
    <hr/>
<?php
    require_once dirname(__FILE__). '/inc/footer.php';
?>
</body>
</html>