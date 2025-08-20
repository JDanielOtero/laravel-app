<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LgBudgetLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'lg_budget_id',
        'lg_budget_level_id',
        'code',
        'name',
        'order',
        'user_id',
        'level',
        'lg_costcenter_id',
        'amount_sys',
        'amount_hh',
        'amount_hm',
        'amount_mt',
        'amount_sc'
    ];

    public function lgBudget()
    {
        return $this->belongsTo(LgBudget::class);
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function lgBudgetLevel()
    {
        return $this->belongsTo(LgBudgetLevel::class);
    }
    public function lgBudgetLevels()
    {
        return $this->hasMany(LgBudgetLevel::class);
    }

    public function lgBudgetItems()
    {
        return $this->hasMany(LgBudgetItem::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lgBudgetDetails()
    {
        return $this->hasMany(LgBudgetDetail::class);
    }
    public function duplicateWithChildren()
    {
        DB::transaction(function () {
            // Clone the current level
            $newLevel = $this->replicate();
            $newLevel->order = $this->order + 1;
            $newLevel->save();

            $order = 1;
            foreach ($this->lgBudgetLevels as $childLevel) {
                $newChildLevel = $childLevel->replicate();
                $newChildLevel->lg_budget_level_id = $newLevel->id;
                $newChildLevel->order = $order;
                $newChildLevel->save();

                // Recursively duplicate the children of the child level
                $childLevel->duplicateChildren($newChildLevel);
                $order++;
            }

            // Clone and associate the budget items
            foreach ($this->lgBudgetItems as $item) {
                $item->duplicateWithChildren($newLevel->id);
            }
        });
    }

    private function duplicateChildren($parent)
    {
        $order = 1;
        foreach ($this->lgBudgetLevels as $childLevel) {
            $newChildLevel = $childLevel->replicate();
            $newChildLevel->lg_budget_level_id = $parent->id;
            $newChildLevel->order = $order;
            $newChildLevel->save();
            $order++;

            $childLevel->duplicateChildren($newChildLevel);
        }

        foreach ($this->lgBudgetItems as $item) {
            $item->duplicateWithChildren($parent->id);
        }
    }
    public function getCodeSysAttribute()
    {
        $codeSegments = [];
        $level = $this;
        while ($level) {
            array_unshift($codeSegments, $level->order);
            $level = $level->lgBudgetLevel;
        }
        return implode('.', $codeSegments);
    }

    /*public function getAmountSysAttribute()
    {
        $amoutItems = $this->lgBudgetItems()->get()->sum(function ($q) {
            return $q->quantity * $q->priceSys;
        });

        $amoutLevels = $this->lgBudgetLevels()->get()->sum(function ($q) {
            return $q->amountSys;
        });

        return round($amoutItems + $amoutLevels, 2);
    }

    public function getAmountHmAttribute()
    {
        $amoutItems = $this->lgBudgetItems()->get()->sum(function ($q) {
            return $q->quantity * $q->priceHm;
        });

        $amoutLevels = $this->lgBudgetLevels()->get()->sum(function ($q) {
            return $q->amountHm;
        });

        return round($amoutItems + $amoutLevels, 2);
    }

    public function getAmountHhAttribute()
    {
        $amoutItems = $this->lgBudgetItems()->get()->sum(function ($q) {
            return $q->quantity * $q->priceHh;
        });

        $amoutLevels = $this->lgBudgetLevels()->get()->sum(function ($q) {
            return $q->amountHh;
        });

        return round($amoutItems + $amoutLevels, 2);
    }

    public function getAmountMtAttribute()
    {
        $amoutItems = $this->lgBudgetItems()->get()->sum(function ($q) {
            return $q->quantity * $q->priceMt;
        });

        $amoutLevels = $this->lgBudgetLevels()->get()->sum(function ($q) {
            return $q->amountMt;
        });

        return round($amoutItems + $amoutLevels, 2);
    }

    public function getAmountScAttribute()
    {
        $amoutItems = $this->lgBudgetItems()->get()->sum(function ($q) {
            return $q->quantity * $q->priceSc;
        });

        $amoutLevels = $this->lgBudgetLevels()->get()->sum(function ($q) {
            return $q->amountSc;
        });

        return round($amoutItems + $amoutLevels, 2);
    }*/
    public function updateAmounts()
    {
        $items = $this->lgBudgetItems()->with('lgBudgetDetails')->get();

        $this->amount_sys = $items->sum(fn($item) => $item->amount_sys);
        $this->amount_hh = $items->sum(fn($item) => $item->amount_hh);
        $this->amount_hm = $items->sum(fn($item) => $item->amount_hm);
        $this->amount_mt = $items->sum(fn($item) => $item->amount_mt);
        $this->amount_sc = $items->sum(fn($item) => $item->amount_sc);

        foreach ($this->lgBudgetLevels as $child) {
            $child->updateAmounts();
            $this->amount_sys += $child->amount_sys;
            $this->amount_hh += $child->amount_hh;
            $this->amount_hm += $child->amount_hm;
            $this->amount_mt += $child->amount_mt;
            $this->amount_sc += $child->amount_sc;
        }

        $this->save();
    }
    public function updateItemsAmounts()
    {
        // Recalcular las partidas directas de este nivel
        foreach ($this->lgBudgetItems as $item) {
            $item->updateAmounts();
        }

        // Recalcular recursivamente los niveles hijos
        foreach ($this->lgBudgetLevels as $childLevel) {
            $childLevel->updateItemsAmounts();
        }
    }
    public static function updateAllItemsAmountsByBudget($lg_budget_id)
    {
        // 1. Actualizar todos los ítems del presupuesto
        LgBudgetItem::where('lg_budget_id', $lg_budget_id)
            ->with('lgBudgetDetails')
            ->get()
            ->each(function ($item) {
                $item->updateAmounts();
            });

        // 2. Actualizar todos los niveles raíz (los hijos se actualizan recursivamente)
        LgBudgetLevel::where('lg_budget_id', $lg_budget_id)
            ->whereNull('lg_budget_level_id')
            ->orderByDesc('level')
            ->get()
            ->each(function ($level) {
                $level->updateAmounts(); // esto ya es recursivo
            });
    }
}
