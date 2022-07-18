 <?php
    include_once('dateNaissance.class.php');
    include_once('adresse.class.php');
    /*
    
    
        LA CLASS UtilisateurVO
    
    
    
    */
    class Utilisateur
    {

        private string $nom;
        private string $prenom;
        private Adresse $adresse;
        private string $numero_telephone;
        private DateNaissance $date_de_naissance;
        private string $email;
        private string $mot_de_passe;

        // Construteur
        public function __construct(string $nom, string $prenom, Adresse $adresse, string $numero_telephone, DateNaissance $date_de_naissance, string $email, $mot_de_passe)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
            $this->numero_telephone = $numero_telephone;
            $this->date_de_naissance = $date_de_naissance;
            $this->email = $email;
            $this->mot_de_passe = $mot_de_passe;
        }
        // GETTERS ET SETTERS
        public function getNom(): string
        {
            return $this->nom;
        }

        public function getPrenom(): string
        {
            return $this->prenom;
        }

        public function getAdresse(): Adresse
        {
            return $this->adresse;
        }

        public function getTelephone(): string
        {
            return $this->numero_telephone;
        }

        public function getDateNaissance(): DateNaissance
        {
            return $this->date_de_naissance;
        }

        public function getEmail(): string
        {
            return $this->email;
        }

        public function getMotDePasse(): string
        {
            return $this->mot_de_passe;
        }
    }

    ?>