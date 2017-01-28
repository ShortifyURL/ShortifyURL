<?php
    
    //Functions To Save Files in Config
    function write_php_ini($array, $file){
        $res = array();
        foreach($array as $key => $val){
            if(is_array($val)){
                $res[] = "[$key]";
                foreach($val as $skey => $sval) $res[] = "$skey = ".(is_numeric($sval) ? $sval : '"'.$sval.'"');
            }
            else $res[] = "$key = ".(is_numeric($val) ? $val : '"'.$val.'"');
        }
        safefilerewrite($file, implode("\r\n", $res));
    }
    
    function safefilerewrite($fileName, $dataToSave){
        if ($fp = fopen($fileName, 'w')){
            $startTime = microtime(TRUE);
            do{
                $canWrite = flock($fp, LOCK_EX);
               // If lock not obtained sleep for 0 - 100 milliseconds, to avoid collision and CPU load
               if(!$canWrite) usleep(round(rand(0, 100)*1000));
            } while ((!$canWrite)and((microtime(TRUE)-$startTime) < 5));
    
            //file was locked so now we can store information
            if ($canWrite){
                fwrite($fp, $dataToSave);
                flock($fp, LOCK_UN);
            }
            fclose($fp);
        }
    
    }
    
    if(!empty($_POST['website-name'])){
        
    //Getting All Details from Config Page via Post
    $website_name = $_POST["website-name"];
    $website_title = $_POST["website-title"];
    $website_link = $_POST["website-link"];
    
    $seo_description = $_POST["seo-description"];
    $seo_keywords = $_POST["seo-keywords"];
    
    $random_letters = $_POST["random-letters"];
    $code_length = $_POST["code-length"];
    
    $bootstrap_theme = $_POST["theme-url"];
    
    $ConfigData = array(
        'WebsiteDetails' => array(
            'website_name' => $website_name,
            'website_title' => $website_title,
            'website_link' => $website_link,
        ),
        
        'SEODetails' => array(
            'seo_description' => $seo_description,
            'seo_keywords' => $seo_keywords,
        ),
        
        'ThemeDetails' => array(
            'bootstrap_theme' => $bootstrap_theme,
        ),
        
        'URLSettings' => array(
            'random_letters' => $random_letters,
            'code_length' => $code_length,
        )
        
        );
    
    write_php_ini($ConfigData, "../configs/website/main.ini");
    
    echo "<center><h1>Success, Your Settings Have been saved.</h1><br /><h1>It's recommended that you delete 'setup.php' from the folder you uploaded these files in.<h1>";
    
        } else {
            header("location: ../index.php");
    }
?>