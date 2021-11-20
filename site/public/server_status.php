<?php
require_once(dirname(__DIR__) . '/config/site_config.php');
redirectIfLoggedOut('index.php');

setPHPSysInfoDefaultTemplate((COLOR_SCHEME === 'dark') ? 'dark' : 'phpsysinfo');
?>

<!DOCTYPE html>
<html class="w-100 h-100" style="min-width: 100%; min-height: 100%;">

<head>
  <?php
  require_once(TEMPLATES_DIR . '/head_common.php');
  ?>
</head>

<body class="w-100 h-100" style="min-width: 100%; min-height: 100%;">
  <div class="d-flex flex-column w-100 h-100" style="min-width: 100%; min-height: 100%;">
    <header>
      <?php
      require_once(TEMPLATES_DIR . '/navbar.php');
      require_once(TEMPLATES_DIR . '/confirmation_modal.php');
      ?>
    </header>

    <main class="d-flex flex-column flex-grow-1 align-items-center justify-content-center overflow-auto text-center">
      <iframe id="phpsysinfo" src="library/phpsysinfo/index.php" title="phpsysinfo" width="100%" height="100%" style="display: none;"></iframe>
      <span id="server_status_busy_spinner" class="spinner-border" style="display: none;"></span>
    </main>
  </div>
</body>

<?php
require_once(TEMPLATES_DIR . '/bootstrap_js.php');
require_once(TEMPLATES_DIR . '/jquery_js.php');
require_once(TEMPLATES_DIR . '/js-cookie_js.php');

require_once(TEMPLATES_DIR . '/notifications_js.php');
require_once(TEMPLATES_DIR . '/monitoring_js.php');
?>

<script src="js/style.js"></script>
<script src="js/jquery_utils.js"></script>
<script src="js/confirmation_modal.js"></script>
<script src="js/navbar.js"></script>
<script src="js/navbar_main.js"></script>
<script src="js/server_status.js"></script>

</html>
