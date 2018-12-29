<?php

use yii\db\Schema;
use yii\db\Migration;

class m181229_085312_mass extends Migration {

	public function safeUp() {
		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		$this->createTable('{{%region}}', [
				'id'          => Schema::TYPE_PK . '',
				'region_id'   => Schema::TYPE_INTEGER . '(11)',
				'region_name' => Schema::TYPE_STRING . '(255)',
			], $tableOptions);
		$this->insert('{{%region}}', ['id'          => '1',
		                              'region_id'   => '1',
		                              'region_name' => 'Nước ngoài',
		]);
		$this->insert('{{%region}}', ['id'          => '2',
		                              'region_id'   => '2',
		                              'region_name' => 'An Giang',
		]);
		$this->insert('{{%region}}', ['id'          => '3',
		                              'region_id'   => '3',
		                              'region_name' => 'Bà Rịa Vũng Tàu',
		]);
		$this->insert('{{%region}}', ['id'          => '4',
		                              'region_id'   => '4',
		                              'region_name' => 'Bình Dương',
		]);
		$this->insert('{{%region}}', ['id'          => '5',
		                              'region_id'   => '5',
		                              'region_name' => 'Bình Phước',
		]);
		$this->insert('{{%region}}', ['id'          => '6',
		                              'region_id'   => '6',
		                              'region_name' => 'Bình Thuận',
		]);
		$this->insert('{{%region}}', ['id'          => '7',
		                              'region_id'   => '7',
		                              'region_name' => 'Bình Định',
		]);
		$this->insert('{{%region}}', ['id'          => '8',
		                              'region_id'   => '8',
		                              'region_name' => 'Bắc Giang',
		]);
		$this->insert('{{%region}}', ['id'          => '9',
		                              'region_id'   => '9',
		                              'region_name' => 'Bắc Kạn',
		]);
		$this->insert('{{%region}}', ['id'          => '10',
		                              'region_id'   => '10',
		                              'region_name' => 'Bắc Ninh',
		]);
		$this->insert('{{%region}}', ['id'          => '11',
		                              'region_id'   => '11',
		                              'region_name' => 'Bến Tre',
		]);
		$this->insert('{{%region}}', ['id'          => '12',
		                              'region_id'   => '12',
		                              'region_name' => 'Cao Bằng',
		]);
		$this->insert('{{%region}}', ['id'          => '13',
		                              'region_id'   => '13',
		                              'region_name' => 'Cà Mau',
		]);
		$this->insert('{{%region}}', ['id'          => '14',
		                              'region_id'   => '14',
		                              'region_name' => 'Cần Thơ',
		]);
		$this->insert('{{%region}}', ['id'          => '15',
		                              'region_id'   => '15',
		                              'region_name' => 'Gia Lai',
		]);
		$this->insert('{{%region}}', ['id'          => '16',
		                              'region_id'   => '16',
		                              'region_name' => 'Hà Giang',
		]);
		$this->insert('{{%region}}', ['id'          => '17',
		                              'region_id'   => '17',
		                              'region_name' => 'Hà Nam',
		]);
		$this->insert('{{%region}}', ['id'          => '18',
		                              'region_id'   => '18',
		                              'region_name' => 'Hà Nội',
		]);
		$this->insert('{{%region}}', ['id'          => '19',
		                              'region_id'   => '19',
		                              'region_name' => 'Hà Tĩnh',
		]);
		$this->insert('{{%region}}', ['id'          => '20',
		                              'region_id'   => '20',
		                              'region_name' => 'Hòa Bình',
		]);
		$this->insert('{{%region}}', ['id'          => '21',
		                              'region_id'   => '21',
		                              'region_name' => 'Hưng Yên',
		]);
		$this->insert('{{%region}}', ['id'          => '22',
		                              'region_id'   => '22',
		                              'region_name' => 'Hải Dương',
		]);
		$this->insert('{{%region}}', ['id'          => '23',
		                              'region_id'   => '23',
		                              'region_name' => 'Hải Phòng',
		]);
		$this->insert('{{%region}}', ['id'          => '24',
		                              'region_id'   => '24',
		                              'region_name' => 'Hồ Chí Minh',
		]);
		$this->insert('{{%region}}', ['id'          => '25',
		                              'region_id'   => '25',
		                              'region_name' => 'Khánh Hòa',
		]);
		$this->insert('{{%region}}', ['id'          => '26',
		                              'region_id'   => '26',
		                              'region_name' => 'Kiên Giang',
		]);
		$this->insert('{{%region}}', ['id'          => '27',
		                              'region_id'   => '27',
		                              'region_name' => 'Kon Tum',
		]);
		$this->insert('{{%region}}', ['id'          => '28',
		                              'region_id'   => '28',
		                              'region_name' => 'Lai Châu',
		]);
		$this->insert('{{%region}}', ['id'          => '29',
		                              'region_id'   => '29',
		                              'region_name' => 'Long An',
		]);
		$this->insert('{{%region}}', ['id'          => '30',
		                              'region_id'   => '30',
		                              'region_name' => 'Lào Cai',
		]);
		$this->insert('{{%region}}', ['id'          => '31',
		                              'region_id'   => '31',
		                              'region_name' => 'Lâm Đồng',
		]);
		$this->insert('{{%region}}', ['id'          => '32',
		                              'region_id'   => '32',
		                              'region_name' => 'Lạng Sơn',
		]);
		$this->insert('{{%region}}', ['id'          => '33',
		                              'region_id'   => '33',
		                              'region_name' => 'Nam Định',
		]);
		$this->insert('{{%region}}', ['id'          => '34',
		                              'region_id'   => '34',
		                              'region_name' => 'Nghệ An',
		]);
		$this->insert('{{%region}}', ['id'          => '35',
		                              'region_id'   => '35',
		                              'region_name' => 'Ninh Bình',
		]);
		$this->insert('{{%region}}', ['id'          => '36',
		                              'region_id'   => '36',
		                              'region_name' => 'Ninh Thuận',
		]);
		$this->insert('{{%region}}', ['id'          => '37',
		                              'region_id'   => '37',
		                              'region_name' => 'Phú Thọ',
		]);
		$this->insert('{{%region}}', ['id'          => '38',
		                              'region_id'   => '38',
		                              'region_name' => 'Phú Yên',
		]);
		$this->insert('{{%region}}', ['id'          => '39',
		                              'region_id'   => '40',
		                              'region_name' => 'Quảng Nam',
		]);
		$this->insert('{{%region}}', ['id'          => '40',
		                              'region_id'   => '41',
		                              'region_name' => 'Quảng Ngãi',
		]);
		$this->insert('{{%region}}', ['id'          => '41',
		                              'region_id'   => '42',
		                              'region_name' => 'Quảng Ninh',
		]);
		$this->insert('{{%region}}', ['id'          => '42',
		                              'region_id'   => '43',
		                              'region_name' => 'Quảng Trị',
		]);
		$this->insert('{{%region}}', ['id'          => '43',
		                              'region_id'   => '44',
		                              'region_name' => 'Sơn La',
		]);
		$this->insert('{{%region}}', ['id'          => '44',
		                              'region_id'   => '45',
		                              'region_name' => 'Thanh Hóa',
		]);
		$this->insert('{{%region}}', ['id'          => '45',
		                              'region_id'   => '46',
		                              'region_name' => 'Thái Bình',
		]);
		$this->insert('{{%region}}', ['id'          => '46',
		                              'region_id'   => '47',
		                              'region_name' => 'Thái Nguyên',
		]);
		$this->insert('{{%region}}', ['id'          => '47',
		                              'region_id'   => '48',
		                              'region_name' => 'Thừa Thiên Huế',
		]);
		$this->insert('{{%region}}', ['id'          => '48',
		                              'region_id'   => '49',
		                              'region_name' => 'Tiền Giang',
		]);
		$this->insert('{{%region}}', ['id'          => '49',
		                              'region_id'   => '50',
		                              'region_name' => 'Trà Vinh',
		]);
		$this->insert('{{%region}}', ['id'          => '50',
		                              'region_id'   => '51',
		                              'region_name' => 'Tuyên Quang',
		]);
		$this->insert('{{%region}}', ['id'          => '51',
		                              'region_id'   => '52',
		                              'region_name' => 'Tây Ninh',
		]);
		$this->insert('{{%region}}', ['id'          => '52',
		                              'region_id'   => '53',
		                              'region_name' => 'Vĩnh Long',
		]);
		$this->insert('{{%region}}', ['id'          => '53',
		                              'region_id'   => '54',
		                              'region_name' => 'Vĩnh Phúc',
		]);
		$this->insert('{{%region}}', ['id'          => '54',
		                              'region_id'   => '55',
		                              'region_name' => 'Yên Bái',
		]);
		$this->insert('{{%region}}', ['id'          => '55',
		                              'region_id'   => '56',
		                              'region_name' => 'Đà Nẵng',
		]);
		$this->insert('{{%region}}', ['id'          => '56',
		                              'region_id'   => '57',
		                              'region_name' => 'Đắk Lắk',
		]);
		$this->insert('{{%region}}', ['id'          => '57',
		                              'region_id'   => '58',
		                              'region_name' => 'Đồng Nai',
		]);
		$this->insert('{{%region}}', ['id'          => '58',
		                              'region_id'   => '59',
		                              'region_name' => 'Đồng Tháp',
		]);
		$this->insert('{{%region}}', ['id'          => '59',
		                              'region_id'   => '60',
		                              'region_name' => 'Bạc Liêu',
		]);
		$this->insert('{{%region}}', ['id'          => '60',
		                              'region_id'   => '61',
		                              'region_name' => 'Sóc Trăng',
		]);
		$this->insert('{{%region}}', ['id'          => '61',
		                              'region_id'   => '62',
		                              'region_name' => 'Hậu Giang',
		]);
		$this->insert('{{%region}}', ['id'          => '62',
		                              'region_id'   => '63',
		                              'region_name' => 'Đắk Nông',
		]);
		$this->insert('{{%region}}', ['id'          => '63',
		                              'region_id'   => '2700',
		                              'region_name' => 'Điện Biên',
		]);
	}

	public function safeDown() {

	}
}
