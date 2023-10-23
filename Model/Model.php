<?php
require_once 'Class/dataBase.php';

class CategorieModel extends DataBase {
    public function getCategorieData() {
        $dbConnect = $this->dbConnect;
        
        $sql = "SELECT `Nom_de_la_categorie_par_défaut`, `Nom`, `Tailles`, `Couleur`, `Bonnet`, `Parfum`, `Description_sans_HTML`, `Caractéristique_Composition`, `URLs_de_toutes_les_images` FROM `mytable`";
        
        try {
            $stmt = $dbConnect->prepare($sql);
            $stmt->execute();
    
            $dataByCategory = array();
    
            while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categorie = $ligne["Nom_de_la_categorie_par_défaut"];
                $dataByCategory[$categorie][] = $ligne;
            }
    
            return $dataByCategory;
        } catch (PDOException $e) {
            echo "Erreur de requête : " . $e->getMessage();
        }
    }
    
}    
?>


