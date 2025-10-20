<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Uddokta;
use App\Models\Business;
use App\Models\Customer;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Carbon\Exceptions\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function imageUpload($request, $name, $directory)
    {
        $doUpload = function ($image) use ($directory) {
            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extention = $image->getClientOriginalExtension();
            $imageName = $name . '_' . uniqId() . '.' . $extention;
            $image->move($directory, $imageName);
            return $directory . '/' . $imageName;
        };

        if (!empty($name) && $request->hasFile($name)) {
            $file = $request->file($name);
            if (is_array($file) && count($file)) {
                $imagesPath = [];
                foreach ($file as $key => $image) {
                    $imagesPath[] = $doUpload($image);
                }
                return $imagesPath;
            } else {
                return $doUpload($file);
            }
        }

        return false;
    }
    public static function success($data = [], $message = 'Success', $statusCode = 200)
    {
        return response()->json([
            'status_code' => $statusCode,
            'status' => 'success',
            'error' => [],
            'error_code' => [],
            'success' => is_array($message) ? $message : [$message],
            'success_code' => [$statusCode],
            'data' => $data,
        ], $statusCode);
    }
    public static function successPagination($data = [], $message = 'Success', $statusCode = 200, $pagination = null)
    {
        return response()->json([
            'status_code' => $statusCode,
            'status' => 'success',
            'error' => [],
            'error_code' => [],
            'success' => is_array($message) ? $message : [$message],
            'success_code' => [$statusCode],
            'data' => $data,
            'pagination' => $pagination,
        ], $statusCode);
    }
    public static function error($message = 'Error', $statusCode = 400, $errorCode = 400)
    {
        return response()->json([
            'status_code' => $statusCode,
            'status' => 'error',
            'error' => is_array($message) ? $message : [$message],
            'error_code' => is_array($errorCode) ? $errorCode : [$errorCode],
            'success' => [],
            'success_code' => [],
            'data' =>  [],
        ], $statusCode);
    }
   
    public function UploadImage($request, $name, $directory)
    {
        $doUpload = function ($image) use ($directory) {
            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $imageName = $name . '_' . uniqid() . '.' . $extension;

            $path = $image->storeAs($directory, $imageName, 'public');
            
            return $path;
        };
    
        if (!empty($name) && $request->hasFile($name)) {
            $file = $request->file($name);
    
            if (is_array($file) && count($file)) {
                $imagesPath = [];
    
                foreach ($file as $key => $image) {
                    $imagesPath[] = $doUpload($image);
                }
    
                return $imagesPath;
            } else {
                return $doUpload($file);
            }
        }
    
        return false;
    }

    public function uploadBase64Image($request, $name, $directory)
    {
      
        list($type, $data) = explode(';', $name);
        list(, $data) = explode(',', $data);
        $imageData = base64_decode($data);
        $extension = explode('/', $type)[1];
        $filename = uniqid() . '_' . time() . '.' . $extension;
        Storage::disk('public')->put($directory . '/' . $filename, $imageData);
        $imagePath = $directory . '/' . $filename;
        return $imagePath;
    }

    public function paginationData($paginator)
    {
        return [
            'current_page' => $paginator->currentPage(),
            'last_page' => $paginator->lastPage(),
            'per_page' => $paginator->perPage(),
            'total' => $paginator->total(),
            'from' => $paginator->firstItem(),
            'to' => $paginator->lastItem(),
            'path' => $paginator->path(),
            'next_page_url' => $paginator->nextPageUrl(),
            'prev_page_url' => $paginator->previousPageUrl(),
        ];
    }
    public function uddoktaCode($businessType, $productType) {
        // Determine prefix based on business type and product type
        $businessTypePrefix = ($businessType == 'ব্যক্তি উদ্যোক্তা') ? '2' : '1';
        $productTypePrefix = ProductType::where('id', $productType)->value('code');  // Only get the code directly
        $prefix = $businessTypePrefix . $productTypePrefix;
    
        // Find the maximum value of the last 5 digits of registration_number
        $maxRegistrationNumber = Uddokta::where('entrepreneur_type', $businessType)
            ->where('product_type_id', $productType)
            ->max(DB::raw("CAST(SUBSTR(registration_number, 4) AS UNSIGNED)"));  // Start from the 4th character
    
        // If no registration number exists, start from 00001
        $nextNumber = $maxRegistrationNumber ? $maxRegistrationNumber + 1 : 1;
    
        // Pad the number with leading zeros to make it 5 digits
        $formattedNumber = str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
    
        // Return the full 8-digit registration number
        return $prefix . $formattedNumber;
    }
    


    public function deleteExistingImage($imagePath = null)
    {
        if (!empty($imagePath)) {
            $imagePath = public_path('storage/'. $imagePath);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }
    public function deleteExistingImageTwo($imagePath = null)
    {
        if (!empty($imagePath)) {
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }

    
    private function jsonnumeric()
    {
        $data = [
            'numeric_field' => 123.45,
        ];
        $jsonData = json_encode($data, JSON_NUMERIC_CHECK);
    }

    
    const DEFAULT_ERROR_MESSAGE = 'Something went wrong. Please try again later.';
    const DEFAULT_SQL_ERROR_MESSAGE = 'Something went wrong in the database';
    const PERMISSION_MESSAGE = 'You have no permission of this module';
    const ACCESS_MESSAGE = 'Access denied: You have been blocked from accessing the admin functionality';
    const APP_LOGIN = 'User does not have Access App permission!';
    const PAGINATOR_NUMBER = 100;
    const TRY_CATCH_MESSAGE = 'Something went wrong';
    const WEB_PAGINATOR_NUMBER = 20;
   
   
}
