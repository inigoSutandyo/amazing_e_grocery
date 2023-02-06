<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $randId = fake()->numberBetween(2,3);
        $account = Account::find($randId);
        $item = Item::inRandomOrder()->first();
        return [
            'account_id' => $account->account_id,
            'item_id' => $item->item_id,
            'price' => $item->price,
        ];
    }
}
