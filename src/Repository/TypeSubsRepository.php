<?php

namespace IMDSound\Repository;

use IMDSound\Models\TypeSubs;

interface TypeSubsRepository
{
    public function allTypes(): array;
    //public function save(Type_subscription $type_name): bool;
    //public function remove(Type_subscription $type_name): bool;
}
