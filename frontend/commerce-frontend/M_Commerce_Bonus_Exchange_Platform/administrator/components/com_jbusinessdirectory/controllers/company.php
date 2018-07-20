<?php


defined('_JEXEC') or die;
jimport('joomla.application.component.controllerform');

/**
 * The Company Controller
 *
 */
class JBusinessDirectoryControllerCompany extends JControllerForm
{
	/**
	 * Dummy method to redirect back to standard controller
	 *
	 */
	public function display($cachable = false, $urlparams = false)
	{
		$this->setRedirect(JRoute::_('index.php?option=com_jbusinessdirectory&view=companies', false));
	}

	/**
	 * Method override to check if you can add a new record.
	 *
	 * @param   array  $data  An array of input data.
	 *
	 * @return  boolean
	 */
	
	protected function allowAdd($data = array())
	{
		$user       = JFactory::getUser();
		
		return true;
	}
	
	/**
	 * Method override to check if you can edit an existing record.
	 *
	 * @param   array   $data  An array of input data.
	 * @param   string  $key   The name of the key for the primary key.
	 *
	 * @return  boolean
	 */
	protected function allowEdit($data = array(), $key = 'id')
	{
		return true;
	}
	
	public function add()
	{
		$app = JFactory::getApplication();
		$context = 'com_jbusinessdirectory.edit.company';
	
		$result = parent::add();
		if ($result)
		{
			$this->setRedirect(JRoute::_('index.php?option=com_jbusinessdirectory&view=company'. $this->getRedirectToItemAppend(), false));
		}
	
		return $result;
	}
	
	
	/**
	 * Method to cancel an edit.
	 *
	 * @param   string  $key  The name of the primary key of the URL variable.
	 *
	 * @return  boolean  True if access level checks pass, false otherwise.

	 */
	public function cancel($key = null)
	{
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
	
		$app = JFactory::getApplication();
		$context = 'com_jbusinessdirectory.edit.company';
		$result = parent::cancel();
	
	}
	
	/**
	 * Method to edit an existing record.
	 *
	 * @param   string  $key     The name of the primary key of the URL variable.
	 * @param   string  $urlVar  The name of the URL variable if different from the primary key
	 * (sometimes required to avoid router collisions).
	 *
	 * @return  boolean  True if access level check and checkout passes, false otherwise.
	 *
	 */
	public function edit($key = null, $urlVar = null)
	{
		$app = JFactory::getApplication();
		$result = parent::edit();
	
		return true;
	}
	
