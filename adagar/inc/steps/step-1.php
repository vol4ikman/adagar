<?php $steps = get_field('steps',$args); ?>
<div class="step_container">
    <div class="step_number">
        <span>1</span>
    </div>
    <div class="step_section_content">
        <div class="step_content">
            <?php if($steps[0]['title']): ?>
                <h3><?php echo $steps[0]['title']; ?></h3>
            <?php endif; ?>
            <?php if($steps[0]['content']): ?><?php echo $steps[0]['content']; ?><?php endif; ?>
            <?php if($steps[0]['link']): ?>
                <a href="<?php echo $steps[0]['link']; ?>">קרא עוד</a>
            <?php endif; ?>
            <button class="step_button next_step" data-next="2" data-postid="<?php echo $args; ?>">מה השלב הבא?</button>
        </div>
    </div>
</div>
