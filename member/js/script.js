var $(document).ready(function() {
  $('#event_reminder_view').click(function() {
    var reminder_id = $(this).attr('pid');
  });

  $('#send_message').click(function() {
    var body = $('#message').val();
    var subject = $('#subject').val();
    var receiver = $('#receiver').val();
    $.ajax({
      method:"POST",
      url:"actions.php",
      data:{send_message:1, body:body, subject:subject, receiver:receiver},
      cache:false,
      success: function(d) {
        alert(d);
      }
    });
  });

  $('#event_reminder_edit').click(function() {
    var reminder_id = $(this).attr('pid');
  });

  $('body').delegate('#event_reminder_del','click', function(e) {
    e.preventDefault();
    var reminder_id = $(this).attr('pid');
    $.ajax({
      method:"POST",
      url:"actions.php",
      data:{set_reminder_del:1, reminder_id:reminder_id},
      cache:false,
      success: function(d) {

      }
    });
  });

  $('body').delegate('#event_del','click', function(e) {
    e.preventDefault();
    var event_id = $(this).attr('pid');
    $.ajax({
      method:"POST",
      url:"actions.php",
      data:{set_event_del:1, event_id:event_id},
      cache:false,
      success: function(d) {
      }
    });
  });

  $('body').delegate('#group_del','click', function(e) {
    //e.preventDefault();
    var group_id = $(this).attr('gid');
    $.ajax({
      method:"POST",
      url:"actions.php",
      data:{set_group_del:1, group_id:group_id},
      cache:false,
      success: function(d) {
      }
    });
  });

  $('#delete_message').click(function(e) {
    //e.preventDefault();
    var message_id = $(this).attr('mid');
    $.ajax({
      method:"POST",
      url:"actions.php",
      data:{set_message_del:1, message_id:message_id},
      cache:false,
      success: function(d) {
        //alert(d);
      }
    });
  });

  

  $('body').delegate("#leave_group","click", function() {
    var gid = $(this).attr('gid');
    $.ajax({
        method:"POST",
        url:"actions.php",
        data: {leave_group:1, gid:gid},
        success: function(d) {
          alert(d);
        }
    });
  });



});
