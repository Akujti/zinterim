<ul>
    <?php if( get_theme_mod( 'share_facebook', '#' ) ) { ?>
        <li><a href="<?php echo esc_url(get_theme_mod( 'share_facebook', '#' ));?>"><i class="cb-font-facebook"></i></a></li>
    <?php } ?>
    <?php if( get_theme_mod( 'share_instagram', '#' ) ) { ?>
        <li><a href="<?php echo esc_url(get_theme_mod( 'share_instagram', '#' ));?>"><i class="cb-font-instagram"></i></a></li>
    <?php } ?>
    <?php if( get_theme_mod( 'share_twitter', '#' ) ) { ?>
        <li><a href="<?php echo esc_url(get_theme_mod( 'share_twitter', '#' ));?>"><i class="cb-font-twitter"></i></a></li>
    <?php } ?>
    <?php if( get_theme_mod( 'share_linkedin', '' ) ) { ?>
        <li><a href="<?php echo esc_url(get_theme_mod( 'share_linkedin', '#' ));?>"><i class="cb-font-linkedin"></i></a></li>
    <?php } ?>
</ul>

              