<?php

namespace App\Utils;

class MontantConverter
{
    public static function convertirEnLettres($montant)
    {
        $chiffres = array(
            0 => 'zéro',
            1 => 'un',
            2 => 'deux',
            3 => 'trois',
            4 => 'quatre',
            5 => 'cinq',
            6 => 'six',
            7 => 'sept',
            8 => 'huit',
            9 => 'neuf',
            10 => 'dix',
            11 => 'onze',
            12 => 'douze',
            13 => 'treize',
            14 => 'quatorze',
            15 => 'quinze',
            16 => 'seize',
            20 => 'vingt',
            30 => 'trente',
            40 => 'quarante',
            50 => 'cinquante',
            60 => 'soixante',
            70 => 'soixante-dix',
            80 => 'quatre-vingts',
            90 => 'quatre-vingt-dix'
        );

        if ($montant < 0) {
            return 'moins ' . self::convertirEnLettres(abs($montant));
        }

        if ($montant < 17) {
            return $chiffres[$montant];
        }

        if ($montant < 20) {
            return 'dix-' . $chiffres[$montant - 10];
        }

        if ($montant < 100) {
            $dizaine = floor($montant / 10) * 10;
            $unite = $montant % 10;
            $resultat = $chiffres[$dizaine];
            if ($unite > 0) {
                $resultat .= '-' . self::convertirEnLettres($unite);
            }
            return $resultat;
        }

        if ($montant < 200) {
            return 'cent ' . self::convertirEnLettres($montant - 100);
        }

        if ($montant < 1000) {
            $centaine = floor($montant / 100);
            $reste = $montant % 100;
            $resultat = $chiffres[$centaine] . ' cent';
            if ($reste > 0) {
                $resultat .= ' ' . self::convertirEnLettres($reste);
            }
            return $resultat;
        }

        if ($montant < 2000) {
            return 'mille ' . self::convertirEnLettres($montant - 1000);
        }

        if ($montant < 1000000) {
            $milliers = floor($montant / 1000);
            $reste = $montant % 1000;
            $resultat = self::convertirEnLettres($milliers) . ' mille';
            if ($reste > 0) {
                $resultat .= ' ' . self::convertirEnLettres($reste);
            }
            return $resultat;
        }

        if ($montant < 1000000000) {
            $millions = floor($montant / 1000000);
            $reste = $montant % 1000000;
            $resultat = self::convertirEnLettres($millions) . ' million';
            if ($millions > 1) {
                $resultat .= 's';
            }
            if ($reste > 0) {
                $resultat .= ' ' . self::convertirEnLettres($reste);
            }
            return $resultat;
        }

        $milliards = floor($montant / 1000000000);
        $reste = $montant % 1000000000;
        $resultat = self::convertirEnLettres($milliards) . ' milliard';
        if ($milliards > 1) {
            $resultat .= 's';
        }
        if ($reste > 0) {
            $resultat .= ' ' . self::convertirEnLettres($reste);
        }
        return $resultat;
    }
}
