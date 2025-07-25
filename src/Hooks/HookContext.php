<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */


declare(strict_types=1);

namespace KintsugiTax\SDK\Hooks;

use KintsugiTax\SDK\SDKConfiguration;

class HookContext
{
    /** 
     * @var SDKConfiguration $config
     */
    public SDKConfiguration $config;

    /**
     * @var string $baseURL
     */
    public string $baseURL;
    /**
     * @var string $operationID
     */
    public string $operationID;
    /**
     * @var ?array<string> $oauth2Scopes;
     */
    public ?array $oauth2Scopes;
    /**
     * @var ?\Closure(): ?mixed $securitySource
     */
    public ?\Closure $securitySource;

    /**
     * @param  string  $operationID
     * @param  ?array<string>  $oauth2Scopes
     * @param  ?\Closure(): ?mixed  $securitySource
     */
    public function __construct(SDKConfiguration $config, string $baseURL, string $operationID, ?array $oauth2Scopes, ?\Closure $securitySource)
    {
        $this->config = $config;
        $this->baseURL = $baseURL;
        $this->operationID = $operationID;
        $this->oauth2Scopes = $oauth2Scopes;
        $this->securitySource = $securitySource;
    }
    /**
     * @param  string  $name
     * @param  array<mixed>  $args
     * @return mixed
     */
    public function __call($name, $args): mixed
    {
        if ($name === 'securitySource') {
            return call_user_func_array($this->securitySource, $args);
        }

        return null;
    }
}
