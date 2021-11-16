<?php

namespace EasyTransac\Entities;

/**
 * Represents a bank transfer list
 * @copyright EasyTransac
 */
class BankTransfersList extends Entity
{
    /** @array:BankTransferInfos **/
    protected $bankTransferInfos;

    public function getBankTransferInfos()
    {
        return $this->bankTransferInfos;
    }
}
