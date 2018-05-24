$(document).ready(function () {
    get_all_news();
    get_all_lodges();

    //++++++++++++ POST ACTIONS STARTS HERE +++++++++++++++++++++++

    function get_all_news()
    {
        $.ajax({
            url: "getNews.php",
            method: "POST",
            data: {id: 1},
            success: function (data) {
                $('#displayNews').html(data);
            }
        });

    }

    $('#reply').click(function (e) {
        e.preventDefault();
        var pid = $(this).attr('pid');
        alert(pid);
        // $.ajax({
        //   method:"post",
        //   url:"read-news.php"
        //   data:{pid:pid},
        //   success: function(da) {
        //       alert(da);
        //   };
        // });
    });


    $('#comnt').click(function () {
        var files1 = $(this).files;
        alert(files1);
        for (var i = 0; i < files1.length; i++) {
            var files = files1.files[i];
            // uploadFile(this.files[i]); // call the function to upload the file

        }
        alert(
                "File Name : " + files.name + "\n" +
                "File Size : " + files.size + "\n" +
                "File type : " + files.type + "\n" +
                "File date : " + files.lastModified
                );
    });

    $('body').delegate('#comnt', 'click', function () {
        //e.preventDefault();
        var pid = $(this).attr('pid');
        var comment_body = $('#commentBox').val();
        var file = $('#file1').val();
        alert(file);
        $.ajax({
            method: 'post',
            url: 'getNews.php',
            cache: false,
            data: {comment: 1, pid: pid, comment_body: comment_body},
            success: function (d) {
                alert(d);
            }
        });
    });

    $('body').delegate("#like_btn", "click", function () {
        var pid = $(this).attr('pid');
        $.ajax({
            method: "POST",
            url: "getNews.php",
            data: {like: 1, pid: pid},
            success: function (d) {
                $('#like_span' + pid).html(d);
            }
        });
    });

    $('body').delegate("#dislike_btn", "click", function () {
        var pid = $(this).attr('pid');
        $.ajax({
            method: "POST",
            url: "getNews.php",
            data: {dislike: 1, pid: pid},
            success: function (d) {
                $('#dislike_span' + pid).html(d);
            }
        });
    });

    //++++++++++++ POST ACTIONS STARTS HERE +++++++++++++++++++++++


    //++++++++++++ GROUP ACTIONS STARTS HERE ++++++++++++++++++++++++

    $('body').delegate("#join_group", "click", function () {
        var gid = $(this).attr('gid');
        $.ajax({
            method: "POST",
            url: "group_actions.php",
            data: {set_join_group: 1, gid: gid},
            success: function (d) {
                alert(d);
            }
        });
    });

    $('body').delegate("#leave_group", "click", function () {
        var gid = $(this).attr('gid');
        $.ajax({
            method: "POST",
            url: "group_actions.php",
            data: {leave_group: 1, gid: gid},
            success: function (da) {
                alert(da);
            }
        });
    });

    $('#send_group_admin_message').click(function () {
        var uid = $(this).attr('uid');
        var subject = $('#subject').val();
        var message = $('#message').val();
        //alert(uid + " " + subject + " " + message);
        $.ajax({
            method: "POST",
            url: "group_actions.php",
            data: {send_group_admin_message: 1, uid: uid, subject: subject, message: message},
            success: function (d) {
                alert(d);
            }
        });
    });

    $('#post_discussion').click(function () {
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


    $('#reply').click(function (e) {
        e.prgroupDefault();
        var pid = $(this).attr('pid');
        alert(pid);
        // $.ajax({
        //   method:"group",
        //   url:"read-news.php"
        //   data:{pid:pid},
        //   success: function(da) {
        //       alert(da);
        //   };
        // });
    });

    $('#reminder').click(function (e) {
        e.prgroupDefault();
        var group_id = $(this).attr('pid');
        $.ajax({
            method: "POST",
            url: "set_reminder.php",
            data: {set_reminder: 1, group_id: group_id},
            success: function (data) {
                if (data == 'TRUE') {
                    $('#reminder').attr('disabled', 'disabled');
                } else if (data == 'FALSE') {
                    //$(this).html('Reminder Set');
                } else {
                    alert(data);
                }
            }
        });
    });

    $('#group_search').change(function () {
        var sid = $(this).val();
        $.ajax({
            method: 'POST',
            url: 'group_actions.php',
            cache: false,
            data: {group_search_set: 1, sid: sid},
            success: function (data) {
                //alert(data);
                $('#group_content').empty();
                $('#group_content').html(data);
            },
            onerror: function (params) {
                alert(params);
            }
        });
    });


//++++++++++++ GROUP ACTIONS ENDS HERE ++++++++++++++++++++++++

    function get_all_lodges() {
        $.ajax({
            url: 'getLodges.php',
            method: "post",
            data: {id: 1},
            success: function (data) {

            }
        });
    }

    //++++++++++++ ROOMMATE ACTIONS STARTS HERE ++++++++++++++++++++++++
    $('#roommate_gender').change(function () {
        var gender_id = $(this).val();
    });


    $('body').delegate('#roommate_search_submit', 'click', function () {
        var roommate_school = $('#roommate_school').val();
        var roommate_gender = $('#roommate_gender').val();
        var roommate_type = $('#roommate_type').val();
        $.ajax({
            method: 'POST',
            url: 'roommate_actions.php',
            data: {roommate_search_set: 1, roommate_school: roommate_school, roommate_gender: roommate_gender, roommate_type: roommate_type},
            success: function (data) {
                $('#roommate_content').html(data)
            },
            onerror: function (data) {
                alert(data);
            }
        });

    });
    //++++++++++++ ROOMMATE ACTIONS ENDS HERE ++++++++++++++++++++++++


    //++++++++++++ HOSTEL ACTIONS STARTS HERE ++++++++++++++++++++++++

    function get_all_lodges() {
        $.ajax({
            url: 'getLodges.php',
            method: "post",
            data: {id: 1},
            success: function (data) {

            }
        });
    }
    $('body').delegate('#hostel_search', 'click', function () {
        var hostel_school = $('#list_of_schools').val();
        var max_price = $('#max_price').val();
        var min_price = $('#min_price').val();
        var hostel_name = $('#hostel_name').val();
        var hostel_type = $('#hostel_type').val();
        $.ajax({
            method: "POST",
            url: "getLodges.php",
            data: {hostel_search: 1, hostel_school: hostel_school, max_price: max_price, min_price: min_price, hostel_name: hostel_name, hostel_type: hostel_type},
            cache: false,
            processDefualt: false,
            success: function (data) {
                $('#lodge_content').empty();
                $('#lodge_content').html(data);
                // alert(data);
            },
            onerror: function (err) {
                alert(err);
            }
        });

    });
    //++++++++++++ HOSTEL ACTIONS ENDS HERE ++++++++++++++++++++++++

    //+++++++++++++++ PRODUCT ACTIONS STARTS HERE ++++++++++++++++++++++++++++++

    $('#quantity_order').change(function () {
        var qty = $(this).val();
        var price = $(this).attr('pip');

        var total = qty * price;
        $('#amount').html("N " + total);

    });

    $("body").delegate('.category', 'click', function (e) {
        var cid = $(this).attr('cid');
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: 'get_products.php',
            data: {cate: 1, cid: cid},
            success: function (data) {
                $('#products').html(data);
            }
        });
    });

    $('body').delegate('#product', 'click', function (e) {
        var pid = $(this).attr('pid');
        $.ajax({
            method: "post",
            url: 'get_products.php',
            data: {add_to_cart: 1, pid: pid},
            success: function (d) {
            }
        });
    });


    //++++++++++++++ EVENT ACTIONS STARTS HERE +++++++++++++++++++++
    $('#search_event').change(function () {
        var sid = $(this).val();
        $.ajax({
            method: 'post',
            url: 'set_reminder.php',
            data: {search_set: 1, sid: sid},
            success: function (data) {
                $('#event_content').empty();
                $('#event_content').html(data);
            }
        });
    });

    $('#reminder').click(function (e) {
        e.preventDefault();
        var event_id = $(this).attr('pid');
        $.ajax({
            method: "POST",
            url: "set_reminder.php",
            data: {set_reminder: 1, event_id: event_id},
            success: function (data) {
                if (data == 'TRUE') {
                    $('#reminder').attr('disabled', 'disabled');
                } else if (data == 'FALSE') {
                } else {
                    alert(data);
                }
            }
        });
    });

    $('#reply').click(function (e) {
        e.preventDefault();
        var pid = $(this).attr('pid');
        alert(pid);
        // $.ajax({
        //   method:"event",
        //   url:"read-news.php"
        //   data:{pid:pid},
        //   success: function(da) {
        //       alert(da);
        //   };
        // });
    });

    //++++++++++++++ EVENT ACTIONS ENDS HERE +++++++++++++++++++++++++

    $('#school_type').change(function () {
        var cat_id = $(this).val();
        $.ajax({
            url: 'actions.php',
            method: "post",
            data: {id: 1, cat_id: cat_id},
            success: function (data) {
                $('#list_of_schools').empty();
                $('#list_of_schools').html(data);
            },
            onerror: function (err) {
                alert(err);
            }
        });
    });

    $('body').delegate('#search_btn', 'click', function (e) {
        e.preventDefault();
        var term = $('#search_input').val();
        var url = $('#search_input').attr('url');
        window.location.assign(url + "/search.php?term=" + term);
    });

    $('#search_input').onkeyup(function () {
        $v = $(this).val();
        if ($v != "") {
            $('#search_btn').removeAttr('disabled');
        }
    });




});
