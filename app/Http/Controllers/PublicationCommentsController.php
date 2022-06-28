<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicationCommentsController extends Controller
{

    public static function getComments($idPbl){
        $pblComments = DB::table('publication_comments')->where('publication_id', $idPbl)->get();
        return $pblComments;
    }

    public function store(Request $request){
        DB::table('publication_comments')->insert([
            'username' => $request->username,
            'publication_id' => $request->publicationId,
            'message' => $request->content
        ]);
        return redirect()->back();
    }

    public function destroy($id){
        DB::table('publication_comments')->delete($id);
        return redirect()->back();
    }
}
