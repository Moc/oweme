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

include_lan(e_PLUGIN."oweme/languages/".e_LANGUAGE."/".e_LANGUAGE."_front.php");

require_once(HEADERF);


// Ok, we're good to go.
class oweme
{

	function __construct()
	{
		$this->showOverview();
	}

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

		return array($statuslabel, $statusname);
	}
	
	// Here's the main table, the above functions are there to match the category/debtor/status id to the c/d/s name.
	function showOverview()
	{
		$sql = e107::getDb();

		$entries = $sql->retrieve('oweme_entries', 'e_id, e_datestamp, e_category, e_amount, e_description, e_debtor, e_status', '', TRUE); 

		// Check if there are entries in the database, if not, show info message.
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

				foreach ($entries as $entry) 
				{
					// Get the values from the getStatus(), and turn them into variables. 
					list($statuslabel, $statusname) = $this->getStatus($entry["e_status"]);

				    $text .= '
			        <tr>
			        	<td>'.$entry["e_id"].'</td>
			        	<td>'.e107::getDate()->convert_date($entry["e_datestamp"], "%d %B, %y").'</td>
			        	<td>'.$this->getCategoryname($entry["e_category"]).'</td>
			        	<td>&euro;'.$entry["e_amount"].'</td>
			        	<td>'.$entry["e_description"].'</td>
			        	<td>'.$this->getDebtorname($entry["e_debtor"]).'</td>
			        	<td><span class="label '.$statuslabel.'">'.$statusname.'</span></td>
			    	</tr>';
				}
		        
			        $text .= '
		        </tbody>
		    </table>
			';
		}
		else
		{
			$text = "
			<div class='alert alert-info'>
			 No entries yet.
			</div>.
			";
		}

		// Let's render it so we can show it to the visitors. 
		e107::getRender()->tablerender("Owe Me!", $text);
	}
	
}

new oweme;

require_once(FOOTERF);
exit;

?>