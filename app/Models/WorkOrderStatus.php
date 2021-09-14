<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrderStatus extends Model
{
    use HasFactory;

    public function scheduleMaintenances()
    {
        return $this->hasMany(ScheduleMaintenance::class);
    }

    public function workOrders()
    {
        return $this->hasMany(WorkOrder::class);
    }
}
