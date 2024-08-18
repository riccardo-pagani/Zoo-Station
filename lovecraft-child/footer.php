		</main><!-- #site-content -->

		<?php if ( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) ) : ?>

			<footer class="footer section big-padding bg-white">
				<div class="section-inner group">

					<?php if ( is_active_sidebar( 'footer-one' ) ) : ?>
						<div class="widgets"><?php dynamic_sidebar( 'footer-one' ); ?></div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-two' ) ) : ?>
						<div class="widgets"><?php dynamic_sidebar( 'footer-two' ); ?></div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-three' ) ) : ?>
						<div class="widgets"><?php dynamic_sidebar( 'footer-three' ); ?></div>
					<?php endif; ?>

				</div><!-- .section-inner -->
			</footer><!-- .footer.section -->

		<?php endif; ?>

		<div class="section-inner credits section bg-dark" id="foot">

			<div class="credits-inner section-inner legals">

				<p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> "Zoo Station: some footnotes." - All Rights Reserved | <a href="/privacy-policy/">Privacy Policy</a> | <a href="/cookie-policy/">Cookie Policy</a> | <a href="/terms-and-conditions/">Terms and Conditions</a> | <a href="/disclaimer/">Disclaimer</a></p>
				<!-- <p>───</p> -->
				<div class="foot-icons">
					<a id="ft-pint" class="zs-social" target=”_blank” href="https://www.pinterest.com/cf_zoostation"><img src="/wp-content/themes/lovecraft-child/assets/images/icons/icons8-pinterest.svg"  width="30" height="30"></a>
					<span>&nbsp;</span><a id="ft-inst" class="zs-social" target=”_blank” href="https://www.instagram.com/cf.zoostation"><img src="/wp-content/themes/lovecraft-child/assets/images/icons/icons8-instagram.svg"  width="30" height="30"></a>
					<span>&nbsp;</span><a id="ft-lnkd" class="zs-social" target=”_blank” href="#"><img src="/wp-content/themes/lovecraft-child/assets/images/icons/icons8-linkedin.svg"  width="30" height="30"></a>
					<span>&nbsp;</span><a id="ft-rss" class="zs-social" target=”_blank” href="/feed/"><img src="/wp-content/themes/lovecraft-child/assets/images/icons/rss-svgrepo.svg"  width="28" height="28"></a>
				</div>
				<!-- <p>
					Il sito cf-zoostation.net non rappresenta una testata giornalistica, in quanto viene aggiornato senza alcuna periodicità. Non può pertanto essere considerato un prodotto editoriale ai sensi della L. 62 del 7/3/2001.
				</p> -->
			</div><!-- .section-inner -->

		</div><!-- .credits.section -->

		<?php wp_footer(); ?>

	</body>
</html>
