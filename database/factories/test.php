<?php

/**
 * This file is part of BillingTrack.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace database\factories;

use FI\Http\Controllers\Controller;
use FI\Modules\Clients\Models\Client;
use FI\Modules\Employees\Models\Employee;
use FI\Modules\Products\Models\Product;

class TestController extends Controller
{
    public function test()
    {
        //clientfactory change between company and name, run twice
        $client = factory(Client::class, 25)->create();
        $employee = factory(Employee::class, 10)->create();
        $product = factory(Product::class, 20)->create();

    }

}
