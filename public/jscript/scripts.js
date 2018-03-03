$(document).ready(function () {
    $(document).on('click', '.savePost', function (e) {


        if($('input#title').val() == '' && $('textarea#message').val() == '') {
            alert('Неверный!');
            return false;
        }

        var title = $('#title').val();
        var message = $('#message').val();
        $.ajax({
            type: "POST",
            url: 'http://test.site/blog',
            data: {title: title, message: message},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $.ajax({
                    type: "POST",
                    url: 'http://test.site/blog/renderBody',
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('#updateDiv').html(data);
                        $('#title').val('');
                        $('#message').val('');
                    }
                });
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });

        return false;
    })
});
//Код редактирования поста
var postId;
$(document).ready(function () {

    $(document).on('click', '.changePost', function (e) {
        $('#backs').fadeIn(400,
            function () {
                $('#newModal')
                    .css('display', 'block').animate({opacity: 1}, 200);
            });
        postId = $(this).val();
        console.log(postId);
        $.ajax({
            type: "GET",
            url: 'http://test.site/blog/renderBod/' + postId,
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $('input#titles').val(data.title);
                $('textarea#messages').val(data.message);
                console.log(data);
            },
            error: function (data) {
                console.log();
            }
        });
    });

    //Добавление отредактированного поста
    $('.changeTrue').click(function (event) {
        event.preventDefault();
        $('#newModal')
            .animate({opacity: 0}, 200,
                function () {
                    $(this).css('display', 'none');
                    $('#backs').fadeOut(400);
                }
            );
        var title = $('input#titles').val();
        var message = $('textarea#messages').val();
        $.ajax({
            type: "PUT",
            url: 'http://test.site/blog/' + postId,
            data: {title: title, message: message},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $.ajax({
                    type: "POST",
                    url: 'http://test.site/blog/renderBody',
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('#updateDiv').html(data);

                    },
                    error: function (data) {
                        console.log();
                    }
                });
            },
            error: function (data) {
                console.log();
            }
        });
    });
//Удаление поста
    $(document).on('click', '.deletePost', function (e) {
        postId = $(this).val();
        $.ajax({
            type: "DELETE",
            url: 'http://test.site/blog/' + postId,
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $.ajax({
                    type: "POST",
                    url: 'http://test.site/blog/renderBody',
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('#updateDiv').html(data);
                    },
                    error: function (data) {
                        console.log();
                    }
                });
            },
            error: function (data) {
                console.log();
            }
        });
    });
});
$(document).ready(function () {
    $('#backs').click(function () {
        $('#newModal')
            .animate({opacity: 0}, 200,
                function () {
                    $(this).css('display', 'none');
                    $('#backs').fadeOut(400);
                }
            );
    });
});
