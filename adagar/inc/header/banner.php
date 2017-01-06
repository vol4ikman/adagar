<?php
    $cover_image          = get_field('cover_image');
    //$cover_image['url'] = 'https://unsplash.it/1920/400/?random';
    $cover_style          = isset($cover_image) ? 'style="background-image:url('.$cover_image['url'].')"' : '';
    $h1_page_title        = get_field('h1_page_title');
?>
<section class="header_banner section">
    <div class="header_banner_wrapper" <?php echo $cover_style; ?>>
        <?php if($h1_page_title): ?>
            <div class="header_banner_title">
                <div class="wrapper">
                    <h1><?php echo $h1_page_title; ?></h1>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
