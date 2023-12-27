<?php

class Utilisateur {
    private $id;
    private $username;

    private $email;
    private $motDePasse;

    
    // ... autres attributs

    public function __construct($username, $email, $motDePasse) {
        $this->username = $username;
        $this->email = $email;
        // Hacher le mot de passe avant de le stocker en base de données
        $this->motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);
    }

    // Getters et setters
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getMotDePasse() {
        return $this->motDePasse;
    }

    public function setMotDePasse($motDePasse) {
        // Hacher le nouveau mot de passe avant de le stocker en base de données
        $this->motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);
    }
    

    
    
    public function handleSignUp() {
        $conn = $this->database->getConnection();

        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
        
            // Default image path
            $img = "default.jpg";
        
            // Check if the image was uploaded
            if ($_FILES['profilePicture']['name']) {
                $targetDirectory = "upload/";
                $targetPath = $targetDirectory . basename($_FILES['profilePicture']['name']);
        
                // Create the "upload" directory if it doesn't exist
                if (!file_exists($targetDirectory)) {
                    mkdir($targetDirectory, 0755, true);
                }
        
                // Now move the uploaded file
                if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $targetPath)) {
                    // File uploaded successfully
                    $message = "The file " . basename($_FILES['profilePicture']['name']) . " has been uploaded.";
                    $img = "upload/" . $_FILES['profilePicture']['name'];
                } else {
                    // Error uploading file
                    $message = "Sorry, there was a problem uploading your file.";
                }
            }
        
            
            

        
            try {
                
                
        
                // Check if the email is already registered
                $checkEmailQuery = "SELECT * FROM users WHERE email = ?";
                $checkEmailStmt = $conn->prepare($checkEmailQuery);
                $checkEmailStmt->execute([$email]);
                $checkEmailResult = $checkEmailStmt->fetch(PDO::FETCH_ASSOC);
        
                if ($checkEmailResult) {
                    $message = "This email is already registered.";
                } else {
                    // Insert user data into the database
                    $query = "INSERT INTO users (username, pass_word, status, email, image_url, role) VALUES (?, ?, 'active', ?, ?, 'user')";
                    $stmt = $conn->prepare($query);
                   
        
                    if ($stmt) {
                        $stmt->execute([$username, $password, $email, $img]);
                        $stmt->closeCursor();
        
                        header("Location: ");
                        exit();
                    } else {
                        $message = "Error: " . $conn->errorInfo()[2];
                    }
                }
            } catch (PDOException $e) {
                $message = "Error: " . $e->getMessage();
            } finally {
                // Close the database connection
                $conn = null;
            }
        }
       
        
        
    }























    
    public function handleSignIn() {
       
    }
}

?>
