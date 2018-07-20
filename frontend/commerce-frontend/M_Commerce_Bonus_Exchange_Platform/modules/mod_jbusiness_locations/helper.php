<?php
/*------------------------------------------------------------------------
# JBusinessDirectory
# author CMSJunkie
# copyright Copyright (C) 2012 cmsjunkie.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.cmsjunkie.com
# Technical Support:  Forum - http://www.cmsjunkie.com/forum/j-businessdirectory/?p=1
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die( 'Restricted access' );

abstract class modJBusinessLocationsHelper
{
	public static function getList(&$params){
	
		$items = array();
		$locations = $params->get('locations');
		
		$locations = explode("\n", $locations);
		foreach($locations as $location){
			if(empty($location))
				continue;
			$item = explode(",",$location);
			$items[]=$item;
		}
		
		return $items;
	}
}
?>
