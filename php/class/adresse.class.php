<?php
// La classe qui permet de creer l'adresse de l'utilisateur
class Adresse
{
    private string $mon_adresse;
    private string $codePostal;
    private string $ville;

    public function __construct(string $mon_adresse, string $codePostal, string $ville)
    {
        $this->mon_adresse = $mon_adresse;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
    }
    public function getMonAdresse(): string
    {
        return strtolower($this->mon_adresse); #retourne le nom de l'adresse en miniscule
    }
    public function getCodePostal(): string
    {
        return strtoupper($this->codePostal);  #retourne le code postal en majuscule
    }
    public function getVille(): string
    {
        return $this->ville;
    }
}
