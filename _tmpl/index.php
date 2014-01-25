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
<body>

<body class="xx">
    
    <?php if(isset($_GET["url"])) : ?>
        
        <?php include($patternsPath.$_GET["url"]) ?>
    
    <?php else : ?>
        
        <h1>ALA Pattern Library</h1>
        
        <form action="" method="post" id="pattern">
            <select name="section" id="pattern-select" class="nav-section-select">
                <option value="">Jump to&#8230;</option>
                <?php displayOptions($patternsPath); ?>
                
            </select>
            <input type="hidden" name="uri" value="<?php echo $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>">
            <button type="submit" id="pattern-submit">Go</button>
        </form>
        
        <main role="main">
        
            <?php displayPatterns($patternsPath); ?>
        
        </main>
    
    <?php endif; ?>
	
</body>

<script src="js/pattern-lib.js"></script>

</html> 