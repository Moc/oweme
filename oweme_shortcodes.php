<?php
/*
 * Owe Me! - an e107 plugin by Tijn Kuyper
 *
 * Copyright (C) 2014-2015 Tijn Kuyper (http://www.tijnkuyper.nl)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 */




if (!defined('e107_INIT')) { exit; }

 /*
  OweMe Shortcodes
 */

class oweme_shortcodes extends e_shortcode
{
	/* 
      Headings: ID, Date, Category, Amount, Description, Debtor, Status
   */
   function sc_oweme_h_id()
   {
      return LAN_OWEME_ID; 
   } 
   
   function sc_oweme_h_date()
   {
      return LAN_OWEME_DATE;
   }  

   function sc_oweme_h_category()
   {
      return LAN_OWEME_CATEGORY;
   }  
   
   function sc_oweme_h_amount()
   {
      return LAN_OWEME_AMOUNT;
   }  
   
   function sc_oweme_h_description()
   {
      return LAN_OWEME_DESCRIPTION;
   }  
   
   function sc_oweme_h_debtor()
   {
      return LAN_OWEME_DEBTOR;
   }

   function sc_oweme_h_status()
   {
      return LAN_OWEME_STATUS;
   }  
  
   /*
      Items
   */
   function sc_oweme_id($parm='')
   {
      return $this->var['e_id'];
   } 

   function sc_oweme_date($parm='')
   {
      $date_format = e107::getPlugPref('oweme', 'date_format', '%d %B, %Y');
      return e107::getDate()->convert_date($this->var["e_datestamp"], $date_format);
   } 

   function sc_oweme_category($parm='')
   {
      return e107::getDb()->retrieve('oweme_categories', 'c_name', 'c_id = '.$this->var["e_category"].'');
   }

   function sc_oweme_amount($parm='') // TODO: Currency implementation
   {
      return $this->var["e_amount"];
   }

   function sc_oweme_description($parm='')
   {
      return $this->var["e_description"];
   }

   function sc_oweme_debtor($parm='')
   {
      return e107::getDb()->retrieve('oweme_debtors', 'd_name', 'd_id = '.$this->var["e_debtor"].'');
   }

   function sc_oweme_status_label($parm='')
   {
      return e107::getDb()->retrieve('oweme_statuses', 's_label', 's_id = '.$this->var["e_status"].'');
   }

   function sc_oweme_status_name($parm='')
   {
      return e107::getDb()->retrieve('oweme_statuses', 's_name', 's_id = '.$this->var["e_status"].'');
   }

}
?>
