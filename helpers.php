<?php

function validate($input,$flag){
    $status = true;
    
     switch ($flag) {
         case 1:
             if(empty($input)){
               $status = false;
             }
             break;
    
        case 2: 
            if(!preg_match('/[a-zA-Z0-9]/',$input)){
                $status = false;
            }
           break;
    
        case 3: 
            if(!filter_var($input,FILTER_VALIDATE_INT)){
                $status = false;
            } 
            break; 
    
            case 6:
                if(!filter_var($input,FILTER_VALIDATE_INT)){
                    $status = false;
                } 
                break; 
       
    
       }
      
        return $status;
    
    }
    
    
    
    
    
    function CleanInputs($input){
      
        $input = trim($input);
        $input = stripcslashes($input);
        $input = htmlspecialchars($input);
    
         return $input;
    }
    
    
    
    function sanitize($input,$flag){
        
        switch ($flag) {
            case 1:
                # code...
                $input = filter_var($input,FILTER_SANITIZE_NUMBER_INT);     
                break;
            
        }
    
        return $input;
    }
    








?>