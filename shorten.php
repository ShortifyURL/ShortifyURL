<?php

    session_start();

    //Loading The Config File
    $config = parse_ini_file("./configs/website/main.ini");
    
    //WebsiteDetails
    $website_title = $config["website_title"];
    $website_name = $config["website_name"];
    $website_link = $config["website_link"];
    
    //SEODetails
    $seo_description = $config["seo_description"];
    $seo_keywords = $config["seo_keywords"];
    
    //ThemeDetails
    $bootstrap_url = $config["bootstrap_theme"];

    //CodeDetails
    $random = $config["random_letters"];
    $codelength = $config["code_length"];
     
     //If the provided url is not empty it'll start the function.
        if( !empty($_POST['longurl']) and isset($_SESSION['prevent_repeat']) ){
     
            //The URL Given from the home page.
            $link = $_POST['longurl'];
            
            //Random Letters in The ID function, example: short.me/A21uR3
            $id = substr( str_shuffle($random), 0, $codelength );
     
            //Location where the short links would be saved
            $txt_path = "./links/";
            
            //If the ID is being already used, it'll create another one.
            if (file_exists($txt_path.$id.".txt")){
                while($id) {
     
                    $id = substr( str_shuffle($random), 0, $codelength );
     
                    if( file_exists($txt_path.$id.".txt") ){
                        continue;
                    }else{
                        break;
                    }
     
                }
            }
            
            //Once an ID has been created for the long URL, it'll be saved in a file.
            $create_txt_file = file_put_contents($txt_path.$id.".txt", $link);
            
            //Now if it was successful, it'll make a short URL for people to be able to copy it.
            if($create_txt_file){
                $website = $website_link;
                $short_link = $website.$id;
            }else{
                //If it was unccessful, it'll throw an error.
                echo "Error SHRTIFY-001. Couldn't Create Short Link, Try Again Later.";
            }
            
            //Now it'll remove the session which prevented people from spamming this.
            unset($_SESSION['prevent_repeat']);
     
        }
     
        else{
            //If no URL was provided in the TextBox, it'll take you back to home page.
            header("location: ./index.php");
        }
 
?>

<!DOCTYPE html>
<html lang="en">
    
    <!-- Developed By: Aditya N. Tripathi a.k.a AdityaTD (AdityaTD.me) -->
    
    <head>
    
    <!-- Loading Website Title, SEO Description and Keywords from the Config -->
    <title><?php echo $website_title; ?> | Your Short URL</title>
    <meta name="description" content="<?php echo $seo_description; ?>">
    <meta name="keywords" content="<?php echo $seo_keywords; ?>">
    
    <link href="./images/favicon.ico" rel="icon" type="image/x-icon" />
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Importing Theme from Config File! -->
    <link href="<?php echo $bootstrap_url; ?>" rel="stylesheet" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
    
    </head>
    
    <body style="background: #cccccc;">
        <div class="container">
            
            <div class="row">
                <center>
                
                <br />
            <div class="well" style="width: 80%;">
                
                <!-- Using Website Name from loaded Config File -->    
                <h1 style="font-size: 64px;"><?php echo $website_name; ?></h1><hr />
                <br />
                <div style="width: 75%;">
                    
            <!-- Copy Your URL Thing -->        
                <div class="input-group">
                <h3>Your Short URL is ready. Copy it and share it to the world.</h3>
                <input id="link" class="form-control" type="text" onClick="this.select();" value="<?php echo $short_link; ?>" style="padding: 30px;" readonly /><br /><br />
                
                <button id="btn" class="btn btn-primary" data-clipboard-text="<?php echo $short_link; ?>">Click To Copy</button>
                
                <br /><br />
                <h4>Want to shorten another URL? <a href="./index.php">Click Here</a>!</h4>
                </div>
            
                <hr />
                
                <!-- Copyright Code loading website name from config and adding date from PHP's Date function
                     We would appreciate if you keep our Shortify GitHub link in there or if you really 
                     want to remove it you can go a head and donate at http://paypal.me/AdityaTD -->
                     
                <p>&copy <?php echo " ".$website_name." "; echo date('Y'); ?><br /> Powered By: <a href="https://github.com/ShortifyURL/ShortifyURL">Shortify</a> An Open Source Software.</p>
            
            </div>
            </div>
        
            </center>
            </div>
        
        </div>
        
        <!-- Click To Copy -->
        <script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.5.16/dist/clipboard.min.js"></script>
        <script>
            (function(){
                new Clipboard('#btn');
            })();
        </script>
    </body>
    
</html>