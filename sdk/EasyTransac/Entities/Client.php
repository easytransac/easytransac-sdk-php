<?php

namespace EasyTransac\Entities;

/**
 * Représente un client (Customer).
 *
 * Cette classe est fournie pour des raisons de rétrocompatibilité
 * avec les anciennes versions du SDK EasyTransac où la classe « Client »
 * était utilisée à la place de « Customer ».
 *
 * Elle hérite de toutes les propriétés et méthodes de la classe Customer.
 *
 * @package EasyTransac\Entities
 * @copyright EasyTransac
 */
class Client extends Customer
{

}
