<?php

namespace App\Http\Controllers;

use App\Interfaces\OddsConterterInterface;
use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show home screen.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('index');
    }

    /**
     * Convert the odds action
     * @param OddsConterterInterface $converter
     * @param Request $request
     * @return type
     */
    public function log(OddsConterterInterface $converter, Request $request) {
        try {
            $convertedOdds = $converter->convert($request->value, $request->type);

            if ($convertedOdds != false) {
                return response()->json($convertedOdds);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error has occured'], 404);
        }
    }

}
