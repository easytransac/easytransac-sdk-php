<?php

namespace EasyTransac\Entities;

/**
 * Représente une liste de cartes bancaires.
 *
 * Cette entité est utilisée pour modéliser la réponse
 * d'une requête de type "CreditCardsList", contenant
 * plusieurs objets `CreditCard`.
 *
 * @package EasyTransac\Entities
 * @copyright EasyTransac
 */
class CreditCardsList extends Entity
{
    /**
     * Liste des cartes bancaires associées.
     *
     * Il s'agit d'un tableau d'objets de type {@see \EasyTransac\Entities\CreditCard}.
     *
     * @var CreditCard[]|null
     * @array:CreditCard
     */
    protected $creditCards;

    /**
     * Retourne la liste des cartes bancaires.
     *
     * @return CreditCard[]|null Tableau d'objets CreditCard ou null si vide.
     */
    public function getCreditCards()
    {
        return $this->creditCards;
    }
}
