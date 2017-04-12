<?php

namespace Cratch\Contracts\Http;

use Cratch\Http\Response;

interface ResponseInterface
{
    public function changeResponseCode(int $code): Response;

    public function getStatus();

    public function getContent();

    public function relocation(string $url);

    public function json($data, int $code = 200);
}