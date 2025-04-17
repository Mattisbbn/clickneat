<?php

namespace App;

enum OrderStatus
{

        case Pending = 'pending';
        case Paid = 'paid';
        case Preparing = 'preparing';
        case Completed = 'completed';
        case Cancelled = 'cancelled';

}
