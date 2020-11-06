
   <?php
    if (isset($_POST['NAME'],$_POST['EMAIL'],$_POST['SUBJECT'],$_POST['MESSAGE'])){
        $whitelis=array('NAME','EMAIL','SUBJECT','MESSAGE');
        $send_to= 'dia07mail@gmail.com';
        $errors= array();
        $fields= array();
        if (! empty($_POST['EMAIL']) && ! filter_var($_POST['EMAIL'],FILTER_VALIDATE_EMAIL)) {
            $errors[]= "INVALID EMAIL";
        }
        
        foreach ($whitelis as $key){
            $_POST[$key]= trim($_POST[$key]);
            $_POST[$key]= stripslashes($_POST[$key]);
            $_POST[$key] = htmlspecialchars($_POST[$key]);
            $fields[$key]=$_POST[$key];
        }
        
        foreach ($fields as $field => $data){
            if(empty($data)){
                $errors[] = 'Enter your '. $field;
            }
        }
        
        if (empty ($errors)){
            if ( mail($send_to, $fields['SUBJECT'], $fields['MESSAGE'])){
                echo "<div class='bg-success success' style='border:1px solid #a63765; font-size:20px'>Message sent, Thank you for contacting me</div>";
            }
            
        }
            else{
                echo "<div class='bg-danger echec' style='border:1px solid #a63765;border-radius: 2px; font-size:20px; margin-bottom: 5px'> Verify your information </div>";
                echo '';
        }
    
    }
?>
