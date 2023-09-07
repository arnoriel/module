<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $visible = ['gambar', 'judul', 'deskripsi'];

    protected $fillable = ['gambar', 'judul', 'deskripsi'];
    
    public $timestamps = true;

    public function gambar()
    {
        if ($this->gambar && file_exists(public_path('images/post/' . $this->gambar))) {
            return asset('images/post/' . $this->gambar);
        } else {
            return asset('images/no_image.png');
        }
    }

    public function deleteGambar()
    {
        if ($this->gambar && file_exists(public_path('images/post/' . $this->gambar))) {
            return unlink(public_path('images/post/' . $this->gambar));
        }

    }
}
