<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgCostcenter extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'class',
        'code',
        'name',
        'lg_costcenter_id',
        'clasification',
        'file_logo',
        'color',
        'cc_status',
        'date_initial',
        'date_final',
        'manager',
        'discipline_type',
        'route',
        'client_id',
        'job_profile_id',
        'email',
        'rh_contact_id',
        'company_id'
    ];

    public function RhTimesheetLists()
    {
        return $this->hasMany(RhTimesheetList::class)->orderBy('id', 'desc');
    }

    public function lgCostCenter()
    {
        return $this->belongsTo(LgCostcenter::class, 'lg_costcenter_id');
    }

    public function RhWorkers()
    {
        return $this->hasMany(RhWorker::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function rhContact()
    {
        return $this->belongsTo(RhContact::class);
    }
    public function jobProfile()
    {
        return $this->belongsTo(JobProfile::class);
    }
    public function lgGroups()
    {
        return $this->belongsToMany(lgGroup::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function supervisors()
    {
        return RhTimesheetSupervisor::whereHas('RhTimesheetList', function ($q) {
            $q->where('lg_costcenter_id', $this->id);
        })->whereHas('user', function ($q) {
            $q->whereHas('rhWorker', function ($q) {
                $q->where('status', 'ACTIVO');
            });
        })->get();
    }
    public function assitants()
    {
        $timesheetLists = $this->RhTimesheetLists()->with('users')->get();

        // Inicializar una colección vacía para almacenar usuarios únicos
        $users = collect();

        // Iterar sobre cada RhTimesheetList y agregar sus usuarios a la colección
        foreach ($timesheetLists as $timesheetList) {
            $activeUsers = $timesheetList->users->filter(function ($user) {
                return $user->rhWorker && $user->rhWorker->status === 'ACTIVO';
            });
            $users = $users->merge($activeUsers);
        }

        // Retornar la colección de usuarios sin duplicados
        return $users->unique();
    }
    public function assitantsFilered()
    {
        $timesheetLists = $this->RhTimesheetLists()->with('users')->get();

        // Inicializar una colección vacía para almacenar usuarios únicos
        $users = collect();

        // Iterar sobre cada RhTimesheetList y agregar sus usuarios a la colección
        foreach ($timesheetLists as $timesheetList) {
            $activeUsers = $timesheetList->users->filter(function ($user) {
                return $user->rhWorker && $user->rhWorker->status === 'ACTIVO' && $user->rhWorker->mp_id == $this->id;
            });
            $users = $users->merge($activeUsers);
        }

        // Retornar la colección de usuarios sin duplicados
        return $users->unique();
    }
    public function lgPlaces()
    {
        return $this->morphMany(LgPlace::class, 'table')->where('status', 'A');
    }
    public function lgBudgets()
    {
        return $this->hasMany(LgBudget::class);
    }
    public function pmsFacilities()
    {
        return $this->hasMany(PmsFacility::class);
    }
    public function pmsAreas()
    {
        return $this->hasMany(PmsArea::class);
    }

    public function gOrders()
    {
        return $this->hasMany(GOrder::class);
    }
    public function acPaymentsOrders()
    {
        return $this->hasMany(AcPaymentOrder::class);
    }

    public function acPaymentsOrdersReport()
    {
        return $this->hasMany(AcPaymentOrder::class)
            ->where(function ($q) {
                $q->where('type_desk', '!=', 'CHILD')
                    ->orWhereNull('type_desk');
            });
    }

    public function lgBudgetLevels()
    {
        return $this->hasMany(LgBudgetLevel::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
