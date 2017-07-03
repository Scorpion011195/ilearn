const basicNotificationButton = document.querySelector('.js_trigger-basic-notification');
basicNotificationButton.addEventListener('click', () => handleNotification(basicNotification));

const advancedNotificationButton = document.querySelector('.js_trigger-advanced-notification');
advancedNotificationButton.addEventListener('click', () => handleNotification(advancedNotification));

function handleNotification(notifyCallback) {
  if (!Notification in window) {
    alert('Desktop notifications are not available in your browser!'); 
  } else if (Notification.permission !== 'granted') {
    Notification.requestPermission((permission) => {
      if (permission === 'granted') {
        notifyCallback();
      }
    });
  } else {
    notifyCallback();
  }
}

function basicNotification() {
  const notification = new Notification('Basic Notification', {
    body: 'Bodytext goes here.. ¯\_(?)_/¯',
  });

  notification.addEventListener('click', () => window.open('http://felix.hamburg'));
  setTimeout(notification.close.bind(notification), 5000);
}

function advancedNotification() {
  const notification = new Notification('CV :: Felix Mau', {
    body: 'Click here to vist my homepage!',
    icon: 'http://felix.hamburg/files/codepen/rMgbrJ/notification.png'
  });

  // Add click event
  notification.addEventListener('click', () => window.open('http://felix.hamburg'));

  // Autoclose after 5 seconds
  setTimeout(notification.close.bind(notification), 5000);
}