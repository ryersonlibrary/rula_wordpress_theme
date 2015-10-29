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
        <?php if ( trim( get_theme_mod('rula-email', '' ) ) != '' ) : ?>
          Email: <a href="mailto:<?php echo get_theme_mod('rula-email') ?>" target="_blank"><span class="email"><?php echo get_theme_mod('rula-email') ?></span></a><br>
        <?php endif ?>

        <?php if ( trim( get_theme_mod('rula-phone', '' ) ) != '' ) : ?>
          Phone: <span class="phone"><?php echo get_theme_mod('rula-phone') ?></span>
        <?php endif ?>
      </p>
      <?php if ( get_theme_mod('rula-social') ) : ?>
      <div class='rula-social'>
        <h2>Social</h2>
        <p>
          <?php if ( trim( get_theme_mod('rula-twitter', '' ) ) != '' ) : ?>
            Twitter: <a href="https://twitter.com/<?php echo get_theme_mod('rula-twitter') ?>">@<span class="twitter-handle"><?php echo get_theme_mod('rula-twitter') ?></span></a><br>
          <?php endif ?>

          <?php if ( trim( get_theme_mod('rula-facebook', '' ) ) != '' ) : ?>
            Facebook: <a href="https://facebook.com/<?php echo get_theme_mod('rula-facebook') ?>"><span class="facebook-handle"><?php echo get_theme_mod('rula-facebook') ?></span></a><br>
          <?php endif ?>

          <?php if ( trim( get_theme_mod('rula-instagram', '' ) ) != '' ) : ?>
            Instagram: <a href="https://instagram.com/<?php echo get_theme_mod('rula-instagram') ?>">@<span class="instagram-handle"><?php echo get_theme_mod('rula-instagram') ?></span></a>
          <?php endif ?>
        </p>
      </div>
      <?php endif; ?>
    </div>

		<div class="site-info">
      <p>
        &copy; 2015 Ryerson University Library &amp; Archives <span class="sep"> | </span> 2nd Floor - 350 Victoria Street, Toronto, ON M5B 2K3<br>
      </p>
      <p>
        <a href="http://ryerson.ca"><img class="ryerson-logo" src="<?php bloginfo('template_directory'); ?>/img/ryerson_logo.png"></a>
        <span style="margin-left: 5px"></span>
        <a href="http://library.ryerson.ca"><img class="rula-logo" src="<?php bloginfo('template_directory'); ?>/img/rula_logo.png"></a>
      </p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php if ( get_theme_mod('rula-google-analytics-key') ) : ?>
<!-- GOOGLE ANALYTICS TRACKING CODE -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', '<?php echo get_theme_mod("rula-google-analytics-key") ?>', 'auto');
  ga('send', 'pageview');
</script>
<!-- END GOOGLE ANALYTICS TRACKING CODE -->
<?php endif; ?>
</body>
</html>
