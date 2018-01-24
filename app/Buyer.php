<?php

namespace App;

class Buyer extends User {

  public function transactions() {
    $this->hasMany(Transaction::class);
  }
}
