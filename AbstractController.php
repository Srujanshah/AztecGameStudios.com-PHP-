<?php

namespace AztecGameStudios\Controllers;

use AztecGameStudios\Core\Config;
use AztecGameStudios\Core\Db;
use AztecGameStudios\Core\Requests;
use Monolog\Logger;
use Twig_Environment;
use Twig_Loader_Filesystem;
use Monolog\Handler\StreamHandler;

abstract class AbstractController {
    protected $request;
    protected $db;
    protected $config;
    protected $view;
    protected $log;

    public function __construct(Requests $request) {
        $this->request = $request;
        $this->db = Db::getInstance();
        $this->config = Config::getInstance();

        $loader = new Twig_Loader_Filesystem(
            __DIR__ . '/../../views'
        );
        $this->view = new Twig_Environment($loader);

        $this->log = new Logger('AGS');
        $logFile = $this->config->get('log');
        $this->log->pushHandler(
            new StreamHandler($logFile, Logger::DEBUG)
        );
    }

    public function setPlayerId(int $playerId) {
        $this->playerId = $playerId;
    }

    protected function render(string $template, array $params): string {
        return $this->view->loadTemplate($template)->render($params);
    }
}

?>