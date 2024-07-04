<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Brick\Math\Exception\DivisionByZeroException;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Exception;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class  HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        abort_if(Gate::denies('dashboard_read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $patients = Patient::all();
        $totalPatients = count($patients);
        return view('home',compact('totalPatients'));
    }
}
