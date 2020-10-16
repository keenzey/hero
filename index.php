<?php
/* source api
 https://youtube-dl-mp4.blogspot.com/search/label/EaXci0EnhPo
https://tube2.me/api/video/dIU8vBmwt3s  video api
https://tube2.me/api/index  video list api



youtube 

category search 
https://www.googleapis.com/youtube/v3/search?part=snippet&order=viewCount&publishedAfter=2020-10-08T00%3A00%3A00Z&maxResults=50&type=video&videoCategoryId=15&videoEmbeddable=true&key=AIzaSyC52YskJYpueroAn_1N8IPmMu8SvcUr-KM

video related search 
https://www.googleapis.com/youtube/v3/search?part=snippet&relatedToVideoId=A0G-B8BIEhs&maxResults=50&type=video&key=AIzaSyC52YskJYpueroAn_1N8IPmMu8SvcUr-KM


keyword search

'https://www.googleapis.com/youtube/v3/search?part=snippet&fields=items(id(videoId)%2Csnippet(title))&maxResults=50&order=viewCount&publishedAfter='.$searchdate.'T00%3A00%3A00Z&regionCode=US&type=video&key=AIzaSyC52YskJYpueroAn_1N8IPmMu8SvcUr-KM&q='.$string_s




*/
    require_once dirname(__FILE__). '/config.php';
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
    <title><?php echo escape_with_html(BASE_title); ?></title>
    <meta name="description" content="<?php echo escape_with_html(BASE_description); ?>">
    <meta name="msvalidate.01" content="<?php echo BASE_bing; ?>">
    <meta name="yandex-verification" content="<?php echo BASE_yandex; ?>">
    <meta name="google-site-verification" content="<?php echo BASE_google; ?>">
    <script type="application/ld+json">
        { "@context": "http://schema.org", "@type": "WebSite", "url": "<?php echo BASE_url; ?>/", "name": <?php echo json_encode(BASE_title.BASE_title_sep.BASE_title_slog); ?>, "author": { "@type": "Person", "name": <?php echo json_encode(BASE_title); ?>, "description": <?php echo json_encode(BASE_description); ?>, "publisher": <?php echo json_encode(BASE_title); ?>, "potentialAction": { "@type": "SearchAction", "target": "<?php echo BASE_url; ?>/search/?s={search_term}", "query-input": "required name=search_term" } }
    </script>
    <link rel="canonical" href="<?php echo BASE_url; ?>/" />
    <link rel="stylesheet" href="<?php echo BASE_url; ?>/inc/main.css">
    <noscript><style>#preloading{display: none}</style></noscript>
</head>

<body class="bg-light">
<?php
    require_once dirname(__FILE__). '/inc/nav.php';
?>
    <div class="container min-height-62">
        <h1 class="h3 text-info">Trending</h1>
        <div class="resp-container" id="top_720"></div>
        <div class="row py-2">
        <?php  
            $f_contents = file(dirname(__FILE__)."/eng.txt"); 
            $line1 = $f_contents[rand(0, count($f_contents) - 1)];
            $line2 = $f_contents[rand(0, count($f_contents) - 1)];
            $line3 = $f_contents[rand(0, count($f_contents) - 1)];
            $line4 = $f_contents[rand(0, count($f_contents) - 1)];
            $line5 = $f_contents[rand(0, count($f_contents) - 1)];
            $string_s = trim($line1)."|".trim($line2);   //."|".trim($line2)."|".trim($line3)."|".trim($line4)."|".trim($line5);
            $string_s = urlencode($string_s);
            $now_dateforid = strtotime (date ('Y-m-d H:i:s')); // the current date ,
            $diffforid = $now_dateforid - 604880;
            $searchdate = date('Y-m-d',$diffforid);
            $content = file_getcontent_with_proxy('https://tube2.me/api/index');
            $row = json_decode($content, true);
            $kndex = 0;
            foreach($row as $cat):
            shuffle($cat['items']);
            $zndex = 0;
            foreach($cat['items'] as $item):
            $kndex += 1;
        ?>
        
        <div class="col-12 col-md-4 py-1">
            <a href="<?php echo BASE_url; ?>/videos/watch/<?php echo trim($item['id']);?>/">
            <div class="d-flex align-items-center justify-content-center shadow-sm">
                <img class="w-100" src="<?php echo BASE_url; ?>/img/iph.png" data-src="https://ytimg.googleusercontent.com/vi/<?php echo trim($item['id']); ?>/mqdefault.jpg" alt="<?php echo escape_with_html(trim($item['snippet']['title'])); ?>">
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
        if($zndex == 5){
            break;
        }
        $zndex += 1;
			endforeach;
            endforeach;
		?>
        </div>
    </div>
    <hr/>
<?php
    require_once dirname(__FILE__). '/inc/footer.php';
?>
</body>
</html>