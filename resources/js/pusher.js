const { toSafeInteger, indexOf } = require("lodash");

$.ajax({
    type: "GET",
    url: "/current-user",
    success: function (e) {
        var id = e.id;
        Echo.private('comment-channel' +id).listen('CommentNotification', (e) => {
            toastr.success(e.channel['title'], e.channel['content']);
        });
    }
});
