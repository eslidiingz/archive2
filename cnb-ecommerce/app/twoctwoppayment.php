<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class twoctwoppayment extends Model
{
    //
    protected $table = 'twoctwoppayments';

    protected $fillable = [
        'id',
        'version',
        'request_timestamp',
        'merchant_id',
        'currency',
        'order_id',
        'amount',
        'invoice_no',
        'transaction_ref',
        'approval_code',
        'eci',
        'transaction_datetime',
        'payment_channel',
        'payment_status',
        'channel_response_code',
        'channel_response_desc',
        'masked_pan',
        'stored_card_unique_id',
        'backend_invoice',
        'paid_channel',
        'paid_agent',
        'recurring_unique_id',
        'ippPeriod',
        'ippInterestType',
        'ippInterestRate',
        'ippMerchantAbsorbRate',
        'payment_scheme',
        'process_by',
        'sub_merchant_list',
        'issuer_country',
        'issuer_bank',
        'card_type',
        'user_defined_1',
        'user_defined_2',
        'user_defined_3',
        'user_defined_4',
        'user_defined_5',
        'browser_info',
        'hash_value',
        'created_at',
        'updated_at',

    ];
}
