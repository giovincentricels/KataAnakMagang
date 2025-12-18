<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $companies = [
            [
                'name' => 'Apple Developer Academy',
                'industry' => 'Software & IT',
                'location' => 'Tangerang Selatan, Indonesia',
                'description' => 'Apple Developer Academy provides world-class education to help students become professional app developers. Not only focusing on coding, but also design, marketing, and business aspects of app development. Providing hands-on experience with real projects and collaboration with peers.',
                'logo' => 'logos/apple.png',
                'size' => '50-100 employees',
                'website' => 'https://developeracademy.apple.com',
                'email' => 'academy@apple.com',
            ],
            [
                'name' => 'Google Indonesia',
                'industry' => 'Software & IT',
                'location' => 'Jakarta, Indonesia',
                'description' => 'Google Indonesia focuses on building products and platforms that help businesses grow digitally. As part of Google, the team works on various projects including search, advertising, cloud computing, and AI technologies. They also engage in community programs to support digital literacy and entrepreneurship in Indonesia.',
                'logo' => 'logos/google.png',
                'size' => '1000+ employees',
                'website' => 'https://www.google.co.id',
                'email' => 'careers@google.com',
            ],
            [
                'name' => 'Tokopedia',
                'industry' => 'E-Commerce',
                'location' => 'Jakarta, Indonesia',
                'description' => 'Tokopedia is an Indonesian technology company specializing in e-commerce and digital services. It provides a platform for individuals and businesses to open and manage online stores, offering a wide range of products from electronics to fashion. Tokopedia is committed to empowering small and medium enterprises (SMEs) through technology and innovation.',
                'logo' => 'logos/tokopedia.png',
                'size' => '1000+ employees',
                'website' => 'https://www.tokopedia.com',
                'email' => 'careers@tokopedia.com',
            ],
            [
                'name' => 'Gojek',
                'industry' => 'Technology & Transportation',
                'location' => 'Jakarta, Indonesia',
                'description' => 'Gojek is a leading on-demand platform providing transportation, payments, and logistics services. Starting as a ride-hailing service, Gojek has expanded to offer a wide range of services including food delivery, digital payments, and more. The company focuses on leveraging technology to improve the lives of millions of users and support local businesses across Indonesia.',
                'logo' => 'logos/gojek.png',
                'size' => '1000+ employees',
                'website' => 'https://www.gojek.com',
                'email' => 'careers@gojek.com',
            ],
            [
                'name' => 'Traveloka',
                'industry' => 'Travel & Technology',
                'location' => 'Jakarta, Indonesia',
                'description' => 'Traveloka is a technology company providing travel booking and lifestyle services. The platform allows users to book flights, hotels, and various activities, offering a seamless experience for travelers. Traveloka is committed to innovation and customer satisfaction, making travel more accessible and enjoyable for everyone.',
                'logo' => 'logos/traveloka.png',
                'size' => '1000+ employees',
                'website' => 'https://www.traveloka.com',
                'email' => 'careers@traveloka.com',
            ],
            [
                'name' => 'Bukalapak',
                'industry' => 'E-Commerce',
                'location' => 'Jakarta, Indonesia',
                'description' => 'Bukalapak empowers SMEs through e-commerce and digital financial services. The platform connects millions of buyers and sellers, providing tools and resources to help businesses grow online. Bukalapak is dedicated to fostering entrepreneurship and innovation in Indonesia\'s digital economy.',
                'logo' => 'logos/bukalapak.png',
                'size' => '1000+ employees',
                'website' => 'https://www.bukalapak.com',
                'email' => 'careers@bukalapak.com',
            ],
            [
                'name' => 'Shopee Indonesia',
                'industry' => 'E-Commerce',
                'location' => 'Jakarta, Indonesia',
                'description' => 'Shopee is a leading e-commerce platform in Southeast Asia. It offers a wide range of products from electronics to fashion, providing a convenient and secure shopping experience. Shopee focuses on innovation, customer satisfaction, and supporting local sellers to thrive in the digital marketplace.',
                'logo' => 'logos/shopee.png',
                'size' => '1000+ employees',
                'website' => 'https://shopee.co.id',
                'email' => 'careers@shopee.co.id',
            ],
            [
                'name' => 'Ruangguru',
                'industry' => 'EdTech',
                'location' => 'Jakarta, Indonesia',
                'description' => 'Ruangguru is an education technology company focused on online learning solutions. They provide a variety of educational services including tutoring, test preparation, and skill development through their digital platform. Ruangguru aims to make quality education accessible to all students across Indonesia.',
                'logo' => 'logos/ruangguru.png',
                'size' => '500-1000 employees',
                'website' => 'https://www.ruangguru.com',
                'email' => 'careers@ruangguru.com',
            ],
            [
                'name' => 'Xendit',
                'industry' => 'FinTech',
                'location' => 'Jakarta, Indonesia',
                'description' => 'Xendit provides secure and reliable payment infrastructure for businesses. Their platform enables seamless payment processing, fraud prevention, and financial management solutions. Xendit is dedicated to empowering businesses in Southeast Asia with innovative financial technology services.',
                'logo' => 'logos/xendit.png',
                'size' => '500-1000 employees',
                'website' => 'https://www.xendit.co',
                'email' => 'careers@xendit.co',
            ],
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}
