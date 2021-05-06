<footer class="coblog-footer coblog-footer-three">
    <div class="container">
        <div class="coblog-footer-info">
            <div class="coblog-copyrhigt">
                <div class="row">
                    <?php 
                        $coblog_footer_logo = get_theme_mod( 'footer_logo', COBLOG_URI.'/assets/images/footer-logo.png' );
                        $coblog_copyright = get_theme_mod( 'copyright', __('Created by <strong>WPesta</strong>. Powered by <strong>WordPress</strong><br> Code is Poetry.', 'coblog') );
                    ?>
                    <?php if( $coblog_copyright ) { ?>
                        <div class="coblog-copyrhigt-text col-md-6">
                            <?php echo wp_kses_post($coblog_copyright);?>
                        </div>
                    <?php } ?>
                    <?php if( $coblog_footer_logo ) { ?>
                        <div class="coblog-footer-three-img col-md-6">    
                            <img src="<?php echo esc_url($coblog_footer_logo);?>" alt="<?php esc_attr_e('payment','coblog') ?>"> 
                        </div>
                    <?php } ?>
                </div><!--/.coblog-copyright-->       
            </div><!--/.row-->
        </div><!-- .container -->
    </div><!-- .container -->
</footer>