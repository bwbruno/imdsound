<?php

namespace IMDSound\Repository;

use IMDSound\Models\Feature;

interface FeaturesRepository
{
    public function allFeatures(): array;
    //public function insert(Feature $featData): bool;
    //public function remove(Feature $featData): bool;
    //public function update(Feature $oldFeat, Feature $newFeat): bool;
}
