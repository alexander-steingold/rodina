<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use App\Models\Country;
use App\Models\Courier;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Route;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Alexander Steingold',
            'email' => 'alex@gmail.com',
            'mobile' => '0508107910',
            'role' => 'admin',
        ]);

//        User::factory(10)->create();
//        $users = User::all();
        $this->call([
            CountrySeeder::class,
        ]);
        $countries = Country::all();
        $this->call([
            CitySeeder::class,
        ]);
        $cities = City::all();
        for ($i = 0; $i < 45; $i++) {
            Customer::factory()->create([
                'city_id' => $cities->random()->id,
                'country_id' => 109
                // 'user_id' => $users->pop()->id,
            ]);
        }
        $customers = Customer::all();
        for ($i = 0; $i < 5; $i++) {
            Courier::factory()->create([
                'city_id' => $cities->random()->id,
                'country_id' => 109
                // 'user_id' => $users->pop()->id,
            ]);
        }
        $couriers = Courier::all();
        for ($i = 0; $i < 20; $i++) {
            $qty = rand(1, 1);
            $order = Order::factory()->create([
                // 'courier_id' => $couriers->random()->id,
                'customer_id' => $customers->random()->id,
                'country_id' => 147,
                'total_payment' => function (array $attributes) use ($qty) {
                    return $qty * $attributes['box_price'] + intval($attributes['payment']) - intval($attributes['discount']);
                },
                //'city_id' => $cities->random()->id,
            ]);

            OrderStatus::factory()->create([
                'order_id' => $order->id,
                'user_id' => $user->id
            ]);

            $items = [
                'CLOTHES',
                'SHOES',
                'DISHES',
                'CANNED FOOD',
                'FOOD',
                'WASHING POWDER',
                'HYGIENE PRODUCTS',
                'COVERED STILLED',
                'LINENS',
                'ELECTRICAL EQUIPMENT',
                'HOUSEHOLD CHEMICALS',
                'BUILDING MATERIALS',
                'TOOLS',
            ];
            $rand_keys = array_rand($items, 3);
            for ($j = 0; $j < 3; $j++) {
                Item::factory()->create([
                    'order_id' => $order->id,
                    'item' => $items[$rand_keys[$j]],
                    'qty' => rand(1, 10)
                ]);
            }
//            for ($j = 0; $j < $qty; $j++) {
//                Barcode::factory()->create([
//                    'order_id' => $order->id,
//                    'barcode' => rand(111111111, 999999999)
//                ]);
//            }
        }


        Route::factory()->create([
            'number' => '1',
            'title' => 'Центральный Регион',
            'description' => 'Тель Авив - Нетания'
        ]);
        Route::factory()->create([
            'number' => '2',
            'title' => 'Южный Регион',
            'description' => 'Беер Шева - Офаким - Нетивот - Димона - Арад'
        ]);
        Route::factory()->create([
            'number' => '3',
            'title' => 'Северный Регион',
            'description' => 'Хайфа - Афула - Краёт'
        ]);
//        $companies = Customer::all();
//        for ($i = 0; $i < 100; $i++) {
//            $item = Item::factory()->create([
//                'company_id' => $companies->random()->id
//            ]);
//            foreach (range(1, fake()->numberBetween(5, 10)) as $index) {
//                Image::factory()->create([
//                    'item_id' => $item->id
//                ]);
//            }
        // }


//        foreach ($users as $user) {
//            $jobs = Job::inRandomOrder()->take(rand(0, 4))->get();
//            foreach ($jobs as $job) {
//                JobApplication::factory()->create([
//                    'job_id' => $job->id,
//                    'user_id' => $user->id
//                ]);
//            }
//
//        }
    }
}
