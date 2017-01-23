<?php
    /* Template Name: Services */
    get_header();
    get_template_part("inc/header/banner");
    $black_section  = get_field('black_section');
    $yellow_section = get_field('yellow_section');
?>

    <main class="main_wrapper">
        <section class="dual_color_screen clear">

            <?php if($yellow_section): ?>
                <div class="yellow_screen">
                    <div class="screen_inner">
                    <?php foreach($yellow_section as $section): ?>
                        <div class="screen_block">
                            <?php if($section['icon_class']): ?>
                                <div class="screen_block_outer">
                                    <div class="outer_icon">                                        
                                        <i class="fa <?php echo $section['icon_class']; ?>" aria-hidden="true"></i>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($section['content']): ?>
                                <div class="screen_block_inner">
                                    <?php if($section['title']): ?>
                                        <h3><?php echo $section['title']; ?></h3>
                                    <?php endif; ?>
                                    <?php echo $section['content']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                </div>
            <?php endif; ?>

            <?php if($black_section): ?>
                <div class="black_screen">
                    <div class="screen_inner">
                        <?php foreach($black_section as $section): ?>
                            <div class="screen_block">
                                <?php if($section['icon_class']): ?>
                                    <div class="screen_block_outer">
                                        <div class="outer_icon">
                                            <i class="fa <?php echo $section['icon_class']; ?>" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($section['content']): ?>
                                    <div class="screen_block_inner">
                                        <?php if($section['title']): ?>
                                            <h3><?php echo $section['title']; ?></h3>
                                        <?php endif; ?>
                                        <?php echo $section['content']; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

        </section>
    </main>

<?php get_footer(); ?>
