$(document).ready(function() {
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

  $('#i_have_a_room').click(function () {
      $.ajax({
          method: "POST",
          url: "actions.php",
          data: {i_have_a_room: 1},
          success: function (d) {
              $('#form_content').html(d);
          }
      });
  });

  $('#i_dont_have_a_room').click(function () {
      $.ajax({
          method: "POST",
          url: "actions.php",
          data: {i_dont_have_a_room: 1},
          success: function (s) {
              $('#form_content').html(s);
          }
      });
  });

  $('body').delegate('#submit_i_have_a_room', 'click', function() {
    var name = $('#name').val();
    var phone = $('#phone').val();
    var hostel_name = $('#hostel_name').val();
    var school = $('#school').val();
    var hostel_type = $('#hostel_type').val();
    var price = $('#price').val();
    var hostel_desc = $('#hostel_desc').val();
    var about_you = $('#about_you').val();
    var expectation = $('#expectation').val();
    $.ajax({
        method: "POST",
        url: "roommate.php",
        data: {submit_i_have_a_room: 1, expectation:expectation, about_you:about_you,hostel_desc:hostel_desc,name:name, phone:phone, hostel_name:hostel_name, school:school, hostel_type:hostel_type, price:price},
        success: function (s) {
            alert(s);
        }
    });
  });

  $('body').delegate('#delete_roommate', 'click', function(e) {
    e.preventDefault();
    var rid = $(this).attr('rid');
    $.ajax({
        method: "POST",
        url: "roommate.php",
        data: {delete_roommate: 1, rid:rid},
        success: function (s) {
           $('body').html(s);
        }
    });
  });


  $('body').delegate('#submit_i_dont_have_a_room', 'click', function() {
    var school = $('#school').val();
    var hostel_type = $('#hostel_type').val();
    var price = $('#price').val();
    var about_you = $('#about_you').val();
    var expectation = $('#expectation').val();
    $.ajax({
        method: "POST",
        url: "roommate.php",
        data: {submit_i_dont_have_a_room: 1, expectation:expectation, about_you:about_you, school:school, hostel_type:hostel_type, price:price},
        success: function (s) {
            $('#test').html(s);
        }
    });
  });

});
