<?php
/*
 * Owe Me! - an e107 plugin by Tijn Kuyper
 *
 * Copyright (C) 2013-2014 Tijn Kuyper (http://www.tijnkuyper.nl)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 */

require_once("../../class2.php");

// Make this page unaccessible when plugin is not installed. 
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

// Load the LAN files
e107::lan('oweme', false, true);
$oweme_pref = e107::getPlugPref('oweme');

require_once(HEADERF);

// Ok, all neccessary files are included, all checks have been passed: we are good to go.
// Class that includes methods that are needed to show the main table.
class oweme
{
	function getCategoryname($c_id)
	{
		$sql = e107::getDb();
		$category = $sql->retrieve('oweme_categories', 'c_name', 'c_id = '.$c_id.'');
		return $category;
	}

	function getDebtorname($d_id)
	{
		$sql = e107::getDb();
		$debtor = $sql->retrieve('oweme_debtors', 'd_name', 'd_id = '.$d_id.'');
		return $debtor;
	}

	function getStatus($s_id)
	{
		$sql = e107::getDb();
		$status = $sql->retrieve('oweme_statuses', 's_name, s_label', 's_id = '.$s_id.'');
		
		$statusname = $status["s_name"];
		$statuslabel = $status["s_label"];

		return array($statuslabel, $statusname); // return the values in an array
	}
}

$oweme = new oweme;
$sql = e107::getDb();

// Query that checks the database for entries
$entries = $sql->retrieve('oweme_entries', 'e_id, e_datestamp, e_category, e_amount, e_description, e_debtor, e_status', '', TRUE); 
/* Queries to prepare for the NEXTPREV 
	$total_entries = $sql->count('oweme_entries');
	$epp = $oweme_pref['epp'];
*/ 

if($entries)
{
	$text = '
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
          	<th>'.LAN_OWEME_ID.'</th>
          	<th>'.LAN_OWEME_DATE.'</th>
          	<th>'.LAN_OWEME_CATEGORY.'</th>
          	<th>'.LAN_OWEME_AMOUNT.'</th>
          	<th>'.LAN_OWEME_DESCRIPTION.'</th>
          	<th>'.LAN_OWEME_DEBTOR.'</th>
          	<th>'.LAN_OWEME_STATUS.'</th>
        </tr>
     </thead>
     	<tbody>';
     	
     	// Loop trough each entry
		foreach ($entries as $entry) 
		{
			// Turn the array that was returned by getStatus() into variables. 
			list($statuslabel, $statusname) = $oweme->getStatus($entry["e_status"]);

		    $text .= '
	        <tr>
	        	<td>'.$entry["e_id"].'</td>
	        	<td>'.e107::getDate()->convert_date($entry["e_datestamp"], "%d %B, %Y").'</td>
	        	<td>'.$oweme->getCategoryname($entry["e_category"]).'</td>
	        	<td>'.$entry["e_amount"]." ".$oweme_pref["currency"].'</td>
	        	<td>'.$entry["e_description"].'</td>
	        	<td>'.$oweme->getDebtorname($entry["e_debtor"]).'</td>
	        	<td><span class="label '.$statuslabel.'">'.$statusname.'</span></td>
	    	</tr>';
		}
        
	        $text .= '
        </tbody>
    </table>';
    /* NEXTPREV - WORK IN PROGRESS
    $parms = "total={$total_entries}&amount={$epp}&current=0";
	$text .= "<div class='nextprev'>".e107::getParser()->parseTemplate("{NEXTPREV={$parms}}").'</div>
	';*/
}
// No entries, display info message
else
{
	$text = "
	<div class='alert alert-info alert-block text-center'>".LAN_OWEME_001."</div>
	";
}

// Let's render and show it!
e107::getRender()->tablerender("Owe Me!", $text);

require_once(FOOTERF);
exit;
?>