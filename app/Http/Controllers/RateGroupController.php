<?php

namespace App\Http\Controllers;

use App\Models\RateGroup;
use Inertia\Inertia;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;

class RateGroupController extends Controller
{
    public function index() {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('name', 'LIKE', "%{$value}%")
                        ->orWhere('markup', 'LIKE', "%{$value}%");
                });
            });
        });

        $rateGroups = QueryBuilder::for(RateGroup::class)
        ->defaultSort('id')
        ->allowedSorts(['name', 'markup','init_increment','increment','created_at','updated_at'])
        ->allowedFilters(['destination', 'destination', $globalSearch])
        ->paginate(8)
        ->withQueryString();    


        return Inertia::render('RateGroup/Datatable', ['rateGroups' => $rateGroups])->table(function (InertiaTable $table) {
            $table->column(label: 'Check');
            $table->column('name', 'Name', searchable: true, sortable: true);
            $table->column('markup', 'Markup (%)', searchable: true, sortable: true);
            $table->column('init_increment', 'Initial Increment', searchable: true, sortable: true);
            $table->column('increment', 'Increment', searchable: true, sortable: true);
            $table->column('created_at', 'Created Date', searchable: true, sortable: true);
            $table->column('updated_at', 'Modified Date', searchable: true, sortable: true);
            $table->column(label: 'Status');
            $table->column(label: 'Action');
        });
    }
}
