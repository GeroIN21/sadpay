<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purse extends Model
{
  protected $primaryKey = 'purse_name';
    protected $fillable = ['purse_name'];
    public function transactions()
  {
    return $this->hasOne('Transaction', 'purse_name', 'trans_pay_purse_id');
  }
}
