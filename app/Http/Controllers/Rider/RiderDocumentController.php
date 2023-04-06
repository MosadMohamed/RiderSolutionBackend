<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use App\Http\Resources\Rider\CountryResource;
use App\Http\Resources\Rider\RiderResource;
use App\Models\ActionBackLog;
use App\Models\Country;
use App\Models\Office;
use App\Models\Rider;
use App\Models\RiderDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RiderDocumentController extends Controller
{
    public function DocumentUpload(Request $request)
    {
        $Rider = auth('rider')->user();

        if (!$Rider) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Rider Not Found',
                'MessageAr' => 'السائق مطلوب',
                'ImageURL'  => '',
            ], 200);
        }

        $Rider = Rider::find($Rider->IDRider);

        if (!$request->DocumentType) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Document Type Required',
                'MessageAr' => 'نوع الملف مطلوب',
                'ImageURL'  => '',
            ], 200);
        }

        if (!$request->DocumentImage) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Document Image Required',
                'MessageAr' => 'صورة الملف مطلوبة',
                'ImageURL'  => '',
            ], 200);
        }

        $TypesArray = ['ID_FRONT', 'ID_BACK', 'VEHICLE_FRONT', 'VEHICLE_BACK', 'LICENSE_FRONT', 'LICENSE_BACK'];
        if (!in_array($request->DocumentType, $TypesArray)) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Document Type Not Found',
                'MessageAr' => 'خطا في نوع الملف',
                'ImageURL'  => '',
            ], 200);
        }

        $DocumentChecks = RiderDocument::where('IDRider', $Rider->IDRider)
            ->where('DocumentType', $request->DocumentType)
            ->where('DocumentActive', 1)->get();

        foreach ($DocumentChecks as $DocumentCheck) {
            $DocumentCheck->DocumentActive = 0;
            $DocumentCheck->save();
        }

        $Document = new RiderDocument();
        $Document->IDRider      = $Rider->IDRider;
        $Document->DocumentType = $request->DocumentType;
        $Document->save();

        $Image  = $request->DocumentImage;
        $Name   = $Document->IDDocument . '_' . rand(1, 99) . '.' . $Image->getClientOriginalExtension();
        $Path   = 'images/documents/';
        Storage::putFileAs($Path, $Image, $Name);
        $Document->DocumentImage = $Name;
        $Document->save();

        ActionBackLog::create([
            'UserType'          => 'RIDER',
            'IDUser'            => $Rider->IDRider,
            'ActionBackLog'     => 'RIDER_DOCUMENT_UPLOAD',
            'ActionBackLogDesc' => 'Rider Upload Document ID => ' . $Document->IDDocument,
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Success Upload File',
            'MessageAr' => 'تم رفع الملف بنجاح',
            'ImageURL'  => asset('images/documents/' . $Document->DocumentImage),
        ], 200);
    }

    public function DocumentSave(Request $request)
    {
        $Rider = auth('rider')->user();

        if (!$Rider) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Rider Not Found',
                'MessageAr' => 'السائق غير موجود',
            ], 200);
        }

        $Rider = Rider::find($Rider->IDRider);

        $Required = ['ID_FRONT', 'ID_BACK'];

        if ($Rider->IsRider) {
            if ($Rider->VehlcleType == 'MOTOCYCLE' || $Rider->VehlcleType == 'CAR') {
                array_push($Required, 'VEHICLE_FRONT');
                array_push($Required, 'VEHICLE_BACK');
                array_push($Required, 'LICENSE_FRONT');
                array_push($Required, 'LICENSE_BACK');
            }
        }

        $DocumentChecks = RiderDocument::where('IDRider', $Rider->IDRider)
            ->where('DocumentActive', 1)->get()->pluck('DocumentType');

        if (count(array_diff($Required, $DocumentChecks->toarray()))) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Required Data',
                'MessageAr' => 'لم يتم رفع البيانات بالكامل',
            ], 200);
        }

        $Rider->IsUploaded = 1;
        $Rider->save();

        ActionBackLog::create([
            'UserType'          => 'RIDER',
            'IDUser'            => $Rider->IDRider,
            'ActionBackLog'     => 'RIDER_DOCUMENT_SAVE',
            'ActionBackLogDesc' => 'Rider Save Documents',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Success Uploaded All Files',
            'MessageAr' => 'تم رفع جميع الملفات',
        ], 200);
    }
}
