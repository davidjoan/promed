<?php
namespace Database\Seeders;

use App\Models\Geo;
use App\Models\User;
use App\Models\Brick;
use App\Models\Company;
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
		$company = Company::where('name','App1t')->first();
		$geo     = Geo::getCountry('PE');
		
		$filial         = OrganizationType::where('name','Filial')->first();
		$unidad_negocio = OrganizationType::where('name','Unidad de Negocio')->first();
		$division       = OrganizationType::where('name','División')->first();
		$linea          = OrganizationType::where('name','Linea')->first();
		$supervisor     = OrganizationType::where('name','Supervisor')->first();
		$zona           = OrganizationType::where('name','Zona')->first();
		$user           = User::where('id',1)->first();
		$user1          = User::where('id',2)->first();
		$user2          = User::where('id',3)->first();
		$user3          = User::where('id',4)->first();
		$user4          = User::where('id',5)->first();
		$user5          = User::where('id',6)->first();
		$user6          = User::where('id',7)->first();
		$user7          = User::where('id',8)->first();
		$user8          = User::where('id',9)->first();
		$user9          = User::where('id',10)->first();
		$user10         = User::where('id',11)->first();
		$user11         = User::where('id',12)->first();

		$abbott_peru = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,
			'user_id' => $user1->id,'organization_type_id' => $filial->id,'name' => 'App1t Perú']);
		
		$marketing   = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user1->id,'organization_type_id' => $unidad_negocio->id,'name' => 'Marketing']);
		$comercial   = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'organization_type_id' => $unidad_negocio->id,'name' => 'Comercial']);
		
		$division_wh      = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $division->id,'name' => 'Whoman Health','description' => 'ABBOTT_WH']);
		$division_pain    = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $division->id,'name' => 'Pain & Gastroenterology', 'description' => 'ABBOTT_PG']);
		$division_rc      = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $division->id,'name' => 'Respiratory Care','description' => 'ABBOTT_RC']);
		$division_snc     = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $division->id,'name' => 'SNC','description' => 'ABBOTT_SNC']);
		$division_cardio  = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $division->id,'name' => 'Cardiovascular & Endocrinology','description' => 'ABBOTT_CE']);
		$division_derma   = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $division->id,'name' => 'Dermatology','description' => 'ABBOTT_DERMA']);
		$division_otc     = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $division->id,'name' => 'Consumer Health','description' => 'ABBOTT_CH']);
		$division_generic = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user2->id,'organization_type_id' => $division->id,'name' => 'Generics','description' => 'ABBOTT_GE']);

		$gynorec = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user3->id,'organization_type_id' => $linea->id,'name' => 'Gynorec']);
		$gynofem = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user4->id,'organization_type_id' => $linea->id,'name' => 'Gynofem']);
		$gynolab = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user5->id,'organization_type_id' => $linea->id,'name' => 'Gynolab']);
		
		$supervisor_a = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user6->id,'organization_type_id' => $supervisor->id,'name' => 'Supervisor Sur']);
		$supervisor_b = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user7->id,'organization_type_id' => $supervisor->id,'name' => 'Supervisor Norte']);

		$supervisor_a->users()->attach($user6);
		$supervisor_b->users()->attach($user7);

		$zona_a = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user8->id,'organization_type_id' => $zona->id,'name' => 'Zona A Sur','selected' => true]);
		$zona_b = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user9->id,'organization_type_id' => $zona->id,'name' => 'Zona B Sur']);
		$zona_c = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user10->id,'organization_type_id' => $zona->id,'name' => 'Zona A Norte']);
		$zona_d = Organization::create(['company_id' => $company->id,'geo_id' => $geo->id,'user_id' => $user11->id,'organization_type_id' => $zona->id,'name' => 'Zona B Norte']);

		$zona_a->users()->attach($user8);
		$zona_b->users()->attach($user9);
		$zona_c->users()->attach($user10);
		$zona_d->users()->attach($user11);

		$zona_a->users()->attach($user);
		$zona_c->users()->attach($user);
		$supervisor_a->users()->attach($user);
		//bricks sur a san borja, surco
		
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
		
		$abbott_peru->appendNode($marketing);
	    $abbott_peru->appendNode($comercial);
		
		$abbott_peru->save();
    }
}