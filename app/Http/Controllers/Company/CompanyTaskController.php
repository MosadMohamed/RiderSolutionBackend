<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\Company\CompanyTaskApplyResource;
use App\Http\Resources\Company\CompanyTaskResource;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\Task;
use App\Models\TaskApply;
use Illuminate\Http\Request;

class CompanyTaskController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Company Tasks Screen
    |--------------------------------------------------------------------------
    */
    public function CompanyTask()
    {
        $Company = auth('company')->user();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة مطلوبة',
                'Task'      => [],
            ], 200);
        }

        $Company = Company::find($Company->IDCompany);

        $Tasks = Task::where('IDCompany', $Company->IDCompany)->get();

        return response([
            'Success'   => true,
            'MessageEn' => 'Company Task Page',
            'MessageAr' => 'صفحة المهام للشركة',
            'Task'      => CompanyTaskResource::collection($Tasks),
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company Task Applies Screen
    |--------------------------------------------------------------------------
    */
    public function CompanyTaskApply(Request $request)
    {
        $Company = auth('company')->user();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة مطلوبة',
                'TaskApply' => [],
            ], 200);
        }

        $Company = Company::find($Company->IDCompany);

        if (!$request->IDTask) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Required',
                'MessageAr' => 'المهمة مطلوبة',
                'TaskApply' => [],
            ], 200);
        }

        $Task = Task::where('IDTask', $request->IDTask)->first();

        if (!$Task) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Required',
                'MessageAr' => 'المهمة غير موجودة',
                'TaskApply' => [],
            ], 200);
        }

        $TaskApplies = TaskApply::where('IDTask', $Task->IDTask)
            ->where('TaskApplyAccept', 0)
            ->where('TaskApplyActive', 1)->get();

        return response([
            'Success'       => true,
            'MessageEn'     => 'Company Task Apply Page',
            'MessageAr'     => 'صفحة طلبات المهام للشركة',
            'HiringApply'   => CompanyTaskApplyResource::collection($TaskApplies),
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company Accept Task
    |--------------------------------------------------------------------------
    */
    public function CompanyAcceptTask(Request $request)
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

        if (!$request->IDTaskApply) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Apply Required',
                'MessageAr' => 'طلب الوظيفة مطلوبة',
            ], 200);
        }

        $TaskApply = TaskApply::where('IDTaskApply', $request->IDTaskApply)
            ->where('TaskApplyAccept', 0)
            ->where('TaskApplyActive', 1)->first();

        if (!$TaskApply) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Apply Not Found',
                'MessageAr' => 'طلب المهمة غير موجود',
            ], 200);
        }

        $TaskApply->TaskApplyAccept = 1;
        $TaskApply->save();

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_ACCEPT_TASK',
            'ActionBackLogDesc' => 'Company Accept Task "' . $TaskApply->IDTaskApply . '"',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Task Accepted Successfuly',
            'MessageAr' => 'تم الموافقة علي المهمة بنجاح',
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company Refuse Task
    |--------------------------------------------------------------------------
    */
    public function CompanyRefuseTask(Request $request)
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

        if (!$request->IDTaskApply) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Apply Required',
                'MessageAr' => 'طلب الوظيفة مطلوبة',
            ], 200);
        }

        $TaskApply = TaskApply::where('IDTaskApply', $request->IDTaskApply)
            ->where('TaskApplyAccept', 0)
            ->where('TaskApplyActive', 1)->first();

        if (!$TaskApply) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Apply Not Found',
                'MessageAr' => 'طلب المهمة غير موجود',
            ], 200);
        }

        $TaskApply->TaskApplyAccept = 0;
        $TaskApply->TaskApplyActive = 0;
        $TaskApply->save();

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_REFUSE_TASK',
            'ActionBackLogDesc' => 'Company Refuse Task "' . $TaskApply->IDTaskApply . '"',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Task Refused Successfuly',
            'MessageAr' => 'تم رفض المهمة بنجاح',
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company Add Task
    |--------------------------------------------------------------------------
    */
    public function CompanyAddTask(Request $request)
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

        if (!$request->TaskType) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Type Required',
                'MessageAr' => 'نوع المهمة مطلوب',
            ], 200);
        }

        if (!$request->TaskDate) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Date Required',
                'MessageAr' => 'تاريخ المهمة مطلوب',
            ], 200);
        }

        if (!$request->TaskTimeFrom) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Time From Required',
                'MessageAr' => 'وقت بدا المهمة مطلوب',
            ], 200);
        }

        if (!$request->TaskTimeEnd) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Time End Required',
                'MessageAr' => 'وقت نهاية المهمة مطلوب',
            ], 200);
        }

        if (!$request->TaskNote) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Note Required',
                'MessageAr' => 'وصف المهمة مطلوب',
            ], 200);
        }

        $Task = new Task();
        $Task->IDCompany    = $Company->IDCompany;
        $Task->TaskType     = $request->TaskType;
        $Task->TaskDate     = $request->TaskDate;
        $Task->TaskTimeFrom = $request->TaskTimeFrom;
        $Task->TaskTimeEnd  = $request->TaskTimeEnd;
        $Task->TaskNote     = $request->TaskNote;
        $Task->save();

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_ADD_TASK',
            'ActionBackLogDesc' => 'Company Add Task "' . $Task->IDTask . '"',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Hiring Add Successfuly',
            'MessageAr' => 'تم اضافة المهمة بنجاح',
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company End Task
    |--------------------------------------------------------------------------
    */
    public function CompanyEndTask(Request $request)
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

        if (!$request->IDTask) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Required',
                'MessageAr' => 'المهمة مطلوبة',
            ], 200);
        }

        $Task = Task::where('IDTask', $request->IDTask)
            ->where('TaskApplied', 0)
            ->where('TaskActive', 1)->first();

        if (!$Task) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Not Found',
                'MessageAr' => 'المهمة غير موجودة',
            ], 200);
        }
        $Task->TaskApplied = 1;
        $Task->save();

        $TaskApplies = TaskApply::where('IDTask', $Task->IDTask)
            ->where('TaskApplyActive', 1)->get();

        foreach ($TaskApplies as $TaskApply) {
            $TaskApply->TaskApplyActive = 0;
            $TaskApply->save();
        }

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_END_TASK',
            'ActionBackLogDesc' => 'Company End Task "' . $Task->IDTask . '"',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Task End Successfuly',
            'MessageAr' => 'تم انهاء المهمة بنجاح',
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company Delete Task
    |--------------------------------------------------------------------------
    */
    public function CompanyDeleteTask(Request $request)
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

        if (!$request->IDTask) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Required',
                'MessageAr' => 'المهمة مطلوبة',
            ], 200);
        }

        $Task = Task::where('IDTask', $request->IDTask)
            ->where('TaskActive', 1)->first();

        if (!$Task) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Task Not Found',
                'MessageAr' => 'المهمة غير موجودة',
            ], 200);
        }
        $Task->TaskActive = 0;
        $Task->save();

        $TaskApplies = TaskApply::where('IDTask', $Task->IDTask)
            ->where('TaskApplyActive', 1)->get();

        foreach ($TaskApplies as $TaskApply) {
            $TaskApply->TaskApplyActive = 0;
            $TaskApply->save();
        }

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_DELETE_TASK',
            'ActionBackLogDesc' => 'Company Delete Task "' . $Task->IDTask . '"',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Task Delete Successfuly',
            'MessageAr' => 'تم حذف المهمة بنجاح',
        ], 200);
    }
}
