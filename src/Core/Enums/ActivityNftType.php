<?php

namespace DFiks\Solscan\Core\Enums;

enum ActivityNftType: string
{
    case Sold = 'ACTIVITY_NFT_SOLD';
    case Listing = 'ACTIVITY_NFT_LISTING';
    case Bidding = 'ACTIVITY_NFT_BIDDING';
    case CancelBid = 'ACTIVITY_NFT_CANCEL_BID';
    case CancelList = 'ACTIVITY_NFT_CANCEL_LIST';
    case RejectBid = 'ACTIVITY_NFT_REJECT_BID';
    case UpdatePrice = 'ACTIVITY_NFT_UPDATE_PRICE';
    case ListAuction = 'ACTIVITY_NFT_LIST_AUCTION';

    public static function values(): array
    {
        return array_map(fn (self $item) => $item->value, self::cases());
    }
}
