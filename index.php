<!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->
<!-- You don't need to change anything here! -->
<!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->

<!DOCTYPE html>
<html>
    
    <?php
    # Config-Einbindung:
    include 'config.php';
    
    # Entfernt "/" am Ende
    if ($main_domain{strlen($main_domain) - 1} == "/") {
        $main_domain = substr($main_domain, 0, -1);      
    }
    if ($experimental_path{strlen($experimental_path) - 1} == "/") {
        $experimental_path = substr($experimental_path, 0, -1);      
    }
    
    # Deaktiviert Fehlermeldungen:
    ini_set('display_errors', 0);
    
    # Get Custom URL
    $get_page = $_GET["p"];
    
    # Bei Custom URL umleiten
    if ($get_page != null) {
        $redirect_to = "$main_domain$experimental_path/$get_page";
        echo $redirect_to;
        header ("Location: $redirect_to");
        exit;
    }
    
    # Bekomme URL
    $url = str_replace($experimental_path, "", $_SERVER['REQUEST_URI']);
    
    # Entfernt das "/" am Anfang
    if ($url{0} == "/") {
        $url = str_split($url,1); 
        array_shift($url); 
        $url = implode("",$url);       
    }
    
    # Bei Startseite auf eigentliche Startseite
    if ($url == "index.php" || $url == "index" || $url == "startpage") {
        header ("Location: ".$main_domain.$experimental_path);
        exit;
    }
    
    # $url -> Kleinbuchstaben
    $url = strtolower($url);
    
    # Definiere $page
    $page = ucfirst($url);
    ?>
    
    <head>
        <?php
        # Eigene Head-Datei
        include 'head.php';
        
        # Parsedown + Parsedown-Extra (parsedown.org)
        include 'assets/parsedown.php';
        include 'assets/parsedown-extra.php';
        
        # Seiten-Titel
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
            # Eigene Header-Datei
            include 'header.php';    
            ?>
        
        <?php
        # Startseite?
        if ($url == null) {
            
            # Markdown?
            if (file_exists("pages/startpage.md")) {
                echo "<main>";
                include 'pages/startpage.md';
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
                $Extra = new ParsedownExtra();
                echo $Extra->text(file_get_contents($path));
                
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
            # Eigene Footer-Datei
            include 'footer.php';    
            ?>
        
    </body>
    
</html>
