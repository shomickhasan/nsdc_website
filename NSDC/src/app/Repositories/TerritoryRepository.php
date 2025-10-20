<?php
namespace App\Repositories;

use App\Http\Requests\TerritoryRequest;
use App\Models\Territory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TerritoryRepository extends Repository
{
    public function model()
    {
        return Territory::class;
    }

    public function storeTerritory(TerritoryRequest $request)
    {
       
            $territory = Territory::create([
                't_name' => $request->t_name,
                'territory_level_id' => $request->territory_level_id,
                'territory_parent_id' => $request->territory_parent_id,
            ]);
            return $territory;
    }
    public function updateTerritory(Territory $territorie, TerritoryRequest $request)
    {

        $territorie = $this->update($territorie,[
            't_name' => $request->t_name,
            'territory_level_id' => $request->territory_level_id,
            'territory_parent_id' => $request->territory_parent_id,
        ]);
        return $territorie;
    }
}