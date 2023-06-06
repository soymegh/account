<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\RateOrigin;

use Illuminate\Support\Collection;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;


class OriginationRatesController extends Controller
{
    
    public function __invoke() {
        
    }

    public function index()
    {
       
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('code', 'LIKE', "%{$value}%")
                        ->orWhere('destination', 'LIKE', "%{$value}%");
                });
            });
        });
        $rate_origins = QueryBuilder::for(RateOrigin::class)
        ->defaultSort('id')
        ->allowedSorts(['code', 'destination','created_at','updated_at'])
        ->allowedFilters(['destination', 'destination', $globalSearch])
        ->paginate(8)
        ->withQueryString();    


        return Inertia::render('OriginationRates/Index', ['rate_origins' => $rate_origins])->table(function (InertiaTable $table) {
            $table->column(label: 'Actions');
            $table->column('code', 'Code', searchable: true, sortable: true);
            $table->column('destination', 'Destination', searchable: true, sortable: true);
            $table->column('connection_cost', 'Connection Cost(USD)', searchable: true, sortable: false);
            $table->column('gracetime', 'Grace time', searchable: true, sortable: false);
            $table->column('cost_min', 'Cost / Min(USD)', searchable: true, sortable: false);
            $table->column('init_increment', 'Initial Increment', searchable: true, sortable: false);
            $table->column('increment', 'Increment', searchable: true, sortable: false);
            $table->column('rategroup', 'Rate Group', searchable: true, sortable: false);
            $table->column('created_at', 'Created Date', searchable: true, sortable: true);
            $table->column('updated_at', 'Modified Date', searchable: true, sortable: true);
            $table->column(label: 'Status');
            $table->column(label: 'Action');
        });

    }
}
