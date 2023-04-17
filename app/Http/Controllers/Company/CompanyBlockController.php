<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\Company\CompanyBlockResource;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\RiderBlock;
use App\Models\RiderEmployed;
use App\Models\RiderRequest;
use Illuminate\Http\Request;

class CompanyBlockController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Company Blocks
    |--------------------------------------------------------------------------
    */
    public function CompanyBlock(Request $request)
    {
        $Company = auth('company')->user();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة مطلوبة',
                'Block'     => [],
            ], 200);
        }

        $Company = Company::find($Company->IDCompany);

        $RiderBlocks = RiderBlock::where('IDCompany', $Company->IDCompany)
            ->where('RiderBlockActive', 1)->get();

        return response([
            'Success'   => true,
            'MessageEn' => 'Company Block Page',
            'MessageAr' => 'صفحة الحظر للشركة',
            'Block'     => CompanyBlockResource::collection($RiderBlocks),
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company Block Rider
    |--------------------------------------------------------------------------
    */
    public function CompanyBlockRider(Request $request)
    {
        $Company = auth('company')->user();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة مطلوبة',
            ], 200);
        }

        $Company = Company::find($Company->IDCompany);

        if (!$request->IDRider) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Rider Requirde',
                'MessageAr' => 'السائق مطلوب',
            ], 200);
        }

        $RiderEmployeds = RiderEmployed::where('IDCompany', $Company->IDCompany)
            ->where('IDRider', $request->IDRider)
            ->where('RiderEmployedActive', 1)->get();

        foreach ($RiderEmployeds as $RiderEmployed) {
            $RiderEmployed->RiderEmployedActive = 0;
            $RiderEmployed->save();
        }

        $RiderBlockCheck = RiderBlock::where('IDRider', $request->IDRider)
            ->where('IDCompany', $Company->IDCompany)->first();

        if ($RiderBlockCheck) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Block Already Exist',
                'MessageAr' => 'الحظر موجود بالفعل',
            ], 200);
        }

        $RiderBlock = new RiderBlock();
        $RiderBlock->IDRider    = $request->IDRider;
        $RiderBlock->IDCompany  = $Company->IDCompany;
        $RiderBlock->save();

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_BLOCK_RIDER',
            'ActionBackLogDesc' => 'Company Block Rider "' . $request->IDRider . '"',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Rider Blocked Successfuly',
            'MessageAr' => 'تم حظر السائق بنجاح',
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company UnBlock Rider
    |--------------------------------------------------------------------------
    */
    public function CompanyUnBlockRider(Request $request)
    {
        $Company = auth('company')->user();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة مطلوبة',
            ], 200);
        }

        $Company = Company::find($Company->IDCompany);

        if (!$request->IDRiderBlock) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Block Requirde',
                'MessageAr' => 'الحظر مطلوب',
            ], 200);
        }

        $RiderBlock = RiderBlock::where('IDRiderBlock', $request->IDRiderBlock)
            ->where('RiderBlockActive', 1)->first();

        if (!$RiderBlock) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Block Not Found',
                'MessageAr' => 'الحظر غير موجود',
            ], 200);
        }

        $RiderBlock->RiderBlockActive = 0;
        $RiderBlock->save();

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_UNBLOCK_RIDER',
            'ActionBackLogDesc' => 'Company UnBlock Rider "' . $RiderBlock->IDRider . '"',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Rider UnBlocked Successfuly',
            'MessageAr' => 'تم ازالة الحظر بنجاح',
        ], 200);
    }
}
