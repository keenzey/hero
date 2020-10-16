<?php
    require_once dirname(__FILE__). '/config.php';
    if(isset($_GET["s"]) && !empty($_GET["s"])){
        $squery = trim($_GET["s"]);
        $query_title = ucfirst(urldecode($squery))." - videos";
        $conurl = BASE_url."/search/?s=".urlencode(urldecode($squery)); 
    }else{
        $squery = "";
        $query_title = "Search videos";
        $conurl = BASE_url."/search/"; 
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
    <link rel="dns-prefetch" href="//images1-focus-opensocial.googleusercontent.com" />
    <link rel="dns-prefetch" href="//static.addtoany.com" />
    <title><?php echo escape_with_html($query_title); ?></title>
    <meta name="description" content="Watch free web <?php echo escape_with_html(ucfirst(urldecode($squery))); ?> videos. Online video sharing portal, fast loading page you will not waiting too long">
    <meta name="msvalidate.01" content="<?php echo BASE_bing; ?>">
    <meta name="yandex-verification" content="<?php echo BASE_yandex; ?>">
    <meta name="google-site-verification" content="<?php echo BASE_google; ?>">
    <script type="application/ld+json">
        { "@context": "http://schema.org", "@type": "WebSite", "url": "<?php echo BASE_url; ?>/", "name": <?php echo json_encode(BASE_title.BASE_title_sep.BASE_title_slog); ?>, "author": { "@type": "Person", "name": <?php echo json_encode(BASE_title); ?>, "description": <?php echo json_encode(BASE_description); ?>, "publisher": <?php echo json_encode(BASE_title); ?>, "potentialAction": { "@type": "SearchAction", "target": "<?php echo BASE_url; ?>/search/?s={search_term}", "query-input": "required name=search_term" } }
    </script>
    <link rel="canonical" href="<?php echo $conurl; ?>" />
    <link rel="stylesheet" href="<?php echo BASE_url; ?>/inc/main.css">
    <noscript><style>#preloading{display: none}</style></noscript>
</head>

<body class="bg-light">
<?php
    require_once dirname(__FILE__). '/inc/nav.php';
?>
    <div class="container min-height-62">
        <h1 class="h3 text-info"><?php echo escape_with_html($query_title); ?></h1>
        <div class="resp-container" id="top_720"></div>
        <div class="row py-2">
        <?php
            $string_s = urlencode(urldecode($squery));
            if(!empty($string_s)):
                $content = file_getcontent_with_proxy('https://www.googleapis.com/youtube/v3/search?part=snippet&fields=items(id(videoId)%2Csnippet(title))&maxResults=50&type=video&key=AIzaSyC52YskJYpueroAn_1N8IPmMu8SvcUr-KM&q='.$string_s);
                $row = json_decode($content, true);
                $kndex = 0;
                if(isset($row['items'][0]['id']['videoId'])):
                foreach($row['items'] as $item):
                        $kndex += 1;
                    ?>
                    
                    <div class="col-12 col-md-4 py-1">
                        <a href="<?php echo BASE_url; ?>/videos/watch/<?php echo trim($item['id']['videoId']);?>/">
                        <div class="d-flex align-items-center justify-content-center shadow-sm">
                            <img class="w-100" src="<?php echo BASE_url; ?>/img/iph.png" data-src="https://ytimg.googleusercontent.com/vi/<?php echo trim($item['id']['videoId']);?>/mqdefault.jpg" alt="<?php echo escape_with_html(trim($item['snippet']['title'])); ?>">
                            <div class="play-btn"></div>
                        </div>
                        </a>
                        <h2 class="h6 mt-2 bwr"><?php echo escape_with_html(trim($item['snippet']['title'])); ?></h2>
                    </div>
                    
                    <?php
                    if($kndex == 4){
                        echo '<div class="col-12 col-md-4 py-1">
                                <div class="resp-container" id="sidebar_300"></div>
                              </div>';
                    }
                        endforeach;
                else:
                ?>
                <div class="col-12 py-1">
                    <h2 class="h6 mt-2 bwr">Try Again Later. </h2>
                </div>
                <?php
                    endif;
            else:
            echo '<div class="col-12 py-1">
                <h2 class="h6 mt-2 bwr">Query Empty. </h2>
            </div>';
            endif;
            ?>
        </div>
    </div>
    <hr/>
<?php
    require_once dirname(__FILE__). '/inc/footer.php';
?>
</body>
</html>