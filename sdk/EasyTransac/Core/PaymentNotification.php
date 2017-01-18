<?php 

namespace EasyTransac\Core;

/**
 * Parse a payment notification 
 * @author klyde
 * @copyright EasyTransac
 */
class PaymentNotification
{
	/**
	 * Returns a notification entity
	 * @return boolean|\EasyTransac\Entities\Notification
	 */
	public static function getContent(array $data = [], $apiKey)
	{
		if (empty($data))
			$data = $_POST;
		
		if (empty($data))
			throw new \RuntimeException('$data is empty');
		
		if (!self::checkRequiredFields($data))
			throw new \RuntimeException('Missing required fields');
			
		$notif = new \EasyTransac\Entities\Notification();
		$notif->hydrate(json_decode(json_encode($data)));
		
		if ($notif->getSignature() != Security::getSignature($data, $apiKey))
			throw new \RuntimeException('The signature is incorrect', 12);
		
		return $notif;
	}
	
	/**
	 * Check required fields for the notif
	 * @param array $fields
	 * @return boolean
	 */
	protected static function checkRequiredFields($fields)
	{
		$requiredFields = [
			'OperationType',
			'Tid',
			'Uid',
			'OrderId',
			'Status',
			'Date',
			'Amount',
			'Currency',
			'FixFees',
			'Message',
			'3DSecure',
			'OneClick',
			'Alias',
			'CardNumber',
			'Test',
			'Signature',
			'Client'
		];
		
		$requiredFieldsClient = [
			'Id',
			'Email',
			'Firstname',
			'Lastname',
			'Phone',
			'Address',
			'ZipCode',
			'City',
		];
		
		foreach ($requiredFields as $key)
		{
			if (!isset($fields[$key]))
				return false;
		}

		foreach ($requiredFieldsClient as $key)
		{
			if (!isset($fields['Client'][$key]))
				return false;
		}
		
		return true;
	}
}

?>