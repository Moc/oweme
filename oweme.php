<?php
/*
 * Owe Me! - an e107 plugin by Tijn Kuyper
 *
 * Copyright (C) 2014-2015 Tijn Kuyper (http://www.tijnkuyper.nl)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 */

require_once("../../class2.php");

// Make this page inaccessible when plugin is not installed. 
if (!e107::isInstalled('oweme'))
{
	header('location:'.e_BASE.'index.php');
	exit;
}

// Exit when running PHP < 5.3 to motivate people to move to 5.3+. 
// Oh right, and to be sure that I can use the latest PHP functions! :)
$php_version = phpversion();
if(version_compare($php_version, 5.3, "<"))
{
	require_once(HEADERF);
	$text = 'A minimum version of PHP 5.3 is required';
	e107::getRender()->tablerender("Owe Me! - Error", $text); 
	require_once(FOOTERF);
	exit;
}

// Load the LAN files and other required files
e107::lan('oweme', false, true);

require_once(HEADERF);
require_once('templates/oweme_template.php'); // TODO: check why this is needed...
require_once('oweme_shortcodes.php'); // TODO: check why this is needed...

// Ok, all neccessary files are included, all checks have been passed: we are good to go.
$sql = e107::getDb();
$sc  = new oweme_shortcodes();
$tp  = e107::getParser();

// Query that checks the database for entries
$entries = $sql->retrieve('oweme_entries', 'e_id, e_datestamp, e_category, e_amount, e_description, e_debtor, e_status', '', TRUE); 

/* TODO
	Queries to prepare for the NEXTPREV 
	$oweme_pref = e107::getPlugPref('oweme');
	$total_entries = $sql->count('oweme_entries');
	$epp = $oweme_pref['epp'];
*/

// Check if there antires
if($entries)
{
 	$text = $tp->parseTemplate($OWEME_TEMPLATE['start'], false, $sc);

	foreach($entries as $entry)
	{
		$sc->setVars($entry); // pass query values on so they can be used in the shortcodes 
		$text .= $tp->parseTemplate($OWEME_TEMPLATE['items'], false, $sc);
	}

	$text .= $tp->parseTemplate($OWEME_TEMPLATE['end'], false, $sc);
    
    /* TODO
    	NEXTPREV - WORK IN PROGRESS 
    	$parms = "total={$total_entries}&amount={$epp}&current=0";
		$text .= "<div class='nextprev'>".e107::getParser()->parseTemplate("{NEXTPREV={$parms}}").'</div>';
	*/

}
// No entries, display info message
else
{
	$text = "<div class='alert alert-info text-center'>".LAN_OWEME_001."</div>";
}

// Let's render and show it all!
e107::getRender()->tablerender("Owe Me!", $text);

require_once(FOOTERF);
exit;
?>