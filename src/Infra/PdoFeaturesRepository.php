<?php

namespace IMDSound\Infra;

use IMDSound\Models\Feature;
use PDO;

class PdoFeaturesRepository
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function allFeatures(): array
    {
        $sqlQuery = 'SELECT * FROM feature;';
        $stmt = $this->connection->query($sqlQuery);

        return $this->hydrateFeatureList($stmt);
    }

    private function hydrateFeatureList(\PDOStatement $stmt): array
    {
        $featureDataList = $stmt->fetchAll();
        $featureList = [];

        foreach ($featureDataList as $featureData) {
            $featureList[] = $this->hydrateFeature($featureData);
        }

        return $featureList;
    }


    public function hydrateFeature($featData) : Feature
    {
        return new Feature(
            $featData['feat_name'],
            $featData['description']
        );
    }

    public function insert(Feature $featData): bool
    {
        $insertQuery =
            'INSERT INTO feature (feat_name , description) ' .
            'VALUES (:feat_name, :description);';

        $stmt = $this->connection->prepare($insertQuery);
        
        $success = $stmt->execute([
            ':feat_name' => $feature->feat_name(),
            ':description' => $feature->description(),
        ]);

        return $success;
    }
}