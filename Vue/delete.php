<?php
// Vérifier si l'ID de l'utilisateur à supprimer est passé en paramètre dans l'URL
if (isset($_POST['id'])) {
    // Inclure le modèle et le contrôleur nécessaires
    require_once '../Controleur/DeleteController.php';

    // Créer une instance du contrôleur des utilisateurs
    $deleteController = new DeleteController();

    // Appeler la méthode de suppression de l'utilisateur en utilisant l'ID passé en paramètre
    $userId = $_POST['id'];
    $result = $deleteController->DeleteStudent($userId);

    if ($result) {
        echo "<p>L'utilisateur avec l'ID". $userId." a été supprimé avec succès.</p>";
    } else {
        echo "<p>Une erreur s'est produite lors de la suppression de l'utilisateur avec l'ID $userId.</p>";
    }
    header('refresh:2;url=welcome_admin.php');
    exit;
}
?>