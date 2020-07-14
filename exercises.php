<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- Exercise 1 -->
    <?php
        $viewer = getenv( "HTTP_USER_AGENT" );
        $browser = "An unidentified browser";
        if( preg_match( "/MSIE/i", "$viewer" ) )
        {
        $browser = "Internet Explorer" ;
        }
        else if( preg_match( "/Netscape/i", "$viewer"  ) )
        {
        $browser = "Netscape";
        }
        elseif(preg_match('/Chrome/i' , "$viewer"))
        {
        $browser = 'Google Chrome';
        }
        else  if( preg_match( "/Mozilla/i", "$viewer" ))
        {
        $browser = "Mozilla" ;
        }
        elseif(preg_match('/Safari/i',"$viewer"))
        {
        $browser = 'Apple Safari';
        }
        $platform = "An unidentified OS!";
        if( preg_match( "/Windows/i", "$viewer" ) )
        {
        $platform = "Windows!";
        }
        else if ( preg_match( "/Linux/i", "$viewer"  ) )
        {
        $platform = "Linux!";
        }
        else if  ( preg_match( "/Mac/i", "$viewer" ) )
        {
        $platform = "Mac!";
        }
        echo("You are using $browser on $platform");
        ?>    
    
    <title>Day02 PHP Exercises</title>

</head>



<body>
    <hr>
    <!-- Exercise 2 -->
    <form action="exercises.php" method="POST">
        Name: <input type="text" name="name" />
        Age: <input type="text" name="age" />
        <input type="submit" name="submit" value ="Submit" />
    </form>

    <?php 
        if( isset($_POST['submit'])) {
            if( $_POST['name'] && $_POST['age']) {
                echo "Welcome ". $_POST['name']. "! <br/> You are ". $_POST['age']. " years old.";
            } else {
                echo "Please insert your name AND age!";
            }
        }
    ?>
    <hr>
    <!-- Exercise 3 -->
        <?php
            function divide($a,$b) {
                $result = $a/$b;
                return $result;
            }

            echo divide(15,3);
        ?>
    <hr>
    <!-- Exercise 5 -->

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname ="cr09_john_oxales_delivery";

        $conn = mysqli_connect($servername, $username, $password,$dbname);

        // check connection

        if (!$conn) {
            echo "error, bro";
        } else {
            echo "success, you badass motherfucker!<br><hr>";
        }
    
        // sql query to create a table (age)

            /*     $sql = "ALTER Table customer add column (age int(3), eMail varchar(70), reg_date TIMESTAMP)";

                if (mysqli_query($conn,$sql)) {
                    echo "Table Age, eMail and reg_date created successfully!" . "/n";
                } else {
                    echo "Error, hombre!";
                } */

        // Exercise 6 insert data into db

            /*  $sql = "INSERT INTO customer (first_name, last_name, eMail) VALUES ('Mike','Handsome','mike_sexy@sexy.com')";

                mysqli_query($conn, $sql); */




        // Exercise 8

                $sql = "SELECT customer_id, last_name, first_name FROM customer";
                $result = mysqli_query($conn, $sql);

                // fetch the next row (as long as there are any) into $row
                while($row = mysqli_fetch_assoc($result)) {
                    printf("ID=%s %s (%s) <a href='exercises.php?id=%s'>Delete</a><br>",
                                    $row[ "customer_id"], $row["last_name"],$row["first_name"],$row["customer_id"]);
                }
                echo  "<hr> Fetched data successfully <hr>";

                // Free result set
                mysqli_free_result($result);
        
                // isset = if that specific value,attribute, etc exists..
                if(isset($_GET["id"])){
                    $id= $_GET["id"];
                    $sql = "DELETE FROM customer WHERE customer_id = ".$id;
                    mysqli_query($conn, $sql);
                    header("Location: exercises.php");
                }
    ?>

    <!-- Exercise 9 -->
    <button type="submit"  onClick="refreshPage()">Update</button>

    <script>
        function refreshPage(){
            window.location.reload();
        } 
    </script>
</body>

</html>