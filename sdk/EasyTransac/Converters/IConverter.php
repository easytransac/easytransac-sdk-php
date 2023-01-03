<?php
namespace EasyTransac\Converters;

/**
 * Interface IConverter
 * 
 * Déclare la méthode pour convertir une valeur d'un type à un autre.
 * Cette interface sert de contrat pour toute classe convertisseuse.
 */
interface IConverter
{
    /**
     * Convertit une valeur donnée en une autre représentation.
     * 
     * Le type exact de la valeur en entrée et en sortie peut varier selon
     * la logique de conversion mise en œuvre dans la classe concrète.
     * 
     * @param mixed $value Valeur à convertir, de type variable.
     * @return mixed Valeur convertie, de type variable.
     */
    public function convert($value);
}
