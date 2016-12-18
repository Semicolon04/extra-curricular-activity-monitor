<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function storeGenericActivity(Request $request) {
        // Find the type from the request
    }
    public function storeClubActivity(Request $request) {

    }
    public function storeCompetitionActivity(Request $request) {

    }
    public function storeSportsActivity(Request $request) {

    }
    public function storeClubActivityProject(Request $request, $activity_id) {

    }
    public function storeSportsEvent(Request $request, $activity_id) {

    }
    public function storeAwards(Request $request, $activity_id) {

    }
    public function validateActivity(Request $request, $activity_id) {
        
    }
}
