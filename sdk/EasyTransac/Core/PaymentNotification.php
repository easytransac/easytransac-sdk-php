<?php

namespace EasyTransac\Core;

use EasyTransac\Entities\Notification;
use RuntimeException;

/**
 * Gère la validation et le parsing d'une notification de paiement.
 *
 * @package EasyTransac\Core
 */
class PaymentNotification
{
    /**
     * Traite une notification de paiement et retourne une entité Notification si valide.
     *
     * @param $data Données reçues (par défaut $_POST si vide)
     * @param $apiKey Clé API utilisée pour vérifier la signature
     * @return Notification
     * @throws RuntimeException Si les champs requis sont manquants ou la signature est invalide
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
     * Vérifie que les champs requis pour une notification sont présents.
     *
     * @param $fields
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
