<?php
require_once '../init.php';
    // $user_id = $_GET['userid'];
    // $unique_id = $_GET['uniqueid'];
    echo $token = bin2hex(random_bytes(25));
    // sanitize strings

    // if(isset($unique_id) && isset($user_id)){
    //     if($userController->is_temporary_user_exist($user_id, $unique_id)){
    //         if($userController->move_guest_to_member($userModel, $user_id, $unique_id)){
    //             //delete temporary account
    //             //Set user status to active
    //             echo "Account Verify successfuly, Please Login";
    //         }else{
    //             echo "could not be activated";
    //         }
    //     }else {
    //         echo 'Account not found';
    //     }
    //}
