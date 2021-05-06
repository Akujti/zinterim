<a class="coblog-logo-wrapper" href="<?php echo esc_url(home_url()); ?>">
    <?php
    $coblog_logoimg   = get_theme_mod( 'logo_img', COBLOG_URI.'/assets/images/logo.png' );
    $coblog_logotext  = get_theme_mod( 'logo_text', 'Coblog' );
    $coblog_logotype  = get_theme_mod( 'logo_type', 'logo_img' );
    switch ($coblog_logotype) {
        case 'logo_img':
        if( !empty($coblog_logoimg) ) { ?>
            <img class="coblog-logo" src="<?php echo esc_url( $coblog_logoimg ); ?>" alt="<?php esc_attr_e( 'Logo', 'coblog' ); ?>" title="<?php esc_attr_e( 'Logo', 'coblog' ); ?>">
        <?php } else { ?>
            <h1> <?php echo esc_html(get_bloginfo('name'));?> </h1>
        <?php }
        break;
        default:
        if( $coblog_logotext ) { ?>
            <h1> <?php echo esc_html( $coblog_logotext ); ?> </h1>
        <?php } else { ?>
            <h1><?php echo esc_html(get_bloginfo('name'));?> </h1>
        <?php }
        break;
    } ?>
</a>


    
       