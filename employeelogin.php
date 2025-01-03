<?php
include("db.php");
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: bills.php");
    exit;
}

$id =$_POST["emp_id"] ;
$password =$_POST["emp_password"] ;

       
    
        // Prepare a select statement
        $sql = "SELECT emp_id, password FROM employee WHERE emp_id = ?";
        
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $pass);
                    if($stmt->fetch()){
                        if(($password==$pass)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["pass"] = $password;
                            
                            // Redirect user to welcome page
                            header("location: bills.php");
                        } else{
                            // Password is not valid, display a generic error message
                            echo "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    echo "Invalid user or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    
    
    // Close connection
    $conn->close();

?>
