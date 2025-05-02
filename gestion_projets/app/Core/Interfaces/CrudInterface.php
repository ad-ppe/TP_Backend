<?php
// Interface CRUD = contrat de base pour tous les modèles (Project, Task, User)

interface CrudInterface
{
    /**
     * Récupère tous les enregistrements
     */
    public function getAll();

    /**
     * Récupère un enregistrement par son ID
     */
    public function getById($id);

    /**
     * Insère un nouvel enregistrement dans la base
     */
    public function save();

    /**
     * Met à jour un enregistrement existant
     */
    public function update($id);

    /**
     * Supprime un enregistrement
     */
    public function delete($id);
}
