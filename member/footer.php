<script type="text/javascript" src="<?php echo SITEURL;?>/res/js/jquery-3.1.0.min.js"></script>
<script src="<?php echo SITEURL;?>/res/js/bootstrap.min.js"></script>
<script type="text/javascript" src="datatable/datatables.min.js"></script>
<script src="js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    
 
<script>
  $(document).ready(function() {

    $('#lodge_table').dataTable();

    $('#post_table').dataTable();

    $('#event_table').dataTable();

    $('#store_table').dataTable();

    $('#event_reminder_table').dataTable();

    $('#group_member_table').dataTable();

    $('#group_table').dataTable();

    $('#roommate_table').dataTable();

    $('#lodge_address').summernote({
        height: 200, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: true // set focus to editable area after initializing summernote
    });

    $('#desc').summernote({
        height: 200, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: true // set focus to editable area after initializing summernote
    });

    $('#message').summernote({
        height: 200, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: true // set focus to editable area after initializing summernote
    });

    $('#lodge_rules').change(function () {
        var val = this.value;
        $.ajax({
            method: "POST",
            url: 'add_lodges.php',
            data: {add_rule: 1, val: val},
            success: function (data) {
            },
            onerror: function(err) {
                alert(err);
            }
        });
    });

    $('#lodge_facilities').change(function () {
        var val = this.value;
        $.ajax({
            method: "POST",
            url: 'add_lodges.php',
            data: {add_facility: 1, val: val},
            success: function (data) {

            },
            onerror: function(err) {
                alert(err);
            }
        });
    });

    $('#profile_image').change(function () {
            $v = $(this).val();
            if ($v == "") {
                $('#img_submit').attr('disabled', 'disabled');
            } else {
                $('#img_submit').removeAttr('disabled');
            }
        });
        $('body').delegate('#submit_personal_data', 'click', function () {
            var username = $('#user_name').val();
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var user_email = $('#email_address').val();
            var user_phone_number = $('#phone_number').val();
            var user_address = $('#address').val();
            var user_about = $('#about_you').val();
            var user_birthday = $('#birthday').val();
            var user_course_of_study = $('#course_of_study').val();
            var user_level = $('#level').val();
            var user_gender = $('#gender').val();
            var user_school_id = $('#school').val();
            var user_display_name = $('#display_name').val();

            $.ajax({
                method: "POST",
                url: "actions.php",
                data: {UpdateProfile: 1, user_display_name: user_display_name, user_school_id: user_school_id, user_gender: user_gender, user_level: user_level, user_course_of_study: user_course_of_study, user_birthday: user_birthday, user_about: user_about, user_address: user_address, username: username, user_phone_number: user_phone_number, first_name: first_name, last_name: last_name, user_email: user_email},
                success: function (d) {
                }
            });
        });

        $('#change_password').click(function () {
            var old_password = $('#old_password').val();
            var new_password = $('#new_password').val();
            var confirm_password = $('#confirm_password').val();
            var log_all_out = $('#log_all_out').is(':checked');
            $.ajax({
                method: "POST",
                url: "actions.php",
                data: {change_password: 1, log_all_out: log_all_out, old_password: old_password, new_password: new_password, confirm_password: confirm_password},
                success: function (d) {
                }
            });
        });

        $('#change_bank_information').click(function () {
            var bank_name = $('#bank_name').val();
            var account_name = $('#account_name').val();
            var account_number = $('#account_number').val();
            $.ajax({
                method: "POST",
                url: "actions.php",
                data: {change_bank_information: 1, bank_name: bank_name, account_name: account_name, account_number: account_number},
                success: function (d) {
                    $('#error').html(d);
                }
            });
        });

});

$('body').delegate('#event_view','click', function() {
    var id = $(this).attr('pid');
    $.ajax({
        method: 'POST',
        url: 'create_event',
        data : {id:id}
    });
});

$('body').delegate('#view_message','click', function() {
    var id = $(this).attr('mid');
    $.ajax({
        method: 'POST',
        url: 'actions.php',
        data : {viewMessage:1, id:id},
        success:function (d) {
            // alert(d);
            $('#h').html(d);
        }
    });
});


</script>

</body>
</html>
