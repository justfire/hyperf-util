<?php

namespace Justfire\Util\Tool\Dir;

use Justfire\Util\Tool\Dir;

/**
 * Class EachFile
 */
class EachFile
{
    public function __construct(
        public readonly string $filename,
        public readonly string $filepath,
        public readonly array  $relativelyDirs = [])
    {}

    /**
     * @return mixed
     * @throws \Exception
     */
    public function stopEach(): mixed
    {
        throw new \Exception();
    }
}