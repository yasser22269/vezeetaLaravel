<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'phone' => '٠١٠١٥١٥٥٧١٢',
            'email' => 'yasser.m22291@gmail.com',
            'facebook' => 'yasser.m22291@gmail.com',
            'twitter' => 'yasser.m22291@gmail.com',
            'insta' => 'yasser.m22291@gmail.com',
            'address' => 'المنصورة شارع النخلة بجوار بنزينة الغاز اعلى سويت هوم',
            'about_me' => 'مركز عيادات فاميلي كير التخصصية هي منصة نشأت على يد أخصائية التغذية العلاجية ( نوف مقرن المحبوب ) خريجة جامعة الملك سعود مع مرتبة الشرف الأولى , مصنفة من الهيئة السعودية للتخصصات الصحية.',

        ]);
    }
}
