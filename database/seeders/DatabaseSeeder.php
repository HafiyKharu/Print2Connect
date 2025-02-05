<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Customers;
use App\Models\PrintShops;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create a default admin user
        User::create([
            'role' => 'admin',
            'username' => 'admin',
            'name' => 'MiKu Point',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123123'), // Make sure to hash the password
            'description' => 'Default admin user',
        ]);

        // Create a default customer 1
        $customerUser1 = User::create([
            'role' => 'customer',
            'username' => 'Hafiy',
            'name' => 'Hafiy Kharu',
            'email' => 'hafiy@gmail.com',
            'password' => bcrypt('123123123'), // Make sure to hash the password
            'description' => 'Hi nama saya Hafiy',
        ]);

        // Create corresponding customer details
        Customers::create([
            'user_id' => $customerUser1->id,
            'phoneNumber' => '601162138123',
            'address' => 'Seksyen 7, Shah Alam, Selangor',
        ]);
        // Create a default customer 1
        $customerUser2 = User::create([
            'role' => 'customer',
            'username' => 'Syahmi',
            'name' => 'Syahmi Hafiz',
            'email' => 'syah@gmail.com',
            'password' => bcrypt('123123123'), // Make sure to hash the password
            'description' => 'Hi nama saya syahmi mimi i punya',
        ]);

        // Create corresponding customer details
        Customers::create([
            'user_id' => $customerUser2->id,
            'phoneNumber' => '601156874667',
            'address' => 'Seksyen 7, Shah Alam, Selangor',
        ]);
        // Create a default customer user
        $customerUser3 = User::create([
            'role' => 'customer',
            'username' => 'Harith',
            'name' => 'Harith Iqbal',
            'email' => 'nafiz@gmail.com',
            'password' => bcrypt('123123123'), // Make sure to hash the password
            'description' => 'watashiwa harith desu',
        ]);

        // Create corresponding customer details
        Customers::create([
            'user_id' => $customerUser3->id,
            'phoneNumber' => '601137511170',
            'address' => 'Seksyen 7, Shah Alam, Selangor',
        ]);

        // Create a default print shop user
        $printShopUser = User::create([
            'role' => 'print shop',
            'username' => 'printshop',
            'name' => 'Retech Print Shop',
            'email' => 'salespg@retech.com.my',
            'password' => bcrypt('123123123'), // Make sure to hash the password
            'description' => '',
        ]);

        // Create corresponding print shop details
        PrintShops::create([
            'user_id' => $printShopUser->id,
            'businessRegNo' => 'BRN123456',
            'address' => '6, Jalan Diplomatik 2/1, Presint 15, 62050 Putrajaya, Wilayah Persekutuan Putrajaya',
            'contactNo' => '60176462656',
            'serviceDescription' => 'Retech Print Shoppe has been in operation since 1997. After about 2 years of extensive experience in printing, the company has taken steps to incorporate on September 27, 1999 on the name of Retech Print Shoppe Sdn Bhd. The company has a Ministry of Domestic’s license and registered with Ministry of Finance, Felda Global Ventures (FGV), PETRONAS, UiTM, PETROFAC, MMHE and PPD PG. The company is also 100% operated and owned by Bumiputera.',
            'is_approved' => false,
        ]);
        // Create a second print shop user
        $printShopUser2 = User::create([
            'role' => 'print shop',
            'username' => 'Barokah',
            'name' => 'Barokah Printing',
            'email' => 'barokahpps@gmail.com',
            'password' => bcrypt('123123123'), // Make sure to hash the password
            'description' => '',
        ]);

        // Create corresponding print shop details
        PrintShops::create([
            'user_id' => $printShopUser2->id,
            'businessRegNo' => 'BRN654321',
            'address' => 'Barokah Printing & Studio Gambar Passport, NO XG 14 JALAN PLUMBUM X7/X SEKSYEN 7 SHAH ALAM 40000 SELANGOR, Shah Alam, Malaysia',
            'contactNo' => '60129184302',
            'serviceDescription' => 'STUDIO GAMBAR PASSPORT, PRINTING, INSTANT PHOTO PRINTING, PHOTOCOPY, ONLINE PRINTING, INSTANT PASSPORT PHOTO PRINTING, LAMINATING, COMB BINDING, CD/DVD BURN,& ETC',
            'is_approved' => true,
        ]);

        // Create a third print shop user
        $printShopUser3 = User::create([
            'role' => 'print shop',
            'username' => 'RF',
            'name' => 'RF Printing',
            'email' => 'info@rfprinting.biz',
            'password' => bcrypt('123123123'), // Make sure to hash the password
            'description' => '',
        ]);

        // Create corresponding print shop details
        PrintShops::create([
            'user_id' => $printShopUser3->id,
            'businessRegNo' => 'BRN789012',
            'address' => 'VG-4, Jalan Plumbum V7/V, Pusat Komersial Seksyen 7, 40000 Shah Alam, Selangor',
            'contactNo' => '60199118011',
            'serviceDescription' => 'RF Printing mempunyai kepakaran dan pengalaman dalam bidang printing, designing, silk skrin, sulaman, hot press dan lain-lain teknik printing. Kami menjual segala jenis baju t-shirt, jaket, baju korporat, tuala, baju sukan, lencana, mug and pen print, dan sedia menerima tempahan dari seluruh Malaysia. Syarikat kami mempunyai dua buah cawangan iaitu di Selangor serta Kelantan. Tempahan boleh dibuat secara online (email, phone dan whatsapp) ataupun boleh hadir terus ke mana-mana bilik pameran kami. RF Printing telah ditubuhkan oleh dua orang sahabat usahawan muda di atas nama syarikat RF Profit Network (KT0300459-U), satu syarikat Perkongsian hak milik antara Abdul Rahman Mohamed dan Ahmad Faqrul Hafeez Mohd Noor. RF telah mula beroperasi pada akhir 2011. Sejak ditubuhkan, RF Printing telah berkembang sehingga mampu menyediakan servis ke seluruh negara, malah pernah mendapat tempahan dari Morocco, Jordan, Mesir dan beberapa negara lain.',
            'is_approved' => true,
        ]);
        // Create five more dummy print shop users that are not approved
        for ($i = 4; $i <= 8; $i++) {
            $printShopUser = User::create([
                'role' => 'print shop',
                'username' => 'PrintShopUser' . $i,
                'name' => 'Print Shop ' . $i,
                'email' => 'printshop' . $i . '@example.com',
                'password' => bcrypt('password' . $i), // Make sure to hash the password
                'description' => '',
            ]);

            PrintShops::create([
                'user_id' => $printShopUser->id,
                'businessRegNo' => 'BRN' . $i . '89012',
                'address' => 'Address ' . $i,
                'contactNo' => '601991180' . $i,
                'serviceDescription' => 'Service Description for Print Shop ' . $i,
                'is_approved' => false,
            ]);
        }
    }
}