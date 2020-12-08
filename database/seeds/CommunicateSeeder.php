<?php

use Illuminate\Database\Seeder;
use App\Models\Division;
use App\Models\District;
use App\Models\Upozila;
class CommunicateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $communicate = $this->communicate();

        foreach ($communicate as $key => $division) {
        	$division=Division::create([
               "name"=>$key
        	]);
              
        	$this->districtd($communicate, $key, $division->id);
        }
    }

    protected function communicate():array
    {
    	return [
		    "Rajshahi"=>[
		    	"Natore"=>["Bagatipara ", "Gurudaspur", "Lalpur", "Singra"],
		        "Rajshahi"=>["Godagari", "Bagha", "Mohonpur"],
		        "Panbna"=>["Chatmohar", "Bhangura", "Sujanagar"]
		    ],
		    "Dhaka"=>[
		        "Manikganj"=>["Singair", "Shivalaya", "Saturia"],
		        "Kishoreganj"=>["Kuliarchar", "Hossainpur", "Pakundia"],
		        "Gopalganj"=>["Kashiani", "Kotalipara", "Gopalganj", "Tungipara"]
		    ],
		    "Mymensingh"=>[
		      "Netrokona"=>["Atpara", "Barhatta", "Durgapur", "Khaliajuri"],
		      "Netrokona"=>["Dewanganj", "Islampur", "Madarganj"],
		      "Sherpur"=>["Jhenaigati", "Nalitabari"],
		    ]
		];
    }

    protected function districtd( $communicate, $division,  $division_id )
    {
    	foreach ($communicate[$division] as $key => $upozila) {
    		$distric = District::create([
    			"name"        => $key,
    			"division_id" => $division_id
    		]);
    		$this->upozila($upozila, $distric->id);
    	}
    }

    protected function upozila($upozila, $distric_id)
    {
       foreach ($upozila as $upz) {
    		 Upozila::create([
    			"name"        => $upz,
    			"district_id" => $distric_id
    		]);
    	} 
    }
}
