<?php
namespace App\Controllers;

class BaseController
{


    protected $allowedMimeTypes;
  
    protected function __construct()
    {
      $this->allowedMimeTypes = [
        'textures' => [
            'jpeg',
            'jpg',
            'png',
            'gif',
            'bmp',
            'tiff',
            'x-tga',
            'vnd.radiance',
            'aces',
        ],
        '3d' => [
            'gltf', 
            'fbx'
        ],
        'documents' => [
            'pdf'
        ]
    ];
    }

    // UPLOAD FILE
    protected function uploadFile($file, $extType, $path)
    {
        $extention = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
        // Vérification du type de fichier
        if(!in_array($extention, $this->allowedMimeTypes[$extType])) {
            
            return $extType;
        }
        
        // Rename du fichier
        $filename = md5(uniqid().$file->getClientFilename()).'.'.$extention;
        $filename = explode("+", $filename)[0];
        $file->moveTo($path.$filename);
        return $filename;
    }

    // SEND RESPONSE
    protected function sendResponse($response, $data, $status)
    {
        $data['status'] = $status;
        $payload = json_encode($data);
        $response->getBody()->write($payload);
        return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus($status);
    }

    // GetImgMedia
    protected function getImgMedia($id)
    {
        return wp_get_attachment_metadata($id);
    }

    // GetImgMedia
    protected function getImgMediaUrl($id)
    {
        return wp_get_attachment_url($id);
    }

    // Sanitize
    protected function sanitize($data)
    {
        // Si $data est une chaîne de caractères, nettoyer les caractères spéciaux
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        return $data;
    }

    // Vérification des adresses email
    protected function validateEmail($email)
    {
        if (empty($email)) {
            return false;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    // Vérification de la taille d'une string
    protected function validateStringSize($string, $min, $max)
    {
        if (strlen($string) < $min or strlen($string) > $max) {
            return false;
        }
        return true;
    }

    // Vérification du mot de passe
    protected function validatePassword($password)
    {

        // Vérifier si le mot de passe contient au moins une majuscule
        if (!preg_match("/[A-Z]/", $password)) {
            return false;
        }

        // Vérifier si le mot de passe contient au moins une minuscule
        if (!preg_match("/[a-z]/", $password)) {
            return false;
        }

        // Vérifier si le mot de passe contient au moins un chiffre
        if (!preg_match("/[0-9]/", $password)) {
            return false;
        }

        // Vérifier si le mot de passe contient au moins un caractère spécial
        if (!preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password)) {
            return false;
        }

        // Vérifier si le mot de passe a au moins 8 caractères
        if (strlen($password) < 8) {
            return false;
        }

        // Le mot de passe a passé tous les critères de vérification
        return true;
    }

    // Vérification du numéro de téléphone
    protected function validatePhone($phone)
    {

        // Supprimer tous les espaces et tirets du numéro de téléphone
        $phone = preg_replace('/[\s\-]/', '', $phone);

        // Vérifier si le numéro de téléphone a la longueur attendue
        if (strlen($phone) < 10 || strlen($phone) > 12) {
            return false;
        }

        // Le numéro de téléphone est valide
        return true;
    }

    // Vérification la taille d'un nombre
    protected function validateNumberSize($number, $min, $max)
    {

        // Vérifier si le nombre contient uniquement des chiffres
        if (!preg_match('/^[0-9]+$/', $number)) {
            return false;
        }

        if (strlen($number) < $min || strlen($number) > $max) {
            return false;
        }

        // Le numéro de téléphone est valide
        return true;
    }

}