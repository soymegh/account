<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\Reseller;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Collection;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;

class ResellerController extends Controller
{
    

    public function index() {

        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('code', 'LIKE', "%{$value}%")
                        ->orWhere('destination', 'LIKE', "%{$value}%");
                });
            });
        });
        $resellers = QueryBuilder::for(Reseller::class)
        ->defaultSort('id')
        ->allowedSorts(['email','created_at','updated_at'])
        ->allowedFilters(['email', $globalSearch])
        ->paginate(8)
        ->withQueryString();    


        return Inertia::render('Reseller/Index', ['resellers' => $resellers])->table(function (InertiaTable $table) {
            $table->column(label: 'Check');
            $table->column('email', 'email', searchable: true, sortable: true);
            $table->column('rategroup_id', 'Rate Group', searchable: true, sortable: false);
            $table->column('created_at', 'Created Date', searchable: true, sortable: true);
            $table->column('updated_at', 'Modified Date', searchable: true, sortable: true);
            $table->column(label: 'Status');
            $table->column(label: 'Action');
        });
    }
}
