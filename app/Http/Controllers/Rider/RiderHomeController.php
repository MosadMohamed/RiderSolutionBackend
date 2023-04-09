<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use App\Http\Resources\Rider\CompanyResource;
use App\Http\Resources\Rider\HiringResource;
use App\Http\Resources\Rider\TaskResource;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\Complaint;
use App\Models\Hiring;
use App\Models\HiringApply;
use App\Models\Rider;
use App\Models\RiderBlock;
use App\Models\RiderEmployed;
use App\Models\RiderRequest;
use App\Models\Task;
use App\Models\TaskApply;
use Illuminate\Http\Request;

class RiderHomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Rider Home Screen
    |--------------------------------------------------------------------------
    */
    public function Home(Request $request)
    {
        $Rider = auth('rider')->user();

        if (!$Rider) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Rider Not Found',
                'MessageAr' => 'السائق مطلوب',
                'Company'   => [],
                'Hiring'    => [],
                'Task'      => [],
            ], 200);
        }

        $Rider = Rider::find($Rider->IDRider);

        $RiderEmployeds = RiderEmployed::where('IDRider', $Rider->IDRider)
            ->where('RiderEmployedActive', 1)->get()->pluck('IDCompany')->toArray();

        $RiderBlocks = RiderBlock::where('IDRider', $Rider->IDRider)
            ->where('RiderBlockActive', 1)->get()->pluck('IDCompany')->toArray();

        /****************************************************************************/
        $Requests = RiderRequest::where('IDRider', $Rider->IDRider)
            ->where('RiderRequestAccept', 0)
            ->where('RiderRequestActive', 1)->get()->pluck('IDCompany')->toArray();

        $Companies  = Company::whereNotIn('IDCompany', $RiderEmployeds)
            ->whereNotIn('IDCompany', $RiderBlocks)
            ->where('CompanyActive', 1)->get();

        foreach ($Companies as $Company) {
            if (in_array($Company->IDCompany, $Requests)) {
                $Company['Is_Requested'] = 1;
            } else {
                $Company['Is_Requested'] = 0;
            }
        }
        /****************************************************************************/

        /****************************************************************************/
        $Applies = HiringApply::where('IDRider', $Rider->IDRider)
            ->where('HiringApplyAccept', 0)
            ->where('HiringApplyActive', 1)->get()->pluck('IDHiring')->toArray();

        $Hirings = Hiring::whereNotIn('IDCompany', $RiderEmployeds)
            ->whereNotIn('IDCompany', $RiderBlocks)
            ->where('HiringApplied', 0)
            ->where('HiringActive', 1)->get();

        foreach ($Hirings as $Hiring) {
            if (in_array($Hiring->IDHiring, $Applies)) {
                $Hiring['Is_Applied'] = 1;
            } else {
                $Hiring['Is_Applied'] = 0;
            }
        }
        /****************************************************************************/

        /****************************************************************************/
        $TApplies = TaskApply::where('IDRider', $Rider->IDRider)
            ->where('TaskApplyAccept', 0)
            ->where('TaskApplyActive', 1)->get()->pluck('IDTask')->toArray();

        $Tasks = Task::whereNotIn('IDCompany', $RiderEmployeds)
            ->whereNotIn('IDCompany', $RiderBlocks)
            ->where('TaskApplied', 0)
            ->where('TaskActive', 1)->get();

        foreach ($Tasks as $Task) {
            if (in_array($Task->IDTask, $TApplies)) {
                $Task['Is_Applied'] = 1;
            } else {
                $Task['Is_Applied'] = 0;
            }
        }
        /****************************************************************************/

        return response([
            'Success'   => true,
            'MessageEn' => 'Home Page',
            'MessageAr' => 'الصفحة الرئيسية',
            'Company'   => CompanyResource::collection($Companies),
            'Hiring'    => HiringResource::collection($Hirings),
            'Task'      => TaskResource::collection($Tasks),
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Rider All Requests
    |--------------------------------------------------------------------------
    */
    public function RiderAllRequests(Request $request)
    {
        $Rider = auth('rider')->user();

        if (!$Rider) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Rider Not Found',
                'MessageAr' => 'السائق مطلوب',
                'Company'   => [],
            ], 200);
        }

        $Rider = Rider::find($Rider->IDRider);

        $RiderEmployeds = RiderEmployed::where('IDRider', $Rider->IDRider)
            ->where('RiderEmployedActive', 1)->get()->pluck('IDCompany')->toArray();

        $RiderBlocks = RiderBlock::where('IDRider', $Rider->IDRider)
            ->where('RiderBlockActive', 1)->get()->pluck('IDCompany')->toArray();

        $Requests = RiderRequest::where('IDRider', $Rider->IDRider)
            ->where('RiderRequestAccept', 0)
            ->where('RiderRequestActive', 1)->get()->pluck('IDCompany')->toArray();

        $Companies  = Company::whereNotIn('IDCompany', $RiderEmployeds)
            ->whereNotIn('IDCompany', $RiderBlocks)
            ->where('CompanyActive', 1)->get();

        foreach ($Companies as $Company) {
            if (in_array($Company->IDCompany, $Requests)) {
                $Company['Is_Requested'] = 1;
            } else {
                $Company['Is_Requested'] = 0;
            }
        }

        return response([
            'Success'   => true,
            'MessageEn' => 'All Company',
            'MessageAr' => 'كل الشركات',
            'Company'   => CompanyResource::collection($Companies),
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Rider All Hirings
    |--------------------------------------------------------------------------
    */
    public function RiderAllHirings(Request $request)
    {
        $Rider = auth('rider')->user();

        if (!$Rider) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Rider Not Found',
                'MessageAr' => 'السائق مطلوب',
                'Hiring'    => [],
            ], 200);
        }

        $Rider = Rider::find($Rider->IDRider);

        $RiderEmployeds = RiderEmployed::where('IDRider', $Rider->IDRider)
            ->where('RiderEmployedActive', 1)->get()->pluck('IDCompany')->toArray();

        $RiderBlocks = RiderBlock::where('IDRider', $Rider->IDRider)
            ->where('RiderBlockActive', 1)->get()->pluck('IDCompany')->toArray();

        $Applies = HiringApply::where('IDRider', $Rider->IDRider)
            ->where('HiringApplyAccept', 0)
            ->where('HiringApplyActive', 1)->get()->pluck('IDHiring')->toArray();

        $Hirings = Hiring::whereNotIn('IDCompany', $RiderEmployeds)
            ->whereNotIn('IDCompany', $RiderBlocks)
            ->where('HiringApplied', 0)
            ->where('HiringActive', 1)->get();

        foreach ($Hirings as $Hiring) {
            if (in_array($Hiring->IDHiring, $Applies)) {
                $Hiring['Is_Applied'] = 1;
            } else {
                $Hiring['Is_Applied'] = 0;
            }
        }

        return response([
            'Success'   => true,
            'MessageEn' => 'All Hirings',
            'MessageAr' => 'كل الوظائف',
            'Hiring'    => HiringResource::collection($Hirings),
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Rider All Tasks
    |--------------------------------------------------------------------------
    */
    public function RiderAllTasks(Request $request)
    {
        $Rider = auth('rider')->user();

        if (!$Rider) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Rider Not Found',
                'MessageAr' => 'السائق مطلوب',
                'Task'      => [],
            ], 200);
        }

        $Rider = Rider::find($Rider->IDRider);

        $RiderEmployeds = RiderEmployed::where('IDRider', $Rider->IDRider)
            ->where('RiderEmployedActive', 1)->get()->pluck('IDCompany')->toArray();

        $RiderBlocks = RiderBlock::where('IDRider', $Rider->IDRider)
            ->where('RiderBlockActive', 1)->get()->pluck('IDCompany')->toArray();

        $TApplies = TaskApply::where('IDRider', $Rider->IDRider)
            ->where('TaskApplyAccept', 0)
            ->where('TaskApplyActive', 1)->get()->pluck('IDTask')->toArray();

        $Tasks = Task::whereNotIn('IDCompany', $RiderEmployeds)
            ->whereNotIn('IDCompany', $RiderBlocks)
            ->where('TaskApplied', 0)
            ->where('TaskActive', 1)->get();

        foreach ($Tasks as $Task) {
            if (in_array($Task->IDTask, $TApplies)) {
                $Task['Is_Applied'] = 1;
            } else {
                $Task['Is_Applied'] = 0;
            }
        }

        return response([
            'Success'   => true,
            'MessageEn' => 'All Tasks',
            'MessageAr' => 'كل المهام',
            'Task'      => TaskResource::collection($Tasks),
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Rider Make Request To Company
    |--------------------------------------------------------------------------
    */
    public function RiderRequest(Request $request)
    {
        $Rider = auth('rider')->user();

        if (!$Rider) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Rider Not Found',
                'MessageAr' => 'السائق مطلوب',
            ], 200);
        }
        
        $Rider = Rider::find($Rider->IDRider);

        if (!$request->IDCompany) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Required',
                'MessageAr' => 'الشركة مطلوبة',
            ], 200);
        }

        $RiderEmployeds = RiderEmployed::where('IDRider', $Rider->IDRider)
            ->where('RiderEmployedActive', 1)->get()->pluck('IDCompany')->toArray();

        $RiderBlocks = RiderBlock::where('IDRider', $Rider->IDRider)
            ->where('RiderBlockActive', 1)->get()->pluck('IDCompany')->toArray();

        $Company = Company::where('IDCompany', $request->IDCompany)
            ->where('CompanyActive', 1)->first();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة غير موجودة',
            ], 200);
        }

        if (in_array($Company->IDCompany, $RiderEmployeds)) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Already Working In This Company',
                'MessageAr' => 'انت تعمل في هذة الشركة',
            ], 200);
        }

        if (in_array($Company->IDCompany, $RiderBlocks)) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Blocked From This Company',
                'MessageAr' => 'انت محظور من هذه الشركة',
            ], 200);
        }

        $RequestCheck = RiderRequest::where('IDRider', $Rider->IDRider)
            ->where('IDCompany', $Company->IDCompany)
            ->where('RiderRequestAccept', 0)
            ->where('RiderRequestActive', 1)->first();

        if ($RequestCheck) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Request Already Exist',
                'MessageAr' => 'الطلب موجودة بالفعل',
            ], 200);
        }

        $Request = new RiderRequest();
        $Request->IDRider = $Rider->IDRider;
        $Request->IDCompany = $Company->IDCompany;
        $Request->save();

        ActionBackLog::create([
            'UserType'          => 'RIDER',
            'IDUser'            => $Rider->IDRider,
            'ActionBackLog'     => 'RIDER_REQUEST',
            'ActionBackLogDesc' => 'Rider Make Request ID => ' . $Request->IDRiderRequest,
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Request Sent Successfully',
            'MessageAr' => 'تم ارسال الطلب بنجاح',
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Rider Make Apply To Company Hiring
    |--------------------------------------------------------------------------
    */
    public function RiderHiringApply(Request $request)
    {
        $Rider = auth('rider')->user();

        if (!$Rider) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Rider Not Found',
                'MessageAr' => 'السائق مطلوب',
            ], 200);
        }

        $Rider = Rider::find($Rider->IDRider);

        if (!$request->IDHiring) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Hiring Required',
                'MessageAr' => 'الوظيفة مطلوبة',
            ], 200);
        }

        $RiderEmployeds = RiderEmployed::where('IDRider', $Rider->IDRider)
            ->where('RiderEmployedActive', 1)->get()->pluck('IDCompany')->toArray();

        $RiderBlocks = RiderBlock::where('IDRider', $Rider->IDRider)
            ->where('RiderBlockActive', 1)->get()->pluck('IDCompany')->toArray();

        $Hiring = Hiring::where('IDHiring', $request->IDHiring)
            ->where('HiringActive', 1)->first();

        if (!$Hiring) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Job Not Found',
                'MessageAr' => 'الوظيفة غير موجودة',
            ], 200);
        }

        if (in_array($Hiring->IDCompany, $RiderEmployeds)) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Already Working In This Company',
                'MessageAr' => 'انت تعمل في هذة الشركة',
            ], 200);
        }

        if (in_array($Hiring->IDCompany, $RiderBlocks)) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Blocked From This Company',
                'MessageAr' => 'انت محظور من هذه الشركة',
            ], 200);
        }

        $ApplyCheck = HiringApply::where('IDRider', $Rider->IDRider)
            ->where('IDHiring', $Hiring->IDHiring)
            ->where('HiringApplyAccept', 0)
            ->where('HiringApplyActive', 1)->first();

        if ($ApplyCheck) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Request Already Exist',
                'MessageAr' => 'الطلب موجودة بالفعل',
            ], 200);
        }

        $Apply = new HiringApply();
        $Apply->IDRider     = $Rider->IDRider;
        $Apply->IDHiring    = $Hiring->IDHiring;
        $Apply->save();

        ActionBackLog::create([
            'UserType'          => 'RIDER',
            'IDUser'            => $Rider->IDRider,
            'ActionBackLog'     => 'RIDER_HIRING_APPLY',
            'ActionBackLogDesc' => 'Rider Make Hiring Apply ID => ' . $Apply->IDHiringApply,
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Apply Sent Successfully',
            'MessageAr' => 'تم ارسال الطلب بنجاح',
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Rider Make Apply To Company Task
    |--------------------------------------------------------------------------
    */
    public function RiderTaskApply(Request $request)
    {
        $Rider = auth('rider')->user();

        if (!$Rider) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Rider Not Found',
                'MessageAr' => 'السائق مطلوب',
            ], 200);
        }

        $Rider = Rider::find($Rider->IDRider);

        if (!$request->IDTask) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Required',
                'MessageAr' => 'المهمة مطلوبة',
            ], 200);
        }

        $RiderEmployeds = RiderEmployed::where('IDRider', $Rider->IDRider)
            ->where('RiderEmployedActive', 1)->get()->pluck('IDCompany')->toArray();

        $RiderBlocks = RiderBlock::where('IDRider', $Rider->IDRider)
            ->where('RiderBlockActive', 1)->get()->pluck('IDCompany')->toArray();

        $Task = Task::where('IDTask', $request->IDTask)
            ->where('TaskActive', 1)->first();

        if (!$Task) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Not Found',
                'MessageAr' => 'المهمة غير موجودة',
            ], 200);
        }

        if (in_array($Task->IDCompany, $RiderEmployeds)) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Already Working In This Company',
                'MessageAr' => 'انت تعمل في هذة الشركة',
            ], 200);
        }

        if (in_array($Task->IDCompany, $RiderBlocks)) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Blocked From This Company',
                'MessageAr' => 'انت محظور من هذه الشركة',
            ], 200);
        }

        $TaskCheck = TaskApply::where('IDRider', $Rider->IDRider)
            ->where('IDTask', $Task->IDTask)
            ->where('TaskApplyAccept', 0)
            ->where('TaskApplyActive', 1)->first();

        if ($TaskCheck) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Request Already Exist',
                'MessageAr' => 'الطلب موجودة بالفعل',
            ], 200);
        }

        $TaskApply = new TaskApply();
        $TaskApply->IDRider     = $Rider->IDRider;
        $TaskApply->IDTask    = $Task->IDTask;
        $TaskApply->save();

        ActionBackLog::create([
            'UserType'          => 'RIDER',
            'IDUser'            => $Rider->IDRider,
            'ActionBackLog'     => 'RIDER_TASK_APPLY',
            'ActionBackLogDesc' => 'Rider Make Task Apply ID => ' . $TaskApply->IDTaskApply,
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Apply Sent Successfully',
            'MessageAr' => 'تم ارسال الطلب بنجاح',
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Rider Requests Screen
    |--------------------------------------------------------------------------
    */
    public function RiderMyRequests(Request $request)
    {
        $Rider = auth('rider')->user();

        if (!$Rider) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Rider Not Found',
                'MessageAr' => 'السائق مطلوب',
                'MyCompany' => [],
                'MyRequest' => [],
                'MyHiring'  => [],
                'MyTask'    => [],
            ], 200);
        }

        $Rider = Rider::find($Rider->IDRider);

        $RiderEmployeds = RiderEmployed::where('IDRider', $Rider->IDRider)
            ->where('RiderEmployedActive', 1)->get()->pluck('IDCompany')->toArray();;

        $MyCompany  = Company::whereIn('IDCompany', $RiderEmployeds)
            ->where('CompanyActive', 1)->get();

        $Requests = RiderRequest::where('IDRider', $Rider->IDRider)
            ->where('RiderRequestAccept', 0)
            ->where('RiderRequestActive', 1)->get()->pluck('IDCompany')->toArray();

        $MyRequest  = Company::whereIn('IDCompany', $Requests)
            ->where('CompanyActive', 1)->get();

        $Applies = HiringApply::where('IDRider', $Rider->IDRider)
            ->where('HiringApplyAccept', 0)
            ->where('HiringApplyActive', 1)->get()->pluck('IDHiring')->toArray();

        $MyHiring = Hiring::whereIn('IDHiring', $Applies)
            ->where('HiringApplied', 0)
            ->where('HiringActive', 1)->get();

        $TApplies = TaskApply::where('IDRider', $Rider->IDRider)
            ->where('TaskApplyAccept', 0)
            ->where('TaskApplyActive', 1)->get()->pluck('IDTask')->toArray();

        $MyTasks = Task::whereIn('IDTask', $TApplies)
            ->where('TaskApplied', 0)
            ->where('TaskActive', 1)->get();

        return response([
            'Success'   => true,
            'MessageEn' => 'Requests Page',
            'MessageAr' => 'صفحة الطلبات',
            'MyCompany' => CompanyResource::collection($MyCompany),
            'MyRequest' => CompanyResource::collection($MyRequest),
            'MyHiring'  => HiringResource::collection($MyHiring),
            'MyTask'    => TaskResource::collection($MyTasks),
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Rider Make Complaint
    |--------------------------------------------------------------------------
    */
    public function RiderComplaint(Request $request)
    {
        $Rider = auth('rider')->user();

        if (!$Rider) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Rider Not Found',
                'MessageAr' => 'السائق مطلوب',
            ], 200);
        }

        $Rider = Rider::find($Rider->IDRider);

        if (!$request->ComplaintText) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Text Required',
                'MessageAr' => 'النص مطلوي',
            ], 200);
        }

        $Complaint = new Complaint();
        $Complaint->IDRider         = $Rider->IDRider;
        $Complaint->ComplaintText   = $request->ComplaintText;
        $Complaint->save();

        ActionBackLog::create([
            'UserType'          => 'RIDER',
            'IDUser'            => $Rider->IDRider,
            'ActionBackLog'     => 'RIDER_COMPLAINT',
            'ActionBackLogDesc' => 'Rider Make Complaint ID => ' . $Complaint->IDComplaint,
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Complaint Sent Successfully',
            'MessageAr' => 'تم ارسال الشكوي بنجاح',
        ], 200);
    }
}
