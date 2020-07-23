<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
        	//Món 1
        	['name' =>  'Hồng Trà',
        	'category_id' => 1,
        	'price' => 20000,
			'in_stock' => 1,
			'image' => 'hong-tra.jpg'],
        	//Món 2
        	['name' =>  'Hồng Trà Việt Quất',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'hong-tra-viet-quat.jpg'],
        	//Món 3
        	['name' =>  'Hồng Trà Chanh Dây',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'hong-tra-chanh-day.jpg'],
        	//Món 4
        	['name' =>  'Trà Xanh',
        	'category_id' => 1,
        	'price' => 20000,
        	'in_stock' => 1,
			'image' => 'tra-xanh.jpg'],
        	//Món 5
        	['name' =>  'Trà Dâu Tằm Pha Lê Tuyết',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-dau-tam-pha-le-tuyet.jpg'],
        	//Món 6
        	['name' =>  'Trà Xanh Chanh Leo',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-xanh-chanh-leo.jpg'],
        	//Món 7
        	['name' =>  'Hồng Long Pha Lê Tuyết',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'hong-long-pha-le-tuyet.jpg'],
        	//Món 8
        	['name' =>  'Hồng Long Bạch Ngọc',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'hong-long-bach-ngoc.jpg'],
        	//Món 9
        	['name' =>  'Trà Sữa Truyền Thống',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-sua-truyen-thong.jpg'],
        	//Món 10
        	['name' =>  'Trà Sữa Olong',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-sua-olong.jpg'],
        	//Món 11
        	['name' =>  'Trà Olong Thái Cực',
        	'category_id' => 1,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-olong-thai-cuc.jpg'],
        	//Món 12
        	['name' =>  'Hồng Trà Latte',
        	'category_id' => 1,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'hong-tra-latte.jpg'],
        	//Món 13
        	['name' =>  'Trà Sữa Matcha',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-sua-matcha.jpg'],
        	//Món 14
        	['name' =>  'Trà Sữa Bạc Hà',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-sua-bac-ha.jpg'],
        	//Món 15
        	['name' =>  'Trà Sữa Socola',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-sua-socola.jpg'],
        	//Món 16
        	['name' =>  'Sữa Tươi Trân Châu Đường Hổ',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'sua-tuoi-tran-chau-duong-ho.jpg'],
        	//Món 17
        	['name' =>  'Trà Sữa Rau Câu',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-sua-rau-cau.jpg'],
        	//Món 18
        	['name' =>  'Trà Sữa Trân Châu Sợi',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-sua-tran-chau-soi.jpg'],
        	//Món 19
        	['name' =>  'Trà Sữa Vị Nhài',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-sua-hoa-nhai.jpg'],
        	//Món 21
        	['name' =>  'Trà Sữa Bánh Pudding',
        	'category_id' => 2,
        	'price' => 20000,
        	'in_stock' => 1,
			'image' => 'tra-sua-pudding.jpg'],
        	//Món 22
        	['name' =>  'Trà Sữa Khoai Môn',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-sua-khoai-mon.jpg'],
        	//Món 23
        	['name' =>  'Trà Sữa Caramel',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-sua-caramel.jpg'],
        	//Món 24
        	['name' =>  'Trà Xanh Xoài',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-xanh-xoai.jpg'],
        	//Món 25
        	['name' =>  'Trà Dứa Nhiệt Đới',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-dua-nhiet-doi.jpg'],
        	//Món 26
        	['name' =>  'Trà Dứa Hồng Hạc',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-dua-hong-hac.jpg'],
        	//Món 28
        	['name' =>  'Trà Xanh Chanh Quất Mật Ong',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'tra-xanh-chanh-quat-mat-ong.jpg'],
        	//Món 29
        	['name' =>  'Soda 7 Up Chanh Mật Ong',
        	'category_id' => 5,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'soda-7-up-chanh-mat-ong.jpg'],
        	//Món 30
        	['name' =>  'Soda Mojito',
        	'category_id' => 5,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'soda-mojito.jpg'],
        	//Món 31
        	['name' =>  'Soda Ý',
        	'category_id' => 5,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'soda-y.jpg'],
        	//Món 32
        	['name' =>  'Soda Kem Cherry',
        	'category_id' => 5,
        	'price' => 25000,
        	'in_stock' => 1,
			'image' => 'soda-kem-cherry.jpg'],
        	//Món 33
        	['name' =>  'Soda Blue Sky',
        	'category_id' => 5,
        	'price' => 20000,
        	'in_stock' => 1,
			'image' => 'soda-blue-sky.jpg'],
        	//Món 34
        	['name' =>  'Soda Xoài',
        	'category_id' => 5,
        	'price' => 20000,
        	'in_stock' => 1,
			'image' => 'soda-xoai.jpg'],
        	//Món 35
        	['name' =>  'Soda Cam',
        	'category_id' => 5,
        	'price' => 20000,
        	'in_stock' => 1,
			'image' => 'soda-cam.jpg'],
        	//Món 36
        	['name' =>  'Soda Táo Xanh',
        	'category_id' => 5,
        	'price' => 20000,
        	'in_stock' => 1,
			'image' => 'soda-tao-xanh.jpg'],
        	//Món 37
        	['name' =>  'Soda Dâu',
        	'category_id' => 5,
        	'price' => 20000,
        	'in_stock' => 1,
			'image' => 'soda-dau.jpg'],
        	//Món 38
        	['name' =>  'Soda Bạc Hà',
        	'category_id' => 5,
        	'price' => 20000,
        	'in_stock' => 1,
			'image' => 'soda-bac-ha.jpg'],
        	//Món 39
        	['name' =>  'Cà Phê Đen Đá',
        	'category_id' => 4,
        	'price' => 15000,
        	'in_stock' => 1,
			'image' => 'cafe-den-da.jpg'],
        	//Món 40
        	['name' =>  'Cà Phê Bạc Xĩu',
        	'category_id' => 4,
        	'price' => 15000,
        	'in_stock' => 1,
			'image' => 'cafe-bac-xiu.jpg'],
        	//Món 41
        	['name' =>  'Cà Phê Ran Xay',
        	'category_id' => 4,
        	'price' => 15000,
        	'in_stock' => 1,
			'image' => 'cafe-ran-xay.jpg'],
        	//Món 42
        	['name' =>  'Cà Phê Sữa',
        	'category_id' => 4,
        	'price' => 15000,
        	'in_stock' => 1,
			'image' => 'ca-phe-sua-da.jpg'],
        	//Món 44
        	['name' =>  'Pepsi',
        	'category_id' => 6,
        	'price' => 10000,
        	'in_stock' => 1,
			'image' => 'pepsi.jpg'],
        	//Món 45
        	['name' =>  'Coca Cola',
        	'category_id' => 6,
        	'price' => 10000,
        	'in_stock' => 1,
			'image' => 'coke.jpg'],
        	//Món 46
        	['name' =>  'Mirinda Soda Kem',
        	'category_id' => 6,
        	'price' => 10000,
        	'in_stock' => 1,
			'image' => 'mirinda-soda-kem.jpg'],
        	//Món 47
        	['name' =>  '7 Up',
        	'category_id' => 6,
        	'price' => 10000,
        	'in_stock' => 1,
			'image' => '7-up.jpg'],
        	//Món 48
        	['name' =>  'Fanta',
        	'category_id' => 6,
        	'price' => 10000,
        	'in_stock' => 1,
			'image' => 'fanta-classic.jpg'],
        	//Món 49
        	['name' =>  'Sprite',
        	'category_id' => 6,
        	'price' => 10000,
        	'in_stock' => 1,
			'image' => 'spite-lon.jpg'],
        	//Món 50
        	['name' =>  'Pizza Hải Sản Nhiệt Đới ',
        	'category_id' => 7,
        	'price' => 79000,
        	'in_stock' => 1,
			'image' => 'pizza-hai-san-nhiet-doi.jpg'],
        	//Món 51
        	['name' =>  'Pizza Hải Sản Singapore',
        	'category_id' => 7,
        	'price' => 79000,
        	'in_stock' => 1,
			'image' => 'pizza-hai-san-singapore.jpg'],
        	//Món 52
        	['name' =>  'Pizza Xúc Xích Pepperoni',
        	'category_id' => 7,
        	'price' => 79000,
        	'in_stock' => 1,
			'image' => 'pizza-xuc-xuc-pepperoni.jpg'],
        	//Món 53
        	['name' =>  'Pizza Phô Mai',
        	'category_id' => 7,
        	'price' => 79000,
        	'in_stock' => 1,
			'image' => 'pizza-phomai.jpg'],
        	//Món 54
        	['name' =>  'Pizza Gà Phô Mai',
        	'category_id' => 7,
        	'price' => 79000,
        	'in_stock' => 1,
			'image' => 'pizza-ga-phomai.jpg'],
        	//Món 55
        	['name' =>  'Pizza Bò',
        	'category_id' => 7,
        	'price' => 79000,
        	'in_stock' => 1,
			'image' => 'pizza-bo.jpg'],
        	//Món 56
        	['name' =>  'Pizza Thập Cẩm',
        	'category_id' => 7,
        	'price' => 79000,
        	'in_stock' => 1,
			'image' => 'pizza-thap-cam.jpg'],
        	//Món 57
        	['name' =>  'Burger Bò Tắm Phô Mai (Vừa)',
        	'category_id' => 8,
        	'price' => 54000,
        	'in_stock' => 1,
			'image' => 'burger-bo-phomai-vua.jpg'],
        	//Món 58
        	['name' =>  'Burger Bò Tắm Phô Mai (Lớn)',
        	'category_id' => 8,
        	'price' => 105000,
        	'in_stock' => 1,
			'image' => 'burger-bo-phomai-lon.jpg'],
        	//Món 59
        	['name' =>  'Burger Bò Nướng Khoai Tây Lát',
        	'category_id' => 8,
        	'price' => 47000,
        	'in_stock' => 1,
			'image' => 'burger-bo-khoai-tay-lat.jpg'],
        	//Món 60
        	['name' =>  'Burger Bò Nướng Hành Chiên',
        	'category_id' => 8,
        	'price' => 47000,
        	'in_stock' => 1,
			'image' => 'burger-bo-nuong-hanh-chien.jpg'],
        	//Món 61
        	['name' =>  'Burger Bò Nướng Whopper',
        	'category_id' => 8,
        	'price' => 47000,
        	'in_stock' => 1,
			'image' => 'burger-bo-whopper.jpg'],
        	//Món 62
        	['name' =>  'Burger 2 Miếng Bò Nướng Whopper',
        	'category_id' => 8,
        	'price' => 63000,
        	'in_stock' => 1,
			'image' => 'burger-2-mieng.jpg'],
        	//Món 63
        	['name' =>  'Burger Bò Thịt Heo Xông Khói',
        	'category_id' => 8,
        	'price' => 64000,
        	'in_stock' => 1,
			'image' => 'burger-bo-xong-khoi.jpg'],
        	//Món 64
        	['name' =>  'Khoai Tây Chiên',
        	'category_id' => 9,
        	'price' => 15000,
        	'in_stock' => 1,
			'image' => 'khoai-tay-chien.jpg'],
        	//Món 65
        	['name' =>  'Bánh Tráng Trộn',
        	'category_id' => 9,
        	'price' => 15000,
        	'in_stock' => 1,
			'image' => 'banh-trang-tron.jpg'],
        ]);
    }
}
