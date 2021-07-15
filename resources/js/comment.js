$(document).on("click", ".button-comment", function () {
    let content = $("#content").val();
    let course_id = $("#course_id").val();
    let teacher_id = $("#teacher_id").val();
    let urlStoreComment = $(this).attr("data-url");
    $.ajax({
        type: "POST",
        url: urlStoreComment,
        data: {
            "content": content,
            "course_id": course_id,
            "teacher_id": teacher_id,
        },
        headers: {
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        },
        success: function(result) {
            $(".append").prepend(result);
            $("#content").val('');

            let count = $("#count-comment").text();
            let splitNumber = count.split(' ');
            let number = parseInt(splitNumber[0]) + 1;
            let countComment = number + " " + splitNumber[1];
            $("#count-comment").text(countComment);
        },
        error: function(error) {
            // console.log(error);
        }
    });
});
