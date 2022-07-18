<?php
include_once('utilisateur.class.php');
class Appia_DAO
{
    private $sqlClient;

    //Constructeur
    public function __construct(string $user, string $password)
    {
        try {
            $this->sqlClient = new PDO('mysql:host=localhost;dbname=appia;charset=utf8', $user, $password);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    // Annule DAO
    public function close_DAO(): void
    {
        $this->sqlClient = NULL;
    }

    // Insert les données dans la table membre
    public function insertDataInMembre(Utilisateur $utilisateur): bool
    {

        $sqlQuery = 'INSERT INTO membre(nom, prenom, adresse, code_postal, ville, telephone, date_naissance, email, mot_de_passe, date_enregistrement )
                    VALUES (:nom, :prenom, :adresse, :code_postal, :ville, :telephone, :date_naissance, :email, :mot_de_passe, NOW() )';

        $insertMembre = $this->sqlClient->prepare($sqlQuery);

        $insertMembre->execute([

            'nom' => $utilisateur->getNom(),
            'prenom' => $utilisateur->getPrenom(),
            'adresse' => $utilisateur->getAdresse()->getMonAdresse(),
            'code_postal' => $utilisateur->getAdresse()->getCodePostal(),
            'ville' => $utilisateur->getAdresse()->getVille(),
            'telephone' => $utilisateur->getTelephone(),
            'date_naissance' => $utilisateur->getDateNaissance()->getDateFormat('aaaa-mm-jj'),
            'email' => $utilisateur->getEmail(),
            'mot_de_passe' => $utilisateur->getMotDePasse()

        ]);

        return true;
    }

    // retourne les elements d'un table
    public function selectAllElement($table)
    {
        $query = "SELECT * FROM $table";
        $data = $this->sqlClient->prepare($query);
        $data->execute();
        return $data->fetchAll();
    }

    // La methode permettant de rechercher un element dans la base de donnees.
    public function seachOneElement($table, $colonne, $element): string
    {

        $sqlQuery = "SELECT $colonne FROM $table WHERE $colonne = :$colonne";

        $data = $this->sqlClient->prepare($sqlQuery);
        $data->execute([$colonne => $element]);

        $resultat = $data->fetchAll();
        $element = "";

        foreach ($resultat as $index) {
            $element = $index[$colonne];
        }
        return $element;
    }

    // La methode permettant de rechercher un element par un autre dans la base de donnees.
    public function seachOneElementByOther($table, $colonneSearch, $colonne, $element): string
    {

        $sqlQuery = "SELECT $colonneSearch FROM $table WHERE $colonne = :$colonne";

        $data = $this->sqlClient->prepare($sqlQuery);
        $data->execute([$colonne => $element]);

        $resultat = $data->fetchAll();
        $element = "";

        foreach ($resultat as $index) {
            $element = $index[$colonneSearch];
        }
        return $element;
    }


    // La methode permettant de rechercher des elements dans la base de donnees.
    public function seachAllElement($table, $colonne, $element): array
    {
        $sqlQuery = "SELECT * FROM $table WHERE $colonne = :$colonne";
        $data = $this->sqlClient->prepare($sqlQuery);
        $data->execute([$colonne => $element]);
        return $data->fetchAll();
    }

    public function existElement($table, $colonne, $element): bool
    {
        //return strlen($this->seachOneElement($table, $colonne, $element)) > 0;
        return $this->seachOneElement($table, $colonne, $element) == $element;
    }

    public function insertCommande($id_utilisateur): bool
    {
        $sqlQuery = 'INSERT INTO commande(membre_id, commande_date ) VALUES (:membre_id, NOW() )';

        $insertMembre = $this->sqlClient->prepare($sqlQuery);

        $insertMembre->execute(['membre_id' => $id_utilisateur]);

        return true;
    }

    // Recuperer la derniere commande d'un utilisateur.
    public function lastCommande($id_utilisateur)
    {


        $sqlQuery = "SELECT MAX(commande_id) FROM commande WHERE membre_id = :membre_id";

        $data = $this->sqlClient->prepare($sqlQuery);
        $data->execute(['membre_id' => $id_utilisateur]);

        $resultat = $data->fetchAll();

        return $resultat;
    }

    // Enregistrer les articles vendu
    public function insertArticleVendu($chaine): bool
    {
        $valeurs = explode('-',  $chaine);
        $sqlQuery = 'INSERT INTO article_vendu(commande_id, article_id, categorie_id, quantite_article, prix_unitaire ) 
        VALUES (:commande_id, :article_id, :categorie_id, :quantite_article, :prix_unitaire)';

        $insertMembre = $this->sqlClient->prepare($sqlQuery);

        $insertMembre->execute(
            [
                'commande_id' => $valeurs[0],
                'article_id' => $valeurs[1],
                'categorie_id' => $valeurs[2],
                'quantite_article' => $valeurs[3],
                'prix_unitaire' => $valeurs[4]
            ]
        );

        return true;
    }

    // Enregistre le client
    public function insertClient($chaine): bool
    {
        $valeurs = explode('-%-',  $chaine);

        $sqlQuery = 'INSERT INTO client(commande_id, prenom, nom, telephone, email ) 
        VALUES (:commande_id, :prenom, :nom, :telephone, :email)';

        $insertMembre = $this->sqlClient->prepare($sqlQuery);

        $insertMembre->execute(
            [
                'commande_id' => $valeurs[0],
                'prenom' => $valeurs[1],
                'nom' => $valeurs[2],
                'telephone' => $valeurs[3],
                'email' => $valeurs[4]
            ]
        );

        return true;
    }
    //Recupere le dernier id du client
    public function lastClient($id_utilisateur)
    {

        $sqlQuery = "SELECT MAX(client_id) FROM client WHERE commande_id = :commande_id";

        $data = $this->sqlClient->prepare($sqlQuery);
        $data->execute(['commande_id' => $id_utilisateur]);

        $resultat = $data->fetchAll();

        return $resultat;
    }

    // enregistre la destination
    public function insertDestination($chaine): bool
    {
        $valeurs = explode('-%-',  $chaine);
        $sqlQuery = 'INSERT INTO destination(client_id, adresse, ville, code_postal ) 
        VALUES (:client_id, :adresse, :ville, :code_postal)';

        $insertMembre = $this->sqlClient->prepare($sqlQuery);

        $insertMembre->execute(
            [
                'client_id' => $valeurs[0],
                'adresse' => $valeurs[1],
                'ville' => $valeurs[2],
                'code_postal' => $valeurs[3]
            ]
        );

        return true;
    }
}
