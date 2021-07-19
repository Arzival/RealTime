/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

window.Echo.channel('notifications')
          .listen('UserSessionChange', (e) => {
                    const notificationElement = document.getElementById('notification');
                    notificationElement.innerText = e.message;
                    notificationElement.classList.remove('invisible');
                    notificationElement.classList.remove('alert-success');
                    notificationElement.classList.remove('alert-danger');

                    notificationElement.classList.add('alert-' + e.type);
          });

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Example');
