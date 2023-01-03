<?php

namespace EasyTransac\Core;

/**
 * Logger
 *
 * Classe utilitaire pour la journalisation des événements, à des fins de débogage.
 * Utilise le design pattern Singleton.
 *
 * @package EasyTransac\Core
 */
class Logger
{
    /** @var bool Active ou non */
    protected $active = false;

    /** @var string Nom du fichier de log */
    protected $logName = 'easytransac-sdk.txt';

    /** @var string Chemin d'enregistrement du fichier */
    protected $filePath = '';

    /** @var self|null Instance unique du Logger */
    protected static $instance = null;

    /** Constructeur privé (singleton) */
    protected function __construct()
    {
    }

    /** Empêche le clonage */
    protected function __clone()
    {
    }

    /**
     * Récupère l'instance unique du logger.
     *
     * @return self
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Active ou désactive le logger.
     *
     * @param $active
     * @return $this
     */
    public function setActive($active): self
    {
        $this->active = $active;
        return $this;
    }

    /**
     * Vérifie si le logger est actif.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * Définit le chemin vers le dossier du fichier de log.
     *
     * @param $path
     * @return $this
     */
    public function setFilePath($path): self
    {
        $this->filePath = $path;
        return $this;
    }

    /**
     * Récupère le chemin complet vers le fichier de log.
     *
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * Supprime le fichier de log s'il existe.
     *
     * @return void
     */
    public function delete(): void
    {
        $fullPath = $this->getFilePath() . $this->logName;
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    /**
     * Écrit un message dans le fichier de log (si activé).
     *
     * @param $message
     * @return $this|null
     */
    public function write($message): ?self
    {
        if (!$this->active) {
            return null;
        }

        $date = date('Y-m-d H:i:s') . ' - ';

        if (is_array($message) || is_object($message)) {
            $message = print_r($message, true);
        }

        file_put_contents(
            $this->getFilePath() . $this->logName,
            $date . $message . PHP_EOL . PHP_EOL,
            FILE_APPEND
        );

        return $this;
    }
}
