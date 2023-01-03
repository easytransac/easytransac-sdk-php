<?php
namespace EasyTransac\Core;

use EasyTransac\Core\Security;

/**
 * Singleton permettant d'appeler l'API EasyTransac avec une clé API.
 *
 * Cette classe gère la configuration de la requête, le choix du caller,
 * le modifier éventuel, et le traitement de la signature.
 * 
 * Compatible PHP 7 et 8 sans modification logique.
 *
 * @copyright EasyTransac
 * @package EasyTransac\Core
 */
class Services
{
    /**
     * Instance unique du singleton
     * @var Services|null
     */
    private static $instance = null;

    /**
     * Clé API utilisée pour les appels
     * @var string|null
     */
    private $key = null;

    /**
     * Objet caller qui exécute les requêtes HTTP
     * @var ICaller|null
     */
    private $caller = null;

    /**
     * Modificateur optionnel pour modifier le comportement des appels
     * @var ICallerModifier|null
     */
    private $modifier = null;

    /** Environnements */
    public const ENV_SANDBOX    = 'sandbox';
    public const ENV_PRODUCTION = 'production';

    /** URLs de base */
    public const URL_SANDBOX    = 'https://sandbox.easytransac.com/api';
    public const URL_PRODUCTION = 'https://www.easytransac.com/api';

    /** @var string */
    private $url = self::URL_PRODUCTION; // défaut: prod

    /**
     * Timeout en secondes pour les requêtes
     * @var int
     */
    private $timeout = 10;

    /**
     * Définit l'environnement d'appel (sandbox ou production)
     *
     * @param string $env "sandbox" ou "production"
     */
    public function setEnvironment($env)
    {
        // Normalise (garde la compatibilité avec les strings existantes)
        $env = strtolower((string) $env);

        if ($env === self::ENV_SANDBOX) {
            $this->url = self::URL_SANDBOX;
        } else {
            // par défaut, production
            $this->url = self::URL_PRODUCTION;
        }

        return $this;
    }
    
    /**
     * Ajoute un modificateur pour le caller
     * 
     * @param ICallerModifier $modifier Modificateur à appliquer
     * @return self
     */
    public function setModifier(ICallerModifier $modifier)
    {
        $this->modifier = $modifier;
        return $this;
    }

    /**
     * Retourne le modificateur actuellement défini
     * 
     * @return ICallerModifier|null
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * Définit le caller utilisé pour les appels HTTP
     * 
     * @param ICaller $caller Instance implémentant ICaller
     * @return self
     */
    public function setCaller(ICaller $caller)
    {
        $this->caller = $caller;
        return $this;
    }

    /**
     * Supprime le modificateur actuel
     * 
     * @return self
     */
    public function removeModifier()
    {
        $this->modifier = null;
        return $this;
    }

    /**
     * Supprime le caller actuel
     * 
     * @return self
     */
    public function removeCaller()
    {
        $this->caller = null;
        return $this;
    }

    /**
     * Récupère le caller actuel
     * 
     * @return ICaller|null
     */
    public function getCaller()
    {
        return $this->caller;
    }

    /**
     * Définit l'URL de base pour les requêtes API
     * 
     * @param string $url URL complète ou de base
     * @return self
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Définit le timeout (en secondes) des requêtes
     * 
     * @param int $timeout Durée maximale d'attente en secondes
     * @return self
     */
    public function setRequestTimeout($timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * Fournit la clé API à utiliser pour les appels
     * 
     * @param string $key Clé API EasyTransac
     * @return self
     */
    public function provideAPIKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * Récupère la clé API configurée
     * 
     * @return string|null
     */
    public function getAPIKey()
    {
        return $this->key;
    }

    /**
     * Vérifie si le mode debug est activé via le Logger
     * 
     * @return bool
     */
    public function isDebug()
    {
        return Logger::getInstance()->isActive();
    }

    /**
     * Active ou désactive le mode debug
     * 
     * @param bool $debugMode True pour activer, false sinon
     * @return self
     */
    public function setDebug($debugMode)
    {
        Logger::getInstance()->setActive($debugMode);
        return $this;
    }

    /**
     * Effectue un appel vers la fonction API EasyTransac spécifiée
     * 
     * @param string $funcName Nom de la fonction à appeler
     * @param array &$params Paramètres à transmettre (par référence, peuvent être modifiés par un modifier)
     * @return string Réponse brute retournée par l'appel HTTP
     * @throws \RuntimeException Si la clé API ou le caller ne sont pas définis
     * @throws \Exception Pour toute autre erreur durant l'appel
     */
    public function call($funcName, array &$params)
    {
        // Vérification que la clé API est fournie
        if (empty($this->key)) {
            throw new \RuntimeException("API key not supplied");
        }

        // Vérification que le caller est défini
        if (empty($this->caller)) {
            throw new \RuntimeException("Caller not supplied");
        }

        // Configuration du timeout et des headers pour le caller
        $this->caller->setTimeout($this->timeout);
        $this->caller->setHeaders(['EASYTRANSAC-API-KEY:' . $this->key]);

        // Si un modificateur est défini, on l'exécute pour potentiellement modifier la cible et les params
        if (!empty($this->modifier)) {
            try {
                $this->modifier->execute($this, $funcName, $params);
                $target = $this->modifier->getFuncName();
                $params = $this->modifier->getParams();
            } catch (\RuntimeException $e) {
                Logger::getInstance()->write('Exception: ' . $e->getMessage());
                throw $e;
            }
        } else {
            // Sinon la cible est l'URL de base + nom de fonction
            $target = $this->url . $funcName;
        }

        // Ajout d'un paramètre Version si absent
        if (!isset($params['Version'])) {
            $params['Version'] = 'easytransac-sdk-php';
        }

        // Génération et ajout de la signature de sécurité
        $params['Signature'] = Security::getSignature($params, $this->key);

        // Logging de l'URL appelée et des paramètres
        Logger::getInstance()->write('Called url: ' . $target);
        Logger::getInstance()->write($params);

        try {
            // Réalisation de l'appel HTTP via le caller
            $response = $this->caller->call($target, $params);

            // Log de la réponse brute reçue
            Logger::getInstance()->write($response);

            return $response;
        } catch (\Exception $e) {
            // Log en cas d'erreur et propagation
            Logger::getInstance()->write('Exception: ' . $e->getMessage() . ', Code: ' . $e->getCode());
            throw $e;
        }
    }

    /**
     * Retourne l'instance unique (singleton) de la classe Services
     * 
     * @return self
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Destructeur : libère la référence au caller
     */
    public function __destruct()
    {
        $this->caller = null;
    }

    /**
     * Constructeur privé du singleton.
     * Initialise un caller par défaut, de préférence CurlCaller si disponible,
     * sinon FgcCaller.
     */
    private function __construct()
    {
        $this->caller = new CurlCaller();

        if (!$this->caller->isAvailable()) {
            $this->caller = new FgcCaller();
        }
    }

    /**
     * Clone non disponible pour ce singleton
     */
    private function __clone()
    {
    }
}
