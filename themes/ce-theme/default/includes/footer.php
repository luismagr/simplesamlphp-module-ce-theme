<?php
if(!empty($this->data['htmlinject']['htmlContentPost'])) {
	foreach($this->data['htmlinject']['htmlContentPost'] AS $c) {
		echo $c;
	}
}
?>
	</div><!-- #content -->
	<div id="footer">
		<hr />

<!--
 		<img src="/<?php echo $this->data['baseurlpath']; ?>resources/icons/ssplogo-fish-small.png" alt="Small fish logo" style="float: right" />		
		Copyright &copy; 2007-2018 <a href="http://uninett.no/">UNINETT AS</a>
-->
<p><a href="https://dashboard.codeenigma.net/dashboard/password-recovery">If you have lost your password, visit our dashboard.</a></p>


		<span class="float-r">
			<p>Code Enigma Limited is a company registered in England and Wales with company number 7390130.<br>
			5 St John's Lane, London, EC1M 4BH<br>
			VAT Registration: GB 998 2127 74</p>
			
			<p>Code Enigma SAS est une entreprise enregistré en France au Greffe de Nîmes, SIREN 845 340 264.<br>
			Société par Actions Simplifiée au capital de 50 000,00 €.<br>
			100 Route de Nîmes, 30132 CAISSARGUES<br>
			Numèro de TVA: FR 36 845 340 264</p>
		</span>
		
		<br style="clear: right" />
	
	</div><!-- #footer -->

</div><!-- #wrap -->

</body>
</html>
