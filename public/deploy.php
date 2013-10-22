<?php
/**
 * GIT DEPLOYMENT SCRIPT
 *
 * Used for automatically deploying websites via github or bitbucket, more deets here:
 *
 *		https://gist.github.com/1809044
 */

// The commands
$commands = array(
    'cd /var/www/hml.san-francisco.com.ua && echo $PWD',
    'cd /var/www/hml.san-francisco.com.ua && whoami',
    'cd /var/www/hml.san-francisco.com.ua && git pull',
    'cd /var/www/hml.san-francisco.com.ua && git status',
    'cd /var/www/hml.san-francisco.com.ua && git submodule sync',
    'cd /var/www/hml.san-francisco.com.ua && git submodule update',
    'cd /var/www/hml.san-francisco.com.ua && git submodule status',
    "cd /var/www/hml.san-francisco.com.ua && php artisan clear-compiled",
	"cd /var/www/hml.san-francisco.com.ua && php artisan optimize"
);

// Run the commands for output
$output = '';
foreach($commands AS $command){
    // Run it
    $tmp = exec($command);
    // Output
    $output .= "{$command}\n";
    $output .= htmlentities(trim($tmp)) . "\n";
}

// Make it pretty for manual user access (and why not?)
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>GIT DEPLOYMENT SCRIPT</title>
</head>
<body style="background-color: #000000; color: #FFFFFF; font-weight: bold; padding: 0 10px;">
<pre>
 .  ____  .    ____________________________
 |/      \|   |                            |
[| <span style="color: #FF0000;">&hearts;    &hearts;</span> |]  | Git Deployment Script v0.1 |
 |___==___|  /              &copy; oodavid 2012 |
              |____________________________|

    <?php echo $output; ?>
</pre>
</body>
</html>