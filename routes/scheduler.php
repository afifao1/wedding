<?php
use Illuminate\Support\Facades\Schedule;

Schedule::command('refresh:venue-cache')->dailyAt('00:00');
