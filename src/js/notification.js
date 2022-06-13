firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();

function initializeFireBaseMessaging() {
    messaging
        .requestPermission()
        .then(function (token) {
            console.log(token);
        })
        .catch(function (reason) {
            console.log(reason);
        });
}

messaging.onMessage(function (payload) {
    console.log(payload);
    const notificationOption = {
        body: payload.notification.body,
        icon: payload.notification.icon
    };

    if (Notification.permission === "granted") {
        var notification = new Notification(payload.notification.title, notificationOption);

        notification.onclick = function (ev) {
            ev.preventDefault();
            window.open(payload.notification.click_action, '_blank');
            notification.close();
        }
    }

});

messaging.onTokenRefresh(function () {
    messaging
        .getToken()
        .then(function (newToken) {
            console.log(newToken);
        })
        .catch(function (reason) {
            console.log(reason);
        });
});

initializeFireBaseMessaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification = JSON.parse(payload);
    const notificationOption = {
        body: notification.body,
        icon: notification.icon
    };
    return self.registration.showNotification(payload.notification.title, notificationOption);
});