
<?php 

session_start(); 

include "includes/db.php";

if (isset($_POST['user']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['user']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        echo' <script>alert("Username is required")
        location.href = "/affilpro/admin"
        </script>';
        exit();

    }else if(empty($pass)){

        echo' <script>alert("paddword is required")
        location.href = "/affilpro/admin"
        </script>';
        exit();

    }else{

        $sql = "SELECT * FROM details WHERE user='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['user'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['user'] = $row['user'];
                $_SESSION['name'] = $row['name'];


                header("Location: home");

                exit();

            }else{

                echo' <script>alert("credintial missmatch")
                location.href = "/affilpro/admin"
                </script>';
                exit();

            }

        }else{

            echo' <script>alert("credintial missmatch")
            location.href = "/affilpro/admin"
            </script>';
            exit();

        }

    }

}else{

    header("Location: /admin");

    exit();

}
?>
