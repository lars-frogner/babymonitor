<?php
require_once(dirname(__DIR__) . '/config/site_config.php');
redirectIfLoggedOut('index.php');
require_once(SRC_DIR . '/settings.php');

$mode = readCurrentMode($_DATABASE);

$setting_type = 'system';
$table_name = $setting_type . '_settings';
if (isset($_POST['submit'])) {
  $settings_edited = true;
  unset($_POST['submit']);
  updateValuesInTable($_DATABASE, $table_name, withPrimaryKey(convertSettingValues($setting_type, $_POST)));
  $values = readValuesFromTable($_DATABASE, $table_name, readTableColumnNamesFromConfig($table_name));
} elseif (isset($_POST['reset'])) {
  $settings_edited = true;
  $values = readTableInitialValuesFromConfig($table_name);
  updateValuesInTable($_DATABASE, $table_name, $values);
} else {
  $settings_edited = false;
  $values = readValuesFromTable($_DATABASE, $table_name, readTableColumnNamesFromConfig($table_name));
}
$grouped_values = groupSettingValues($setting_type, $values);
require_once(TEMPLATES_DIR . '/settings.php');
?>

<!DOCTYPE html>
<html>

<head>
  <?php
  require_once(TEMPLATES_DIR . '/head_common.php');
  ?>
</head>

<body>
  <header>
    <?php
    require_once(TEMPLATES_DIR . '/navbar.php');
    require_once(TEMPLATES_DIR . '/confirmation_modal.php');
    ?>
  </header>

  <main id="main_container" style="display: none;">
    <div class="container">
      <h1 class="my-4"><?php echo LANG['system_settings']; ?></h1>
      <form id="system_settings_form" action="" method="post">
        <div class="row">
          <?php
          $input_scripts = generateInputs($setting_type, $grouped_values, [], []);
          ?>
        </div>
        <div class="my-4">
          <button type="submit" name="submit" class="btn btn-primary"><?php echo LANG['submit']; ?></button>
          <button name="undo" class="btn btn-secondary" onclick="$('#system_settings_form').trigger('reset');"><?php echo LANG['undo']; ?></button>
          <button type="submit" name="reset" class="btn btn-secondary"><?php echo LANG['reset']; ?></button>
        </div>
      </form>
    </div>
  </main>
</body>

<?php
require_once(TEMPLATES_DIR . '/bootstrap_js.php');
require_once(TEMPLATES_DIR . '/jquery_js.php');
require_once(TEMPLATES_DIR . '/js-cookie_js.php');
?>

<script>
  const SETTINGS_FORM_ID = 'system_settings_form';
  const SETTINGS_EDITED = <?php echo $settings_edited ? 'true' : 'false'; ?>;
  const USES_CAMERA = <?php echo USES_CAMERA ? 'true' : 'false'; ?>;
  const STANDBY_MODE = <?php echo MODE_VALUES['standby']; ?>;
  const SITE_MODE = null;
  const INITIAL_MODE = <?php echo $mode; ?>;
  const DETECT_FORM_CHANGES = true;
</script>
<script src="js/style.js"></script>
<script src="js/jquery_utils.js"></script>
<script src="js/monitoring.js"></script>
<script src="js/settings.js"></script>
<script src="js/confirmation_modal.js"></script>
<script src="js/navbar.js"></script>
<script src="js/navbar_settings.js"></script>
<script>
  $(function() {
    captureElementState(SETTINGS_FORM_ID);
  });
</script>

</html>