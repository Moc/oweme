<?php
/*
 * Owe Me! - an e107 plugin by Tijn Kuyper
 *
 * Copyright (C) 2013-2014 Tijn Kuyper (http://www.tijnkuyper.nl)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 */

require_once('../../class2.php');
if (!getperms('P')) 
{
	header('location:'.e_BASE.'index.php');
	exit;
}


class oweme_admin extends e_admin_dispatcher
{
	protected $modes = array(	

		'main'	=> array(
			'controller' 	=> 'oweme_entries_ui',
			'path' 			=> null,
			'ui' 			=> 'oweme_entries_form_ui',
			'uipath' 		=> null
		),
	
		'cat'	=> array(
			'controller' 	=> 'oweme_categories_ui',
			'path' 			=> null,
			'ui' 			=> 'oweme_categories_form_ui',
			'uipath' 		=> null
		),

		'other1'	=> array(
			'controller' 	=> 'oweme_debtors_ui',
			'path' 			=> null,
			'ui' 			=> 'oweme_debtors_form_ui',
			'uipath' 		=> null
		),	

		'other2'	=> array(
			'controller' 	=> 'oweme_statuses_ui',
			'path' 			=> null,
			'ui' 			=> 'oweme_statuses_form_ui',
			'uipath' 		=> null
		),

	);		
	
	protected $adminMenu = array(

		'main/list'			=> array('caption'=> "Manage entries", 'perm' => 'P'),
		'main/create'		=> array('caption'=> "Create entry", 'perm' => 'P'),

		'cat/list'			=> array('caption'=> "Manage categories", 'perm' => 'P'),
		'cat/create'		=> array('caption'=> "Create category",'perm' => 'P'),

		'other1/list'		=> array('caption'=> "Manage debtors", 'perm' => 'P'),
		'other1/create'		=> array('caption'=> "Create debtor", 'perm' => 'P'),

		'other2/list'		=> array('caption'=> "Manage statuses", 'perm' => 'P'),
		'other2/create'		=> array('caption'=> "Create status", 'perm' => 'P'),

	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'				
	);	
	
	protected $menuTitle = 'Owe Me!';
}




				
class oweme_categories_ui extends e_admin_ui
{			
	protected $pluginTitle		= 'Owe Me!';
	protected $pluginName		= 'Owe Me!';
	protected $table			= 'oweme_categories';
	protected $pid				= 'c_id';
	protected $perPage 			= 10; 
		
