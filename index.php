<?php

    // Developed By: Aditya N. Tripathi a.k.a AdityaTD (AdityaTD.me)

    //Using to stop repeat on shorten.php
    session_start();
    $_SESSION['prevent_repeat'] = rand();

    //Loading The Config File
    $config = parse_ini_file("./configs/website/main.ini");
    
    //WebsiteDetails
    $website_title = $config["website_title"];
    $website_name = $config["website_name"];
    
    //SEODetails
    $seo_description = $config["seo_description"];
    $seo_keywords = $config["seo_keywords"];
    
    //ThemeDetails
    $bootstrap_url = $config["bootstrap_theme"];

?>

<!DOCTYPE html>
<html lang="en">
    
    <!-- Developed By: Aditya N. Tripathi a.k.a AdityaTD (AdityaTD.me) -->
    
    <head>
    
    <!-- Loading Website Title, SEO Description and Keywords from the Config -->
    <title><?php echo $website_title; ?></title>
    <meta name="description" content="<?php echo $seo_description; ?>">
    <meta name="keywords" content="<?php echo $seo_keywords; ?>">
    
    <link href="./images/favicon.ico" rel="icon" type="image/x-icon" />
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Importing Theme from Config File! -->
    <link href="<?php echo $bootstrap_url; ?>" rel="stylesheet" crossorigin="anonymous">
    
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
                    
            
            <!-- The Form code being used to send the long url to shorten.php function -->        
            <form method="post" action="./shorten.php">
                <div class="input-group">
                <input class="form-control" type="text" name="longurl" placeholder="Enter a URL to Shorten" required style="padding: 30px;" /> <br />
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" style="-webkit-transition-duration: 0.3s; padding: 20px;">Submit</button>
                </span>
                </div>
            </form>
            
                <hr />
                
                <!-- Copyright Code loading website name from config and adding date from PHP's Date function
                     We would appreciate if you keep our Shortify GitHub link in there or if you really 
                     want to remove it you can go a head and donate at http://paypal.me/AdityaTD -->
                     
                <p>&copy <?php echo " ".$website_name." "; echo date('Y'); ?><br />Powered By: <a href="https://github.com/ShortifyURL/ShortifyURL">Shortify</a> An Open Source Software.</p>
            
            </div>
            </div>
        
            </center>
            </div>
        
        </div>
    </body>
    
</html>