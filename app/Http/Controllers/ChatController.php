<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Chat;
use App\Models\Room;
use App\Models\Message;
use App\Models\User;
use App\Models\Product;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function openChat(Product $product)
    {
    // 自分と相手のIDを取得
        $myUserId = auth()->user()->id;
        $productId = $product->id; 
        $shopId = $product->shop->id;// ここで製品を販売しているお店のユーザーIDを指定

        // データベース内でチャットが存在するかを確認
        $chat = Room::where(function($query) use ($myUserId, $productId) {
            $query->where('user_id', $myUserId)
                ->where('product_id', $productId);
        })->first();

        // チャットが存在しない場合、新しいチャットを作成
        if (!$chat) {
            $chat = new Room();
            $chat->user_id = $myUserId;
            $chat->product_id = $productId;
            $chat->shop_id = $shopId;
            $chat->save();
        }

        $messages = Message::where('chat_id', $chat->id)->orderBy('updated_at', 'DESC')->get();;


        return view('chats/chat')->with(['chat' => $chat, 'messages' => $messages]);
    }
}
