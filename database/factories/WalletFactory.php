<?php

namespace Database\Factories;

use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallet>
 */
class WalletFactory extends Factory
{
    protected $model = Wallet::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $symbols = ['BTC', 'ETH', 'USDT', 'BNB'];
        $symbol = $this->faker->randomElement($symbols);

        return [
            'uuid'        => $this->faker->uuid,
            'name'        => $symbol . ' Wallet',
            'symbol'      => $symbol,
            'address'     => $this->faker->regexify('[13][a-km-zA-HJ-NP-Z1-9]{25,34}'), // Fake crypto-style address
            'network'     => $symbol === 'BTC' ? 'Bitcoin Mainnet' : $this->faker->randomElement(['ERC20', 'BEP20', 'Polygon']),
            'qr_code_path' => null,
            'balance'     => $this->faker->randomFloat(8, 0.001, 5), // 0.001 to 5.00000000
            'status'      => $this->faker->randomElement(config('setting.walletStatuses')),
            'description' => $this->faker->sentence(8),
        ];
    }
}
