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
        <div class="settingsOption">
            <a href="#"><h1>Edit Payment</h1></a>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        // Get the current URL
        var currentPath = window.location.pathname;

        // Remove 'optionActive' class from all links
        $('.settingsOption a').removeClass('optionActive');

        // Loop through each link and check if the current URL starts with its href
        $('.settingsOption a').each(function(){
            var href = $(this).attr('href');
            if (href !== '#') {
                var hrefPath = new URL(href).pathname;
                if (currentPath === hrefPath) {
                    $(this).addClass('optionActive');
                }
            }
        });
    });
</script>