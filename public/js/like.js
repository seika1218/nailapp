$(function () {

  let like = $('.like-toggle'); //like-toggleのついたiタグを取得し代入。
  let likeNailId; //変数を宣言
  like.on('click', function () { //onはイベントハンドラー
    let $this = $(this); //this=イベントの発火した要素＝iタグを代入
    likeNailId = $this.data('nail-id'); //iタグに仕込んだdata-nail-idの値を取得
    //ajax処理スタート
    $.ajax({
      headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },  //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
      url: '/like', //通信先アドレスで、このURLをあとでルートで設定します
      dataType: "json",
      method: 'post', //HTTPメソッドの種別を指定します。1.9.0以前の場合はtype:を使用。
      data: { //サーバーに送信するデータ
        'nail_id': likeNailId //いいねされた投稿のidを送る
      },
    })
      //通信成功した時の処理
      .done(function (data) {
        console.log('ok');
        $this.toggleClass('liked'); //likedクラスのON/OFF切り替え。
        $this.next('.like-counter').html(data.nail_likes_count);
        console.log('fail');
      })
      //通信失敗した時の処理
      .fail(function () {
        // console.log($param);
         
      });
  });
});




//  //通信が成功したとき
//  .done((res)=>{
//   console.log(res.message)
// })
// //通信が失敗したとき
// .fail((error)=>{
//   console.log(error.statusText)
// })
// });
//     });









