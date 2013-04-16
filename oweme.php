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
if (!e107::isInstalled('oweme'))
{
	header('location:'.e_BASE.'index.php');
	exit;
}

include_lan(e_PLUGIN."oweme/languages/".e_LANGUAGE."/".e_LANGUAGE."_front.php");

require_once(HEADERF);

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

	function getStatusname($s_id)
	{
		$sql = e107::getDb();
		$status = $sql->retrieve('oweme_statuses', 's_name', 's_id = '.$s_id.'');
		return $status;
	}
	
	function showOverview()
	{
		$sql = e107::getDb();

		$text = '
		<table class="table table-bordered">
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

		$entries = $sql->retrieve('oweme_entries', 'e_id, e_datestamp, e_category, e_amount, e_description, e_debtor, e_status', '', TRUE); 
		foreach ($entries as $entry) 
		{
		    $text .= '
	        <tr>
	        	<td>'.$entry["e_id"].'</td>
	        	<td>'.e107::getDate()->convert($entry["e_datestamp"]).'</td>
	        	<td>'.$this->getCategoryname($entry["e_category"]).'</td>
	        	<td>&euro;'.$entry["e_amount"].'</td>
	        	<td>'.$entry["e_description"].'</td>
	        	<td>'.$this->getDebtorname($entry["e_debtor"]).'</td>
	        	<td>'.$this->getStatusname($entry["e_status"]).'</td>
	    	</tr>';
		}
        
        $text .= '
	        </tbody>
	    </table>
		';
		
		e107::getRender()->tablerender("Owe Me!", $text);
	}
	
}


new oweme;

require_once(FOOTERF);
exit;

?>