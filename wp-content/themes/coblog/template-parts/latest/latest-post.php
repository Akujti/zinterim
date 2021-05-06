<?php
$category = '';
if ( $category !='' ) {
	$query = array(
		'posts_per_page' => 3,
		'order' => 'DESC',
		'nopaging' => 0,
		'post_status' => 'publish',
		'ignore_sticky_posts' => 1,
	);
}else {
	$query = array(
        'posts_per_page' => 3,
		'order' => 'DESC',
		'nopaging' => 0,
		'post_status' => 'publish',
		'ignore_sticky_posts' => 1,
		'offset'=>1
	);
 }
$args = new WP_Query($query); ?>

<?php

	if ($args->have_posts()) {
	?>
	<div class="coblog-post-grid">
		<div class="container">
            <div class="coblog-post-grid-wrap">
                <?php
                while ($args->have_posts()) : $args->the_post();
                if ( has_post_thumbnail() ) {
                    $coblog_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'coblog-1140-600' );
                    $coblog_image ='style="background: url('.esc_url($coblog_src[0]).') no-repeat;background-size: cover;"'; 
                }else {
                    $coblog_image ='style="background: #333;"';
                }
                $coblog_src2 = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ),'coblog-1140-600' );
                ?>
                <div class="coblog-post-grid-item">
                    <div class="coblog-post-grid-overlay">
                        <div class="coblog-grid-overlay-img" <?php echo wp_kses_post($coblog_image);?>></div>
                        <a class="coblog-grid-link-overlay" href="<?php echo esc_url( get_permalink() ); ?>"><span class="screen-reader-text"><?php the_title(); ?></span></a>
                        <div class="coblog-grid-no-image">
                                <?php echo esc_url($coblog_src2);?>
                        </div>
                        <div class="coblog-post-grid-content">
                            <div class="coblog-post-grid-content-overlay">
                                <span class="coblog-post-grid-category"><?php echo wp_kses_post(get_the_category_list( esc_html__( 'Category', 'coblog' ), '', get_the_ID() ));?></span>
                                <h4 class="coblog-post-grid-title">
                                    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
                                </h4>
                                <div class="coblog-post-grid-meta">
                                    <?php if ( get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "" ) { ?>
                                        <?php echo esc_html__( 'By', 'coblog' );?><span class="post-grid-author"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php echo esc_attr(get_the_author_meta('first_name'));?> <?php echo esc_attr(get_the_author_meta('last_name'));?></a></span>
                                    <?php } else { ?>
                                    <?php echo esc_html__( 'By', 'coblog' );?><span class="post-grid-author"><?php the_author_posts_link() ?></span>
                                    <?php }?>
                                    <span class="coblog-post-grid-date"><time datetime="<?php esc_attr( the_time( 'c' ) ); ?>"><?php echo get_the_date(); ?></time></span>
                                </div>
                            </div> <!--/.coblog-post-grid-content-overlay-->
                        </div> <!--/.coblog-post-grid-content-->
                    </div> <!--/.coblog-post-grid-overlay-->
                </div> <!--/.coblog-post-grid-item-->
                <?php
                endwhile;
                wp_reset_postdata(); ?>
            </div> <!--/.coblog-post-grid-wrap-->
		</div> <!--/.container-->
	</div> <!--/.coblog-post-grid-->
	<?php
	}
