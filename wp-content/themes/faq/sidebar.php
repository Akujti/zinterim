

<?php if ( is_front_page() && is_active_sidebar( 'frontpage-widget' ) ) {
    dynamic_sidebar( 'frontpage-widget' );
}
?>



<?php
    $sidebar_categories = get_theme_mod( 'sidebar_categories' );
    if( $sidebar_categories != '' ) {
        switch ( $sidebar_categories ) {
            case 0:
                // Do nothing. The theme already aligns the logo to the left
                break;
            case 1: ?>

<h3 class="faq-title"><?php echo __('Categories', 'faq'); ?></h3>
<?php
$faq_args = array(
  'taxonomy' => 'category',
  'show_option_none' => __('No categories found. Add Child Categories', 'faq'),
  'echo' => 1,
  'hide_empty' => 1,
  'depth' => 0,
  'wrap_class' => '',  // ul class
  'level_class' => '',  // list class
  'current_class' => 'active'
);
custom_list_categories( $faq_args );
?>

            <?php  break;
        }
    }
?>






<?php
if ( is_active_sidebar( 'sidebar-primary' ) ) :
dynamic_sidebar('sidebar-primary');
endif;
 ?>



