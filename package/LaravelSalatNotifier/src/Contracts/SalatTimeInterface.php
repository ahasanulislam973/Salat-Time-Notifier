<?php

namespace LaravelSalatNotifier\Contracts;

interface SalatTimeInterface
{
    public function getSalatTimes();
    public function setSalatTimes(array $times);
    public function sendNotification($salat);
}