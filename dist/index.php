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

<body class="xx">

    <?php if(isset($_GET["url"]) && sanipath( $patternsPath . $_GET["url"] ) ): ?>
        <?php include_pattern( sanipath( $patternsPath . $_GET["url"] ), "Pattern not found." ); ?>
    <?php else : ?>

        <section class="main-content">

            <h1 class="xx-title">A Pattern Apart</h1>
            <p class="xx-subtitle">A List Apart's pattern library</p>

            <div class="global-nav deluxe xx-nav">

                <ul class="inline-items">
                    <li><a href="http://alistapart.com">Home</a></li>
                    <li><a href="patchwork.php">View as patchwork</a></li>
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

                <div class="pattern">
                	<div class="pattern-details">
                	    <h3 class="pattern-name">Swatches</h3>
                	</div>
                    <div class="pattern-preview">
                        <ul class="swatches">
                            <li class="swatch">
                                <p class="swatch-preview" style="background-color: #222;">
                                    <span class="swatch-details"><strong>Text:</strong> #222</span>
                                </p>
                            </li>
                            <li class="swatch">
                                <p class="swatch-preview" style="background-color: #2455c3;">
                                    <span class="swatch-details"><strong>Link:</strong> #2455c3</span>
                                </p>
                            </li>
                            <li class="swatch">
                                <p class="swatch-preview" style="background-color: #bb3825;"></span>
                                    <span class="swatch-details"><strong>Accent:</strong> #bb3825</span>
                                </p>
                            </li>
                            <li class="swatch">
                                <p class="swatch-preview" style="background-color: #acba3c;"></span>
                                    <span class="swatch-details"><strong>Accent 2:</strong> #acba3c</span>
                                </p>
                            </li>
                            <li class="swatch">
                                <p class="swatch-preview" style="background-color: #f0f0f0;">
                                    <span class="swatch-details" style="color: #333;"><strong>Fill:</strong> #f0f0f0</span>
                                </p>
                            </li>
                		</ul>
                	</div>
                </div>

        		<div class="pattern">
        			<div class="pattern-details">
        			    <h3 class="pattern-name">Typography</h3>
        			</div>
        			<div class="pattern-preview">
        		    	<ul>
        		    		<li style="font-family: 'Georgia Pro', Georgia, serif">Body text: Georgia Pro <small>· <a href="http://www.webtype.com/font/georgia-pro-complete-family-2/">View at Webtype</a></small></li>
        		    		<li style="font-family: 'Georgia Pro', Georgia, serif; font-style: italic">Body text: Georgia Pro Italic</li>
        		    		<li style="font-family: 'Georgia Pro Semibold', Georgia, serif">Bold body text: Georgia Pro Semibold</li>
        		    		<li style="font-family: 'Georgia Pro Cond', serif">Condensed body for mobile: Georgia Pro Condensed</li>
        		    		<li style="font-family: 'Franklin ITC Pro', sans-serif;">Sans-serif: Franklin ITC Pro · <a href="http://www.webtype.com/font/itc-franklin-family/">View at Webtype</a></li>
        		    		<li style="font-family: 'Franklin ITC Pro Bold', sans-serif;">Sans-serif Bold: Franklin ITC Pro Bold</li>
        		    	</ul>
        		    </div>
        		</div>

                <?php displayPatterns($patternsPath); ?>

            </main>

        </section>

    <?php endif; ?>
</body>

<script src="js/pattern-lib.js"></script>

</html>
