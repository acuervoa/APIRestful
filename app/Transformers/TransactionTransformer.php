<?php

namespace App\Transformers;

use App\Transaction;
use League\Fractal\TransformerAbstract;

class TransactionTransformer extends TransformerAbstract {

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Transaction $transaction) {
        return [
            'identifier' => (int) $transaction->id,
            'cantidad' => (int) $transaction->quantity,
            'comprador' => (int) $transaction->buyer_id,
            'producto' => (int) $transaction->product_id,
            'createdDate' => (string) $transaction->created_at,
            'updatedDate' => (string) $transaction->updated_at,
            'deletedDate' => isset($transaction->deleted_at) ? (string) $transaction->deleted_at : NULL,
        ];
    }
}
