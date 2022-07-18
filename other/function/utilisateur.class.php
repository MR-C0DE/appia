 <?php
    include_once('dateNaissance.class.php');
    class Utilisateur
    {

        private string $prenom;
        private string $nom;
        private string $numero_telephone;
        private DateNaissance $date_de_naissance;

        public function __construct(string $prenom, string $nom, int $numero_telephone, DateNaissance $date_de_naissance)
        {
            $this->prenom = $prenom;
            $this->nom = $nom;
            $this->numero_telephone = $numero_telephone;
            $this->date_de_naissance = $date_de_naissance;
        }
        public function getPrenom()
        {
            return $this->prenom;
        }

        public function getNom()
        {
            return $this->nom;
        }

        public function getTelephone()
        {
            return $this->numero_telephone;
        }

        public function getDateNaissance()
        {
            return $this->date_de_naissance;
        }

        public function ageUtilisateur()
        {
            $jour_actuel = (int) date('j');
            $mois_actuel = (int) date('m');
            $annee_actuelle = (int) date('Y');

            $age = $annee_actuelle - $this->date_de_naissance->getAnnee();
            $age = $this->ajusteAge($age, $jour_actuel, $mois_actuel, $annee_actuelle);

            return $age;
        }

        public function ajusteAge(int $age, int $jour_actuel, int $mois_actuel, int $annee_actuelle)
        {

            if ($mois_actuel > $this->date_de_naissance->getMois()) {

                $age--;
            } else if ($mois_actuel <= $this->date_de_naissance->getMois()) {

                if ($jour_actuel > $this->date_de_naissance->getjour()) {

                    $age--;
                }
            }
            return $age;
        }
    }

    ?>