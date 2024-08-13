<?php

namespace App\Http\Controllers;

use App\Models\PrivateTreeCutting;
use Illuminate\Http\Request;

class PrivateTreeCuttingController extends Controller
{
    public function pendingPrivate()
    {
        $pendingPrivate = PrivateTreeCutting::with(['user:id,firstname', 'admin:id,firstname'])
            ->select(
                'id',
                'user_id',
                'admin_id',
                'app_letter',
                'app_letter_compliant',
                'app_letter_remarks',
                'land_Title',
                'land_Title_compliant',
                'land_Title_remarks',
                'endorsement_Certification',
                'endorsement_Certification_compliant',
                'endorsement_Certification_remarks',
                'homeowner_Reso',
                'homeowner_Reso_compliant',
                'homeowner_Reso_remarks',
                'resolution',
                'resolution_compliant',
                'resolution_remarks',
                'status',
                'app_Date',
                'app_Loc'
            )
            ->where('status', 'Pending')
            ->get();

        return response()->json([
            'PendingPrivate' => $pendingPrivate
        ], 200);
    }

    public function approvedPrivateStatus(Request $request, $id)
    {
        $status = 'Approved';
        try {
            $pendingPrivate = PrivateTreeCutting::findOrFail($id);
            $pendingPrivate->update([
                'app_letter_compliant' => $request->input('app_letter_compliant'),
                'app_letter_remarks' => $request->input('app_letter_remarks'),
                'land_Title_compliant' => $request->input('land_Title_compliant'),
                'land_Title_remarks' => $request->input('land_Title_remarks'),
                'endorsement_Certification_compliant' => $request->input('endorsement_Certification_compliant'),
                'endorsement_Certification_remarks' => $request->input('endorsement_Certification_remarks'),
                'homeowner_Reso_compliant' => $request->input('homeowner_Reso_compliant'),
                'homeowner_Reso_remarks' => $request->input('homeowner_Reso_remarks'),
                'resolution_compliant' => $request->input('resolution_compliant'),
                'resolution_remarks' => $request->input('resolution_remarks'),
                'status' => $status,
                'app_Date' => $request->input('app_Date'),
            ]);

            return response()->json(['message' => 'Private Individual tree cutting request approved successfully', 'pendingPrivate' => $pendingPrivate], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to approved private individual tree cutting request', 'message' => $e->getMessage()], 500);
        }
    }

    public function declinedPrivateStatus(Request $request, $id){
        $status = 'Declined';

        try {
            $pendingPrivate = PrivateTreeCutting::findOrFail($id);
            $pendingPrivate->update([
                'app_letter_compliant' => $request->input('app_letter_compliant'),
                'app_letter_remarks' => $request->input('app_letter_remarks'),
                'land_Title_compliant' => $request->input('land_Title_compliant'),
                'land_Title_remarks' => $request->input('land_Title_remarks'),
                'endorsement_Certification_compliant' => $request->input('endorsement_Certification_compliant'),
                'endorsement_Certification_remarks' => $request->input('endorsement_Certification_remarks'),
                'homeowner_Reso_compliant' => $request->input('homeowner_Reso_compliant'),
                'homeowner_Reso_remarks' => $request->input('homeowner_Reso_remarks'),
                'resolution_compliant' => $request->input('resolution_compliant'),
                'resolution_remarks' => $request->input('resolution_remarks'),
                'status' => $status,
            ]);


            return response()->json(['message' => 'Private Individual tree cutting request declined successfully', 'pendingPrivate' => $pendingPrivate], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to decline private individual tree cutting request', 'message' => $e->getMessage()], 500);
        }
    }

    public function approvedPrivate()
    {
        $approvedPrivate = PrivateTreeCutting::with(['user:id,firstname', 'admin:id,firstname'])
            ->select(
                'id',
                'user_id',
                'admin_id',
                'app_Date',
                'app_Loc',
            )
            ->where('status', 'Approved')
            ->get();

        return response()->json([
            'ApprovedPrivate' => $approvedPrivate
        ], 200);
    }

    public function declinedPrivate()
    {
        $declinedPrivate = PrivateTreeCutting::with(['user:id,firstname', 'admin:id,firstname'])
            ->select(
                'id',
                'user_id',
                'admin_id',
                'app_Loc',
            )
            ->where('status', 'Declined')
            ->get();

        return response()->json([
            'DeclinedPrivate' => $declinedPrivate
        ], 200);
    }
}