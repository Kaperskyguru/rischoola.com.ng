<?php require_once 'dashboard-header.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_i_have_a_room'])){
    $data = array();
    $roommateModel->set_roommate_user_id(get_user_uid());
    $roommateModel->set_type_of_roommate(1);
    $roommateModel->set_roommate_status_id(2);
    if (empty($_POST['name'])) {
        $data['error_text_name'] = 'Please Roommate Name is required';
        $error_text = 0;
    } else {
        $roommateModel->set_roommate_name($_POST['name']);
    }

    if (empty($_POST['phone'])) {
        $error_text_phone = 'Please Roommate phone Number is required';
        $error_text = 0;
    } else {
        $roommateModel->set_roommate_phone_number($_POST['phone']);
    }

    if (empty($_POST['hostel_name'])) {
        $error_text_hostel_name = 'Please hostel Name is required';
        $error_text = 0;

    } else {
        $roommateModel->set_roommate_hostel_name($_POST['hostel_name']);
    }

    if (empty($_POST['school'])) {
        $error_text_school = 'Please hostel School is required';
        $error_text = 0;
    } else {
        $roommateModel->set_roommate_school_id($_POST['school']);
    }

    if (empty($_POST['hostel_type'])) {
        $error_text_type = 'Please Hostel Type is required';
        $error_text = 0;
    } else {
        $roommateModel->set_roommate_hostel_type_id($_POST['hostel_type']);
    }

    if (empty($_POST['price'])) {
        $error_text_price = 'Please Room Price is required';
        $error_text = 0;
    } else {
        $roommateModel->set_roommate_price($_POST['price']);
    }

    if (empty($_POST['hostel_desc'])) {
        $error_text_desc = 'Please Hostel Description is required';
        $error_text = 0;
    } else {
        $roommateModel->set_roommate_hostel_desc($_POST['hostel_desc']);
    }

    if (empty($_POST['about_you'])) {
        $error_text_about_you = 'Please About you is required';
    } else {
        $roommateModel->set_roommate_desc($_POST['about_you']);
    }

    if (empty($_POST['expectation'])) {
        $error_text_exp = 'Please Your Expectation is required';
    } else {
        $roommateModel->set_roommate_expectations($_POST['expectation']);
    }

    if(!isset($error_text)){
      if($roommateController->add_roommate($roommateModel)){
        echo "Your Roommate Request in Pending verifications";
      }else {
        echo "Sorry, We could not add your request;";
      }
    }else {
      //echo $error_text;
    }


  }

  if (isset($_POST['delete_roommate']) && $_SERVER['REQUEST_METHOD'] == "POST") {
      if ($roommateController->trash_roommate($_POST['rid'])) {
          // Log message: user_name deleted 'roommate name'
          //echo "done";
          exit(header('Location: roommate.php'));
      }
  }


  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_i_dont_have_a_room'])){
    $data = array();
    $roommateModel->set_roommate_user_id(get_user_uid());
    $roommateModel->set_type_of_roommate(0);
    $roommateModel->set_roommate_status_id(2);
    if (empty($_POST['school'])) {
        $error_text_school = 'Please School is required';
        $error_text = 0;
    } else {
        $roommateModel->set_roommate_school_id($_POST['school']);
    }

    if (empty($_POST['price'])) {
        $error_text_price = 'Please Your budget is required';
        $error_text = 0;
    } else {
        $roommateModel->set_roommate_price($_POST['price']);
    }

    if (empty($_POST['about_you'])) {
        $error_text_about = 'Please About you is required';
        $error_text = 0;

    } else {
        $roommateModel->set_roommate_desc($_POST['about_you']);
    }

    if (empty($_POST['expectation'])) {
        $error_text_exp = 'Please Enter Your Expectations';
        $error_text = 0;
    } else {
        $roommateModel->set_roommate_expectations($_POST['expectation']);
    }

    if (empty($_POST['hostel_type'])) {
        $error_text_type = 'Please Hostel Type is required';
        $error_text = 0;
    } else {
        $roommateModel->set_roommate_hostel_type_id($_POST['hostel_type']);
    }
    if(!isset($error_text)){
      if($roommateController->add_roommate($roommateModel)){
        echo "Your Roommate Request in Pending verifications";
      }else {
        echo "Sorry, We could not add your request;";
      }
    }else {
      echo $error_text;
    }
  }?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1>
                    Roommate In Need
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-desktop"></i> Roommate In Need
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row" id="i">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-9">
                        <h2>My Roommate Requests</h2>
                    </div>
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                            Request for Roommate
                        </button>
                    </div>
                </div>
                <div class="table-responsive" id="test">
                    <table class="table table-bordered table-hover table-striped" id="roommate_table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>School</th>
                                <th>Type</th>
                                <th>Have A Rroom?</th>
                                <th>Contact</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $stmt = $roommateController->get_roommates_by_user_id(get_user_uid());
                            if($stmt->rowCount() > 0){
                              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);?>
                            <tr class="active">
                                <td><?php echo $userController->get_user_username_by_id($roommate_user_id); ?></td>
                                <td><?php echo $roommate_location ?></td>
                                <td><?php echo $schoolController->get_school_abbr_by_id($roommate_school_id);?></td>
                                <td><?php echo $lodgeController->get_lodge_model_by_id($roommate_hostel_type_id); ?></td>
                                <td><?php echo $retval = ($type_of_roommate == 1 )? "YES":"NO"; ?></td>
                                <td><?php echo $userController->get_user_phone_number_by_id($roommate_user_id);?></td>
                                <td><?php echo $roommateController->get_roommate_status_by_id($roommate_status_id);?></td>
                                <td>
                                  <a id="view_roommate" rid="<?php echo $roommate_id; ?>" class="btn btn-success" href="#">View</a>
                                  <a id="delete_roommate" rid="<?php echo $roommate_id; ?>" class="btn btn-danger" href="#">Delete</a>
                                </td>
                            </tr>
                          <?php
                          }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center" id="myModalLabel"> Request for Roommate</h4>
                            <div class="col-md-12 text-center">
                                <button type="button" id="i_have_a_room" class="btn btn-success">I hava a room</button>
                                <button type="button" id="i_dont_have_a_room" class="btn btn-danger">I dont hava a room</button>
                            </div>
                            <h6 style="margin-bottom:-10px;"> Tell us what you want</h6>
                        </div>
                        <div class="modal-body" id="form_content">
                            <?php $roommateController->display_if_room($schoolController, $lodgeController); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php require_once('footer.php');
