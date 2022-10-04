<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nail;
use App\Models\Nailist;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NailController extends Controller
{
    // public function index()
    // {
    //     $nails = Nail::get();
    //     return view('nail.index', compact('nails'));
    // }

    // public function create(Request $request)
    // {
    //     return view('nail.create');
    // }

   

    // 一般会員写真一覧
    public function nails(Nail $nail)
    {
        // $nails = Nail::pluck('img_path');
        $nails = Nail::All();

        $likes= new Nail;
        $user = Auth::user();
        $naillike = $nail->isLikedBy($user);

        return view('dashboard', compact('nails','nail'));
    }

    public function top(Nail $nail)
    {
        Auth::logout();
    
      
        // $nails = Nail::pluck('img_path');
        $nails = Nail::All();


        return view('nailviews/top', compact('nails'));
    }


    // public function liked()
    // {
    //     $likes= new Nail;
    //     $user = Auth::user();
    //     $nail = $likes->isLikedBy($user);
    //     return view('dashboard', compact('nail'));
    // }
    
    


    // ネイリストネイル投稿一覧
    public function nail()
    {
        $nails = Nail::all()->where('nailist_id', '=', Auth::user()->id);

        return view('nailviews/nailistlist', compact('nails'));
    }




    


    // ログアウト
    public function logout()
    {
        Auth::logout();
        return view('nailviews/top');
    }








// ネイル詳細
public function detail($id)
{
    $nails = Nail::findOrFail($id);

    return view('nailviews/naildetail',['id'=>$id],compact('nails'));
}







 // ネイル新規登録
 public function store(Request $request)
 {
     // // 画像フォームでリクエストした画像を取得
     // $img = $request->file('ma');
     // // storage > public > img配下に画像が保存される
     // $path = $request->ma->store('img');

     $dir = 'public/app/img';
     $file_name = $request->file('ma')->getClientOriginalName();
     $request->file('ma')->storeAs('public/' . $dir, $file_name);

     $pathex = $request->explan;
     $nailist_id = $request->nailist_id;
     Nail::create([
         // 'img_path' => $path,
         'img_path' => 'storage/' . $dir . '/' . $file_name,
         'explanation' => $pathex,
         'nailist_id' => $nailist_id,
     ]);
     //　リダイレクト
     return view('nailviews/nailcomp');
 }

    // ネイル編集ページへ
    public function nailedit($id)
    {
        $nailedit = Nail::find($id);
        return view('nailviews/nailedit', compact('nailedit'));
    }

    // ネイルをdbへアップデート
    public function update(Request $request, $id)
    {
        $nail = Nail::findOrFail($id);

        $nail->explanation = $request->explanation;
        $nail->save();
        return view('nailviews/naileditcomplete');
    }

    //  ネイル削除
    public function destroy($id)
    {
        // Booksテーブルから指定のIDのレコード1件を取得
        $nail = Nail::find($id);

        // レコードを削除
        $nail->delete();
        return view('nailviews/naildestroy');
    }







// ユーザーページへ
public function userpage()
{
    $users = User::all()->where('id', '=', Auth::user()->id);
    return view('nailviews/mypage', compact('users'));
}

// ユーザー編集
public function useredit($id)
{
    $useredit = User::find($id);
    return view('nailviews/mypage', compact('useredit'));
}

// ユーザー更新dbへ
public function userupdate(Request $request, $id)
{
 
    $request->validate(
        [
            'name' => 'required | max:10',
            'email' => 'required | regex:/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/',
        ],
        [
            'name.required'  => '名前は必須です。',
            'name.max:10'  => '名前は１０文字以内です。',
            'email.required'  => 'メールアドレスは必須です。',
            'email.regex:/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/'  => '正しいメールアドレスを入力して下さい。。',
        ]
    );
    $input = $request->all();

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
  
    $user->save();
    
    $input = $request->all();
    return view('nailviews/mypageeditcomplete', ['input' => $input,]);
}







    // ネイリストページへ
    public function nailistpage()
    {
        $nailists = Nailist::all()->where('id', '=', Auth::user()->id);
        return view('nailviews/nailistedit', compact('nailists'));
    }

    // ネイリスト編集
    public function nailistedit($id)
    {
        $nailedit = Nailist::find($id);
        return view('nailviews/nailistedit', compact('nailistedit'));
    }

    // ネイリスト更新dbへ
    public function nailistupdate(Request $request, $id)
    {
     
        $request->validate(
            [
                'name' => 'required | max:10',
                'email' => 'required | regex:/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/',
            ],
            [
                'name.required'  => '名前は必須です。',
                'name.max:10'  => '名前は１０文字以内です。',
                'email.required'  => 'メールアドレスは必須です。',
                'email.regex:/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/'  => '正しいメールアドレスを入力して下さい。。',
            ]
        );
        $input = $request->all();

        $user = Nailist::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
      
        $user->save();
        
        $input = $request->all();
        return view('nailviews/nailisteditcomplete', ['input' => $input,]);
    }




    public function usersSearchResult(Request $req){

        // データ取得
        $query = Nail::query();
        // $query->Where('disp_flag','=',2);
        $query->orderBy('pub_date','desc');
        
        $params = $req->except('page'); // 「except」で指定した場合、記述したメソッド以外のリクエストが可能
        $results = $query->paginate(6)->appends($params);
    }        










    public function result(Request $request, Nail $nail)
    {
        $articles = Nail::orderBy('created_at', 'asc')->where(function ($query) {

            // 検索機能
            if ($search = request('search')) {
                $query->where('explanation', 'LIKE', "%{$search}%");
            }

            // 8投稿毎にページ移動
        })->paginate(9);
        
        $nails = Nail::All();

        $likes= new Nail;
        $user = Auth::user();
        $naillike = $nail->isLikedBy($user);


        return view('nailviews/searchresult', compact('articles','nail'));
    }


   

 // 
//  public function nailsresult(l)
//  {
//      // $nails = Nail::pluck('img_path');
//      $nails = Nail::All();

//      $likes= new Nail;
//      $user = Auth::user();
//      $naillike = $nail->isLikedBy($user);
// dd($nail);
//      return view('nailviews/searchresult', compact('nail'));
//  }






// いいねをする／撤回する
    public function like(Request $request)
{
   
    $user_id = Auth::user()->id; //1.ログインユーザーのid取得
    $nail_id = $request->nail_id; //2.投稿idの取得
    $already_liked = Like::where('user_id', $user_id)->where('nail_id', $nail_id)->first(); //3.

    if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
        $like = new Like; //4.Likeクラスのインスタンスを作成
        $like->nail_id = $nail_id; //Likeインスタンスにnail_id,user_idをセット
        $like->user_id = $user_id;
        $like->save();
    } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
        Like::where('nail_id', $nail_id)->where('user_id', $user_id)->delete();
    }
    //5.この投稿の最新の総いいね数を取得
    $nail_likes_count = Nail::withCount('likes')->findOrFail($nail_id)->likes_count;
    $param = [
        'nail_likes_count' => $nail_likes_count,
    ];
    return response()->json($param); //6.JSONデータをjQueryに返す
}



// いいね数をindexに表示する
public function index(Request $request)
{
    $nails = Nail::withCount('likes')->orderBy('id', 'desc')->paginate(10);
    $param = [
        'nails' => $nails,
    ];
    return view('nails.index', $param);
}







// 退会
public function userdelete()
{
    $user = User::find(Auth::user()->id);
    $user->delete();
    return view('nailviews/userdeletecomp');
}

public function nailistdelete()
{
    $user = Nailist::find(Auth::user()->id);
    $user->delete();
    return view('nailviews/nailistdeletecomp');
}




// いいね一覧
public function good()
{
   $user_id = Auth::user()->id; //1.ログインユーザーのid取得
    // $nail_id = Nail::get('id'); //2.投稿idの取得
    // $nail = Like::where('nail_id', $nail_id)->where('user_id', $user_id);
    // $nail = Like::all()->where('nail_id', $nail_id);
    $nail = Like::select([
        'l.id',
        'n.img_path',
        'n.id'
    ])
    ->from('likes as l')
    ->leftJoin('nails as n','n.id','=','l.nail_id')
    ->leftJoin('users as u','u.id','=','l.user_id')
    ->get();

    return view('nailviews/good', compact('nail'));
}
}


