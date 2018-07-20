<?php
/**
 * @package    JBusinessDirectory
 * @subpackage  com_jbusinessdirectory
 *
 * @copyright   Copyright (C) 2007 - 2015 CMS Junkie. All rights reserved.
 * @license     GNU General Public License version 2 or later; 
 */

defined('_JEXEC') or die;

/**
 * The HTML  View.
 */

JHtml::_('script', 'components/com_jbusinessdirectory/assets/js/manage.companies.js');
JHtml::_('script', 'components/com_jbusinessdirectory/assets/js/jquery.upload.js');


JHTML::_('stylesheet', 	'components/com_jbusinessdirectory/assets/css/common.css');

JHtml::_('script', 'components/com_jbusinessdirectory/assets/js/dropzone/dropzone.js');
JHtml::_('script', 'components/com_jbusinessdirectory/assets/js/dropzone/jbusinessImageUploader.js');

JHTML::_('stylesheet', 	'components/com_jbusinessdirectory/assets/css/dropzone.css');
JHTML::_('stylesheet', 	'components/com_jbusinessdirectory/assets/css/basic.css');

JBusinessUtil::includeValidation();

require_once JPATH_COMPONENT_ADMINISTRATOR.'/helpers/helper.php';

class JBusinessDirectoryViewOffer extends JBusinessDirectoryAdminView
{
	protected $item;
	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null){
	
		$this->item	 = $this->get('Item');
		$this->state = $this->get('State');

		$this->companies = $this->get('Companies');
		$this->currencies = $this->get('Currencies');
		
		$this->states = JBusinessDirectoryHelper::getStatuses();
		
		$this->translations = JBusinessDirectoryTranslations::getAllTranslations(OFFER_DESCRIPTION_TRANSLATION,$this->item->id);
		$this->languages = JBusinessUtil::getLanguages();
		
		$this->appSettings = JBusinessUtil::getInstance()->getApplicationSettings();
		
		$this->categoryOptions = JBusinessUtil::getCategoriesOptions(true, CATEGORY_TYPE_OFFER);
		
		$lang = JFactory::getLanguage()->getTag();
		$key="";
		if(!empty($this->appSettings->google_map_key))
			$key="&key=".$this->appSettings->google_map_key;
		JHtml::_('script', "https://maps.googleapis.com/maps/api/js?libraries=places&language=".$lang.$key);
		
		
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since   1.6
	 */
	protected function addToolbar()
	{
		$canDo = JBusinessDirectoryHelper::getActions();
		$user  = JFactory::getUser();
		
		$input = JFactory::getApplication()->input;
		$input->set('hidemainmenu', true);

		$user  = JFactory::getUser();
		$isNew = ($this->item->id == 0);

		JToolbarHelper::title(JText::_($isNew ? 'COM_JBUSINESSDIRECTORY_NEW_OFFER' : 'COM_JBUSINESSDIRECTORY_EDIT_OFFER'), 'menu.png');
		
		if ($canDo->get('core.edit')){
			JToolbarHelper::apply('offer.apply');
			JToolbarHelper::save('offer.save');
		}
		
		if($this->item->id > 0){
			JToolBarHelper::divider();
			JToolBarHelper::custom( 'offer.aprove', 'publish.png', 'publish.png', JText::_("LNG_APPROVE"), false, false );
			JToolBarHelper::custom( 'offer.disaprove', 'unpublish.png', 'unpublish.png', JText::_("LNG_DISAPPROVE"), false, false );
			JToolBarHelper::divider();
		}
			
		JToolbarHelper::cancel('offer.cancel', 'JTOOLBAR_CLOSE');
		
		JToolbarHelper::divider();
		JToolbarHelper::help('JHELP_JBUSINESSDIRECTORY_OFFER_EDIT');
	}
}
