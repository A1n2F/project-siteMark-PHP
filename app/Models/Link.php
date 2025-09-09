<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\UploadedFile;

/**
 * @property-read UploadedFile $photo_link
 */


class Link extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function moveUp() {
        $this->move(-1);
    }

    public function moveDown() {
        $this->move(+1);
    }

    private function move($to) {
        $order = $this->sort;
        $newOrder = $order + $to;

        $user = $this->user;
            
        $swapWith = $user->links()->where('sort', '=', $newOrder)->first();

        $this->fill(['sort' => $newOrder])->save();
        $swapWith->fill(['sort' => $order])->save();
    }
    
}