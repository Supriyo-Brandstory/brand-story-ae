<?php

namespace App\Core;

use PDO;
use Exception;

class BaseModel
{
    protected string $table;
    protected string $primaryKey = 'id';

    /** @var PDO */
    protected PDO $db;

    public function __construct()
    {
        $this->db =  Database::connect();

        if (!$this->table) {
            throw new Exception("Model table name not defined in " . static::class);
        }
    }

    /**
     * Find one record by primary key.
     */
    public function find(mixed $id): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = ? LIMIT 1"
        );
        $stmt->execute([$id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ?: null;
    }

    /**
     * Get all records.
     */
    public function findAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Count all records.
     */
    public function countAll(): int
    {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM {$this->table}");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    /**
     * Insert or update record.
     */
    public function save(array $data): bool
    {
        // UPDATE
        if (!empty($data[$this->primaryKey])) {
            $id = $data[$this->primaryKey];
            unset($data[$this->primaryKey]);

            $setPart = implode(", ", array_map(fn($col) => "$col = ?", array_keys($data)));

            $stmt = $this->db->prepare(
                "UPDATE {$this->table} SET $setPart WHERE {$this->primaryKey} = ?"
            );

            return $stmt->execute([...array_values($data), $id]);
        }

        // INSERT
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));

        $stmt = $this->db->prepare(
            "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)"
        );

        return $stmt->execute(array_values($data));
    }

    /**
     * Delete record.
     */
    public function delete(mixed $id): bool
    {
        $stmt = $this->db->prepare(
            "DELETE FROM {$this->table} WHERE {$this->primaryKey} = ?"
        );
        return $stmt->execute([$id]);
    }

    /**
     * Execute raw query.
     */
    public function query(string $sql, array $params = []): array
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get the table name for the model.
     */
    public function getTableName(): string
    {
        return $this->table;
    }

    /**
     * Define a belongs-to relationship.
     */
    public function belongsTo(string $relatedModel, string $foreignKey = null, string $ownerKey = 'id'): ?array
    {
        // Infer foreign key if not provided (e.g., 'category_id' from 'CategoryModel')
        if (is_null($foreignKey)) {
            $foreignKey = strtolower(basename(str_replace('\\', '/', $relatedModel))) . '_id';
        }

        // Get the value of the foreign key on the current model
        // We'll need to fetch the current model's data first
        // For simplicity, this method assumes it's called on an already loaded model instance
        // Or that the foreign key is directly accessible.
        // For a more robust solution, this would involve a query builder.
        // For now, let's assume we can get the ID from the current model's properties.
        // This means the model instance needs to hold its data.
        // A direct implementation of fetching related data would look like this:

        $localValue = $this->{$foreignKey} ?? null; // Assuming the foreign key exists as a property

        if ($localValue) {
            $relatedInstance = new $relatedModel();
            return $relatedInstance->find($localValue);
        }
        return null; // No related record found

        // A more advanced implementation would return a query builder instance
        // allowing for further chaining like $blog->category()->where(...)
        // Given the current BaseModel, returning the found record is simpler.
    }

    /**
     * Define a has-many relationship.
     */
    public function hasMany(string $relatedModel, string $foreignKey = null, string $localKey = 'id'): array
    {
        if (is_null($foreignKey)) {
            // Infer foreign key from current model name (e.g., 'blog_id' for a Blog model)
            $foreignKey = strtolower(basename(str_replace('\\', '/', static::class))) . '_id';
        }

        $localValue = $this->{$localKey} ?? null; // Get the primary key of the current model instance

        if ($localValue) {
            $relatedInstance = new $relatedModel();
            $stmt = $this->db->prepare(
                "SELECT * FROM {$relatedInstance->table} WHERE {$foreignKey} = ?"
            );
            $stmt->execute([$localValue]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }
}
