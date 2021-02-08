<?php
$this->data['header'] = $this->t('{linotp2:device:authenticate}');
$this->data['autofocus'] = 'otp';

$this->includeAtTemplateBase('includes/header.php');
?>
          <div class="teaser teaser__full-width">
            <div class="teaser__image">
              <img role="presentation" src="<?php echo SimpleSAML\Module::getModuleURL("ce-theme/images/hosting.jpg"); ?>" width="590" height="443" alt="" typeof="foaf:Image">
            </div>

            <div class="teaser__text">
              <h2 class="teaser__title"><?php echo $this->t('{linotp2:device:authenticate}'); ?></h2>

              <form action="?" method="post" name="f">
                <p><?php echo $this->t('{linotp2:otp:intro}'); ?></p>
                <p>
                  <input id="otp" type="text" tabindex="2" name="otp"
                    style="border: 1px solid #ccc; background: #eee; padding: .5em; font-size: medium; width: 70%;
                         color: #000" />
                </p>
<?php
foreach ($this->data['params'] as $name => $value) {
    echo('<input type="hidden" name="'.htmlspecialchars($name).'" value="'.htmlspecialchars($value).'" />');
}
if ($this->data['error']) {
?>
                <div class="caution"><!-- style="border-left: 1px solid #e8e8e8; border-bottom: 1px solid #e8e8e8; background: #f5f5f5">-->
                    <h5><?php echo $this->t('{login:error_header}'); ?></h5>
                    <p><?php echo $this->data['error']; ?></p>
                </div>
<?php
}
?>
                <p><button type="submit" class="button"><?php echo $this->t('{linotp2:otp:submitbutton}'); ?></button></p>
              </form>
            </div>
          </div>

          <div class="call-to-action">
            <div class="call-to-action">
              <div class="block-get-in-touch">
                <p>If you do not have a YubiKey, or have never configured a 2FA device for use with Code Enigma services,
                <a href="https://redmine.codeenigma.net">contact support</a>.</p>
              </div>
            </div>
          </div>

<?php
$this->includeAtTemplateBase('includes/footer.php');
