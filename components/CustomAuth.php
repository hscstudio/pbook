<?php
namespace app\components;

class CustomAuth extends \yii\filters\auth\AuthMethod
{
	public $tokenParam = 'access-token';

	/**
	 * @param \yii\web\User $user
	 * @param \yii\web\Request $request
	 * @param \yii\web\Response $respons
	 */
	public function authenticate($user, $request, $response)
	{
		$accessToken = $request->get($this->tokenParam);
		if(empty($accessToken)) $accessToken = $request->getHeaders()->get($this->tokenParam);

		if (is_string($accessToken)) {
			$identity = $user->loginByAccessToken($accessToken, get_class($this));
			if ($identity !== null) {
				return $identity;
			}
		}

		if ($accessToken !== null) {
			$this->handleFailure($response);
		}

		return null;
	}
}