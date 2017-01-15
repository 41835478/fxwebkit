<?php

namespace Fxweb\Http\Controllers\admin;

use Illuminate\Http\Request;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;
use Carbon\Carbon;
use Config;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('authenticate.admin');
    }


    public function index(Request $oRequest ,\Fxweb\Repositories\Admin\User\UserContract $oUsers)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';
        $aGroups = [];
        $oResults = null;
        $aFilterParams = [
            'id' => '',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];

        if ($oRequest->has('search')) {
            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['first_name'] = $oRequest->first_name;
            $aFilterParams['last_name'] = $oRequest->last_name;
            $aFilterParams['email'] = $oRequest->email;
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;
        }

        $role = explode(',', Config::get('fxweb.client_default_role'));
        $oResults = $oUsers->getUsersByFilter($aFilterParams, false, $sOrder, $sSort, $role);

        return view('admin.accounts.accountsList')
            ->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $oRequest ,\Fxweb\Repositories\Admin\User\UserContract $oUsers)
    {

        $carbon = new Carbon();
        $dt = $carbon->now();
        $dt->subYears(18);

        $country_array = $oUsers->getCountry(null);
        $userInfo = ['edit_id' => 0,
            'first_name' => '',
            'last_name' => '',
            'password' => '',
            'email' => '',
            'nickname' => '',
            'address' => '',
            'birthday' => $dt->format('Y/m/d'),
            'phone' => '',
            'country' => '',
            'country_array' => $country_array,
            'city' => '',
            'zip_code' => '',
            'gender' => 0
        ];

        if ($oRequest->has('edit_id')) {

            $oResult = $oUsers->getUserDetails($oRequest->edit_id);


            $userInfo = [
                'edit_id' => $oRequest->edit_id,
                'first_name' => $oResult['first_name'],
                'last_name' => $oResult['last_name'],
                'email' => $oResult['email'],
                'password' => '',
                'nickname' => $oResult['nickname'],
                'address' => $oResult['address'],
                'birthday' => $oResult['birthday'],
                'phone' => $oResult['phone'],
                'country' => $oResult['country'],
                'country_array' => $country_array,
                'city' => $oResult['city'],
                'zip_code' => $oResult['zip_code'],
                'gender' => $oResult['gender']
            ];
        }
        return view('admin.accounts.addAccount')->with('userInfo', $userInfo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $oRequest,\Fxweb\Repositories\Admin\User\UserContract $oUsers)
    {

        $result = 0;

        $admin_role = explode(',', Config::get('fxweb.client_default_role'));

        $result = $oUsers->addUser($oRequest, $admin_role[0]);

        if ($result > 0) {
            $oRequest->edit_id = $result;

            $oResult = $oUsers->getUserDetails($oRequest->edit_id);

            $user_details = [
                'id' => $oRequest->edit_id,
                'first_name' => $oResult['first_name'],
                'last_name' => $oResult['last_name'],
                'password' => '',
                'email' => $oResult['email'],
                'nickname' => $oResult['nickname'],
                'address' => $oResult['address'],
                'birthday' => $oResult['birthday'],
                'phone' => $oResult['phone'],
                'country' => $oResult['country'],
                'city' => $oResult['city'],
                'zip_code' => $oResult['zip_code'],
                'gender' => $oResult['gender'],
            ];
            return view('accounts::detailsAccount')->with('user_details', $user_details);
        } else {

            return view('admin.accounts.addAccount')->withErrors($result);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
