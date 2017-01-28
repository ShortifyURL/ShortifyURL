<?php

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
    $random_letters = $config["random_letters"];
    $code_length = $config["code_length"];

?>

<!DOCTYPE html>
<html lang="en">
    
    <!-- Developed By: Aditya N. Tripathi a.k.a AdityaTD (AdityaTD.me) -->
    
    <head>
    
    <!-- Loading Website Title, SEO Description and Keywords from the Config -->
    <title><?php echo $website_title; ?> | Setup</title>
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
                <h1 style="font-size: 64px;">Setup Shortify</h1><hr />
                <br />
                <div style="width: 75%;">
                    
            
            <!-- The Form code being used to send the long url to shorten.php function -->        
            <form method="post" action="./functions/savetoconfig.php">
                <!-- Main Website Settings -->
                <h3>Website Name</h3>
                <input class="form-control" value="<?php echo $website_name; ?>" type="text" name="website-name" placeholder="Your URL Shortner Name..." required style="padding: 30px;" /> <br />
                
                <h3>Website Title (Shown in Web Brwoser Tabs)</h3>
                <input class="form-control" value="<?php echo $website_title; ?>" type="text" name="website-title" placeholder="Your URL Shortner Title..." required style="padding: 30px;" /> <br />
                
                <h3>Website URL/Link (Example: http://shortify.ml/)</h3>
                <input class="form-control" value="<?php echo $website_link; ?>" type="url" name="website-link" placeholder="Your Website Link (MUST HAVE / AT END)..." required style="padding: 30px;" /> <br /><hr />
                
                <!-- SEO Settings -->
                <h3>Website Description</h3>
                <input class="form-control" value="<?php echo $seo_description; ?>" type="text" name="seo-description" placeholder="Your URL Shortner Description..." required style="padding: 30px;" /> <br />
                
                <h3>Website Keywords</h3>
                <input class="form-control" value="<?php echo $seo_keywords; ?>" type="text" name="seo-keywords" placeholder="Your URL Shortner Keywords..." required style="padding: 30px;" /> <br /><hr />
                
                <!-- Short URL Settings -->
                <h3>Random Letters (It's Not Recommended To Change This)</h3>
                <input class="form-control" value="<?php echo $random_letters; ?>" type="text" name="random-letters" placeholder="Random Code Letters..." required style="padding: 30px;" /> <br />
                
                <h3>Short URL Length</h3>
                <input class="form-control" value="<?php echo $code_length; ?>" type="text" name="code-length" placeholder="Code Length..." required style="padding: 30px;" /> <br /><hr />
                
                <!-- Theme URL -->
                <h3>Bootswatch Theme URL (<a href="https://www.bootstrapcdn.com/bootswatch/">Clcik Here</a> To Find)</h3>
                <input class="form-control" value="<?php echo $bootstrap_url; ?>" type="text" name="theme-url" placeholder="Bootswatch URL..." required style="padding: 30px;" /> <br />
                
                <button type="submit" class="btn btn-primary">Save Settings</button>
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