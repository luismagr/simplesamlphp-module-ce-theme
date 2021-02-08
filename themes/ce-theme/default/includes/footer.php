<?php
if(!empty($this->data['htmlinject']['htmlContentPost'])) {
	foreach($this->data['htmlinject']['htmlContentPost'] AS $c) {
		echo $c;
	}
}
?>
          </section>
        </article>
	  </main><!-- #content -->

	  <footer>
		<div class="footer__top">
			<div id="block-copyrightblock">
			&copy; Code Enigma, <?php echo date("Y"); ?>
			</div>
		</div>
		<div class="footer__middle flex-row bg-arches">
			<div class="footer__middle-left">
			</div>
			<div class="footer__middle-right">
			</div>
		</div>
		<div class="footer__bottom flex-row">
			<div class="footer__bottom--link">
			<a href="https://www.codeenigma.com/contact-us">Contact Code Enigma</a>
			</div>
			<div class="footer__bottom--link">
			<a href="https://www.codeenigma.com/about-us/legal">Legal</a>
			</div>
		</div>
	  </footer>
	</div><!-- #wrapper -->
  </body>
</html>
