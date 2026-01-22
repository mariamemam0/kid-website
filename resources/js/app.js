import './bootstrap';
// Real-time user registration notifications
document.addEventListener('DOMContentLoaded', function () {
    if (typeof window.Echo !== 'undefined') {
        window.Echo.private('user-registered')
            .listen('UserRegistered', (e) => {
                if (typeof toastr !== 'undefined') {
                    toastr.success('A new user has registered: ' + e.userName);
                }
            });
    }
});
