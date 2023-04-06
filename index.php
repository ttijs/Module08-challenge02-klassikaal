 <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=webshop", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";

        // dit is de insert
        //$sql = "INSERT INTO `admin_user`(`email`, `password`) VALUES ('jan@test.nl', 'geheimwachtwoord');";
        // use exec() because no results are returned
        //$conn->exec($sql);


        // hieronder de select
        $sql = "SELECT `email`, `password` FROM admin_user";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($stmt->fetchAll() as $k => $v) {
            echo "\$k = " . $k;
            echo " en \$v['email'] = " . $v['email'] . "<br>";
        }
        // dit kan ook
        // while ($v = $stmt->fetch()) {
        //     echo "email = " . $v['email'] . "<br>";
        // }

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?> 