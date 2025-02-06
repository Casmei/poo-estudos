<?php

$db = new SQLite3(__DIR__ . '/../database.sqlite');

$query = "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$db->exec($query);

echo "Migration executada com sucesso.\n";
