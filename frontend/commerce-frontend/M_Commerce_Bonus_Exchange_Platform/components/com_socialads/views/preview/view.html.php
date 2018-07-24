<?php
/**
 * @version    SVN:<SVN_ID>
 * @package    Com_Socialads
 * @author     Techjoomla <extensions@techjoomla.com>
 * @copyright  Copyright (c) 2009-2015 TechJoomla. All rights reserved
 * @license    GNU General Public License version 2, or later
 */
// No direct access
defined('_JEXEC') or die(';)');

jimport('joomla.application.component.view');

/**
 * View class for adspreview.
 *
 * @since  1.6
 */
class SocialadsViewPreview extends JViewLegacy
{
	/**
	 * Display the view
	 *
	 * @param   array  $tpl  An optional associative array.
	 *
	 * @return  array
	 *
	 * @since 1.6
	 */
	public function display($tpl = null)
	{
		$doc = JFactory::getDocument();

		$doc->addScript(JUri::root(true) . '/media/com_sa/vendors/flowplayer/flowplayer-3.2.13.min.js');

		parent::display($tpl);
	}
}
