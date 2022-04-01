<?php
    $this->data['header'] = $this->t('errorreport_header');
    $this->includeAtTemplateBase('includes/header.php');
?>
    <div id="portalcontent" class="ui-tabs-panel ui-widget-content ui-corner-bottom" style="padding: 0 20px;">
        <h2><?php echo $this->t('errorreport_header'); ?></h2>
        <p><?php echo $this->t('errorreport_text'); ?></p>
    </div>
<?php
    $this->includeAtTemplateBase('includes/footer.php');
