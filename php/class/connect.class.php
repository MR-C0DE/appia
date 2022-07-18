<?php
include_once('./../php/class/database.class.php');
include_once('./../php/class/chiffrement.class.php');

class Authentification
{
    private string $email;
    private string $mot_de_passe;

    public function __construct($email, $mot_de_passe)
    {
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
    }


    private function emailExiste(): bool
    {
        $base = new Appia_DAO('root', '');
        $resultat = $base->existElement('membre', 'email', $this->email);
        $base->close_DAO();
        return $resultat;
    }

    //Cette fonction est utiliser seulement si l'email est deja verifier.
    private function getMotDePasse(): string
    {
        $base = new Appia_DAO('root', '');
        $resultat = $base->seachOneElementByOther('membre', 'mot_de_passe', 'email', $this->email);
        $base->close_DAO();
        return $resultat;
    }

    // Methode qui permet de crypter le mot de passe entré par utilisateur.
    private function ceMotDePasse(): string
    {
        $cle = $this->email . '1845202';
        $motDePasseCryter = Chiffrement::crypter($this->mot_de_passe, sha1($cle));
        return $motDePasseCryter;
    }


    public function traitement(): string
    {
        $reponse = '';
        if ($this->emailExiste()) {

            // Comparaison des deux mot de passe.
            if ($this->getMotDePasse() == $this->ceMotDePasse()) {
                // TODO...

                $this->connexion();
            } else {
                $reponse = 'Mot de passe incorrecte!';
            }
        } else {
            $reponse = 'Adresse courriel incorrecte!';
        }
        return $reponse;
    }

    private function connexion(): void
    {
        session_start();

        $base = new Appia_DAO('root', '');
        $resultat = $base->seachAllElement('membre', 'email', $this->email);
        $base->close_DAO();

        $_SESSION['LOGIN'] = true;
        $_SESSION['ID'] = $resultat[0]['membre_id'];
        header('location: boutique.php');
        exit();
    }

    // deconnecter l'utilisateur.
    public static function deconnection(): void
    {
        if (isset($_COOKIE['data'])) {
            setcookie('data', NULL, time() + 1, '/', '', true, true);
        }
        session_start();
        $_SESSION = array();
        session_destroy();
        header('location: ./../../page/authentification.php');
        exit();
    }
}
