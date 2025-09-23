<?php

namespace EasyTransac\Core;

use EasyTransac\Entities\Notification;
use RuntimeException;

/**
 * Handles validation and parsing of a payment notification.
 *
 * @package EasyTransac\Core
 */
class PaymentNotification
{
    /**
     * Processes a payment notification and returns a Notification entity if valid.
     *
     * @param mixed  $data   Received payload (defaults to $_POST when empty).
     * @param string $apiKey API key used to verify the signature.
     * @return Notification
     *
     * @throws RuntimeException If required fields are missing or the signature is invalid.
     */
    public static function getContent($data, $apiKey): Notification
    {
        if (empty($data)) {
            $data = $_POST;
        }

        if (empty($data)) {
            throw new RuntimeException('$data is empty');
        }

        if (!self::checkRequiredFields($data)) {
            throw new RuntimeException('Missing required fields');
        }

        $notif = new Notification();
        $notif->hydrate(json_decode(json_encode($data)));

        if ($notif->getSignature() !== Security::getSignature($data, $apiKey)) {
            Logger::getInstance()->write('Signature diff failed');
            Logger::getInstance()->write('Notification: ');
            Logger::getInstance()->write($data);
            Logger::getInstance()->write('Used api key: ' . $apiKey);
            throw new RuntimeException('The signature is incorrect', 12);
        }

        return $notif;
    }

    /**
     * Ensures the required fields for a notification are present.
     *
     * @param array $fields
     * @return bool
     */
    protected static function checkRequiredFields($fields): bool
    {
        $requiredFields = [
            'Tid',
            'Status',
            'Signature',
        ];

        foreach ($requiredFields as $key) {
            if (!isset($fields[$key])) {
                return false;
            }
        }

        return true;
    }
}
