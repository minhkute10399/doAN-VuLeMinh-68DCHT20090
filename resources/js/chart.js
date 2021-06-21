const url = window.location.href;
$.ajax({
    type: "GET",
    url: url + "/chart",
    cache: false,
    success: function (lessons) {

    }
});
