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
        $item = Item::inRandomOrder()->get();
        return [
            'account_id' => $account->id,
            'item_id' => $item->id,
            'price' => $item->price,
        ];
    }
}
