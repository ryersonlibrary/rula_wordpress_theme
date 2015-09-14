<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package underscores
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="footer-menu">
      <h1>Get in touch</h1>

      <?php if ( trim( get_theme_mod('rula-address', '' ) ) != '' ) : ?>
      <h2>Address</h2>
      <p class="address">
        <?php echo( get_theme_mod('rula-address') ) ?>
      </p>
      <?php endif ?>

      <h2>Contact</h2>
      <p>
        Email: <a href="mailto:<?php echo get_theme_mod('rula-email') ?>" target="_blank"><span class="email"><?php echo get_theme_mod('rula-email') ?></span></a><br>
        Phone: <span class="phone"><?php echo get_theme_mod('rula-phone') ?></span>
      </p>
      <?php if ( get_theme_mod('rula-social') ) : ?>
      <div class='rula-social'>
        <h2>Social</h2>
        <p>
          Twitter: <a href="https://twitter.com/<?php echo get_theme_mod('rula-twitter') ?>">@<span class="twitter-handle"><?php echo get_theme_mod('rula-twitter') ?></span></a><br>
          Facebook: <a href="https://facebook.com/<?php echo get_theme_mod('rula-facebook') ?>"><span class="facebook-handle"><?php echo get_theme_mod('rula-facebook') ?></span></a><br>
          Instagram: <a href="https://instagram.com/<?php echo get_theme_mod('rula-instagram') ?>">@<span class="instagram-handle"><?php echo get_theme_mod('rula-instagram') ?></span></a>
        </p>
      </div>
      <?php endif; ?>
    </div>

		<div class="site-info">
      <p>
        &copy; 2015 Ryerson University Library &amp; Archives <span class="sep"> | </span> 2nd Floor - 350 Victoria Street, Toronto, ON M5B 2K3<br>
      </p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
