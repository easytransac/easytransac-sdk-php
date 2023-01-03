<?php

namespace EasyTransac\Entities;

/**
 * Représente les arguments principaux pour la requête "makebanktransfer".
 * Permet d'initialiser un virement bancaire avec les informations du client, le montant et la référence.
 *
 * @copyright EasyTransac
 */
class InitBankTransfer extends Entity
{
    /** @object:Customer **/
    protected $customer = null;

    /** @map:Amount **/
    protected $amount = null;

    /** @map:Reference **/
    protected $reference = null;

    /**
     * Définit le client associé au virement bancaire.
     *
     * @param Customer $customer Instance du client à associer.
     * @return $this Retourne l'instance courante pour chaînage.
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * Définit le montant du virement bancaire.
     *
     * @param float|int|string $amount Montant du virement.
     * @return $this Retourne l'instance courante pour chaînage.
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Définit la référence du virement bancaire.
     *
     * @param string $reference Référence du virement.
     * @return $this Retourne l'instance courante pour chaînage.
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }
}
