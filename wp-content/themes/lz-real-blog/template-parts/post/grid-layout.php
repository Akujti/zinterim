<?php
/**
 * Template part for displaying posts
 * 
 * @subpackage lz-real-blog
 * @since 1.0
 * @version 1.4
 */

?>

<div class="col-lg-4 col-md-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="article_content">
      <?php the_post_thumbnail(); ?>
      <div class="article-text">
        <h3><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title();?><span class="screen-reader-text"><?php the_title();?></span></a></h3>
        <div class="metabox">
          <i class="far fa-calendar-alt"></i><span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
          <i class="fas fa-user"></i><span class="entry-author"><?php the_author(); ?></span>
          <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comments','lz-real-blog'), __('0 Comments','lz-real-blog'), __('% Comments','lz-real-blog') ); ?></span>
  	    </div>
        <p><?php $excerpt = get_the_excerpt();
          echo esc_html( lz_real_blog_string_limit_words( $excerpt,50 ) ); ?></p>
        <div class="blog-icon">
          <a href="<?php echo esc_url( LZ_REAL_BLOG_FACEBOOK ); ?><?php the_permalink(); ?>" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','lz-real-blog' );?></span></a>
          <a href="<?php echo esc_url( LZ_REAL_BLOG_TWITTER ); ?><?php the_permalink(); ?>" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twiter','lz-real-blog' );?></span></a>
          <a href="<?php echo esc_url( LZ_REAL_BLOG_LINKDIN ); ?><?php the_permalink(); ?>" target="_blank"><i class="fab fa-linkedin-in" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','lz-real-blog' );?></span></a>
          <a href="<?php echo esc_url( LZ_REAL_BLOG_INSTAGRAM ); ?><?php the_permalink(); ?>" target="_blank"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','lz-real-blog' );?></span></a> 
          <a href="<?php echo esc_url( LZ_REAL_BLOG_PINTREST ); ?><?php the_permalink(); ?>" target="_blank"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php esc_html_e( 'Pinterest','lz-real-blog' );?></span></a>
        </div> 
        <div class="read-btn">
          <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small"><?php esc_html_e('READ MORE','lz-real-blog'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE', 'lz-real-blog' ); ?></span>
          </a>
        </div>
    	</div>
    	<hr class="horizontal">
      <div class="clearfix"></div> 
    </div>
  </article>
</div>