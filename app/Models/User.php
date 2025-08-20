<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
// use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    // use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fotocheck',
        'phone',
        'rh_worker_id',
        'points',
        'level',
        'lg_group_id',
        'status',
        'image',
        'no_cc_filter',
        'client_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function notification_types()
    {
        return $this->belongsToMany(NotificationType::class);
    }
    public function RhTimesheetLists()
    {
        return $this->belongsToMany(RhTimesheetList::class);
    }

    public function RhTimesheets()
    {
        return $this->hasMany(RhTimesheet::class);
    }

    public function RhTimesheetSupervisors()
    {
        return $this->hasMany(RhTimesheetSupervisor::class);
    }


    public function rhTimesheetListFollowup()
    {
        return $this->hasMany(rhTimesheetListFollowup::class);
    }
    public function RhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function warehouses()
    {
        return $this->belongsToMany(LgWarehouse::class)->where('status', 'A');
    }
    public function gmUserActivities()
    {
        return $this->hasMany(GmUserActivity::class);
    }
    public function lgGroup()
    {
        return $this->belongsTo(lgGroup::class);
    }

    public function lgCostcenters()
    {
        return $this->belongsToMany(LgCostcenter::class);
    }

    public function listActive()
    {
        if ($this->roles()->where('filter', '1')->count() > 0) {
            $lists_ids = $this->lgCostcenters()->pluck('id');
            $workers = WorkersAll::whereIn('lg_costcenter_id', $lists_ids)
                ->orWhereIn('mp_id', $lists_ids)->pluck('id');

            if ($workers->count() > 0) {
                return $workers;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function myLgCostcentersSup()
    {
        $user = $this;

        if ($user->no_cc_filter) {
            return LgCostcenter::where('status', 'A')->pluck('id');
        }

        $timesheetLists = $this->RhTimesheetSupervisors()->with('RhTimesheetList.lgCostcenter')->get();

        $ccos = $timesheetLists->pluck('RhTimesheetList.lgCostcenter.id')->unique();

        return $ccos->values();
    }

    public function myLgCostcenters()
    {
        if ($this->no_cc_filter) {
            return LgCostcenter::where('status', 'A')->pluck('id');
        }

        $timesheetListFollowups = $this->rhTimesheetListFollowup()->with('RhTimesheetList.lgCostcenter')->get();
        $timesheets = $this->RhTimesheetLists()->with('lgCostcenter')->get();

        $ccosFromFollowups = $timesheetListFollowups->map(function ($timesheetListFollowup) {
            return optional(optional($timesheetListFollowup->RhTimesheetList)->lgCostcenter)->id;
        })->filter(fn($id) => is_numeric($id))->unique()->toArray();

        $ccosFromTimesheets = $timesheets->map(fn($timesheet) => optional($timesheet->lgCostcenter)->id)
            ->filter(fn($id) => is_numeric($id))->unique()->toArray();

        return collect(array_unique(array_merge($ccosFromFollowups, $ccosFromTimesheets)))->values();
    }



    public function acPaymentOrders()
    {
        return $this->hasMany(AcPaymentOrder::class, 'user_id')->where(function ($q) {
            $q->where('status', 'A')->orwhere('status', 'E');
        });
    }

    public function adminlte_image()
    {
        return '/storage/' . $this->image;
    }

    public function adminlte_desc()
    {
        return 'I\'m a nice guy';
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }
    public function crClasses()
    {
        return $this->belongsToMany(CrClass::class);
    }

    public function getJWTIdentifier() { return $this->getKey(); }
    public function getJWTCustomClaims(): array { return []; }
}
