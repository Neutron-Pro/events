<?php
namespace NeutronStars\Events;

interface Cancellable
{
    public function isCancelled(): bool;

    public function setCancelled(bool $cancelled): void;
}
