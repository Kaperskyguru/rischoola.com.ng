<?php

\Cloudinary::config(array(
    'cloud_name' => 'kaperskydisk',
    'api_key' => '951922678984356',
    'api_secret' => 'KqKF5csK-eW2_rxxZk5-nGAJ-kM'
));

class Image extends dbmodel {
    private static $instance;
    private function __construct() {}
    private function __clone(){}

    public static function getInstance(){
      if(!self::$instance){
        self::$instance = new self();
      }
      return self::$instance;
    }

    public static function Uplad($file_name, $options){
        $result = \Cloudinary\Uploader::upload($file_name, $options);

        unlink($file_name);
        //save_image_public_id_to_db("", $result['public_id']);
        //echo "Upload result: " .ret_err($result);
        return $result;

    }

    public static function dispay($public_id, $options){
      echo cl_image_tag($public_id, $options);
    }


    public function save_image_public_id_to_db($sql, $public_id){
        $this->query($sql);
        if($this->executer()){
            return TRUE;
        }
         return FALSE;
    }

    public static function upload_imge($files, $user_id, $inserted_id, $resources, $dir)
    {
        $error_status = 1;
        $files = is_array($files) ? $files : array( $files );
        $files_data = array();
        $files_id = array();

        foreach ($files["tmp_name"] as $index => $value) {
            $t = basename($files["name"][$index]);
            $image_file_type = pathinfo($t, PATHINFO_EXTENSION);

            if (getimagesize($files['tmp_name'][$index]) !== FALSE) {
                $error_status = 1;
            }
        
            if ($files['size'][$index] > 10485760) {
                $error_status = 0;
            }
        
            if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
                $error_status = 0;
            }
        
            if ($error_status == 1) {
                $name = $files["name"][$index];
                $options = array_merge(post_image_options(), array(
                    "public_id" => "Rischoola/".$dir."/".random_string_gen()."_"."$name",
                ));
                array_push($files_data, Image::upload($value, $options));
                $image_name = $files_data[$index]['public_id'];
                array_push($files_id, $resources->add_images_and_get_last_inserted_id($image_name, $user_id, $inserted_id, "post"));
                
            }
        } 
        return $files_id[0];   
        }    
}