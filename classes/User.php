<?php

class Utilisateur {
    private $id;
    private $nom;
    private $prenom;
    private $database;

    
    // ... autres attributs

    public function __construct($id, $nom, $prenom,Database $database) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->database = $database;
        // ... initialisation des autres attributs
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
