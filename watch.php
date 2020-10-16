<?php
require_once dirname(__FILE__). '/config.php';
$content = file_getcontent_with_proxy('https://tube2.me/api/video/'.trim($_GET["id"]));
$row = json_decode($content, true);
$vid_title = trim($row['video']['items'][0]['snippet']['title']);
$viddesc = escape_with_html(trim(strip_tags($row['video']['items'][0]['snippet']['description'])));
$viddesc = preg_replace('~[a-z]+://\S+~','<a rel="nofollow" target="blank" href="$0">$0</a>',$viddesc);
$viddesc = preg_replace('/\r/','picassosesseessseseseseseses',$viddesc);
$viddesc = preg_replace('/\n/','picassosesseessseseseseseses',$viddesc);
$viddesc = str_replace("picassosesseessseseseseseses","<br />",$viddesc);
$vid_content = $viddesc;
$vid_desc =  escape_with_html(mb_substr( trim(strip_tags($vid_content)), 0, 143));
$vid_id = trim($row['video']['items'][0]['id']);
$vid_img = "https://i.ytimg.com/vi/".$vid_id."/hqdefault.jpg";
$vid_date = trim($row['video']['items'][0]['snippet']['publishedAt']);
$dateN = explode("T", $vid_date);
$vid_date_string = $dateN[0];
$vid_duration = trim($row['video']['items'][0]['contentDetails']['duration']);
$vid_views = trim($row['video']['items'][0]['statistics']['viewCount']);
$vid_channel = trim($row['video']['items'][0]['snippet']['channelTitle']);
$vid_likes = trim($row['video']['items'][0]['statistics']['likeCount']);
$vid_dislikes = trim($row['video']['items'][0]['statistics']['dislikeCount']);
//exit;
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
    <link rel="dns-prefetch" href="//images1-focus-opensocial.googleusercontent.com" />
    <link rel="dns-prefetch" href="//static.addtoany.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msvalidate.01" content="<?php echo BASE_bing; ?>">
    <meta name="yandex-verification" content="<?php echo BASE_yandex; ?>">
    <meta name="google-site-verification" content="<?php echo BASE_google; ?>">
    <meta charset="utf-8" />
    <title><?php echo escape_with_html($vid_title); ?></title>
    <meta name="description" content="<?php echo $vid_desc; ?>">
	<meta name="keywords" content="<?php 
    if($row['video']['items'][0]['snippet']['tags']){
        foreach($row['video']['items'][0]['snippet']['tags'] as $tahs){
            echo escape_with_html(trim($tahs)).",";
        }
    }
    ?>">
    <meta property="og:site_name" content="<?php echo escape_with_html(BASE_title); ?>">
    <meta property="og:url" content="<?php echo BASE_url; ?>/videos/watch/<?php echo $vid_id; ?>/">
    <meta property="og:title" content="<?php echo escape_with_html($vid_title); ?>">
    <meta property="og:image" content="<?php echo $vid_img; ?>">
    <meta property="og:description" content="">
    <meta name='twitter:card' content='summary_large_image' />
    <script type="application/ld+json">
        { "@context": "http://schema.org", "@type": "VideoObject", "name": <?php echo json_encode($vid_title); ?>, "description": <?php echo json_encode($vid_content); ?>, "thumbnailUrl": "<?php echo $vid_img; ?>", "uploadDate": "<?php echo $vid_date; ?>", "duration": "<?php echo $vid_duration; ?>", "contentUrl": "<?php echo BASE_url; ?>/videos/watch/<?php echo $vid_id; ?>/", "interactionCount": "<?php echo $vid_views; ?>" }
    </script>
    <link rel="canonical" href="<?php echo BASE_url; ?>/videos/watch/<?php echo $vid_id; ?>/" />
    <link rel="stylesheet" href="<?php echo BASE_url; ?>/inc/main.css">
    <noscript><style>#preloading{display: none}</style></noscript>
</head>
<body class="bg-light">
<?php
    require_once dirname(__FILE__). '/inc/nav.php';
