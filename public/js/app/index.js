  $(function(){
    $('#forget_button').on('click', function () {
      var url = hide_message_url;
      $.post(url, {}, function () {});
    });
  });