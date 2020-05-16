<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            'العناية بالبشرة والجمال',
            'التغذية السليمة',
            'السكري',
            'السرطان',
            'صحة عامة',
            'الطب البديل',
            'القلب',
            'الحمل والولادة',
            'الحياة الزوجية',
            'تربية الأطفال'
        ];

        for ($i = 0; $i < count($category); $i++)
        {
            Category::create([
               'name' => $category[$i]
            ]);
        }
    }
}
