<?php
$this->data['header'] = $this->t('{login:user_pass_header}');

if (strlen($this->data['username']) > 0) {
    $this->data['autofocus'] = 'password';
} else {
    $this->data['autofocus'] = 'username';
}
$this->includeAtTemplateBase('includes/header.php');

?>

<?php
if ($this->data['errorcode'] !== null) {
    ?>
    <div style="border-left: 1px solid #e8e8e8; border-bottom: 1px solid #e8e8e8; background: #f5f5f5">
        <img src="/<?php echo $this->data['baseurlpath']; ?>resources/icons/experience/gtk-dialog-error.48x48.png"
             class="float-l erroricon" style="margin: 15px" alt=""/>

        <h2><?php echo $this->t('{login:error_header}'); ?></h2>

        <p><strong><?php
            echo htmlspecialchars($this->t($this->data['errorcodes']['title'][$this->data['errorcode']], $this->data['errorparams'])); ?></strong></p>

        <p><?php
            echo htmlspecialchars($this->t($this->data['errorcodes']['descr'][$this->data['errorcode']], $this->data['errorparams'])); ?></p>
    </div>
<?php
}

?>
          <div class="teaser teaser__full-width">
            <div class="teaser__image">
              <img role="presentation" src="<?php echo SimpleSAML\Module::getModuleURL("ce-theme/images/hosting.jpg"); ?>" width="590" height="443" alt="" typeof="foaf:Image">
            </div>

            <div class="teaser__text">
              <h2 class="teaser__title"><?php echo $this->t('{login:user_pass_header}'); ?></h2>
              <p class="logintext"><?php echo $this->t('{simplesamlphp-module-ce-theme:login:user_pass_text}'); ?></p>
              <form action="?" method="post" name="f">
                <table>
                  <tr>
                    <!-- <td rowspan="2" class="loginicon">
                      <img alt=""
                      src="/<?php echo $this->data['baseurlpath']; ?>resources/icons/experience/gtk-dialog-authentication.48x48.png" />
                    </td> -->
                    <td rowspan="2">&nbsp;</td>
                    <td><label for="username"><?php echo $this->t('{login:username}'); ?></label></td>
                    <td>
                      <input id="username" <?php echo ($this->data['forceUsername']) ? 'disabled="disabled"' : ''; ?>
                           type="text" name="username"
<?php
if (!$this->data['forceUsername']) {
    echo 'tabindex="1"';
} ?> value="<?php echo htmlspecialchars($this->data['username']); ?>"/>
                    </td>
<?php
if ($this->data['rememberUsernameEnabled'] && !$this->data['forceUsername']) {
    // display the "remember my username" checkbox
?>
                    <td id="regular_remember_username">
                      <input type="checkbox" id="remember_username" tabindex="4"
                           <?php echo ($this->data['rememberUsernameChecked']) ? 'checked="checked"' : ''; ?>
                           name="remember_username" value="Yes"/>
                      <small><?php echo $this->t('{login:remember_username}'); ?></small>
                    </td>
<?php
}
?>
                  </tr>
<?php
if ($this->data['rememberUsernameEnabled'] && !$this->data['forceUsername']) {
    // display the "remember my username" checkbox
?>
                  <tr id="mobile_remember_username">
                    <td>&nbsp;</td>
                    <td>
                      <input type="checkbox" id="remember_username" tabindex="4"
                        <?php echo ($this->data['rememberUsernameChecked']) ? 'checked="checked"' : ''; ?>
                           name="remember_username" value="Yes"/>
                      <small><?php echo $this->t('{login:remember_username}'); ?></small>
                    </td>
                  </tr>
<?php
}
?>
                  <tr>
                    <td><label for="password"><?php echo $this->t('{login:password}'); ?></label></td>
                    <td>
                      <input id="password" type="password" tabindex="2" name="password"/>
                    </td>
            <?php
if ($this->data['rememberMeEnabled']) {
    // display the remember me checkbox (keep me logged in)
?>
                    <td id="regular_remember_me">
                      <input type="checkbox" id="remember_me" tabindex="5"
                        <?php echo ($this->data['rememberMeChecked']) ? 'checked="checked"' : ''; ?>
                           name="remember_me" value="Yes"/>
                      <small><?php echo $this->t('{login:remember_me}'); ?></small>
                    </td>
<?php
}
?>
                  </tr>
<?php
if ($this->data['rememberMeEnabled']) {
    // display the remember me checkbox (keep me logged in)
?>
                  <tr>
                    <td></td>
                    <td id="mobile_remember_me">
                      <input type="checkbox" id="remember_me" tabindex="5"
                        <?php echo ($this->data['rememberMeChecked']) ? 'checked="checked"' : ''; ?>
                           name="remember_me" value="Yes"/>
                      <small><?php echo $this->t('{login:remember_me}'); ?></small>
                    </td>
                  </tr>
<?php
}

if (array_key_exists('organizations', $this->data)) {
?>
                  <tr>
                    <td></td>
                    <td><label for="organization"><?php echo $this->t('{login:organization}'); ?></label></td>
                    <td>
                      <select name="organization" tabindex="3">
<?php
if (array_key_exists('selectedOrg', $this->data)) {
    $selectedOrg = $this->data['selectedOrg'];
} else {
    $selectedOrg = null;
}

foreach ($this->data['organizations'] as $orgId => $orgDesc) {
    if (is_array($orgDesc)) {
        $orgDesc = $this->t($orgDesc);
    }

    if ($orgId === $selectedOrg) {
        $selected = 'selected="selected" ';
    } else {
        $selected = '';
    }

    echo '<option '.$selected.'value="'.htmlspecialchars($orgId).'">'.htmlspecialchars($orgDesc).'</option>';
}
?>
                      </select>
                    </td>
                  </tr>
<?php
}
?>
                  <tr id="submit">
                    <td class="loginicon"></td><td></td>
                    <td>
                      <button class="button"
                                onclick="this.value='<?php echo $this->t('{login:processing}'); ?>';
                                    this.disabled=true; this.form.submit(); return true;" tabindex="6">
                            <?php echo $this->t('{login:login_button}'); ?>
                      </button>
                    </td>
                  </tr>
                </table>
<?php
foreach ($this->data['stateparams'] as $name => $value) {
    echo('<input type="hidden" name="'.htmlspecialchars($name).'" value="'.htmlspecialchars($value).'" />');
}
?>
              </form>
<?php
if (!empty($this->data['links'])) {
    echo '<ul class="links" style="margin-top: 2em">';
    foreach ($this->data['links'] as $l) {
        echo '<li><a href="'.htmlspecialchars($l['href']).'">'.htmlspecialchars($this->t($l['text'])).'</a></li>';
    }
    echo '</ul>';
}
?>
            </div>
          </div>

          <div class="call-to-action">
            <div class="call-to-action">
              <div class="block-get-in-touch">
                <!-- <h2 class="logintext"><?php echo $this->t('{login:help_header}'); ?></h2>
                <p class="logintext"><?php echo $this->t('{ce-theme:login:help_text}'); ?></p>
                # Temporarily hardcoding this message, as dictionary won't load: -->
                <p class="logintext" style="font-size:22px;"><a href="https://dashboard.codeenigma.net/dashboard/password-recovery">You can reset your password here.</a>
                If that does not work, or you do not know your login, please phone the Code Enigma support team at +44 (0) 20 3588 1550.</p>
              </div>
            </div>
          </div>
<?php
$this->includeAtTemplateBase('includes/footer.php');

