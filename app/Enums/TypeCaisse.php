<?php

namespace App\Enums;

enum TypeCaisse: string
{
    case DECLARATION = 'Declaration';
    case FONCTIONNEMENT = 'Fonctionnement';
    case DIVERS = 'Divers';
    case DEPENSE_COURANTE = 'Depense Courante';
    case SITUATION_BANQUE = 'Situation Banque';

    /**
     * Get all enum values for use in forms or validation.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
