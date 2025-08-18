<?php

namespace EasyTransac\Core;

/**
 * Logger
 *
 * Utility class for event logging, mainly for debugging purposes.
 * Implements the Singleton design pattern.
 *
 * @package EasyTransac\Core
 */
class Logger
{
    /** @var bool Whether logging is enabled */
    protected $active = false;

    /** @var string Log file name */
    protected $logName = 'easytransac-sdk.txt';

    /** @var string Directory path where the log file is stored */
    protected $filePath = '';

    /** @var self|null Singleton instance */
    protected static $instance = null;

    /** Private constructor (singleton) */
    protected function __construct()
    {
    }

    /** Prevent cloning */
    protected function __clone()
    {
    }

    /**
     * Returns the singleton logger instance.
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
     * Enables or disables the logger.
     *
     * @param bool $active
     * @return $this
     */
    public function setActive($active): self
    {
        $this->active = $active;
        return $this;
    }

    /**
     * Checks whether the logger is enabled.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * Sets the directory path for the log file.
     * Note: Ensure the path includes the trailing directory separator.
     *
     * @param string $path
     * @return $this
     */
    public function setFilePath($path): self
    {
        $this->filePath = $path;
        return $this;
    }

    /**
     * Gets the full directory path for the log file.
     *
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * Deletes the log file if it exists.
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
     * Writes a message to the log file (if enabled).
     *
     * @param mixed $message Message to log; arrays/objects will be stringified via print_r.
     * @return self|null Returns $this when written, or null if logging is disabled.
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
