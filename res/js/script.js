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

  $('#school_type').change(function() {
    var cat_id = $(this).val();
    $.ajax({
      url: 'actions.php',
      method: "post",
      data: {id:1, cat_id:cat_id},
      success: function(data){
       $('#list_of_schools').empty();
        $('#list_of_schools').html(data);
      },
      onerror: function(err){
        alert(err);
      }
    });
  });

  $('body').delegate('#search_btn', 'click', function (e) {
    var term = $('#search_input').val();
    $.ajax({
      method: "POST",
      url: "search.php",
      processDefualt:false,
      data: {search_set:1, term:term},
      cache:true,
      success: function (data) {
        $('#index-news').html(data);
      },
      onerror : function(err){
        alert(err);
      }
    });
  });


  $('body').delegate('#hostel_search', 'click', function() {
    var hostel_school = $('#list_of_schools').val();
    var max_price = $('#max_price').val();
    var min_price = $('#min_price').val();
    var hostel_name = $('#hostel_name').val();
    var hostel_type = $('#hostel_type').val();
    $.ajax({
        method: "POST",
        url: "getLodges.php",
        data: {hostel_search:1, hostel_school:hostel_school, max_price:max_price, min_price:min_price, hostel_name:hostel_name, hostel_type:hostel_type},
        cache: false,
        processDefualt: false,
        success: function(data) {
          $('#lodge_content').empty();
          $('#lodge_content').html(data);
           // alert(data);
        },
        onerror: function(err) {
            alert(err);
        }
    });

});


});
