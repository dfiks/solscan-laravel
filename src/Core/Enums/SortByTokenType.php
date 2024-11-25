<?php

namespace DFiks\Solscan\Core\Enums;

enum SortByTokenType: string
{
    case Price = 'price';
    case Holder = 'holder';
    case MarketCap = 'market_cap';
    case CreatedTime = 'created_time';
}
