<?php
namespace EasyTransac\Core;

/**
 * Class CommentParser
 * 
 * Cette classe permet d'analyser les commentaires des propriétés protégées
 * d'une classe donnée pour extraire des métadonnées sous forme de tags.
 * 
 * Les tags doivent être sous la forme :
 * @map:FieldName
 * @object:FieldName
 * @array:FieldName
 * 
 * Utilisé notamment pour l'auto-mapping dans l'API EasyTransac.
 * 
 * @author EasyTransac
 */
class CommentParser
{
    /**
     * Nom de la classe cible à analyser
     * @var string
     */
    protected $class;

    /**
     * Constructeur
     *
     * @param string $class Nom complet de la classe (avec namespace) à analyser
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * Analyse les propriétés protégées de la classe et extrait les tags spécifiques
     * trouvés dans les commentaires DocBlock.
     * 
     * @return \Generator Retourne un générateur d'associations sous forme :
     *                   ['field' => nomAttribut, 'name' => nomTag, 'type' => typeTag]
     */
    public function parse(): \Generator
    {
        $r = new \ReflectionClass($this->class);

        // On récupère toutes les propriétés protégées
        $props = $r->getProperties(\ReflectionProperty::IS_PROTECTED);
        // 2025-07-22 [FIX]  (Mirana) Modifie cette partie de parse() pour ignorer les propriétés sans commentaire PHPDoc
        foreach ($props as $prop) {
            // Récupère le commentaire de la propriété
            $value = $r->getProperty($prop->getName())->getDocComment();

            // ✅ Évite l'erreur si aucun commentaire
            if ($value === false) {
                continue;
            }

            // Recherche d'un tag spécifique sous la forme @type:Nom
            preg_match('#@(map|object|array):([_a-zA-Z0-9]+)#', $value, $matches);

            if (!$matches || count($matches) !== 3) {
                continue;
            }

            yield [
                'field' => $prop->getName(),
                'name' => $matches[2],
                'type' => $matches[1]
            ];
        }
    }
}
