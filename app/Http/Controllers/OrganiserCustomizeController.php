<?php

namespace App\Http\Controllers;

use App\Models\Organiser;
use App\Models\BankDetail;
use File;
use Image;
use Illuminate\Http\Request;
use Validator;

class OrganiserCustomizeController extends MyBaseController
{
    /**
     * Show organiser setting page
     *
     * @param $organiser_id
     * @return mixed
     */
    public function showCustomize($organiser_id)
    {
      $organiser = Organiser::scope()->with('bank_detail')->findOrFail($organiser_id);
        $data = [
            'organiser' => $organiser,
            'bank_detail' => $organiser->bank_detail()->first(),
        ];

        return view('ManageOrganiser.Customize', $data);
    }

    /**
     * Edits organiser settings / design etc.
     *
     * @param Request $request
     * @param $organiser_id
     * @return mixed
     */
    public function postEditOrganiser(Request $request, $organiser_id)
    {
        $organiser = Organiser::scope()->find($organiser_id);

        $chargeTax = $request->get('charge_tax');
        if ($chargeTax == 1) {
            $organiser->addExtraValidationRules();
        }

        if (!$organiser->validate($request->all())) {
            return response()->json([
                'status'   => 'error',
                'messages' => $organiser->errors(),
            ]);
        }

        $organiser->name = $request->get('name');
        $organiser->about = $request->get('about');
        $organiser->google_analytics_code = $request->get('google_analytics_code');
        $organiser->google_tag_manager_code = $request->get('google_tag_manager_code');
        $organiser->email = $request->get('email');
        $organiser->enable_organiser_page = $request->get('enable_organiser_page');
        $organiser->facebook = $request->get('facebook');
        $organiser->twitter = $request->get('twitter');

        $organiser->tax_name = $request->get('tax_name');
        $organiser->tax_value = $request->get('tax_value');
        $organiser->tax_id = $request->get('tax_id');
        $organiser->charge_tax = ($request->get('charge_tax') == 1) ? 1 : 0;

        if ($request->get('remove_current_image') == '1') {
            $organiser->logo_path = '';
        }

        if ($request->hasFile('organiser_logo')) {
            $organiser->setLogo($request->file('organiser_logo'));
        }

        $organiser->save();

        session()->flash('message', trans("Controllers.successfully_updated_organiser"));

        return response()->json([
            'status'      => 'success',
            'redirectUrl' => '',
        ]);
    }

    /**
     * Edits organiser profile page colors / design
     *
     * @param Request $request
     * @param $organiser_id
     * @return mixed
     */
    public function postEditOrganiserPageDesign(Request $request, $organiser_id)
    {
        $organiser = Organiser::scope()->findOrFail($organiser_id);

        $rules = [
            'page_bg_color'        => ['required'],
            'page_header_bg_color' => ['required'],
            'page_text_color'      => ['required'],
        ];
        $messages = [
            'page_header_bg_color.required' => trans("Controllers.error.page_header_bg_color.required"),
            'page_bg_color.required'        => trans("Controllers.error.page_bg_color.required"),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()->toArray(),
            ]);
        }

        $organiser->page_bg_color        = $request->get('page_bg_color');
        $organiser->page_header_bg_color = $request->get('page_header_bg_color');
        $organiser->page_text_color      = $request->get('page_text_color');

        $organiser->save();

        return response()->json([
            'status'  => 'success',
            'message' => trans("Controllers.organiser_design_successfully_updated"),
        ]);
    }

  public function postCreateBankDetails(Request $request, $organiser_id)
    {
      //$organiser = Organiser::scope()->findOrFail($organiser_id);

        $rules = [
            'bank_name'        => ['required'],
            'account_no'       => ['required'],
            'phone_number'      => ['required'],
            'bank_branch'      => ['required'],
            'swift_code'      => ['required'],
        ];
        $messages = [
            'bank.required' => "You must enter valid bank account name",
            'account_no.required'        => "Account number must be entered",
            'bank_branch.required'        => "You must enter bank branch",
            'swift_code.required'        => "You must enter bank swift code",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()->toArray(),
            ]);
        }
       if($request->has('bank_details_id'))
        {
         $bank_details = BankDetail::findOrFail($request->has('bank_details_id'));
       }else {
             $bank_details = new BankDetail();
          }

        $bank_details->bank_name = $request->get('bank_name');
        $bank_details->account_no = $request->get('account_no');
        $bank_details->bank_branch = $request->get('bank_branch');
        $bank_details->swift_code = $request->get('swift_code');
        $bank_details->organiser_id = $organiser_id;

        if($request->has('phone_number'))
           {
             $bank_details->phone_number = $request->get('phone_number');
          }



        $bank_details->save();

     return response()->json([
            'status'  => 'success',
            'message' => "Your bank details been saved successefully",
        ]);

  }
}
