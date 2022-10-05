<?php

namespace App\FrameworkTools;

class ProcessServerElements {

    private static $instance;

    private $documentRoot;
    private $serverName;
    private $httpHost;
    private $uri;
    private $variables;
    private $verb;
    private $route;

    private function __construct() {
        // SINGLETON 
    }

    public static function start() {
        if (!ProcessServerElements::$instance) {
            ProcessServerElements::$instance = new ProcessServerElements();
        }

        return ProcessServerElements::$instance;
    }

    public function getInputJSONData() {
        return (array) json_decode(file_get_contents('php://input'), TRUE);
    }

    public function setDocumentRoot($documentRoot) {
        $this->documentRoot = $documentRoot;
    }

    public function getDocumentRoot() {
        return $this->documentRoot;
    }

    public function setServerName($serverName) {
        $this->serverName = $serverName;
    }

    public function getServerName() {
        return $this->serverName;
    }

    public function setHttpHost($httpHost) {
        $this->httpHost = $httpHost;
    }

    public function getHttpHost() {
        return $this->httpHost;
    }

    public function setUri($uri) {
        $this->uri = $uri;
    }

    public function getUri() {
        return $this->uri;
    }

    public function setVariables($variables) {
        $this->variables = $variables;
    }
    
    public function getVariables() {
        return $this->variables;
    }

    public function setVerb($verb) {
        $this->verb = $verb;
    }

    public function getVerb() {
        return $this->verb;        
    }

    public function setRoute($route) {
        $this->route = $route;
    }

    public function getRoute() {
        return $this->route;        
    }

}