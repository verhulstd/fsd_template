<?php

function connectToDB()
{
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'fsd';
    $db_port = 3306;

    try {
        $db = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        die();
    }
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    return $db;
}


function getGeoCaches($filter_level = 0): array
{
    $sql = "SELECT geocaches.*, geolevels.name as level_name FROM geocaches
    LEFT JOIN geolevels
    ON geocaches.level_id = geolevels.id";

    if ($filter_level > 0)
        $sql .= " WHERE geocaches.level_id = $filter_level";

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getGeoCacheById(int $id): array|bool
{
    $sql = "SELECT geocaches.* FROM geocaches
    WHERE geocaches.id = :id;";

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute([
        ":id" => $id
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function insertGeocache(string $name, string $description, string $hint, int $level, float $latitude, float $longitude): bool|int
{
    $db = connectToDB();
    $sql = "INSERT INTO geocaches(name, description, hint, level_id, latitude, longitude) VALUES (:name, :description, :hint, :level, :latitude, :longitude)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        'name' => $name,
        'description' => $description,
        'hint' => $hint,
        'level' => $level,
        'latitude' => $latitude,
        'longitude' => $longitude,
    ]);

    return $db->lastInsertId();
}


function getGeoLevels($order = 'weight'): array
{
    $sql = "SELECT id, name FROM geolevels ORDER BY $order";

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
}