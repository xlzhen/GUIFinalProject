<?php
      /*
       * writing.php
       */
    
        $subject = array();
        $course_code = array();
    
        $subject[] = "ENGL";
        $course_code[] = "1010";
    
        $subject[] = "ENGL";
        $course_code[] = "1020";
        
        $taken_course_objects = array();
        
        $unsorted_course_entries = array();
        
        $size_arr = sizeof($subject);
        
        $string = file_get_contents("temp/results.json");
        
        $json_a = json_decode($string, true);
        
        foreach ($json_a as $key => $value){
            
            $decoded_ = json_decode($value, true);

            if ($decoded_["subject"] == "ENGL") {
                $taken_course_objects[] = json_encode($decoded_);
            }else{
                $unsorted_course_entries[] = json_encode($decoded_);
            }
        }
        
        $encodedString = json_encode($taken_course_objects);
        file_put_contents('temp/writing.json', $encodedString);
        
        $encodedString_two = json_encode($unsorted_course_entries);
        file_put_contents('temp/results.json', $encodedString_two);

 //   } else{
 //   }
    
    
?>
