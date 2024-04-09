document.addEventListener('DOMContentLoaded', function() {
    showNotificationPanel();
});

function showNotificationPanel() {
    var notificationPanel = document.getElementById('notificationPanel');
    if (notificationPanel) {
        notificationPanel.style.display = 'block';
    }
}

