<?php
    
      /* supporting.php  */
    
    
        $subject = array();
        /*hard code subject array*/
        $course_code = array();
        /*hard code course_code array*/
    
        $subject[] = "EECE";
        $course_code[] = "2650";
    
        $subject[] = "MATH";
        $course_code[] = "1310";
    
        $subject[] = "MATH";
        $course_code[] = "1320";
    
        $subject[] = "MATH";
        $course_code[] = "3210";
    
        $subject[] = "MATH";
        $course_code[] = "3220";
    
        $subject[] = "MATH";
        $course_code[] = "3860";
        
        $taken_course_objects = array();
        
        $unsorted_course_entries = array();
        
        $size_arr = sizeof($subject);
        
        $string = file_get_contents("temp/results.json");
        
        $json_a = json_decode($string, true);
        
        foreach ($json_a as $key => $value){
            
            $decoded_ = json_decode($value, true);
            
            $unsort = True;
            
            for ($i = 0; $i < $size_arr; $i ++){
                if ($decoded_["subject"] == $subject[$i] && $decoded_["course_code"] == $course_code[$i]) {
                    $taken_course_objects[] = json_encode($decoded_);
                    $unsort = False;
                }
            }
            
            if($unsort){
                $unsorted_course_entries[] = json_encode($decoded_);
            }
        }
        
        $encodedString = json_encode($taken_course_objects);
        file_put_contents('temp/supporting.json', $encodedString);
        
        unlink("temp/results.json");
        
        $encodedString_two = json_encode($unsorted_course_entries);
        file_put_contents('temp/results.json', $encodedString_two);

 //   } else{

   // }

?>
