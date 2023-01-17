<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            ['name' => 'omer',
                'number' => '01',
                'type' => 'main',
                'status' => '0',
                'debit_balance' => 0.00,
                'credit_balance' => 0.00,
                'created_at' => Carbon::now()
            ],
            ['name' => 'Khaled',
                'number' => '02',
                'type' => 'main',
                'status' => '0',
                'debit_balance' => 0.00,
                'credit_balance' => 0.00,
                'created_at' => Carbon::now()
            ],
            ['name' => 'boxes',
                'number' => '03',
                'type' => 'main',
                'status' => '1',
                'debit_balance' => 0.00,
                'credit_balance' => 0.00,
                'created_at' => Carbon::now()
            ],
            ['name' => 'main box',
                'number' => '0301',
                'type' => 'sub',
                'status' => '1',
                'debit_balance' => 0.00,
                'credit_balance' => 0.00,
                'created_at' => Carbon::now()
            ],
            ['name' => 'check box',
                'number' => '0302',
                'type' => 'sub',
                'status' => '1',
                'debit_balance' => 0.00,
                'credit_balance' => 0.00,
                'created_at' => Carbon::now()
            ],
            ['name' => 'purchases',
                'number' => '04',
                'type' => 'main',
                'status' => '0',
                'debit_balance' => 0.00,
                'credit_balance' => 0.00,
                'created_at' => Carbon::now()
            ],
            ['name' => 'sales',
                'number' => '05',
                'type' => 'main',
                'status' => '0',
                'debit_balance' => 0.00,
                'credit_balance' => 0.00,
                'created_at' => Carbon::now()
            ],
            ['name' => 'expenses',
                'number' => '06',
                'type' => 'main',
                'status' => '1',
                'debit_balance' => 0.00,
                'credit_balance' => 0.00,
                'created_at' => Carbon::now()
            ],
            ['name' => 'water',
                'number' => '0601',
                'type' => 'sub',
                'status' => '1',
                'debit_balance' => 0.00,
                'credit_balance' => 0.00,
                'created_at' => Carbon::now()
            ],
            ['name' => 'electricity',
                'number' => '0602',
                'type' => 'sub',
                'status' => '1',
                'debit_balance' => 0.00,
                'credit_balance' => 0.00,
                'created_at' => Carbon::now()

            ],
            ['name' => 'computers',
                'number' => '0603',
                'type' => 'sub',
                'status' => '1',
                'debit_balance' => 0.00,
                'credit_balance' => 0.00,
                'created_at' => Carbon::now()

            ],
            ['name' => 'food',
                'number' => '0604',
                'type' => 'sub',
                'status' => '1',
                'debit_balance' => 0.00,
                'credit_balance' => 0.00,
                'created_at' => Carbon::now()

            ]
        ]);
    }
}
