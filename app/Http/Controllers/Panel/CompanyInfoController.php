<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyInfoRequest;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use PDF as PDF;

class CompanyInfoController extends Controller
{

    public function index()
    {
        $info = CompanyInfo::first();
        return view('panel.company-info.index', compact('info'));
    }


    public function edit($id)
    {
        $info = CompanyInfo::first();
        return view('panel.company-info.edit', compact('info'));
    }


    public function update(StoreCompanyInfoRequest $request, $id)
    {
        $info = CompanyInfo::findOrfail($id);
        $info->update($request->all());
        alert()->success('اطلاعات با موفقیت ویرایش شد', 'موفقیت آمیز');
        return redirect()->route('company-info.index');
    }

    public function copyItem(Request $request)
    {

        activity_log('copy-information', __METHOD__, [$request->all()]);
        return "success";
    }

    public function printData(Request $request)
    {

        $allData = $request->data;

        activity_log('print-information', __METHOD__, [$request->all()]);
        $pdf = PDF::loadView('panel.pdf.printInfo', ['allData' => $allData], [], [
            'format' => 'A3',
            'orientation' => 'L',
            'margin_left' => 2,
            'margin_right' => 2,
            'margin_top' => 10,
            'margin_bottom' => 0,
            'default_font' => 'vazir',
        ]);



        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="' . time() . '.pdf"');


//        return view('panel.company-info.printinfo', compact('allData'));

    }


}
