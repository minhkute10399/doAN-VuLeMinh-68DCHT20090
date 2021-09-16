$('#btn-dropdown-notification').on("click", function (dropdown) {
    var dropdownNotify = document.getElementById("btn-dropdown-notification");

    if (dropdownNotify) {
        document.getElementById("notification-content").classList.toggle("show");
    }

    if (!dropdown.target.matches('#btn-dropdown-notification')) {
        let dropdownNotification = document.getElementsByClassName('dropdown-notification');
        for (let i = 0; i < dropdownNotification.length; i++) {
            let openDropdownNoti = dropdownNotification[i];
            if (openDropdownNoti.classList.contains('show')) {
                openDropdownNoti.classList.remove('show');
            }
        }
    }
})
