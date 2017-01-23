<?php
$google   = get_field('google','option');
$linkedin = get_field('linkedin','option');
$facebook = get_field('facebook','option');

if($facebook): ?>
    <a href="<?php echo $facebook; ?>" aria-label="Facebook" target="_blank">
        <i class="fa fa-facebook-square" aria-hidden="true"></i></i>
    </a>
<?php endif; ?>
<?php if($linkedin): ?>
    <a href="<?php echo $linkedin; ?>" aria-label="Linkedin" target="_blank">
        <i class="fa fa-linkedin-square" aria-hidden="true"></i>
    </a>
<?php endif; ?>
<?php if($google): ?>
    <a href="<?php echo $google; ?>" aria-label="Google plus">
        <i class="fa fa-google-plus-square" aria-hidden="true" target="_blank"></i>
    </a>
<?php endif; ?>
