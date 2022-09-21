<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <!-- 
            1. URL
            2. Nome database
            3. User
            4. Password
         -->
        <h1>
            <?php
                
                


                define('DB_URL',        'localhost');
                define('DB_NAME',       'recap-join');
                define('DB_USER',       'root');
                define('DB_PASSWORD',   'root');

                $conn = new mysqli(DB_URL, DB_USER, DB_PASSWORD, DB_NAME);

                if($conn){
                    if($conn->connect_error){
                        echo "OMG";
                    }
                    else{
                        // 1. Definizione query
                        $query = 'SELECT * FROM users WHERE email = ?';
                        $stmt = $conn->prepare($query);
                        // $email = 'lorenzo-bertoni@boolean.careers';
                        $email = (array_key_exists('email', $_GET)) ? $_GET['email'] : 'lorenzo-bertoni@boolean.careers';
                        $stmt->bind_param('s', $email);

                        // 2. Eseguirla
                        $stmt->execute();

                        // 3. Leggerne il risultato
                        $result = $stmt->get_result();
                        $conn->close();

                        if($result && $result->num_rows > 0){
                            echo '<ul>';
                            while($row = $result->fetch_assoc()){
                                echo '<li>'.$row['id'].' - '.$row['name'].' - '.$row['email'].'</li>';
                            }
                            echo '</ul>';
                        }
                        else{
                            // NON CI SONO RIGHE
                        }
                    }
                }
                else{
                    echo "NOT CONN";
                }





            ?>
        </h1>

        <form action="/" method="GET">
            <input type="text" name="email">
            <button>
                INVIA
            </button>
        </form>
    </body>
</html>