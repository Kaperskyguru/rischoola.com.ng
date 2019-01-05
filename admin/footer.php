<footer class="main-footer">
    <strong>Copyright &copy; 2017-2018 <a href="#">Rischoola</a>.</strong> All rights reserved.
</footer>
</div>
<!-- /.wrapper -->
<!-- Start Core Plugins
=====================================================================-->
<!-- jQuery -->
<script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
<!-- jquery-ui -->
<script src="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- lobipanel -->
<script src="assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
<!-- Pace js -->
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript">
</script>
<!-- FastClick -->
<script src="assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- CRMadmin frame -->
<script src="assets/dist/js/custom.js" type="text/javascript"></script>
<!-- End Core Plugins
=====================================================================-->
<!-- Start Page Lavel Plugins
=====================================================================-->
<!-- ChartJs JavaScript -->
<script src="assets/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
<!-- Counter js -->
<script src="assets/plugins/counterup/waypoints.js" type="text/javascript"></script>
<script src="assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<!-- Monthly js -->
<script src="assets/plugins/monthly/monthly.js" type="text/javascript"></script>
<!-- End Page Lavel Plugins
=====================================================================-->
<!-- Start Theme label Script
=====================================================================-->
<!-- Dashboard js -->
<script src="assets/dist/js/dashboard.js" type="text/javascript"></script>
<!-- End Theme label Script
=====================================================================-->

<script src="assets/plugins/datatables/dataTables.min.js" type="text/javascript"></script>
<script>
$('#dataTableExample1').dataTable();

function dash() {
    // single bar chart
    var ctx = document.getElementById("singelBarChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
            datasets: [{
                label: "My First dataset",
                data: [40, 55, 75, 81, 56, 55, 40],
                borderColor: "rgba(0, 150, 136, 0.8)",
                width: "1",
                borderWidth: "0",
                backgroundColor: "rgba(0, 150, 136, 0.8)"
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    //monthly calender
    $('#m_calendar').monthly({
        mode: 'event',
        //jsonUrl: 'events.json',
        //dataType: 'json'
        xmlUrl: 'events.xml'
    });

    //bar chart
    var ctx = document.getElementById("barChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "august", "september", "october", "Nobemver", "December"],
            datasets: [{
                label: "My First dataset",
                data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56],
                borderColor: "rgba(0, 150, 136, 0.8)",
                width: "1",
                borderWidth: "0",
                backgroundColor: "rgba(0, 150, 136, 0.8)"
            }, {
                label: "My Second dataset",
                data: [28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86],
                borderColor: "rgba(51, 51, 51, 0.55)",
                width: "1",
                borderWidth: "0",
                backgroundColor: "rgba(51, 51, 51, 0.55)"
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    //counter
    $('.count-number').counterUp({
        delay: 10,
        time: 5000
    });
}
dash();
</script>

<script>
    $(document).ready(function(){

        $('body').delegate('#approvePostBox', 'click', function(){
        var post_id = $(this).data('id');
        $.ajax({
            url:'actions.php',
            type:'POST',
            data: {approveBox:1, id: post_id},
            success: function(data) {
                // alert(data);
                $('#approvalBox').html(data);
            },
            onerror: function(err){
                alert(err);
            }
        });
        });

        $('body').delegate('#approvePost', 'click', function(){
        var id = $(this).data('id');
        $.ajax({
            url:'actions.php',
            type:'PUT',
            data:{approvePost:1, 'id':id, '_method': 'PUT'},
            success: function(data) {
                alert('Post approved Successfully')
            }
        });
        });

        $('body').delegate('#updateNotice', 'click', function(){
        var id = $(this).data('id');
        var token = $(this).data("token");
        $.ajax({
            url:'/admin/notices/update',
            type:'get',
            data:{'id':id, '_token': token, '_method': 'get'},
            success: function(data) {
                $('#notice_update_info').html(data);
            }
        });
        });

        // $('body').delegate('#update', 'click', function(){
        //     var id = $(this).data('id');
        //     var token = $(this).data("token");
        //     $.ajax({
        //         url:'/admin/notices/update',
        //         type:'PUT',
        //         data:{'id':id, '_token': token, '_method': 'PUT'},
        //         success: function(data) {

        //         }
        //     });
        // });
    });
    </script>


</body>



</html>
