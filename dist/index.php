<?php include_once('functions.php'); 
    // Build out URI to reload from form dropdown
    $pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    if (isset($_POST['uri']) && isset($_POST['section'])) {
        $pageURL .= $_POST[uri].$_POST[section];
        header("Location: $pageURL");
    }
?>
<!doctype HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>A List Apart Pattern Library</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/pattern-lib.css" />

	
</head>

<body class="xx">
    
    <?php if(isset($_GET["url"])) : ?>
        
        <?php include($patternsPath.$_GET["url"]) ?>

    <?php else : ?>
        
        <h1 class="xx-title">A Pattern Apart</h1>
        <p class="xx-subtitle">A List Apart's pattern library</p>
        
        <div class="global-nav deluxe xx-nav">
            
            <ul class="inline-items">
                <li><a href="/">Home</a></li>
            </ul>
            
            <form action="" method="post" id="pattern" class="pattern-jump">
                <select name="section" id="pattern-select" class="nav-section-select">
                    <option value="">Jump to&#8230;</option>
                    <?php displayOptions($patternsPath); ?>
                    
                </select>
                <input type="hidden" name="uri" value="<?php echo $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>">
                <button type="submit" id="pattern-submit">Go</button>
            </form>
            
        </div>
        
        <main role="main">
        
            <?php displayPatterns($patternsPath); ?>
        
        </main>
    
    <?php endif; ?>
	
</body>

<script src="js/pattern-lib.js"></script>

<script>

    // Adds class of js to the html tag if JS is enabled
    document.getElementsByTagName('html')[0].className += ' js';
    
    // Adds class of svg to the html tag if svg is enabled
    (function flagSVG() {
        var ns = {'svg': 'http://www.w3.org/2000/svg'};
        if(document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1")) {document.getElementsByTagName('html')[0].className += ' svg';}
    })();
    
    (function (document, undefined) {
        // Pattern selector
        document.getElementById('pattern-submit').style.display = 'none';
        document.getElementById('pattern-select').onchange = function() {
            //document.location=this.options[this.selectedIndex].value;
            var val = this.value;
            if (val !== "") {
                window.location = val;
            }
        }
    })(document);

</script>

</html> 