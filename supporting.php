<?php
    
    /*supporting.php*/
    
    require_once('connect_db.php');
    /* require connection to database */
    
    $query = "select subject, course_code from supporting_courses;";
    /* query get all required subject course code pair */
    
    $response = mysqli_query($dbc, $query);
    
    if ($response) {
        while($row = mysqli_fetch_array($response)){
            $subject[] = $row['subject'];
            $course_code[] = $row['course_code'];
            /*add subject.course_code string into result arrays*/
        }
        
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

    } else{

    }

?>
