<?php 
class WebUser extends CWebUser
{
	/**
	 * Overrides a Yii method that is used for roles in controllers (accessRules).
	 *
	 * @param string $operation Name of the operation required (here, a role).
	 * @param mixed $params (opt) Parameters for this operation, usually the object to access.
	 * @return bool Permission granted?
	 */
	public function checkAccess($operation, $params=array(), $allowCaching=true)
	{
		if(isset($this->role) && $this->role === $operation)
            return true;

        return parent::checkAccess($operation, $params, $allowCaching);
	}
}