<?php
/*
 * Owe Me! - an e107 plugin by Tijn Kuyper
 *
 * Copyright (C) 2014-2015 Tijn Kuyper (http://www.tijnkuyper.nl)
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

		// Statuses
		$query_statuses = "
		INSERT INTO `#oweme_statuses` (`s_id`, `s_name`, `s_label`) VALUES
			(1, 'Open', 'label-danger'),
			(2, 'Closed', 'label-success');
		";
		
		$status = ($sql->gen($query_statuses)) ? E_MESSAGE_SUCCESS : E_MESSAGE_ERROR;
		$mes->add("Adding example statuses", $status);

		// Currencies
		$query_currencies = "
		INSERT INTO `#oweme_currencies` (`cur_id`, `cur_symbol`, `cur_code`, `cur_description`, `cur_location`) VALUES
			(1, '&#36;AU', 'AUD', 'Australian Dollar', 'front'),
			(2, 'C&#36;', 'CAD', 'Canadian Dollar', 'front'),
			(3, 'SFr.', 'CHF', 'Swiss Franc', 'front'),
			(4, 'K&#196;', 'CZK', 'Czech Koruna', 'front'),
			(5, 'Dkr.', 'DKK', 'Danish Krone', 'front'),
			(6, '&#8364;', 'EUR', 'Euro', 'front'),
			(7, '&#163;', 'GBP', 'Pound Sterling', 'front'),
			(8, 'HK&#36;', 'HKD', 'Hong Kong Dollar', 'front'),
			(9, 'Ft', 'HUF', 'Hungarian Forint', 'front'),
			(10, '&#165;', 'JPY', 'Japanese Yen', 'front'),
			(11, 'Mex&#36;', 'MXN', 'Mexican Peso', 'front'),
			(12, 'Nkr.', 'NOK', 'Norwegian Krone', 'front'),
			(13, 'NZ&#36;', 'NZD', 'New Zealand Dollar', 'front'),
			(14, '&#8369;', 'PHP', 'Philippine Peso', 'back'),
			(15, 'P&#142;', 'PLN', 'Polish Zloty', 'front'),
			(16, 'Skr.', 'SEK', 'Swedish Krona', 'front'),
			(17, 'S&#36;', 'SGD', 'Singapore Dollar', 'front'),
			(18, '&#3647;', 'THB', 'Thai Baht', 'front'),
			(19, 'T&#36;', 'TWD', 'Taiwan New Dollar', 'back'),
			(20, '&#36;', 'USD', 'U.S. Dollar', 'front');
		";
		
		$status = ($sql->gen($query_currencies)) ? E_MESSAGE_SUCCESS : E_MESSAGE_ERROR;
		$mes->add("Adding currencies", $status);
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