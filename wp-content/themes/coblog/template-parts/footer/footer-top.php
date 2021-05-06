<?php if( coblog_is_active_footer_sidebar() ): ?>
<div class="coblog-top-footer">
    <div class="container">
        <div class="footer-widget-wrap">
            <div class="row">
                <?php
                    $coblog_column = get_theme_mod( 'ft_column', 4 );	
                    for( $i = 1; $i <= 4; $i++ ){
                        ?>
                            <?php if ( is_active_sidebar( 'coblog-footer-sidebar-'.$i ) ) : ?>
                                <div class="col-lg-<?php echo esc_attr($coblog_column);?> col-sm-12 footer-widget-item">
                                <?php dynamic_sidebar( 'coblog-footer-sidebar-'.$i ); ?>
                                </div>
                            <?php endif; ?>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
