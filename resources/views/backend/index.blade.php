<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{!! asset('css/button.css') !!}">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <!-- <script src="push.js"></script> -->
</head>
<body>

<h1>
  Notification Web API Example
</h1>
<p>
  <button class="button button js_trigger-basic-notification">Show basic notification</button>
  <button class="button button--red js_trigger-advanced-notification">Show advanced notification</button>
</p>

<script>

// Add an event for an object
const basicNotificationButton = document.querySelector('.js_trigger-basic-notification');
basicNotificationButton.addEventListener('click', () => handleNotification(basicNotification));

// Header notification
var thongBao = 'Thong bao o day';
// Add an event for an object
const advancedNotificationButton = document.querySelector('.js_trigger-advanced-notification');
advancedNotificationButton.addEventListener('click', () => handleNotification(advancedNotification(thongBao)));

// Get timestamp
var dts = Math.round(Date.now());

// Set options
var options = {
  body: 'Bây giờ là:'+dts,
  //timestamp: dts,
  noscreen: true,
  icon: 'http://felix.hamburg/files/codepen/rMgbrJ/notification.png'
}

// Create a notification
//var n = new Notification('Scorpion',options);

//n.timestamp // should return original timestamp
window.setInterval(loopPush, 3000);

function loopPush() {
    var n = new Notification('Scorpion',options);

    setTimeout(n.close.bind(n), 5000);
}

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
    body: 'Im Nhat!',
  });

  notification.addEventListener('click', () => window.open('http://felix.hamburg'));
  setTimeout(notification.close.bind(notification), 5000);
}

function advancedNotification(title) {
  // var title = 'Thong bao!';
  const notification = new Notification(title, {
    body: 'Click here to vist my homepage!',
    icon: 'http://felix.hamburg/files/codepen/rMgbrJ/notification.png',
  });

  // Add click event
  notification.addEventListener('click', () => window.open('http://felix.hamburg'));

  // Autoclose after 5 seconds
  setTimeout(notification.close.bind(notification), 5000);
}
</script>

</body>
</html>
