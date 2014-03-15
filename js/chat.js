var chat = {}

chat.retrieveChat = function () {
    $.ajax({
        url: 'retrieve/chat.php',
        type: 'post',
        data: { method: 'retrieve' },
        success: function (data) {
            $('.chat .messages').html(data);
            $(".chat .messages").prop({
                scrollTop: $(".chat .messages").prop('scrollHeight')
            });
        }
    });
}

chat.interval = setInterval(chat.retrieveChat, 2000);
chat.retrieveChat();

var notification = {}

notification.fetchNotif = function () {
    $.ajax({
        url: 'retrieve/notification.php',
        type: 'post',
        async: false,
        data: { method: 'fetch' },
        success: function (data) {
            if (data != "") {
                clearInterval(notification.interval);
                $.titleAlert("New Message");
            }

            $('#notification').html(data);
            console.log("data;" + data);

        }
    });

}
notification.interval = setInterval(notification.fetchNotif, 9000);
notification.fetchNotif();

$(function () {
    $('form').bind('submit', function () {
        $.ajax({
            type: 'post',
            url: "input.php",
            data: $("form").serialize(),
            success: function () {
                $('.message').val('');
            }
        });
        return false;
    });
});

$("#open").click(function () {
    $("#box").slideToggle();
});