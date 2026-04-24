<?php

namespace EasyTransac\Entities;

/**
 * Represents arguments for the request "Drop-in session".
 *
 * Reuses the payment page transaction fields and adds the notification URL
 * required for server-side confirmation flows.
 *
 * @copyright EasyTransac
 */
class DropinSessionTransaction extends PaymentPageTransaction
{
    /** @map:NotificationUrl **/
    protected $notificationUrl = null;

    public function setNotificationUrl($notificationUrl)
    {
        $this->notificationUrl = $notificationUrl;
        return $this;
    }

    public function getNotificationUrl()
    {
        return $this->notificationUrl;
    }
}
