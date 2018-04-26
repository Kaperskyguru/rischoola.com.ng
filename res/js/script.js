$(document).ready(function() {
  get_all_news();
  get_all_lodges();

  function get_all_news()
  {
    $.ajax({
        url: "getNews.php",
        method: "POST",
        data: {id:1},
        success: function(data) {
          $('#displayNews').html(data);
        }
    });

  }

  $('body').delegate("#like_btn","click", function() {
    var pid = $(this).attr('pid');
    $.ajax({
        method:"POST",
        url:"getNews.php",
        data: {like:1, pid:pid},
        success: function(d) {
          $('#like_span'+pid).html(d);
        }
    });
  });

  $('body').delegate("#dislike_btn","click", function() {
    var pid = $(this).attr('pid');
    $.ajax({
        method:"POST",
        url:"getNews.php",
        data: {dislike:1, pid:pid},
        success: function(d) {
          $('#dislike_span'+pid).html(d);
        }
    });
  });

  $('body').delegate("#join_group","click", function() {
    var gid = $(this).attr('gid');
    $.ajax({
        method:"POST",
        url:"group_actions.php",
        data: {set_join_group:1, gid:gid},
        success: function(d) {
          alert(d);
        }
    });
  });

  $('body').delegate("#leave_group","click", function() {
    var gid = $(this).attr('gid');
    $.ajax({
        method:"POST",
        url:"group_actions.php",
        data: {leave_group:1, gid:gid},
        success: function(da) {
          alert(da);
        }
    });
  });

  $('#send_group_admin_message').click(function() {
    var uid = $(this).attr('uid');
    var subject = $('#subject').val();
    var message = $('#message').val();
    //alert(uid + " " + subject + " " + message);
    $.ajax({
        method:"POST",
        url:"group_actions.php",
        data: {send_group_admin_message:1, uid:uid, subject:subject, message:message},
        success: function(d) {
          alert(d);
        }
    });
  });

  $('#post_discussion').click(function() {
    var gid = $(this).attr('gid');
    alert(gid);
    // $.ajax({
    //     method:"POST",
    //     url:"group_actions.php",
    //     data: {join_group:1, gid:gid},
    //     success: function(d) {
    //       alert(d);
    //     }
    // });
  });

  function get_all_lodges() {
    $.ajax({
      url: 'getLodges.php',
      method: "post",
      data: {id:1},
      success: function(data){

      }
    });
  }

  $('#roommate_gender').change(function(){
    var gender_id = $(this).val();
    
  });

});
