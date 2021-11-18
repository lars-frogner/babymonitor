const NOTIFICATION_BUTTON_ID = 'notification_button';
const NOTIFICATION_MESSAGE_ID = 'notification_message';

$(function () {
    updateBrowserNotificationIndicator();
})

function updateBrowserNotificationIndicator() {
    const message = $('#' + NOTIFICATION_MESSAGE_ID);
    const button = $('#' + NOTIFICATION_BUTTON_ID);
    if (!USES_SECURE_PROTOCOL) {
        message.html(LANG['unavailable_insecure']);
        button.html(LANG['switch_to_encrypted']);
        button.click(function (event) { event.preventDefault(); window.location.replace(SECURE_URL); });
        button.show();
    } else if (!browserNotificationsSupported()) {
        message.html(LANG['unsupported_by_browser']);
        button.hide();
    } else if (browserNotificationsBlocked()) {
        message.html(LANG['blocked']);
        button.hide();
    } else if (browserNotificationsAllowed()) {
        message.html(LANG['allowed']);
        button.hide();
    } else if (browserNotificationsNotAllowed()) {
        message.html(LANG['not_allowed']);
        button.html(LANG['grant_permission']);
        button.click(function (event) { event.preventDefault(); askBrowserNotificationPermission(updateBrowserNotificationIndicator); });
        button.show();
    }
}