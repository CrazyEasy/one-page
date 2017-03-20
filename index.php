<!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->
<!-- You don't need to change anything here! -->
<!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->

<!DOCTYPE html>
<html>
    
    <?php
    # Include Config
    include 'config.php';
    
    # Removes "/" at the End
    if ($main_domain{strlen($main_domain) - 1} == "/") {
        $main_domain = substr($main_domain, 0, -1);      
    }
    
    if ($experimental_path != null) {
        
        if ($experimental_path{strlen($experimental_path) - 1} == "/") {
            $experimental_path = substr($experimental_path, 0, -1);      
        }   
    }
    
    # Deactivate Errors
    ini_set('display_errors', 0);
    
    # Get Custom URL
    $get_page = $_GET["p"];
    
    # Redirect if Custom URL
    if ($get_page != null) {
        $redirect_to = "$main_domain$experimental_path/$get_page";
        echo $redirect_to;
        header ("Location: $redirect_to");
        exit;
    }
    
    # Get URL
    $url = str_replace($experimental_path, "", $_SERVER['REQUEST_URI']);
    
    # Removes "/" at the beginning
    if ($url{0} == "/") {
        $url = str_split($url,1); 
        array_shift($url); 
        $url = implode("",$url);       
    }
    
    # Alias -> start page
    if ($url == "index.php" || $url == "index" || $url == "startpage") {
        header ("Location: ".$main_domain.$experimental_path);
        exit;
    }
    
    # $url -> lowercase
    $url = strtolower($url);
    
    # define $page (ucfirst)
    $page = ucfirst($url);
    ?>
    
    <head>
        <?php
        # include head
        include 'head.php';
        
        # parsedown + parsedown-Extra (parsedown.org)
        include 'assets/parsedown.php';
        include 'assets/parsedown-extra.php';
        
        # page title
        if ($page == null) {
            echo "<title>$page_name</title>";
        } 
        else {
            echo "<title>$page_name - $page</title>";
        }
        ?>
    </head>
    
    <body>
            <?php
            # include header
            include 'header.php';    
            ?>
        
        <?php
        # start page?
        if ($url == null) {
            
            # Markdown?
            if (file_exists("pages/startpage.md")) {
                $path = "pages/startpage.md";
                echo "<main>";
                
                # Parse MarkDown using Parsedown + Parsedown Extra (Parsedown.org)
                if ($markdown_extra) {
                    $Extra = new ParsedownExtra();
                    echo $Extra->text(file_get_contents($path));
                }
                
                else {
                    $Parsedown = new Parsedown();
                    echo $Parsedown->text(file_get_contents($path));
                }
                
                echo "</main>";
            }
            
            # PHP?
            elseif (file_exists("pages/startpage.php")) {
                include 'pages/startpage.php';
            }
            
            # HTML?
            elseif (file_exists("pages/startpage.html")) {
                include 'pages/startpage.html';
            }
            
            else {
                echo "Error! No start page found!";
            }    
            
        }
        
        else {
            
            # Markdown?
            if (file_exists("pages/$url.md")) {
                $path = "pages/$url.md";
                echo "<main>";
                
                # Parse MarkDown using Parsedown + Parsedown Extra (Parsedown.org)
                if ($markdown_extra) {
                    $Extra = new ParsedownExtra();
                    echo $Extra->text(file_get_contents($path));
                }
                
                else {
                    $Parsedown = new Parsedown();
                    echo $Parsedown->text(file_get_contents($path));
                }
                    
                echo "</main>";
            }
            
            # PHP?
            elseif (file_exists("pages/$url.php")) {
                $path = "pages/$url.php";
                include $path;
            }
            
            # HTML?
            elseif (file_exists("pages/$url.html")) {
                $path = "pages/$url.html";
                include $path;
            }
            
            # 404!
            else {
                header ("Location: ".$main_domain.$experimental_path."/404");
            }
            
        }
        ?>
        
            <?php
            # include footer
            include 'footer.php';    
            ?>
        
    </body>
    
</html>
