<?php

namespace IMDSound\Database;

use IMDSound\Models\TypeSubs;
use IMDSound\Repository\TypeSubsRepository;
use PDO;

class PdoTypeSubsRepository implements TypeSubsRepository

{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function allTypes(): array
    {
        $sqlQuery = 'SELECT * FROM type;';
        $stmt = $this->connection->query($sqlQuery);

        return $this->hydrateTypeSubscription($stmt);
    }

    private function hydrateTypeSubscription(\PDOStatement $stmt): array
    {
        $type_subscriptionDataList = $stmt->fetchAll();
        $type_subscription = [];

        foreach ($type_subscriptionDataList as $type_subData) {
            $type_subscription[] = $this->hydrateTypeSubs($type_subData);
        }

        return $type_subscription;
    }

    public function hydrateTypeSubs($type_subData) : TypeSubs
    {
        return new TypeSubs(
            $type_subData['type_name'],
            $type_subData['description'],
            $type_subData['value']
        );
    }


}