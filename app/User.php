<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

  use Notifiable, SoftDeletes;

  const USUARIO_VERIFICADO = '1';
  const USUARIO_NO_VERIFICADO = '0';

  const USUARIO_ADMINISTRADOR = 'true';
  const USUARIO_REGULAR = 'false';

  protected $table = "users";
  protected $dates = ['deleted_at'];
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'verified',
    'verification_token',
    'admin',
  ];

  public function setNameAttribute($valor) {
    $this->attributes['name'] = strtolower($valor);
  }

  public function getNameAttribute($valor){
    return ucwords($valor);
  }


  public function setEmailAttribute($valor) {
    $this->attributes['email'] = strtolower($valor);
  }

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
    'verification_token',
  ];

  public function esVerificado() {
    return $this->verified === self::USUARIO_VERIFICADO;
  }

  public function esAdministrador() {
    return $this->admin === self::USUARIO_ADMINISTRADOR;
  }

  public static function generarVerificationToken(){
    return str_random(40);
  }
}
