<?php
require_once(dirname(__DIR__) . '/config/path_config.php');
require_once(SRC_DIR . '/session.php');
require_once(SRC_DIR . '/control.php');

abortIfSessionExpired();

if (isset($_POST['current_timestamp'])) {
  $timestamp = $_POST['current_timestamp'];
  executeServerControlAction('set_timestamp', $timestamp);
}
