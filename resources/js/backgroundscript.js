window.onclick = function(event) {
    var dropdownNotify = document.getElementById("btn-dropdown-notification");
    if (dropdownNotify) {
        dropdownNotify.onclick = function () {
            document.getElementById("notification-content").classList.toggle("show");
        };
    }
    var dropdown = document.getElementById('btn-dropdown');
    if (dropdown) {
        dropdown.onclick = function () {
            document.getElementById('dropdown-content').classList.toggle("show");
        }
    }

    if (!event.target.matches('#btn-dropdown')) {
        let dropdown = document.getElementsByClassName('dropdown');
        for (let i = 0; i < dropdown.length; i++) {
            let openDropdown = dropdown[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }

    if (!event.target.matches('#btn-dropdown-notification')) {
        let dropdownNotification = document.getElementsByClassName('dropdown-notification');
        for (let i = 0; i < dropdownNotification.length; i++) {
            let openDropdownNoti = dropdownNotification[i];
            if (openDropdownNoti.classList.contains('show')) {
                openDropdownNoti.classList.remove('show');
            }
        }
    }
    $.ajax({
        type: "GET",
        url: "/getNotification",
        cache: false,
        success: function (notification) {
          $("#notification-content").html(notification);
        }
    });
}

