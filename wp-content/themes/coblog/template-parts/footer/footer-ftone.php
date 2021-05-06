<footer class="coblog-footer coblog-footer-one">
    <div class="container">
        <div class="coblog-footer-info">
            <div class="row">
            <div class="col-md-12 text-center">
                <div class="coblog-copyrhigt">
                    <?php $coblog_footer_logo = get_theme_mod( 'footer_logo', COBLOG_URI.'/assets/images/footer-logo.png' );?>
                    <?php $coblog_copyright = get_theme_mod( 'copyright', __('Created by <strong>WPesta</strong>. Powered by <strong>WordPress</strong><br> Code is Poetry.', 'coblog') );?>
                    <?php $coblog_footer_share = get_theme_mod( 'enable_footer_share', 1 );?>
                        <div class="coblog-copyrhigt-img">    
                            <a class="coblog-logo-wrapper" href="<?php echo esc_url(home_url()); ?>">
                                <img src="<?php echo esc_url($coblog_footer_logo);?>" alt="<?php esc_attr_e('Footer Logo','coblog') ?>"> 
                            </a>
                        </div>
                        <div class="coblog-copyrhigt-text"><?php echo wp_kses_post($coblog_copyright);?></div>
                        <?php if($coblog_footer_share == 0) { ?>
                            <div class="coblog-social-icon coblog-footer-social-icon">
                                <ul>
                                <?php if( get_theme_mod( 'share_facebook', '#' ) ) { ?>
                                    <li><a class="share-facebook" href="<?php echo esc_url(get_theme_mod( 'share_facebook', '#' ));?>"><i class="cb-font-facebook"></i></a></li>
                                <?php } ?>
                                <?php if( get_theme_mod( 'share_instagram', '#' ) ) { ?>
                                    <li><a class="share-instagram" href="<?php echo esc_url(get_theme_mod( 'share_instagram', '#' ));?>"><i class="cb-font-instagram"></i></a></li>
                                <?php } ?>
                                <?php if( get_theme_mod( 'share_twitter', '#' ) ) { ?>
                                    <li><a class="share-twitter" href="<?php echo esc_url(get_theme_mod( 'share_twitter', '#' ));?>"><i class="cb-font-twitter"></i></a></li>
                                <?php } ?>
                                <?php if( get_theme_mod( 'share_linkedin', '' ) ) { ?>
                                    <li><a class="share-linkedin" href="<?php echo esc_url(get_theme_mod( 'share_linkedin', '#' ));?>"><i class="cb-font-linkedin"></i></a></li>
                                <?php } ?>
                                </ul>
                            </div><!--/.coblog-social-icon--> 
                        <?php } ?>
                    </div><!--/.coblog-copyright-->  
                </div><!--/.col-sm-5-->         
            </div><!--/.row-->
        </div><!-- .container -->
    </div><!-- .container -->
</footer>