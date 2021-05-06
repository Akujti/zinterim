<?php $coblog_number = get_theme_mod( 'contact_number', '(123)456 7890' ); ?>
<?php $coblog_email = get_theme_mod( 'email', 'demo@coblog.com' ); ?>
<?php if($coblog_number) { ?>
    <span><i class="cb-font-phone"></i><?php echo esc_attr($coblog_number);?></span>
<?php } ?>
<?php if($coblog_email) { ?>
    <span><i class="cb-font-mail-alt"></i><?php echo esc_attr($coblog_email);?></span>
<?php } ?>
