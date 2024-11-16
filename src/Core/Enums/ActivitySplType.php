<?php

namespace DFiks\Solscan\Core\Enums;

enum ActivitySplType: string
{
    case Transfer = 'ACTIVITY_SPL_TRANSFER';
    case Burn = 'ACTIVITY_SPL_BURN';
    case Mint = 'ACTIVITY_SPL_MINT';
    case CreateAccount = 'ACTIVITY_SPL_CREATE_ACCOUNT';
}