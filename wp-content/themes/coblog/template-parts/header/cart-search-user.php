<?php 
$coblog_enable_search = get_theme_mod( 'enable_search', 1 );
$coblog_cart_search = get_theme_mod( 'cart_search', 1 );
$coblog_woo_myaccount_url = get_theme_mod( 'woo_myaccount_url' );
if($coblog_enable_search) {
    get_template_part( 'template-parts/header-search' );
} 
if (is_wc_active()) { ?>
    <?php if($coblog_woo_myaccount_url) { ?>
    <div class="coblog-user">
        <a href="<?php echo esc_url($coblog_woo_myaccount_url);?>"><span class="cb-font-user-o"></span></a>
    </div>
    <?php } ?>
    <?php if($coblog_cart_search) { ?>
    <div class="coblog-cart"> 
        <?php echo coblog_header_cart(); ?>  
    </div>
<?php } }