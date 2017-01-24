<?php

$themeini = parse_ini_file("./configs/theme.ini");
$bootstrap_theme = $themeini["BootstrapThemeURL"];

$site_title = "Shortify URL;
$site_name = "ShortifyURL";
$site_logo = "./img/logo.png";
$site_favicon = "./favicon.ico";

$seo_keywords = "one, two, three";
$seo_description = "An Open Source URL Shortner For Your Website."

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        
        <!-- Website Details & SEO -->
        <title><?php echo $site_title; ?></title>
        
        <link href="<?php echo $site_favicon; ?>" rel="icon" type="image/x-icon" />
        
        <!-- Bootstrap Stuff -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8"> 
        <link rel="stylesheet" href="<?php echo $bootstrap_theme; ?>">
        <link rel="stylesheet" href="./css/main.css">
    </head>
    
    <body>
        <div class="container">
            
                <div class="jumbotron">
                    <center>
                  <h1><?php echo $site_name; ?></h1>
                  
                  <hr class="style1" />
                  
                      <div class="form-horizontal">
                          <div class="input-group">
                              <input type="text" class="form-control" style="width: 400px;" placeholder="Enter a Long URL Here...">
                                  <span class="input-group-btn" style="width:0;">
                                       <button class="btn btn-primary" type="button">Shorten</button>
                                  </span>
                          </div>
                    </div>
                      
                  <hr class="style1" />
                  
                  <h4>Copyright &copy <?php echo $site_name . " "; echo date('Y'); ?></h4><h6>Powered By:<a href="https://github.com/ShortifyURL/ShortifyURL/"> ShortifyURL</a>, An Open Source Software.</h6>
                      
                  </center>
                </div>

                <div class="col-sm-8">
                    
                </div>
            
        </div>
    </body>
    
</html>