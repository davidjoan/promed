<?php
namespace Database\Seeders;

use App\Models\Geo;
use App\Models\User;
use App\Models\Brick;

use App\Models\Specialty;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use App\Models\OrganizationType;
use Illuminate\Support\Facades\DB;

class OrganizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$geo     = Geo::getCountry('PE');
		
		$filial         = OrganizationType::where('id',1)->first();
		$unidad_negocio = OrganizationType::where('id',1)->first();
		$division       = OrganizationType::where('id',3)->first();
		$linea          = OrganizationType::where('id',1)->first();
		$supervisor     = OrganizationType::where('id',2)->first();
		$zona           = OrganizationType::where('id',3)->first();
		$user1          = User::where('id',1)->first();
		$user2          = User::where('id',2)->first();
		
		$promed_peru = Organization::create(['geo_id' => $geo->id,
			'user_id' => $user1->id,'organization_type_id' => $filial->id,'name' => 'Promed Community']);
		
		$marketing   = Organization::create(['geo_id' => $geo->id,'user_id' => $user1->id,'organization_type_id' => $unidad_negocio->id,'code' => 'MKT','name' => 'Marketing']);
		$comercial   = Organization::create(['geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $unidad_negocio->id ,'code' => 'COM','name' => 'Comercial']);
		
		$division_wh      = Organization::create(['geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $division->id,'code' => 'WH','name' => 'Whoman Health','description' => 'PROMED_WH']);
		$division_pain    = Organization::create(['geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $division->id,'code' => 'PG','name' => 'Pain & Gastroenterology', 'description' => 'PROMED_PG']);
		$division_rc      = Organization::create(['geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $division->id,'code' => 'RC','name' => 'Respiratory Care','description' => 'PROMED_RC']);
		$division_snc     = Organization::create(['geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $division->id,'code' => 'SNC','name' => 'SNC','description' => 'PROMED_SNC']);
		$division_cardio  = Organization::create(['geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $division->id,'code' => 'CE','name' => 'Cardiovascular & Endocrinology','description' => 'PROMED_CE']);
		$division_derma   = Organization::create(['geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $division->id,'code' => 'DER','name' => 'Dermatology','description' => 'PROMED_DERMA']);
		$division_otc     = Organization::create(['geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $division->id,'code' => 'CH','name' => 'Consumer Health','description' => 'PROMED_CH']);
		$division_generic = Organization::create(['geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $division->id,'code' => 'GE','name' => 'Generics','description' => 'PROMED_GE']);

		$gynorec = Organization::create(['geo_id' => $geo->id,'user_id' => $user1->id,'organization_type_id' => $linea->id,'code' => 'GR','name' => 'Gynorec']);
		$gynofem = Organization::create(['geo_id' => $geo->id,'user_id' => $user1->id,'organization_type_id' => $linea->id,'code' => 'GF','name' => 'Gynofem']);
		$gynolab = Organization::create(['geo_id' => $geo->id,'user_id' => $user1->id,'organization_type_id' => $linea->id,'code' => 'GL','name' => 'Gynolab']);
		
		$supervisor_a = Organization::create(['geo_id' => $geo->id,'user_id' => $user1->id,'organization_type_id' => $supervisor->id,'code' => 'S01','name' => 'Supervisor Sur']);
		$supervisor_b = Organization::create(['geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $supervisor->id,'code' => 'S02','name' => 'Supervisor Norte']);

		$zona_a = Organization::create(['geo_id' => $geo->id,'user_id' => $user1->id,'organization_type_id' => $zona->id,'code' => 'ZAS', 'name' => 'Zona A Sur','selected' => true]);
		$zona_b = Organization::create(['geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $zona->id,'code' => 'ZBS','name' => 'Zona B Sur']);
		$zona_c = Organization::create(['geo_id' => $geo->id,'user_id' => $user1->id,'organization_type_id' => $zona->id,'code' => 'ZAN','name' => 'Zona A Norte']);
		$zona_d = Organization::create(['geo_id' => $geo->id,'user_id' => $user1->id,'organization_type_id' => $zona->id,'code' => 'ZBN','name' => 'Zona B Norte']);

		$zona_a->bricks()->attach(Brick::where('code','3917')->first());
		$zona_a->bricks()->attach(Brick::where('code','3915')->first());
		$zona_a->bricks()->attach(Brick::where('code','3916')->first());
		$zona_a->bricks()->attach(Brick::where('code','3918')->first());
		$zona_a->bricks()->attach(Brick::where('code','3914')->first());
		$zona_a->bricks()->attach(Brick::where('code','3909')->first());
		$zona_a->bricks()->attach(Brick::where('code','3905')->first());
		$zona_a->bricks()->attach(Brick::where('code','3901')->first());
		$zona_a->bricks()->attach(Brick::where('code','3907')->first());
		$zona_a->bricks()->attach(Brick::where('code','3908')->first());
		$zona_a->bricks()->attach(Brick::where('code','3902')->first());
		$zona_a->bricks()->attach(Brick::where('code','3904')->first());
		$zona_a->bricks()->attach(Brick::where('code','3906')->first());
		$zona_a->bricks()->attach(Brick::where('code','3900')->first());
		$zona_a->bricks()->attach(Brick::where('code','3903')->first());
		
		$zona_a->specialties()->attach(Specialty::where('id','28')->first());
		$zona_a->specialties()->attach(Specialty::where('id','7')->first());
		$zona_a->specialties()->attach(Specialty::where('id','8')->first());
		$zona_a->specialties()->attach(Specialty::where('id','30')->first());

		//bricks sub b miraflores, san isidro
		$zona_b->bricks()->attach(Brick::where('code','3703')->first());
		$zona_b->bricks()->attach(Brick::where('code','3700')->first());
		$zona_b->bricks()->attach(Brick::where('code','3705')->first());
		$zona_b->bricks()->attach(Brick::where('code','3702')->first());
		$zona_b->bricks()->attach(Brick::where('code','3704')->first());
		$zona_b->bricks()->attach(Brick::where('code','3701')->first());
		$zona_b->bricks()->attach(Brick::where('code','3706')->first());
		$zona_b->bricks()->attach(Brick::where('code','3707')->first());
		$zona_b->bricks()->attach(Brick::where('code','3708')->first());
		$zona_b->bricks()->attach(Brick::where('code','3710')->first());
		$zona_b->bricks()->attach(Brick::where('code','3709')->first());
		
		$zona_b->specialties()->attach(Specialty::where('id','45')->first());
		$zona_b->specialties()->attach(Specialty::where('id','30')->first());
		$zona_b->specialties()->attach(Specialty::where('id','7')->first());
		
		//bricks norte, comas , independencia
		$zona_c->bricks()->attach(Brick::where('code','505')->first());
		$zona_c->bricks()->attach(Brick::where('code','503')->first());
		$zona_c->bricks()->attach(Brick::where('code','507')->first());
		$zona_c->bricks()->attach(Brick::where('code','506')->first());
		$zona_c->bricks()->attach(Brick::where('code','508')->first());
		$zona_c->bricks()->attach(Brick::where('code','504')->first());
		$zona_c->bricks()->attach(Brick::where('code','512')->first());
		$zona_c->bricks()->attach(Brick::where('code','510')->first());
		$zona_c->bricks()->attach(Brick::where('code','509')->first());
		$zona_c->bricks()->attach(Brick::where('code','511')->first());

		$zona_c->specialties()->attach(Specialty::where('id','17')->first());
		$zona_c->specialties()->attach(Specialty::where('id','37')->first());
		$zona_c->specialties()->attach(Specialty::where('id','39')->first());
		$zona_c->specialties()->attach(Specialty::where('id','34')->first());
		$zona_c->specialties()->attach(Specialty::where('id','38')->first());
		$zona_c->specialties()->attach(Specialty::where('id','13')->first());
		$zona_c->specialties()->attach(Specialty::where('id','42')->first());
		$zona_c->specialties()->attach(Specialty::where('id','46')->first());

		// bricks norte b, los olivos, puente piedra
		$zona_d->bricks()->attach(Brick::where('code','718')->first());
		$zona_d->bricks()->attach(Brick::where('code','717')->first());
		$zona_d->bricks()->attach(Brick::where('code','716')->first());
		$zona_d->bricks()->attach(Brick::where('code','719')->first());
		$zona_d->bricks()->attach(Brick::where('code','202')->first());
		$zona_d->bricks()->attach(Brick::where('code','201')->first());

		$zona_d->specialties()->attach(Specialty::where('id','19')->first());
		$zona_d->specialties()->attach(Specialty::where('id','43')->first());
		$zona_d->specialties()->attach(Specialty::where('id','8')->first());
		$zona_d->specialties()->attach(Specialty::where('id','50')->first());
		$zona_d->specialties()->attach(Specialty::where('id','35')->first());
		$zona_d->specialties()->attach(Specialty::where('id','18')->first());
		$zona_d->specialties()->attach(Specialty::where('id','12')->first());
		$zona_d->specialties()->attach(Specialty::where('id','49')->first());
		$zona_d->specialties()->attach(Specialty::where('id','52')->first());
			
		$supervisor_a->appendNode($zona_a);
		$supervisor_a->appendNode($zona_b);
		$supervisor_b->appendNode($zona_c);
		$supervisor_b->appendNode($zona_d);
		
		$gynorec->appendNode($supervisor_a);
		$gynofem->appendNode($supervisor_b);
		
		$division_wh->appendNode($gynorec);
		$division_wh->appendNode($gynofem);
		$division_wh->appendNode($gynolab);
		
		$marketing->appendNode($division_wh);	
		$marketing->appendNode($division_pain);	
		$marketing->appendNode($division_rc);
		$marketing->appendNode($division_snc);
		$marketing->appendNode($division_cardio);
		$marketing->appendNode($division_derma);
		$marketing->appendNode($division_otc);
		$marketing->appendNode($division_generic);
		
		$promed_peru->appendNode($marketing);
	    $promed_peru->appendNode($comercial);
		
		$promed_peru->save();
    }
}