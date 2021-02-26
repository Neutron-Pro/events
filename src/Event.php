<?php
namespace NeutronStars\Events;

interface Event
{
    public const LOWEST_PRIORITY = -2;
    public const LOW_PRIORITY = -1;
    public const NORMAL_PRIORITY = 0;
    public const HIGH_PRIORITY = 1;
    public const HIGHEST_PRIORITY = 2;
}
