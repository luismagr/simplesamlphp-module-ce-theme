<?php
$this->data['header'] = $this->t('{login:user_pass_header}');

if (strlen($this->data['username']) > 0) {
    $this->data['autofocus'] = 'password';
} else {
    $this->data['autofocus'] = 'username';
}
$this->includeAtTemplateBase('includes/header.php');

?>
    <section class="section">
        <a id="main-content" tabindex="-1"></a>
        <div class="region region--content">

            <?php
            if ($this->data['errorcode'] !== null) {
                ?>
                <div class="system-messages-wrapper" data-drupal-messages="">
                    <div role="contentinfo" aria-label="Error message" class="error">
                        <div role="alert">
                            <p><strong><?php echo $this->t('{login:error_header}'); ?></strong></p>
                            <h2 class="visually-hidden">Error message</h2>
                            <ul>
                                <li><?php echo htmlspecialchars($this->t($this->data['errorcodes']['title'][$this->data['errorcode']], $this->data['errorparams'])); ?></li>
                                <li><?php echo htmlspecialchars($this->t($this->data['errorcodes']['descr'][$this->data['errorcode']], $this->data['errorparams'])); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <div id="block-enigma-corporate-content" class="block block-enigma-corporate-content">
                <h2 class="teaser__title"><?php echo $this->t('{login:user_pass_header}'); ?></h2>
                <?php
                // <p class="logintext"><?php echo $this->t('{login:user_pass_text}'); ? ></p>
                // # Cannot translate - see https://github.com/simplesamlphp/simplesamlphp/issues/1040
                ?>
                <form action="?" method="post" name="f">
                    <div class="js-form-item form-item js-form-type-textfield form-item-name js-form-item-name">
                        <label for="username" class="js-form-required form-required"><?php echo $this->t('{login:username}'); ?></label>
                        <input id="username"
                            <?php echo ($this->data['forceUsername']) ? 'disabled="disabled"' : 'tabindex="1"'; ?>
                               type="text"
                               name="username"
                               value="<?php echo htmlspecialchars($this->data['username']); ?>"
                               autocorrect="none"
                               autocapitalize="none"
                               spellcheck="false"
                               autofocus="autofocus"
                               data-drupal-selector="edit-name"
                               aria-describedby="username--description"
                               name="name"
                               maxlength="60"
                               required="required"
                               aria-required="true" />
                        <div id="username--description" class="description">
                            Enter your Code Enigma username
                        </div>
                    </div>

                    <?php if ($this->data['rememberUsernameEnabled'] && !$this->data['forceUsername']) {
                        // display the "remember my username" checkbox
                        ?>
                        <div class="js-form-type-checkbox form-type-checkbox">
                            <label class="option">
                                <input type="checkbox"
                                       id="remember_username"
                                       tabindex="4"
                                    <?php echo ($this->data['rememberUsernameChecked']) ? 'checked="checked"' : ''; ?>
                                       name="remember_username"
                                       value="Yes"
                                       class="form-checkbox" />
                                <?php echo $this->t('{login:remember_username}'); ?></label>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="js-form-item form-item js-form-type-password form-item-pass js-form-item-pass">
                        <label for="password" class="js-form-required form-required"><?php echo $this->t('{login:password}'); ?></label>
                        <input aria-describedby="password--description"
                               type="password"
                               id="password"
                               name="password"
                               tabindex="5"
                               size="60"
                               maxlength="128"
                               required="required"
                               aria-required="true" />
                        <div id="password--description" class="description">
                            Enter your Code Enigma password
                        </div>
                    </div>

                    <?php if ($this->data['rememberMeEnabled']) {
                        // display the remember me checkbox (keep me logged in) ?>
                        <div class="js-form-type-textfield form-item-name js-form-item-name">
                            <label class="js-form-required form-required">
                                <input type="checkbox"
                                       id="remember_me"
                                       tabindex="6"
                                    <?php echo ($this->data['rememberMeChecked']) ? 'checked="checked"' : ''; ?>
                                       name="remember_me"
                                       value="Yes" />
                                <?php echo $this->t('{login:remember_me}'); ?></label>
                        </div>
                    <?php } ?>

                    <?php if (array_key_exists('organizations', $this->data)) { ?>
                        <div class="js-form-item form-item js-form-type-select form-type-select">
                            <label for="organization"><?php echo $this->t('{login:organization}'); ?></label>
                            <select name="organization" tabindex="7">
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
                        </div>
                    <?php } ?>

                    <div class="form-actions js-form-wrapper form-wrapper">
                        <button class="button js-form-submit form-submit"
                                onclick="this.value='<?php echo $this->t('{login:processing}'); ?>';
                                        this.disabled=true; this.form.submit(); return true;" tabindex="6">
                            <?php echo $this->t('{login:login_button}'); ?>
                        </button>
                    </div>
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
                        echo '<li><a href="' . htmlspecialchars($l['href']) . '">'.htmlspecialchars($this->t($l['text'])) . '</a></li>';
                    }
                    echo '</ul>';
                }
                ?>
                <p class="logintext"><a href="https://dashboard.codeenigma.net/dashboard/password-recovery">You can reset your password here.</a>
                    <br>If that does not work, or you do not know your login, please phone the Code Enigma support team at +44 (0) 20 3588 1550.</p>
            </div>
        </div>
    </section>

<?php
$this->includeAtTemplateBase('includes/footer.php');
