<?php
    $problem = '1004. Можно ли в квадратном зале площадью S поместить круглую сцену радиусом R так, чтобы от стены до сцены был проход не менее K?';
    $squareArea = $_POST['squareArea'];
    $circleRadius = $_POST['circleRadius'];
    $wallToStage = $_POST['wallToStage'];

    $A = sqrt($squareArea);
    $D = $circleRadius * 2;
    $result = ($A - $D > $wallToStage) ? "Можно" : "Нельзя";

    echo $result;



    $db_host = 'localhost';
    $db_user = 'a0881422_hw';
    $db_password = '567490AZAZaz';
    $db_db = 'a0881422_hw';
    
    $mysqli = new mysqli(
        $db_host,
        $db_user,
        $db_password,
        $db_db
    );

    if ($mysqli->connect_error) {
        die('Ошибка подключения: ' . $mysqli->connect_error);
    }

    // Используем подготовленные запросы для безопасного вставки данных
    $stmt = $mysqli->prepare("INSERT INTO `t3` (`problem`, `squareArea`, `circleRadius`, `wallToStage`, `result`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $problem, $squareArea, $circleRadius, $wallToStage, $result);

    if ($stmt->execute()) {
        echo "Данные успешно добавлены в базу данных.";
    } else {
        echo "Ошибка при добавлении данных: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
?>