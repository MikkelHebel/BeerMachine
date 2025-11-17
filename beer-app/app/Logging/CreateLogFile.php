<?php

namespace App\Logging;

use Monolog\Handler\StreamHandler;

class CreateLogFile
{
    public function __invoke($logger)
    {
        foreach ($logger->getHandlers() as $handler) {
            if ($handler instanceof StreamHandler) {
                $path = $handler->getUrl();
                $dir = dirname($path);

                if (!is_dir($dir)) {
                    mkdir($dir, 0755, true);
                }

                if (!file_exists($path)) {
                    touch($path);
                    chmod($path, 0664);
                }
            }
        }
    }
}
