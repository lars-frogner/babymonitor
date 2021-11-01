$(function () {
    connectModalToLink(LOGOUT_NAV_LINK_ID, LOGOUT_MODAL_BASE_PROPERTIES, { text: LANG['nav_device_not_in_standby'], showText: () => { return getCurrentMode() != STANDBY_MODE; } });
    connectModalToLink(REBOOT_NAV_LINK_ID, REBOOT_MODAL_BASE_PROPERTIES, null);
    connectModalToLink(SHUTDOWN_NAV_LINK_ID, SHUTDOWN_MODAL_BASE_PROPERTIES, null);
    connectModalToObject(_AP_MODE_MODAL_TRIGGER, AP_MODAL_BASE_PROPERTIES, AP_MODAL_BASE_BODY_SETTER);
    connectModalToObject(_CLIENT_MODE_MODAL_TRIGGER, CLIENT_MODAL_BASE_PROPERTIES, CLIENT_MODAL_BASE_BODY_SETTER);
});