?>
    <div class="container min-height-62" >
        <div class="resp-container" id="top_720"></div>
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="bg-white"><noscript><a href="https://www.youtube.com/watch?v=<?php echo $vid_id; ?>"><img alt="<?php echo escape_with_html($vid_title); ?>" src="<?php echo $vid_img; ?>" /></a></noscript>
                    <div id="video-player"></div>
                    <div class="p-3">
                        <h1 class="h5 video-title bwr"><?php echo escape_with_html($vid_title); ?></h1>
                        <div class="py-1 row">
                            <div class="col-12 col-md-6 my-auto"><b class="text-danger">Share this & earn $10</b></div>
                            <div class="col-12 col-md-6">
                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style"><a class="a2a_dd" href="https://www.addtoany.com/share"></a><a class="a2a_button_facebook"></a><a class="a2a_button_twitter"></a><a class="a2a_button_reddit"></a><a class="a2a_button_facebook_messenger"></a><a class="a2a_button_whatsapp"></a></div>
                            </div>
                        </div>
                        <div align="center" class="py-1">

                        </div>
                        <div class="py-1">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-2 bwr"><strong><?php echo escape_with_html($vid_channel); ?></strong><br> Published at : <?php echo $vid_date_string; ?>  </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="h-100 d-flex align-items-center justify-content-center"><a  target="_blank" rel="noopener" class="btn btn-block btn-danger bwr" href="https://www.youtube.com/watch?v=<?php echo $vid_id; ?>">Subscribe to <?php echo escape_with_html($vid_channel); ?></a></div>
                                </div>
                            </div>
                            <div class="resp-container" id="in_post_bottomads"></div>
                        </div>
                        <div class="py-1">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="text-center bg-light mb-2 p-1 bwr"><span><span class="pr-1"><svg class="svg-inline--fa fa-eye fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg></span>                                        <?php echo $vid_views; ?> views </span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="text-center bg-light p-1 bwr"><span><span class="pr-1"><svg class="svg-inline--fa fa-thumbs-up fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"></path></svg></span>                                                <?php echo escape_with_html($vid_likes); ?> </span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-center bg-light p-1 bwr"><span><span class="pr-1"><svg class="svg-inline--fa fa-thumbs-down fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M0 56v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H24C10.745 32 0 42.745 0 56zm40 200c0-13.255 10.745-24 24-24s24 10.745 24 24-10.745 24-24 24-24-10.745-24-24zm272 256c-20.183 0-29.485-39.293-33.931-57.795-5.206-21.666-10.589-44.07-25.393-58.902-32.469-32.524-49.503-73.967-89.117-113.111a11.98 11.98 0 0 1-3.558-8.521V59.901c0-6.541 5.243-11.878 11.783-11.998 15.831-.29 36.694-9.079 52.651-16.178C256.189 17.598 295.709.017 343.995 0h2.844c42.777 0 93.363.413 113.774 29.737 8.392 12.057 10.446 27.034 6.148 44.632 16.312 17.053 25.063 48.863 16.382 74.757 17.544 23.432 19.143 56.132 9.308 79.469l.11.11c11.893 11.949 19.523 31.259 19.439 49.197-.156 30.352-26.157 58.098-59.553 58.098H350.723C358.03 364.34 384 388.132 384 430.548 384 504 336 512 312 512z"></path></svg></span>                                                <?php echo escape_with_html($vid_dislikes); ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="py-1 d-md-block bwr" id="video-description"><?php echo $vid_content; ?></div>
                        <div class="d-none"><?php 
    if($row['video']['items'][0]['snippet']['tags']){
        foreach($row['video']['items'][0]['snippet']['tags'] as $tahs){
            echo "<span>".escape_with_html(trim($tahs))."</span>";
        }
    }
    ?></div>
                        <hr/>
                        <div class="py-3">
     <?php if(BASE_disqus): ?><div id="disqus_thread"></div>
                            <script>
                            var disqus_config = function () {
                                this.page.url = "<?php echo BASE_url; ?>/videos/watch/<?php echo $vid_id; ?>/";
                                this.page.vid_identifier = "<?php echo BASE_url; ?>/videos/watch/<?php echo $vid_id; ?>/";
                            };
                            
                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');

                                s.src = 'https://<?php echo BASE_disqus; ?>.disqus.com/embed.js';

                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
     <?php endif; ?>
                         </div>
                    </div>
                </div>
                <div class="position-sticky fixed-top d-md-block d-none">
                    <div align="center" class="py-2">

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
            <div class="mb-4">
                <div class="resp-container py-3" id="sidebar_300"></div>
            </div>
                <?php
                    require_once dirname(__FILE__). '/inc/side.php';
                ?>
            </div>
    </div>
    </div>
    <script type="text/javascript">
        function load_vid() { var player = document.getElementById('video-player'); player.innerHTML = labnolThumb(); player.onclick = labnolIframe; } function labnolThumb() { return '<div class="d-flex align-items-center justify-content-center"><div class="image-16by9"><img class="w-100" src="<?php echo BASE_url; ?>/img/iph.png" data-src="https://ytimg.googleusercontent.com/vi/<?php echo $vid_id; ?>/hqdefault.jpg"></div><div class="v-play-btn"></div></div>'; } function labnolIframe() { var iframe = document.createElement("iframe"); iframe.setAttribute("src", "//www.youtube-nocookie.com/embed/<?php echo $vid_id; ?>?rel=0&amp;showinfo=0"); iframe.setAttribute("frameborder", "0"); iframe.setAttribute("allowfullscreen", "1"); var div = document.createElement("div"); div.setAttribute("class", "embed-responsive embed-responsive-16by9"); div.innerHTML = iframe.outerHTML; this.parentNode.replaceChild(div, this); } load_vid()
    </script>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
<?php
    require_once dirname(__FILE__). '/inc/footer.php';
?>
</body>
</html>