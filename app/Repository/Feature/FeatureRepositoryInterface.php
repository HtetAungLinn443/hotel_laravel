<?php

namespace App\Repository\Feature;

interface FeatureRepositoryInterface
{
    public function getFeatures();
    public function featureCreated(array $data);
    public function featureUpdated(array $data);
    public function featureDeleted(int $id);
    public function getFeatureByRoomId(int $id);
}
