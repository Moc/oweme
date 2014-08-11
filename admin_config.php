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

		'main/prefs'		=> array('caption'=> "Preferences", 'perm' => 'P'),

	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'				
	);	
	
	protected $menuTitle = 'Owe Me!';
}

	//'main/prefs' 		=> array('caption'=> LAN_PREFS, 'perm' => 'P'),	



				
class oweme_categories_ui extends e_admin_ui
{			
	protected $pluginTitle		= 'Owe Me!';
	protected $pluginName		= 'Owe Me!';
	protected $table			= 'oweme_categories';
	protected $pid				= 'c_id';
	protected $perPage 			= 10; 
		
	protected $fields 		= array (  
		'checkboxes' =>   array ( 'title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => '1', 'class' => 'center', 'toggle' => 'e-multiselect',  ),
	  	'c_id' =>   array ( 'title' => LAN_ID, 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	  	'c_name' =>   array ( 'title' => LAN_NAME, 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'filter' => true, 'validate' => true, 'help' => 'Name of the category', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	  	'options' =>   array ( 'title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
	);		
	
	protected $fieldpref = array('c_id', 'c_name');		
 
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
	  	'd_id' 				=>   array ( 'title' => LAN_ID, 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	  	'd_name' 			=>   array ( 'title' => LAN_NAME, 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'filter' => true, 'validate' => true, 'help' => 'Name of the person owing you.', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	  	'options' =>   array ( 'title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
	);		
	
	protected $fieldpref = array('d_id', 'd_name');	
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
		'checkboxes'			=>   array ( 'title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => '1', 'class' => 'center', 'toggle' => 'e-multiselect',  ),

		'e_id' 			=>   array('title' => LAN_ID, 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	  	'e_datestamp' 	=>   array('title' => LAN_DATESTAMP, 'type' => 'datestamp', 'data' => 'int', 'width' => 'auto', 'filter' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	  	'e_debtor' 		=>   array('title' => LAN_OWEME_DEBTOR, 'type' => 'dropdown', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'validate' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'center', 'thclass' => 'center',  ),	  	
	 	'e_amount' 		=>   array('title' => LAN_OWEME_AMOUNT, 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'validate' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'center', 'thclass' => 'center',  ),
	  	'e_description' =>   array('title' => LAN_DESCRIPTION, 'type' => 'textarea', 'data' => 'str', 'width' => '40%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	  	'e_category' 	=>   array('title' => LAN_CATEGORY, 'type' => 'dropdown', 'data' => 'int', 'width' => 'auto', 'inline' => true, 'filter' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	  	'e_status' 		=>   array('title' => LAN_STATUS, 'type' => 'dropdown', 'data' => 'int', 'width' => 'auto', 'inline' => true, 'filter' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'center', 'thclass' => 'center',  ),
	  	'options' 		=>   array('title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
	);		
	
	protected $fieldpref = array('e_id', 'e_datestamp', 'e_debtor', 'e_amount', 'e_description', 'e_category', 'e_status');
	
	// TODO LAN
	protected $prefs = array(	
		'default_currency'	=> array(
			'title'	=> 'Default currency', 			
			'type'	=> 'dropdown', 
			'data' 	=> 'str',
			'help'	=> 'Default currency that is used for all entries (unless specified otherwise)'
		),
		'epp'		=> array(
			'title'	=> 'Entries per page', 	
			'type'	=> 'number', 
			'data'	=> 'int',
			'help'	=> 'The number of entries per page that are shown in the table.'
		),
	);


	public function init()
	{
		$sql = e107::getDb();

		// debtors
		$this->debtor[0] = LAN_OWEME_A_001;
		if($sql->select('oweme_debtors'))
		{
			while ($row = $sql->fetch())
			{
				$this->debtor[$row['d_id']] = $row['d_name'];
			}
		}
		
		$this->fields['e_debtor']['writeParms'] = $this->debtor;

		
		// categories
		$this->category[0] = LAN_OWEME_A_002;
		if($sql->select('oweme_categories'))
		{
			while ($row = $sql->fetch())
			{
				$this->category[$row['c_id']] = $row['c_name'];
			}
		}
		
		$this->fields['e_category']['writeParms'] = $this->category;


		// statuses
		$this->status[0] = LAN_OWEME_A_003;
		if($sql->select('oweme_statuses'))
		{
			while ($row = $sql->fetch())
			{
				$this->status[$row['s_id']] = $row['s_name'];
			}
		}

		$this->fields['e_status']['writeParms'] = $this->status;


		// pref: default currency
		if($sql->select('oweme_currencies'))
		{
			while ($row = $sql->fetch())
			{
				$this->currency[$row['cur_id']] = $row['cur_description']." (".$row['cur_code'].")";
			}
		}

		$this->prefs['default_currency']['writeParms'] = $this->currency;
	}

}
				


class oweme_entries_form_ui extends e_admin_form_ui
{
	// // Entries per page 
	// function epp($curVal,$mode)
	// {
	// 	$frm = e107::getForm();		

	// 	switch($mode)
	// 	{
	// 		case 'read': // List Page
	// 		case 'write': // Edit Page
	// 			return $frm->number('epp', e107::getPlugPref('oweme','epp'), '3');
	// 		break;
	// 	}
	// }
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
			's_id' =>   array ( 'title' => LAN_ID, 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
			's_name' =>   array ( 'title' => LAN_NAME, 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'validate' => true, 'help' => 'Name of the status', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
			's_label' =>   array ( 'title' => LAN_OWEME_LABEL, 'type' => 'method', 'data' => 'str', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
			'options' =>   array ( 'title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
		);		
		
		protected $fieldpref = array('s_id', 's_name', 's_label');		
}
				


class oweme_statuses_form_ui extends e_admin_form_ui
{
	// Status label
	function s_label($curVal,$mode)
	{
		$frm = e107::getForm();		
		$sql = e107::getDb();
		
		switch($mode)
		{
			case 'read': // List Page
				return "<span class='label ".$curVal."'>".$curVal."</span>";
			break;
			
			case 'write': // Edit Page
				return $frm->radio('s_label', array(
					"label-default" 	=> "<span class='label label-default'>label-default</span>",
					"label-primary" 	=> "<span class='label label-primary'>label-primary</span>",  
					"label-success" 	=> "<span class='label label-success'>label-success</span>",
					"label-info" 		=> "<span class='label label-info'>label-info</span>", 
					"label-warning" 	=> "<span class='label label-warning'>label-warning</span>", 
					"label-danger" 		=> "<span class='label label-danger'>label-danger</span>"
					), 
					$curVal, array('sep' => '<br />'));
					// FIXME - Does not diplay nicely in BS2 admin theme because labels changed in BS3
			break;
			
			case 'filter':
			case 'batch':
				return  $array; 
			break;
		}
	}

}	
		
		
new oweme_admin();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;

?>