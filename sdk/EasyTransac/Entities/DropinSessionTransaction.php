<?php

namespace EasyTransac\Entities;

/**
 * Represents arguments for the request "Drop-in session".
 *
 * Reuses the same core payment fields as PaymentPageTransaction and adds
 * the notification URL required for server-side confirmation.
 *
 * Additional API fields not yet modeled in the SDK can still be set through
 * Entity::__call(), for example: ->setSomeFutureField('value').
 *
 * @copyright EasyTransac
 */
class DropinSessionTransaction extends PaymentPageTransaction
{
    /** @map:NotificationUrl **/
    protected $notificationUrl = null;

    /** @map:Providers **/
    protected $providers = null;

    public function setNotificationUrl($notificationUrl)
    {
        $this->notificationUrl = $notificationUrl;
        return $this;
    }

    public function getNotificationUrl()
    {
        return $this->notificationUrl;
    }

    public function setProviders($providers)
    {
        if (is_array($providers)) {
            $providers = array_map(function ($provider) {
                return strtolower(trim((string) $provider));
            }, $providers);

            $providers = array_filter($providers, function ($provider) {
                return $provider !== '';
            });

            $providers = array_values(array_unique($providers));
            $providers = implode(',', $providers);
        } else {
            $providers = strtolower(trim((string) $providers));
        }

        $this->providers = $providers;
        return $this;
    }

    public function getProviders()
    {
        return $this->providers;
    }
}
