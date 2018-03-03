$(document).ready(function() {
  var postId;

  $(document).ready(function() {
    $(document).on('click', '.savePost', function(e) {
      var message, title;
      title = $('#title').val();
      message = $('#message').val();
      $.ajax({
        type: 'POST',
        url: 'http://practice/blog',
        data: {
          title: title,
          message: message
        },
        headers: {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          $.ajax({
            type: 'POST',
            url: 'http://practice/blog/renderBody',
            headers: {
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
              $('#dimas').html(data);
              $('#title').val('');
              $('#message').val('');
            }
          });
        },
        error: function(data) {
          console.log('Error:', data);
        }
      });
      return false;
    });
  });

  postId = void 0;

  $(document).ready(function() {
    $(document).on('click', '.changePost', function(e) {
      $('#backs').fadeIn(400, function() {
        $('#newModal').css('display', 'block').animate({
          opacity: 1
        }, 200);
      });
      postId = $(this).val();
      console.log(postId);
      $.ajax({
        type: 'GET',
        url: 'http://practice/blog/renderBod/' + postId,
        headers: {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          $('input#titles').val(data.title);
          $('textarea#messages').val(data.message);
          console.log(data);
        },
        error: function(data) {
          console.log();
        }
      });
    });
    $('.changeTrue').click(function(event) {
      var message, title;
      event.preventDefault();
      $('#newModal').animate({
        opacity: 0
      }, 200, function() {
        $(this).css('display', 'none');
        $('#backs').fadeOut(400);
      });
      title = $('input#titles').val();
      message = $('textarea#messages').val();
      $.ajax({
        type: 'PUT',
        url: 'http://practice/blog/' + postId,
        data: {
          title: title,
          message: message
        },
        headers: {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          $.ajax({
            type: 'POST',
            url: 'http://practice/blog/renderBody',
            headers: {
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
              $('#dimas').html(data);
            },
            error: function(data) {
              console.log();
            }
          });
        },
        error: function(data) {
          console.log();
        }
      });
    });
    $(document).on('click', '.deletePost', function(e) {
      postId = $(this).val();
      $.ajax({
        type: 'DELETE',
        url: 'http://practice/blog/' + postId,
        headers: {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          $.ajax({
            type: 'POST',
            url: 'http://practice/blog/renderBody',
            headers: {
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
              $('#dimas').html(data);
            },
            error: function(data) {
              console.log();
            }
          });
        },
        error: function(data) {
          console.log();
        }
      });
    });
  });

  $(document).ready(function() {
    $('#backs').click(function() {
      $('#newModal').animate({
        opacity: 0
      }, 200, function() {
        $(this).css('display', 'none');
        $('#backs').fadeOut(400);
      });
    });
  });

});

//# sourceMappingURL=asd.js.map
