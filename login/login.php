
<?php 

session_start(); 

include "..\includes/db.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['email']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        echo' <script>alert("Username is required")
        history.back()
        </script>';
        exit();

    }else if(empty($pass)){

        echo' <script>alert("password is required")
        history.back()
                </script>';
        exit();

    }else{

        $sql = "SELECT * FROM user WHERE email='$uname' AND pass='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $uname && $row['pass'] === $pass) {

                echo "Logged in!";

                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['uid'] = $row['uid'];

                    if($row['isverified']==1){
                        if($row['ispurchased']==1){
                            header("Location: ..\home");
                            exit();

                        }else{
                            echo' <script>alert("You Need To To Buy Something First")
                            location.href = "/affilpro/home/purchase"
                            </script>';
                            exit();

                        }
                    }elseif($row['isverified']==0){
                     header("Location: ../verify");
                        exit();
                    }

            }else{

                echo' <script>alert("credintial missmatch")
                history.back()
                </script>';
                exit();

            }

        }else{

            echo' <script>alert("credintial missmatch")
            history.back()
            </script>';
            exit();

        }

    }

}else{
    echo' <script>
    history.back()
    </script>';

    exit();

}
?>
