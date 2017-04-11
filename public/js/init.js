$(document).ready(function () {
    //send friend request
    $('.add_friend').click(function () {
        var id = $(this).attr("id");
        $.ajax({
            url: '/account/addFriend',
            type: 'post',
            data: {id: id},
            success: function (res) {
                if (res == true) {
                    $(".add_friend").html('Friend request sent');
                }
            }
        })
    })

    //confirm friend request

    $(".confirm").click(function () {
        var conf_id = $(this).attr("id");
        $.ajax({
            url: '/account/confirm',
            type: 'post',
            data: {conf_id: conf_id},
            success: function (data) {
                if (data == true) {
                    $('#' + conf_id).fadeOut("slow");
                }
            }
        })
    })

    //get messages



    $(".envelope").click(function () {
        var id = $(this).attr("id");
        text = $('textarea#message').val();
        $.ajax({
            url: '/account/getMessage',
            type: 'post',
            data: {id: id, text: text},
            dataType: "json",
            success: function (data) {
                if(data){
                    var array = [{to_id:id}, {text:text}];
                    $.each(array,function(){
                        $("#big_textarea").append('<li>'+ data.text + '></li>');
                        $("#message").val('');
                    })
                }
            }
        })
    })
})
