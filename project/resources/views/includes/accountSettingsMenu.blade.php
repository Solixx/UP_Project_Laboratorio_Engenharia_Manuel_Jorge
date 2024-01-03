<div class="col3 colL4 colM8 colS4 settingsMenu">
    <div class="settingsOptions">
        <div class="settingsOption">
            <a href="{{ Route('settings.editProfile') }}"><h1>Edit Profile</h1></a>
        </div>
        <div class="settingsOption">
            <a href="{{ Route('settings.accountManagement') }}"><h1>Account Management</h1></a>
        </div>
        <div class="settingsOption">
            <a href="{{ Route('settings.changePassword') }}"><h1>Change Password</h1></a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Recebe o URL
        var currentPath = window.location.pathname;

        // Remove a class 'optionActive' para todos os <a>
        var links = document.querySelectorAll('.settingsOption a');
        links.forEach(function (link) {
            link.classList.remove('optionActive');
        });

        // Vê todos os <a> e verifica se contem o URL
        links.forEach(function (link) {
            var href = link.getAttribute('href');
            if (href !== '#') {
                var hrefPath = new URL(href, window.location.origin).pathname;
                if (currentPath === hrefPath) {
                    link.classList.add('optionActive');
                }
            }
        });
    });
</script>
