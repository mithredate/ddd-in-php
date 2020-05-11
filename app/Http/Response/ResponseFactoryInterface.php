<?php
/**
 * Filename: ResponseFactory.
 * User: Mithredate
 * Date: May, 2020
 */

namespace App\Http\Response;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

interface ResponseFactoryInterface
{
    public function make(string $content = '', int $status = 200, array $headers = []): Response;

    public function json(array $data = [], int $status = 200, array $headers = []): JsonResponse;
}