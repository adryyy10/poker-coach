<?php

namespace App\Enums;

enum Specialty: string
{
    case CASH_GAMES = 'cash games';
    case MTT = 'MTTs';
    case PLO = 'PLO';
    case SPINS = 'Spins';
}
