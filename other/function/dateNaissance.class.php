<?php

class DateNaissance
{

    private int $jour;
    private int $mois;
    private int $annee;

    public function __construct(int $jour, int $mois, int $annee)
    {
        $this->jour = $jour;
        $this->mois = $mois;
        $this->annee = $annee;
    }

    public function getJour()
    {
        return $this->jour;
    }

    public function getMois()
    {
        return $this->mois;
    }


    public function getAnnee()
    {
        return $this->annee;
    }

    public function nombreGestion(int $nombre)
    {

        if ($nombre < 10) {
            return '0' . $nombre;
        } else {
            return $nombre;
        }
    }
    public function getDateNaissance(string $format)
    {
        switch ($format) {
            case 'jj-mm-aaaa':
                return $this->nombreGestion($this->jour) . '-' . $this->nombreGestion($this->mois) . '-' . $this->annee;
            case 'mm-jj-aaaa':
                return $this->nombreGestion($this->mois) . '-' . $this->nombreGestion($this->jour) . '-' . $this->annee;
            case 'aaaa-mm-jj':
                return $this->annee . '-' . $this->nombreGestion($mois = 1) . '-' . $this->nombreGestion($this->jour);
            default:
                return $this->nombreGestion($this->jour) . '-' . $this->nombreGestion($this->mois) . '-' . $this->annee;
        }
    }
}
