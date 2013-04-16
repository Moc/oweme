<?php
/*
 * Owe Me! - an e107 plugin by Tijn Kuyper
 *
 * Copyright (C) 2013-2014 Tijn Kuyper (http://www.tijnkuyper.nl)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * Custom install/uninstall/update routines
*/

class oweme_setup
{
	
 	function install_pre($var)
	{
	
	}

	/**
	 * Installs example data after tables have been created 
	 */
	function install_post($var)
	{
		$sql = e107::getDb();
		$mes = e107::getMessage();
		
		// Categories
		$query_cat = "
		INSERT INTO `#oweme_categories` (`c_id`, `c_name`) VALUES
			(1, 'Friends'),
			(2, 'Family');
		";
		
		$status = ($sql->gen($query_cat)) ? E_MESSAGE_SUCCESS : E_MESSAGE_ERROR;
		$mes->add("Adding example categories", $status);

		// Debtors
		$query_debtors = "
		INSERT INTO `#oweme_debtors` (`d_id`, `d_name`) VALUES
			(1, 'John Doe'),
			(2, 'Jane Doe');
		";
		
		$status = ($sql->gen($query_debtors)) ? E_MESSAGE_SUCCESS : E_MESSAGE_ERROR;
		$mes->add("Adding example debtors", $status);

		// Entries
		$query_entries = "
		INSERT INTO `#oweme_entries` (`e_id`, `e_datestamp`, `e_category`, `e_amount`, `e_description`, `e_debtor`, `e_status`) VALUES
			(1, 1365544800, 1, 5.50, 'John ran out of cash for dinner.', '1', 1),
			(2, 1365544800, 2, 45.00, 'Jane had problems with her ATM card.', '2', 2);
		";
		
		$status = ($sql->gen($query_entries)) ? E_MESSAGE_SUCCESS : E_MESSAGE_ERROR;
		$mes->add("Adding example entries", $status);

		// Entries
		$query_statuses = "
		INSERT INTO `#oweme_statuses` (`s_id`, `s_name`, `s_label`) VALUES
			(1, 'Open', 'label-warning'),
			(2, 'Closed', 'label-success');
		";
		
		$status = ($sql->gen($query_statuses)) ? E_MESSAGE_SUCCESS : E_MESSAGE_ERROR;
		$mes->add("Adding example statuses", $status);
	}
	

	function uninstall_options()
	{

	}
	

	function uninstall_post($var)
	{

	}


	function upgrade_post($var)
	{

	}
	
}
?>