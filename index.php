<!-- --------------------------------------- -->
<!-- You don't need to change anything here! -->
<!-- --------------------------------------- -->

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
    
    # Bekomme URL
    $url = str_replace($experimental_path, "", $_SERVER['REQUEST_URI']);
    
    # Entfernt das "/" am Anfang
    if ($url{0} == "/") {
        $url = str_split($url,1); 
        array_shift($url); 
        $url = implode("",$url);       
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
        <header>
            <?php
            # Eigene Header-Datei
            include 'header.php';    
            ?>
        </header>
        
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
            if (file_exists("pages/$url.php")) {
                $path = "pages/$url.php";
                include $path;
            }
            
            # HTML?
            if (file_exists("pages/$url.html")) {
                $path = "pages/$url.html";
                include $path;
            }
            
        }
        ?>
        
        <footer>
            <?php
            # Eigene Footer-Datei
            include 'footer.php';    
            ?>
        </footer>
        
    </body>
    
</html>