	/**
	 * save a record (and redirect to main page)
	 * @return void
	 */
	function save($key = NULL, $urlVar = NULL)
	{
		
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
		$app      = JFactory::getApplication();
		$model = $this->getModel('company');
		$post = JRequest::get( 'post' );
		$post['description'] = JRequest::getVar('description', '', 'post', 'string', JREQUEST_ALLOWRAW);
		$post['custom_tab_content'] = JRequest::getVar('custom_tab_content', '', 'post', 'string', JREQUEST_ALLOWRAW);
		
		$data = JRequest::get( 'post' );
		$context  = 'com_jbusinessdirectory.edit.company';
		$task     = $this->getTask();
		$recordId = JRequest::getInt('id');
		
		if(!empty($post['website'])){
			if (!preg_match("~^(?:f|ht)tps?://~i", $post['website'])) {
				$post['website'] = "http://" . $post['website'];
			}
		}
		if(!empty($post['facebook'])){
			if (!preg_match("~^(?:f|ht)tps?://~i", $post['facebook'])) {
				$post['facebook'] = "http://" . $post['facebook'];
			}
		}
		if(!empty($post['twitter'])){
			if (!preg_match("~^(?:f|ht)tps?://~i", $post['twitter'])) {
				$post['twitter'] = "http://" . $post['twitter'];
			}
		}
		if(!empty($post['googlep'])){
			if (!preg_match("~^(?:f|ht)tps?://~i", $post['googlep'])) {
				$post['googlep'] = "http://" . $post['googlep'];
			}
		}
		if(!empty($post['linkedin'])){
			if (!preg_match("~^(?:f|ht)tps?://~i", $post['linkedin'])) {
				$post['linkedin'] = "http://" . $post['linkedin'];
			}
		}
		
		if(!empty($post['youtube'])){
			if (!preg_match("~^(?:f|ht)tps?://~i", $post['youtube'])) {
				$post['youtube'] = "http://" . $post['youtube'];
			}
		}
		if(!empty($post['instagram'])){
			if (!preg_match("~^(?:f|ht)tps?://~i", $post['instagram'])) {
				$post['instagram'] = "http://" . $post['instagram'];
			}
		}
		if(!empty($post['pinterest'])){
			if (!preg_match("~^(?:f|ht)tps?://~i", $post['pinterest'])) {
				$post['pinterest'] = "http://" . $post['pinterest'];
			}
		}
	
		//save images
		$pictures					= array();
		foreach( $post as $key => $value )
		{
			if(
					strpos( $key, 'picture_info' ) !== false
					||
					strpos( $key, 'picture_path' ) !== false
					||
					strpos( $key, 'picture_enable' ) !== false
			){
				foreach( $value as $k => $v )
				{
					if( !isset($pictures[$k]) )
						$pictures[$k] = array('picture_info'=>'', 'picture_path'=>'','picture_enable'=>1);
					$pictures[$k][$key] = $v;
				}
			}
		}
		$post['pictures'] 				= $pictures;
		
		if (!$model->save($post)){
			// Save the data in the session.
			$app->setUserState('com_jbusinessdirectory.edit.company.data', $data);
			
			// Redirect back to the edit screen.
			$this->setMessage(JText::sprintf('JLIB_APPLICATION_ERROR_SAVE_FAILED', $model->getError()), 'warning');
			$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_item . $this->getRedirectToItemAppend($recordId), false));
			
