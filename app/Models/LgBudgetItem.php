<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgBudgetItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'lg_budget_level_id',
        'code',
        'name',
        'order',
        'user_id',
        'measure',
        'quantity',
        'pirce',
        'amount',
        'lg_budget_id',
        'lg_costcenter_id',
        'discipline',
        'performance',
        'lg_budget_item_id',
        'is_template',
        'price_sys',
        'price_hh',
        'price_hm',
        'price_mt',
        'price_sc',
        'amount_sys',
        'amount_hh',
        'amount_hm',
        'amount_mt',
        'amount_sc',
        'subitem'
    ];
    public function getCodeSysAttribute()
    {
        $parentCodeSys = $this->lgBudgetLevel ? $this->lgBudgetLevel->code_sys : '';
        return $parentCodeSys ? "$parentCodeSys.P$this->id" : "P$this->id";
    }

    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }

    public function lgBudgetLevel()
    {
        return $this->belongsTo(LgBudgetLevel::class);
    }
    public function lgBudgetItem()
    {
        return $this->belongsTo(LgBudgetItem::class);
    }
    public function lgBudgetItems()
    {
        return $this->hasMany(LgBudgetItem::class);
    }
    public function lgServiceActivities()
    {
        return $this->hasMany(LgServiceActivity::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lgBudgetDetails()
    {
        return $this->hasMany(LgBudgetDetail::class);
    }

    /* public function getPriceSysAttribute()
    {
        $price_detail = $this->lgBudgetDetails()->get()->sum(function ($q) {
            return $q->quantity * $q->price;
        });
        return round($price_detail, 2);
    }

    public function getPriceHmAttribute()
    {
        $price_detail = $this->lgBudgetDetails()->where('type', 'EQUIPO')->get()->sum(function ($q) {
            return $q->quantity * $q->price;
        });
        return round($price_detail, 2);
    }

    public function getPriceHhAttribute()
    {
        $price_detail = $this->lgBudgetDetails()->where('type', 'MANO DE OBRA')->get()->sum(function ($q) {
            return $q->quantity * $q->price;
        });
        return round($price_detail, 2);
    }

    public function getPriceMtAttribute()
    {
        $price_detail = $this->lgBudgetDetails()->where('type', 'INSUMO')->get()->sum(function ($q) {
            return $q->quantity * $q->price;
        });
        return round($price_detail, 2);
    }
    public function getPriceScAttribute()
    {
        $price_detail = $this->lgBudgetDetails()->where('type', 'SERVICIO')->get()->sum(function ($q) {
            return $q->quantity * $q->price;
        });
        return round($price_detail, 2);
    }

*/
    public function duplicateWithChildren($newParentId, $type = null)
    {
        $newItem = $this->replicate();
        if ($type) {
            $newItem->lg_budget_item_id = $newParentId;
        } else {
            $newItem->lg_budget_level_id = $newParentId;
        }
        $newItem->save();

        // Duplicate lgBudgetDetails
        foreach ($this->lgBudgetDetails()->where('status', 'A')->get() as $detail) {
            $newDetail = $detail->replicate();
            $newDetail->lg_budget_item_id = $newItem->id;
            $newDetail->save();
        }

        // Clone and associate the budget items
        foreach ($this->lgBudgetItems as $item) {
            $item->duplicateWithChildren($newItem->id, 'item');
        }

        return $newItem;
    }
    public function updateAmounts()
    {
        // 1. Sumar sus propios detalles
        $details = $this->lgBudgetDetails()->where('status', 'A')->get();

        $this->price_sys = $details->sum(fn($d) => $d->quantity * $d->price);
        $this->price_hh = $details->where('type', 'MANO DE OBRA')->sum(fn($d) => $d->quantity * $d->price);
        $this->price_hm = $details->where('type', 'EQUIPO')->sum(fn($d) => $d->quantity * $d->price);
        $this->price_mt = $details->where('type', 'INSUMO')->sum(fn($d) => $d->quantity * $d->price);
        $this->price_sc = $details->where('type', 'SERVICIO')->sum(fn($d) => $d->quantity * $d->price);

        // 2. Agregar montos de subpartidas a los price_*
        foreach ($this->lgBudgetItems as $child) {
            $child->updateAmounts(); // recursividad

            $this->price_sys += $child->amount_sys;
            $this->price_hh  += $child->amount_hh;
            $this->price_hm  += $child->amount_hm;
            $this->price_mt  += $child->amount_mt;
            $this->price_sc  += $child->amount_sc;
        }

        // 3. Calcular montos finales multiplicando por cantidad propia
        $this->amount_sys = $this->price_sys * $this->quantity;
        $this->amount_hh  = $this->price_hh * $this->quantity;
        $this->amount_hm  = $this->price_hm * $this->quantity;
        $this->amount_mt  = $this->price_mt * $this->quantity;
        $this->amount_sc  = $this->price_sc * $this->quantity;

        $this->save();
    }
}
