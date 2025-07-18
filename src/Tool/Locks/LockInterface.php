<?php

namespace Justfire\Util\Tool\Locks;

use Justfire\Util\Tool\Lock;

/**
 * Interface LockInterface
 */
interface LockInterface
{
    public function setLock(?Lock $lock);

    public function locking(): bool;

    public function unlock();
}