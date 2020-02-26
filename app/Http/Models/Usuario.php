<?php
    namespace estoque\Http\Models;

    use Illuminate\Database\Eloquent\Model;

    class Usuario extends Model
    {

        protected $fillable = array('nome', 'email', 'senha');
        
        protected $guarded = ['id'];

    }
