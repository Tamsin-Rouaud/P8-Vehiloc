<?php

namespace App\Enum;

enum BoiteVitesseStatus: string
{
    case Manuelle = 'manuelle';
    case Automatique = 'automatique';
    
    
    public function getLabel(): string
    {
        return match ($this) {
            self::Manuelle => 'Manuelle',
            self::Automatique => 'Automatique',
            
        };
    }
}