			return false;
		}

		$this->setMessage(JText::_('COM_JBUSINESSDIRECTORY_COMPANY_SAVE_SUCCESS'));
 
		// Redirect the user and adjust session state based on the chosen task.
		switch ($task)
		{
			case 'apply':
				$recordId = $model->getState("company.id");
				// Set the row data in the session.
				$this->holdEditId($context, $recordId);
				$app->setUserState('com_jbusinessdirectory.edit.company.data', null);
				// Redirect back to the edit screen.
				$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_item . $this->getRedirectToItemAppend($recordId), false));
				break;

			default:
				// Clear the row id and data in the session.
				$this->releaseEditId($context, $recordId);
				$app->setUserState('com_jbusinessdirectory.edit.company.data', null);
							
				// Redirect to the list screen.
				$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_list . $this->getRedirectToListAppend(), false));
				break;
		}
	
	}
	
	function saveLocation(){
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
		$app      = JFactory::getApplication();
		$model = $this->getModel('company');
		$data = JRequest::get('post');
		
		if (!($locationId = $model->saveLocation($data))){
			// Save the data in the session.
			$app->setUserState('com_jbusinessdirectory.edit.companylocation.data', $data);
				
			// Redirect back to the edit screen.
			$this->setMessage(JText::sprintf('JLIB_APPLICATION_ERROR_SAVE_FAILED', $model->getError()), 'warning');
			$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=company&tmpl=component&layout=locations&locationId='.$locationId, false));
				
			return false;
			
		}
		$this->setMessage(JText::_('COM_JBUSINESSDIRECTORY_LOCATION_SAVE_SUCCESS'));
		
		$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=company&tmpl=component&layout=locations&locationId='.$locationId, false));
		
	}
	
	function deleteLocation(){
		$errorFlag = false;
		$locationId =JRequest::getVar('locationId');
		$model = $this->getModel('company');
		
		$result = $model->deleteLocation($locationId);
		$message="";
		
		echo '<?xml version="1.0" encoding="utf-8" ?>';
		echo '<category_statement>';
		echo '<answer error="'.(!$result ? "0" : "1").'" errorMessage="'.$message.'" locationId="'.$locationId.'"';
		echo '</category_statement>';
		echo '</xml>';
		exit;
	}
	
	
	function extendPeriod(){
		$model = $this->getModel('Company');
		$data = JRequest::get('post');
		$model ->extendPeriod($data);
		$this->setMessage(JText::_('COM_JBUSINESSDIRECTORY_EXTENDED_NEW_ORDER_CREATED'));
		$this->setRedirect(JRoute::_('index.php?option=com_jbusinessdirectory&view==company&layout=edit&id='.$data["id"], false));
	}
	
	function aprove(){
		$post = JRequest::get('post');
		$model = $this->getModel('Company');
		$model ->changeAprovalState(COMPANY_STATUS_APPROVED);
		
		$company = $model->getItem();
		
		EmailService::sendApprovalEmail($company);
		
		$this->setRedirect(JRoute::_('index.php?option=com_jbusinessdirectory&view=companies', false));
	}
	
	function disaprove(){
		$post = JRequest::get('post');
		$model = $this->getModel('Company');
		$model ->changeAprovalState(COMPANY_STATUS_DISAPPROVED);
		$this->setRedirect(JRoute::_('index.php?option=com_jbusinessdirectory&view=companies', false));
	}
	
	function aproveClaim(){
		$post = JRequest::get( 'post' );
		$model = $this->getModel('Company');
		$model ->changeClaimAprovalState(1);
		$model ->changeAprovalState(COMPANY_STATUS_APPROVED);
		$this->setRedirect(JRoute::_('index.php?option=com_jbusinessdirectory&view=companies', false));
	}
	
	function disaproveClaim(){
		$post = JRequest::get( 'post' );
		$model = $this->getModel('Company');
		$model ->changeClaimAprovalState(-1);
		$model ->changeAprovalState(COMPANY_STATUS_APPROVED);
		$this->setRedirect(JRoute::_('index.php?option=com_jbusinessdirectory&view=companies', false));
	}
	
	function changeState()
	{
		$model = $this->getModel('Company');
		$msg ="";
		if (!$model->changeState())
		{
			$msg = JText::_('LNG_ERROR_CHANGE_STATE');
		}
	
		$this->setRedirect(JRoute::_('index.php?option=com_jbusinessdirectory&view=companies', $msg));
	}
	
	function changeFeaturedState()
	{
		$model = $this->getModel('Company');
		$msg ="";
		if (!$model->changeFeaturedState())
		{
			$msg = JText::_('LNG_ERROR_CHANGE_STATE');
		}
	
		$this->setRedirect(JRoute::_('index.php?option=com_jbusinessdirectory&view=companies', $msg));
	}
	
	function checkCompanyName(){
		$post = JRequest::get( 'post' );
		$model = $this->getModel('company');
		$nr = $model->checkCompanyName(trim($post["companyName"]));
	
		$exists = $nr>0?1:0;
	
		echo '<?xml version="1.0" encoding="utf-8" ?>';
		echo '<company_statement>';
		echo '<answer exists="'.$exists.'"/>';
		echo '</company_statement>';
		echo '</xml>';
		exit;
	}
	
	/**
	 * Method to run batch operations.
	 *
	 * @param   object  $model  The model.
	 *
	 * @return  boolean   True if successful, false otherwise and internal error is set.
	 *
	 * @since   1.6
	 */
	public function batch($model = null)
	{
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
	
		// Set the model
		$model = $this->getModel('Company', '', array());
	
		$vars = $this->input->post->get('batch', array(), 'array');
		$cid  = $this->input->post->get('cid', array(), 'array');
		
		// Attempt to run the batch operation.
		if ($model->batch($vars, $cid,null))
		{
			$this->setMessage(JText::_('JLIB_APPLICATION_SUCCESS_BATCH'));
		
		}else{
			$this->setMessage(JText::sprintf('JLIB_APPLICATION_ERROR_BATCH_FAILED', $model->getError()), 'warning');
		}
		
		// Preset the redirect
		$this->setRedirect(JRoute::_('index.php?option=com_jbusinessdirectory&view=companies' . $this->getRedirectToListAppend(), false));
	
		return parent::batch($model);
	}
	
}
