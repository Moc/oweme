<?php

// Generated e107 Plugin Admin Area 

require_once('../../class2.php');
if (!getperms('P')) 
{
	header('location:'.e_BASE.'index.php');
	exit;
}



class oweme_admin extends e_admin_dispatcher
{

	protected $modes = array(	
	
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

		'main'	=> array(
			'controller' 	=> 'oweme_entries_ui',
			'path' 			=> null,
			'ui' 			=> 'oweme_entries_form_ui',
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
		'other1/create'		=> array('caption'=> "Create debtores", 'perm' => 'P'),

		'other2/list'		=> array('caption'=> "Manage statuses", 'perm' => 'P'),
		'other2/create'		=> array('caption'=> "Create status", 'perm' => 'P'),
			
	/*
		'main/prefs' 		=> array('caption'=> LAN_PREFS, 'perm' => 'P'),
		'main/custom'		=> array('caption'=> 'Custom Page', 'perm' => 'P')
	*/	

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
			
		protected $fields 		= array (  'checkboxes' =>   array ( 'title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => '1', 'class' => 'center', 'toggle' => 'e-multiselect',  ),
		  'c_id' =>   array ( 'title' => 'LAN_ID', 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'c_name' =>   array ( 'title' => 'LAN_NAME', 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'filter' => true, 'validate' => true, 'help' => 'Name of the category', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'options' =>   array ( 'title' => 'Options', 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
		);		
		
		protected $fieldpref = array('c_name');
		
		
		
		/*
		protected  = array(
			'pref_type'	   				=> array('title'=> 'type', 'type'=>'text', 'data' => 'string', 'validate' => true),
			'pref_folder' 				=> array('title'=> 'folder', 'type' => 'boolean', 'data' => 'integer'),
			'pref_name' 				=> array('title'=> 'name', 'type' => 'text', 'data' => 'string', 'validate' => 'regex', 'rule' => '#^[\w]+$#i', 'help' => 'allowed characters are a-zA-Z and underscore')
		);

		
		// optional
		public function init()
		{
			
		}
	
		
		public function customPage()
		{
			$ns = e107::getRender();
			$text = 'Hello World!';
			$ns->tablerender('Hello',$text);	
			
		}
		*/
			
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
			
		protected $fields 		= array (  'checkboxes' =>   array ( 'title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => '1', 'class' => 'center', 'toggle' => 'e-multiselect',  ),
		  'd_id' =>   array ( 'title' => 'LAN_ID', 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'd_name' =>   array ( 'title' => 'LAN_NAME', 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'filter' => true, 'validate' => true, 'help' => 'Name of the debtor', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'options' =>   array ( 'title' => 'Options', 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
		);		
		
		protected $fieldpref = array('d_name');
		
		
		
		/*
		protected  = array(
			'pref_type'	   				=> array('title'=> 'type', 'type'=>'text', 'data' => 'string', 'validate' => true),
			'pref_folder' 				=> array('title'=> 'folder', 'type' => 'boolean', 'data' => 'integer'),
			'pref_name' 				=> array('title'=> 'name', 'type' => 'text', 'data' => 'string', 'validate' => 'regex', 'rule' => '#^[\w]+$#i', 'help' => 'allowed characters are a-zA-Z and underscore')
		);

		
		// optional
		public function init()
		{
			
		}
	
		
		public function customPage()
		{
			$ns = e107::getRender();
			$text = 'Hello World!';
			$ns->tablerender('Hello',$text);	
			
		}
		*/
			
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
			
		protected $fields 		= array (  'checkboxes' =>   array ( 'title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => '1', 'class' => 'center', 'toggle' => 'e-multiselect',  ),
		  'e_id' =>   array ( 'title' => 'LAN_ID', 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'e_datestamp' =>   array ( 'title' => 'LAN_DATESTAMP', 'type' => 'datestamp', 'data' => 'int', 'width' => 'auto', 'filter' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'e_category' =>   array ( 'title' => 'LAN_CATEGORY', 'type' => 'dropdown', 'data' => 'int', 'width' => 'auto', 'filter' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'e_amount' =>   array ( 'title' => 'LAN_OWEME_AMOUNT', 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'validate' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'center', 'thclass' => 'center',  ),
		  'e_description' =>   array ( 'title' => 'LAN_DESCRIPTION', 'type' => 'text', 'data' => 'str', 'width' => '40%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'e_debtor' =>   array ( 'title' => 'LAN_OWEME_DEBTOR', 'type' => 'dropdown', 'data' => 'str', 'width' => 'auto', 'validate' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'center', 'thclass' => 'center',  ),
		  'e_status' =>   array ( 'title' => 'LAN_STATUS', 'type' => 'dropdown', 'data' => 'int', 'width' => 'auto', 'validate' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'center', 'thclass' => 'center',  ),
		  'options' =>   array ( 'title' => 'Options', 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
		);		
		
		protected $fieldpref = array('e_id', 'e_amount', 'e_description', 'e_debtor', 'e_status');
		
		
		
		/*
		protected  = array(
			'pref_type'	   				=> array('title'=> 'type', 'type'=>'text', 'data' => 'string', 'validate' => true),
			'pref_folder' 				=> array('title'=> 'folder', 'type' => 'boolean', 'data' => 'integer'),
			'pref_name' 				=> array('title'=> 'name', 'type' => 'text', 'data' => 'string', 'validate' => 'regex', 'rule' => '#^[\w]+$#i', 'help' => 'allowed characters are a-zA-Z and underscore')
		);

		
		// optional
		public function init()
		{
			
		}
	
		
		public function customPage()
		{
			$ns = e107::getRender();
			$text = 'Hello World!';
			$ns->tablerender('Hello',$text);	
			
		}
		*/
			
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
			
		protected $fields 		= array (  'checkboxes' =>   array ( 'title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => '1', 'class' => 'center', 'toggle' => 'e-multiselect',  ),
		  's_id' =>   array ( 'title' => 'LAN_ID', 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  's_name' =>   array ( 'title' => 'LAN_NAME', 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'validate' => true, 'help' => 'Name of the status', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  's_icon' =>   array ( 'title' => 'LAN_ICON', 'type' => 'icon', 'data' => 'str', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'options' =>   array ( 'title' => 'Options', 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
		);		
		
		protected $fieldpref = array('s_id', 's_name');
		
		
		
		/*
		protected  = array(
			'pref_type'	   				=> array('title'=> 'type', 'type'=>'text', 'data' => 'string', 'validate' => true),
			'pref_folder' 				=> array('title'=> 'folder', 'type' => 'boolean', 'data' => 'integer'),
			'pref_name' 				=> array('title'=> 'name', 'type' => 'text', 'data' => 'string', 'validate' => 'regex', 'rule' => '#^[\w]+$#i', 'help' => 'allowed characters are a-zA-Z and underscore')
		);

		
		// optional
		public function init()
		{
			
		}
	
		
		public function customPage()
		{
			$ns = e107::getRender();
			$text = 'Hello World!';
			$ns->tablerender('Hello',$text);	
			
		}
		*/
			
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