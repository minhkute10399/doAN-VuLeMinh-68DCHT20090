window.onclick = function(event) {
    let dropdown = document.getElementById('btn-dropdown');
    if (dropdown) {
        document.getElementById('dropdown-content').classList.toggle("show");
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
}
