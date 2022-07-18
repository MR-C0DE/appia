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

    // Assure qu'il y a deux chiffres dans un nombre ex : 08, 02 ...
    public function nombreGestion(int $nombre): string | int
    {

        if ($nombre < 10) {
            return '0' . $nombre;
        } else {
            return $nombre;
        }
    }

    // Gere les differents formats
    public function getDateFormat(string $format): string
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
    //Donne l'age exacte de l'utilisateur.
    public function ajusteAge(int $age, int $jour_actuel, int $mois_actuel): int
    {

        if ($mois_actuel > $this->mois) {

            $age--;
        } else if ($mois_actuel <= $this->mois) {

            if ($jour_actuel > $this->jour) {

                $age--;
            }
        }
        return $age;
    }

    // Gere l'age de l'utilisateur.
    public function getAge(): int
    {

        $jour_actuel = (int) date('j');
        $mois_actuel = (int) date('m');
        $annee_actuelle = (int) date('Y');

        $age = $annee_actuelle - $this->annee;
        $age = $this->ajusteAge($age, $jour_actuel, $mois_actuel);

        return $age;
    }
}