	protected $fields 		= array (  
		'checkboxes' =>   array ( 'title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => '1', 'class' => 'center', 'toggle' => 'e-multiselect',  ),
	  	'c_id' =>   array ( 'title' => 'LAN_ID', 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	  	'c_name' =>   array ( 'title' => 'LAN_NAME', 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'filter' => true, 'validate' => true, 'help' => 'Name of the category', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	  	'options' =>   array ( 'title' => 'Options', 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
	);		
	
	protected $fieldpref = array('c_id, c_name');		
}
				


class oweme_categories_form_ui extends e_admin_form_ui
{

}		
		

				
class oweme_debtors_ui extends e_admin_ui
{
	protected $pluginTitle		= 'Owe Me!';
	protected $pluginName		= 'Owe Me!';
	protected $table			= 'oweme_debtors';
	protected $pid				= 'd_id';
	protected $perPage 			= 10; 
		
	protected $fields 		= array (  
		'checkboxes' 		=>   array ( 'title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => '1', 'class' => 'center', 'toggle' => 'e-multiselect',  ),
	  	'd_id' 				=>   array ( 'title' => 'LAN_ID', 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	  	'd_name' 			=>   array ( 'title' => 'LAN_NAME', 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'filter' => true, 'validate' => true, 'help' => 'Name of the person owing you.', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	  	'options' =>   array ( 'title' => 'Options', 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
	);		
	
	protected $fieldpref = array('d_id, d_name');	
}
				


class oweme_debtors_form_ui extends e_admin_form_ui
{

}		
		

				
class oweme_entries_ui extends e_admin_ui
{	
	protected $pluginTitle		= 'Owe Me!';
	protected $pluginName		= 'Owe Me!';
	protected $table			= 'oweme_entries';
	protected $pid				= 'e_id';
	protected $perPage 			= 10; 
		
	protected $fields 		= array (  
		'checkboxes'					=>   array ( 'title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => '1', 'class' => 'center', 'toggle' => 'e-multiselect',  ),

		'e_id' =>   array ( 'title' => 'LAN_ID', 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	  	'e_datestamp' =>   array ( 'title' => 'LAN_DATESTAMP', 'type' => 'datestamp', 'data' => 'int', 'width' => 'auto', 'filter' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	  	'e_category' =>   array ( 'title' => 'LAN_CATEGORY', 'type' => 'dropdown', 'data' => 'int', 'width' => 'auto', 'filter' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	 	'e_amount' =>   array ( 'title' => 'LAN_OWEME_AMOUNT', 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'validate' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'center', 'thclass' => 'center',  ),
	  	'e_description' =>   array ( 'title' => 'LAN_DESCRIPTION', 'type' => 'text', 'data' => 'str', 'width' => '40%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	  	'e_debtor' =>   array ( 'title' => 'LAN_OWEME_DEBTOR', 'type' => 'dropdown', 'data' => 'str', 'width' => 'auto', 'validate' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'center', 'thclass' => 'center',  ),
	  	'e_status' =>   array ( 'title' => 'LAN_STATUS', 'type' => 'dropdown', 'data' => 'int', 'width' => 'auto', 'validate' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'center', 'thclass' => 'center',  ),
	  	'options' =>   array ( 'title' => 'Options', 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
	);		
	
	protected $fieldpref = array('e_id', 'e_datestamp', 'e_category', 'e_amount', 'e_description', 'e_debtor', 'e_status');
		

	public function init()
	{
		$sql = e107::getDb();

		// statuses
		$this->status[0] = "(No status)";
		if($sql->select('oweme_statuses'))
		{
			while ($row = $sql->fetch())
			{
				$this->status[$row['s_id']] = $row['s_name'];
			}
		}
	
		$this->fields['e_status']['writeParms'] = $this->status;


		// categories
		$this->category[0] = "(No category)";
		if($sql->select('oweme_categories'))
		{
			while ($row = $sql->fetch())
			{
				$this->category[$row['c_id']] = $row['c_name'];
			}
		}
		
		$this->fields['e_category']['writeParms'] = $this->category;


		// debtors
		$this->debtor[0] = "(No debtor)";
		if($sql->select('oweme_debtors'))
		{
			while ($row = $sql->fetch())
			{
				$this->debtor[$row['d_id']] = $row['d_name'];
			}
		}
		
		$this->fields['e_debtor']['writeParms'] = $this->debtor;
	}

}
				


class oweme_entries_form_ui extends e_admin_form_ui
{

}		
		

				
class oweme_statuses_ui extends e_admin_ui
{
			
		protected $pluginTitle		= 'Owe Me!';
		protected $pluginName		= 'Owe Me!';
		protected $table			= 'oweme_statuses';
		protected $pid				= 's_id';
		protected $perPage 			= 10; 
			
		protected $fields 		= array (  
			'checkboxes' =>   array ( 'title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => '1', 'class' => 'center', 'toggle' => 'e-multiselect',  ),
			's_id' =>   array ( 'title' => 'LAN_ID', 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
			's_name' =>   array ( 'title' => 'LAN_NAME', 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'validate' => true, 'help' => 'Name of the status', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
			's_icon' =>   array ( 'title' => 'LAN_ICON', 'type' => 'icon', 'data' => 'str', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
			'options' =>   array ( 'title' => 'Options', 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
		);		
		
		protected $fieldpref = array('s_id', 's_name');		
}
				


class oweme_statuses_form_ui extends e_admin_form_ui
{

}		
		
		
new oweme_admin();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;

?>