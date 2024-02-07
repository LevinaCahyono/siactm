<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccounts extends Model
{
    use HasFactory;
    protected $table='chart_of_accounts';

    protected $fillable = [
        'account_code',
        'account_name',
        'account_group',
        'account_subgroup',
        'account_d_c',
        'account_status'
    ];
}
