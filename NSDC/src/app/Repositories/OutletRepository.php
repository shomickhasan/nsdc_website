<?php
namespace App\Repositories;

use Exception;
use App\Models\Outlet;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OutletRequest;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\OutletUpdateRequest;
use App\Repositories\ImageUploadRepository;

class OutletRepository extends Repository
{

    private $path = 'uploads/outlets';

    public function model()
    {
        return Outlet::class;
    }

    public function storeOutlet(OutletRequest $request)
    {
      
        if($request->hasFile('outlet_picture')){
            
            $outletPicture = (new ImageUploadRepository())->UploadImage(
                $request,
                'outlet_picture',
                $this->path,
            );
            
        }else{
          $outletPicture = 'dummy/outlet/outlet.png';
        }
        if($request->hasFile('outlet_owner_picture')){
            $outletOwnerPicture = (new ImageUploadRepository())->UploadImage(
                $request,
                'outlet_owner_picture',
                $this->path,
            );
        }else{
          $outletOwnerPicture = 'dummy/outlet/outletuser.png';
        }
            $outlet = Outlet::create([
                'outlet_name' => $request->outlet_name,
                'owner_name' => $request->owner_name,
                'owner_phone' => $request->owner_phone,
                'outlet_address' => $request->outlet_address,
                'owner_address' => $request->owner_address,
                'owner_email' => $request->owner_email,
                'second_contact_person_name' => $request->second_contact_person_name,
                'designation' => $request->designation,
                'second_person_phone' => $request->second_person_phone,
                'territory_id' => $request->road_id ?? $request->village_id ?? $request->word_id ?? $request->union_id ??  $request->upazilla_id ?? $request->district_id ?? $request->division_id ?? $request->national_id ?? '',
                'status' => $request->status,
                'outlet_geo_location_lat' => $request->outlet_geo_location_lat,
                'outlet_geo_location_lon' => $request->outlet_geo_location_lon,
                'outlet_picture' => $outletPicture,
                'outlet_owner_picture' => $outletOwnerPicture
            ]);

            return $outlet;
    }

    public function outletUpdate(Outlet $outlet, OutletUpdateRequest $request)
    {
        if($request->hasFile('outlet_picture')){
            $outletPicture = (new ImageUploadRepository())->UploadImage(
                $request,
                'outlet_picture',
                $this->path,
            );
            
        }else{
          $outletPicture = $outlet->outlet_picture;
        }
        if($request->hasFile('outlet_owner_picture')){
            $outletOwnerPicture = (new ImageUploadRepository())->UploadImage(
                $request,
                'outlet_owner_picture',
                $this->path,
            );
        }else{
            $outletOwnerPicture = $outlet->outlet_owner_picture;
        }
        $this->update($outlet,[
            'outlet_name' => $request->outlet_name,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'outlet_address' => $request->outlet_address,
            'owner_address' => $request->owner_address,
            'owner_email' => $request->owner_email,
            'second_contact_person_name' => $request->second_contact_person_name,
            'designation' => $request->designation,
            'second_person_phone' => $request->second_person_phone,
            'territory_id' =>  $request->road_id ?? $request->village_id ?? $request->word_id ?? $request->union_id ??  $request->upazilla_id ?? $request->district_id ?? $request->division_id ?? $request->national_id ?? $outlet->territory_id,
            'status' => $request->status,
            'outlet_geo_location_lat' => $request->outlet_geo_location_lat,
            'outlet_geo_location_lon' => $request->outlet_geo_location_lon,
            'outlet_picture' => $outletPicture,
            'outlet_owner_picture' => $outletOwnerPicture
        ]);

        return $outlet;
    }

}