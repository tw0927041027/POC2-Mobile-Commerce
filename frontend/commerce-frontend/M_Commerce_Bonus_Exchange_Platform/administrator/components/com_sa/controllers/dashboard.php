<?php
/**
 * @version    SVN: <svn_id>
 * @package    Sa
 * @author     Techjoomla <extensions@techjoomla.com>
 * @copyright  Copyright (c) 2009-2015 TechJoomla. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

// Load Backend Dashboard controller
require_once JPATH_ADMINISTRATOR . '/components/com_socialads/controllers/dashboard.php';

/**
 * Dummy controller class for SocialAds Dashboard controller class.
 *
 * @since  3.1
 */
class SaControllerDashboard extends SocialadsControllerDashboard
{
}
