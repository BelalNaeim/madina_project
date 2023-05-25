<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class MemberController extends Controller {
    //

    public function index() {
        //
        $users = User::where( 'role', '=', 'مستخدم' )->first()->get();
        // dd( $users );

        return view( 'dashboard/members', compact( 'users' ) );

    }

    public function approve( $user_id ) {
        $user = User::findOrFail( $user_id );
        $user->update( [ 'approved' => 1 ] );

        return redirect()->back()->with( 'status', 'تم تفعيل المستخدم بنجاح' );
    }

    public function Inactive( $user_id ) {
        $user = User::where( 'id', $user_id )->update( [ 'approved'=>0 ] );
        return redirect()->back()->with( 'status', 'تم الغاء تفعيل المستخدم بنجاح' );
    }

    public function delete( $id ) {
        //
        $User = User::where( 'id', $id )->first();

        $User->delete();

        return redirect()->back()->with( 'status', 'تم حذف  المستخدم بنجاح' );

    }
}
