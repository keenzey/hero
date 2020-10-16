<?php foreach($row['related']['items'] as $item): ?>
    <div class="mb-4">
        <a href="<?php echo BASE_url; ?>/videos/watch/<?php echo trim($item['id']['videoId']); ?>/">
        <div class="d-flex align-items-center justify-content-center shadow-sm"><img class="w-100" src="<?php echo BASE_url; ?>/img/iph.png" data-src="https://ytimg.googleusercontent.com/vi/<?php echo trim($item['id']['videoId']); ?>/mqdefault.jpg" alt="<?php echo escape_with_html(trim($item['snippet']['title'])); ?>">
        <div class="play-btn"></div></div>
        </a>
        <h2 class="h6 mt-2 bwr"><?php echo escape_with_html(trim($item['snippet']['title'])); ?></h2>
    </div>
<?php
    endforeach;
?>
