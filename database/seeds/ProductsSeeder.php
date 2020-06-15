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
        	'in_stock' => 1],
        	//Món 2
        	['name' =>  'Hồng Trà Việt Quất',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 3
        	['name' =>  'Hồng Trà Chanh Dây',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 4
        	['name' =>  'Trà Xanh',
        	'category_id' => 1,
        	'price' => 20000,
        	'in_stock' => 1],
        	//Món 5
        	['name' =>  'Trà Dâu Tằm Pha Lê Tuyết',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 6
        	['name' =>  'Trà Xanh Chanh Leo',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 7
        	['name' =>  'Hồng Long Pha Lê Tuyết',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 8
        	['name' =>  'Hồng Long Bạch Ngọc',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 9
        	['name' =>  'Trà Sữa Truyền Thống',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 10
        	['name' =>  'Trà Sữa Olong',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 11
        	['name' =>  'Trà Olong Thái Cực',
        	'category_id' => 1,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 12
        	['name' =>  'Hồng Trà Latte',
        	'category_id' => 1,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 13
        	['name' =>  'Trà Sữa Matcha',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 14
        	['name' =>  'Trà Sữa Bạc Hà',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 15
        	['name' =>  'Trà Sữa Socola',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 16
        	['name' =>  'Sữa Tươi Trân Châu Đường Hổ',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 17
        	['name' =>  'Trà Sữa Rau Câu',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 18
        	['name' =>  'Trà Sữa Trân Chau Sợi',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 19
        	['name' =>  'Trà Sữa Vị Nhài',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 20
        	['name' =>  'Hồng Trà Việt Quất',
        	'category_id' => 2,
        	'price' => 20000,
        	'in_stock' => 1],
        	//Món 21
        	['name' =>  'Trà Sữa Bánh Pudding',
        	'category_id' => 2,
        	'price' => 20000,
        	'in_stock' => 1],
        	//Món 22
        	['name' =>  'Trà Sữa Khoai Môn',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 23
        	['name' =>  'Trà Sữa Caramel',
        	'category_id' => 2,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 24
        	['name' =>  'Trà Xanh Xoài',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 25
        	['name' =>  'Trà Dứa Nhiệt Đới',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 26
        	['name' =>  'Trà Dứa Hồng Hạc',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 27
        	['name' =>  'Trà Dứa Nhiệt Đới',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 28
        	['name' =>  'Trà Xanh Chanh Quất Mật Ong',
        	'category_id' => 3,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 29
        	['name' =>  'Soda 7 Up Chanh Mật Ong',
        	'category_id' => 5,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 30
        	['name' =>  'Soda Mojito',
        	'category_id' => 5,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 31
        	['name' =>  'Soda Ý',
        	'category_id' => 5,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 32
        	['name' =>  'Soda Kem Cherry',
        	'category_id' => 5,
        	'price' => 25000,
        	'in_stock' => 1],
        	//Món 33
        	['name' =>  'Soda Blue Sky',
        	'category_id' => 5,
        	'price' => 20000,
        	'in_stock' => 1],
        	//Món 34
        	['name' =>  'Soda Xoài',
        	'category_id' => 5,
        	'price' => 20000,
        	'in_stock' => 1],
        	//Món 35
        	['name' =>  'Soda Cam',
        	'category_id' => 5,
        	'price' => 20000,
        	'in_stock' => 1],
        	//Món 36
        	['name' =>  'Soda Táo Xanh',
        	'category_id' => 5,
        	'price' => 20000,
        	'in_stock' => 1],
        	//Món 37
        	['name' =>  'Soda Dâu',
        	'category_id' => 5,
        	'price' => 20000,
        	'in_stock' => 1],
        	//Món 38
        	['name' =>  'Soda Bạc Hà',
        	'category_id' => 5,
        	'price' => 20000,
        	'in_stock' => 1],
        	//Món 39
        	['name' =>  'Cà Phê Đen Đá',
        	'category_id' => 4,
        	'price' => 15000,
        	'in_stock' => 1],
        	//Món 40
        	['name' =>  'Cà Phê Bạc Xĩu',
        	'category_id' => 4,
        	'price' => 15000,
        	'in_stock' => 1],
        	//Món 41
        	['name' =>  'Cà Phê Ran Xay',
        	'category_id' => 4,
        	'price' => 15000,
        	'in_stock' => 1],
        	//Món 42
        	['name' =>  'Cà Phê Sữa',
        	'category_id' => 4,
        	'price' => 15000,
        	'in_stock' => 1],
        	//Món 43
        	['name' =>  'Cà Phê Đen Đá',
        	'category_id' => 4,
        	'price' => 15000,
        	'in_stock' => 1],
        	//Món 44
        	['name' =>  'Pepsi',
        	'category_id' => 6,
        	'price' => 10000,
        	'in_stock' => 1],
        	//Món 45
        	['name' =>  'Coca Cola',
        	'category_id' => 6,
        	'price' => 10000,
        	'in_stock' => 1],
        	//Món 46
        	['name' =>  'Mirinda Soda Kem',
        	'category_id' => 6,
        	'price' => 10000,
        	'in_stock' => 1],
        	//Món 47
        	['name' =>  '7 Up',
        	'category_id' => 6,
        	'price' => 10000,
        	'in_stock' => 1],
        	//Món 48
        	['name' =>  'Fanta',
        	'category_id' => 6,
        	'price' => 10000,
        	'in_stock' => 1],
        	//Món 49
        	['name' =>  'Sprite',
        	'category_id' => 6,
        	'price' => 10000,
        	'in_stock' => 1],
        	//Món 50
        	['name' =>  'Pizza Hải Sản Nhiệt Đới ',
        	'category_id' => 7,
        	'price' => 79000,
        	'in_stock' => 1],
        	//Món 51
        	['name' =>  'Pizza Hải Sản Singapore',
        	'category_id' => 7,
        	'price' => 79000,
        	'in_stock' => 1],
        	//Món 52
        	['name' =>  'Pizza Xúc Xích Pepperoni',
        	'category_id' => 7,
        	'price' => 79000,
        	'in_stock' => 1],
        	//Món 53
        	['name' =>  'Pizza Phô Mai',
        	'category_id' => 7,
        	'price' => 79000,
        	'in_stock' => 1],
        	//Món 54
        	['name' =>  'Pizza Gà Phô Mai',
        	'category_id' => 7,
        	'price' => 79000,
        	'in_stock' => 1],
        	//Món 55
        	['name' =>  'Pizza Bò',
        	'category_id' => 7,
        	'price' => 79000,
        	'in_stock' => 1],
        	//Món 56
        	['name' =>  'Pizza Thập Cẩm',
        	'category_id' => 7,
        	'price' => 79000,
        	'in_stock' => 1],
        	//Món 57
        	['name' =>  'Burger Bò Tắm Phô Mai (Vừa)',
        	'category_id' => 8,
        	'price' => 54000,
        	'in_stock' => 1],
        	//Món 58
        	['name' =>  'Burger Bò Tắm Phô Mai (Lớn)',
        	'category_id' => 8,
        	'price' => 105000,
        	'in_stock' => 1],
        	//Món 59
        	['name' =>  'Burger Bò Nướng Khoai Tây Lát',
        	'category_id' => 8,
        	'price' => 47000,
        	'in_stock' => 1],
        	//Món 60
        	['name' =>  'Burger Bò Nướng Hành Chiên',
        	'category_id' => 8,
        	'price' => 47000,
        	'in_stock' => 1],
        	//Món 61
        	['name' =>  'Burger Bò Nướng Whopper',
        	'category_id' => 8,
        	'price' => 47000,
        	'in_stock' => 1],
        	//Món 62
        	['name' =>  'Burger 2 Miếng Bò Nướng Whopper',
        	'category_id' => 8,
        	'price' => 63000,
        	'in_stock' => 1],
        	//Món 63
        	['name' =>  'Burger Bò Thịt Heo Xông Khói',
        	'category_id' => 8,
        	'price' => 64000,
        	'in_stock' => 1],
        	//Món 64
        	['name' =>  'Khoai Tây Chiên',
        	'category_id' => 9,
        	'price' => 15000,
        	'in_stock' => 1],
        	//Món 65
        	['name' =>  'Bánh Tráng Trộn',
        	'category_id' => 9,
        	'price' => 15000,
        	'in_stock' => 1],
        	
        ]);
    }
}
