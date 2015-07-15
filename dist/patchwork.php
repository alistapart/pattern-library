<?php include_once('functions.php');
    // Build out URI to reload from form dropdown
    $pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    if (isset($_POST['uri']) && isset($_POST['section'])) {
        $pageURL .= $_POST[uri].$_POST[section];
        $pageURL = htmlspecialchars( filter_var( $pageURL, FILTER_SANITIZE_URL ) );

        header("Location: $pageURL");
    }
?>
<!doctype HTML>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>A List Apart Pattern Library</title>

	<link rel="stylesheet" href="css/pattern-lib.css" />
 <link rel="icon" type="image/x-icon" href="/favicon.ico" />

</head>

<body class="xx xx-patchwork">

     <?php if(isset($_GET["url"]) && sanipath( $patternsPath . $_GET["url"] ) ): ?>
        <?php include_pattern( sanipath( $patternsPath . $_GET["url"] ), "Pattern not found." ); ?>
    <?php else : ?>

    <section class="main-content">

        <h1 class="xx-title">A Pattern Apart</h1>
        <p class="xx-subtitle">A List Apart's pattern library</p>

        <p class="xx-subtitle">This is the patchwork view which doesn't include the markup preview and usage examples. This view is particularly useful for device testing because it shows elements at full-width, presented on the page as they would appear on the site.</p>

        <div class="global-nav deluxe xx-nav">

            <ul class="inline-items">
                <li><a href="http://alistapart.com">Home</a></li>
                <li><a href="/">View with code examples</a></li>
                <li><a href="https://github.com/alistapart/pattern-library">Github Repo</a></li>
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
            <?php displayPatchwork($patternsPath); ?>
        </main><!--@main-->

    </section>

    <?php endif; ?>
</body>

<script src="js/pattern-lib.js"></script>

</html>
