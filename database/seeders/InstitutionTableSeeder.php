<?php
namespace Database\Seeders;

use App\Models\Geo;
use App\Models\User;
use App\Models\Brick;

use App\Models\Specialty;
use App\Models\Institution;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use App\Models\InstitutionType;
use Illuminate\Support\Facades\DB;
use TarfinLabs\LaravelSpatial\Types\Point;

class InstitutionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$geo     = Geo::getCountry('PE');
		
		$hospital       = InstitutionType::where('code','HO')->first();
		$clinica        = InstitutionType::where('code','CL')->first();
		$consultorio    = InstitutionType::where('code','CO')->first();
		$farmacia       = InstitutionType::where('code','FA')->first();

		//bricks sur a san borja, surco
		$brick_1 = Brick::where('code','3917')->first();
		$brick_2 = Brick::where('code','3915')->first();
		$brick_3 = Brick::where('code','3916')->first();
	    $brick_4 = Brick::where('code','3918')->first();
		$brick_5 = Brick::where('code','3914')->first();
		$brick_6 = Brick::where('code','3909')->first();
		$brick_7 = Brick::where('code','3905')->first();
		$brick_8 = Brick::where('code','3901')->first();
		$brick_9 = Brick::where('code','3907')->first();
		$brick_10 = Brick::where('code','3908')->first();
		$brick_11 = Brick::where('code','3902')->first();
		$brick_12 = Brick::where('code','3904')->first();
		$brick_13 = Brick::where('code','3906')->first();
		$brick_14 = Brick::where('code','3900')->first();
		$brick_15 = Brick::where('code','3903')->first();
		
		//bricks sub b miraflores, san isidro
		$brick_16 = Brick::where('code','3703')->first();
		$brick_17 = Brick::where('code','3700')->first();
		$brick_18 = Brick::where('code','3705')->first();
		$brick_19 = Brick::where('code','3702')->first();
		$brick_20 = Brick::where('code','3704')->first();
		$brick_21 = Brick::where('code','3701')->first();
		$brick_22 = Brick::where('code','3706')->first();
		$brick_23 = Brick::where('code','3707')->first();
		$brick_24 = Brick::where('code','3708')->first();
		$brick_25 = Brick::where('code','3710')->first();
		$brick_26 = Brick::where('code','3709')->first();

		//bricks norte a, comas , independencia
		$brick_27 = Brick::where('code','505')->first();
		$brick_28 = Brick::where('code','503')->first();
		$brick_29 = Brick::where('code','507')->first();
		$brick_30 = Brick::where('code','506')->first();
		$brick_31 = Brick::where('code','508')->first();
		$brick_32 = Brick::where('code','504')->first();
		$brick_33 = Brick::where('code','512')->first();
		$brick_34 = Brick::where('code','510')->first();
		$brick_35 = Brick::where('code','509')->first();
		$brick_36 = Brick::where('code','511')->first();

		// TODO bricks norte b, los olivos, puente piedra

		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $hospital->id,'brick_id' => $brick_1->id,'name' => 'INSTITUTO NACIONAL DEL CORAZON','ruc' => '20131257750','code' => '004','address' => 'Jr. Coronel Zegarra 417, Jesús María 15072','location' => new Point(-12.0772252,-77.0421775,)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $hospital->id,'brick_id' => $brick_2->id,'name' => 'GERENCIA DEPARTAMENTAL PIURA','ruc' => '20131257750','code' => '005', 'address' => 'Av. Independencia S/N', 'location' => new Point(-5.2152002,-80.6272166)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $hospital->id,'brick_id' => $brick_3->id,'name' => 'GERENCIA DEPARTAMENTAL ANCASH','ruc' => '20131257750','code' => '006','address' => 'Calle Sarita Colonia S/N', 'location' => new Point(-9.493424,-77.9211563)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $hospital->id,'brick_id' => $brick_4->id,'name' => 'SEGURO SOCIAL DE SALUD-ESSALUD AREQUIPA','ruc' => '20131257750','code' => '007', 'address' => 'Esquina de Peral y Filtro S/N','location' => new Point(-16.3942008,-71.5342141)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $hospital->id,'brick_id' => $brick_5->id,'name' => 'GERENCIA DEPARTAMENTAL DE CAJAMARCA','ruc' => '20131257750','code' => '008','address' => 'Av.Mario Urteaga','location' => new Point(-7.1596125,-78.5175988)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $hospital->id,'brick_id' => $brick_6->id,'name' => 'HOSP.NAC.EDGARDO REBAGLIATI MARTINS','ruc' => '20131257750','code' => '009','address' => 'Av. Edgardo Rebagliati 490', 'location' => new Point(-12.0790898,-77.0414891)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $hospital->id,'brick_id' => $brick_7->id,'name' => 'GERENCIA DEPARTAMENTAL DE LA LIBERTAD','ruc' => '20131257750','code' => '010','address' => 'Jr. Alcides Carrión 1243','location' => new Point(-8.1145431,-79.0372922)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $hospital->id,'brick_id' => $brick_8->id,'name' => 'GERENCIA DEPARTAMENTAL ICA','ruc' => '20131257750','code' => '011','address' => 'Av. José Matias Manzanilla 652','location' => new Point(-14.0686032,-75.7368778)]);

		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $hospital->id,'brick_id' => $brick_9->id,'name' => 'INO DR. FRANCISCO CONTRERAS CAMPOS'  ,'ruc' => '20131381094','code' => '012','address' => 'Av. Tingo Maria 398','location' => new Point(-12.0514395,-77.0573715)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $hospital->id,'brick_id' => $brick_10->id,'name' => 'HOSPITAL DE EMERGENCIAS CASIMIRO ULLOA'  ,'ruc' => '20138100015','code' => '013','address' => 'Av. República de Panamá 6399','location' => new Point(-12.1281087,-77.0199252)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $hospital->id,'brick_id' => $brick_11->id,'name' => 'HOSPITAL DE EMERGENCIAS PEDIATRICAS'  ,'ruc' => '20139776403','code' => '014','address' => 'Av. Miguel Grau 854 La Victoria','location' => new Point(-12.0584282,-77.0237639)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $hospital->id,'brick_id' => $brick_12->id,'name' => 'INSTITUTO NACIONAL MATERNO PERINATAL'  ,'ruc' => '20144329148','code' => '015','address' => 'Jr. Miro Quesada 941','location' => new Point(-12.0527686,-77.0243525)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $hospital->id,'brick_id' => $brick_13->id,'name' => 'HOSPITAL REGIONAL HERMILIO VALDIZAN'  ,'ruc' => '20146038329','code' => '016','address' => 'Carr. Central 1315','location' => new Point(-12.0882725,-77.1401095)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $hospital->id,'brick_id' => $brick_14->id,'name' => 'DIRECCION REGIONAL DE SALUD HUANUCO'  ,'ruc' => '20146045881','code' => '017','address' => 'Jr. Dámaso Beraún 1017','location' => new Point(-9.9306407,-76.239004)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $hospital->id,'brick_id' => $brick_15->id,'name' => 'HOSPITAL EL CARMEN'  ,'ruc' => '20146536787','code' => '018','address' => 'Jirón Puno S/N','location' => new Point(-12.0726832,-75.2239396)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $hospital->id,'brick_id' => $brick_16->id,'name' => 'HOSPITAL NACIONAL HIPOLITO UNANUE'  ,'ruc' => '20153219118','code' => '019','address' => 'Av. Cesar Vallejo 1390','location' => new Point(-12.0410495,-76.9941906)]);
		
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $clinica->id,'name' => 'SANNA'  ,'ruc' => '20136096592','code' => '020','location' => new Point(-12.0989153,-77.0535776)]);
		
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $clinica->id,'brick_id' => $brick_17->id,'name' => 'Sanna El Golf'  ,'ruc' => '20136096592','code' => '021','address' => 'Av. Aurelio Miró Quesada 1030','location' => new Point(-12.0989153,-77.0535776)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $clinica->id,'brick_id' => $brick_18->id,'name' => 'Sanna San Borja'  ,'ruc' => '20136096592','code' => '022','address' => 'Av. Guardia Civil 337','location' => new Point(-12.0920538,-77.0105041)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $clinica->id,'brick_id' => $brick_19->id,'name' => 'Sanna Sanchez Ferrer'  ,'ruc' => '20136096592','code' => '023','address' => 'Av. Los Laureles 436','location' => new Point(-8.130031,-79.0416683)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $clinica->id,'brick_id' => $brick_20->id,'name' => 'Sanna del Sur'  ,'ruc' => '20136096592','code' => '024','address' => 'Av. Francisco Bolognesi 134, Yanahuara','location' => new Point(-16.390126,-71.5411958)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $clinica->id,'brick_id' => $brick_21->id,'name' => 'Sanna Belen'  ,'ruc' => '20136096592','code' => '025','address' => 'San Cristobal 267, Piura','location' => new Point(-5.1857482,-80.6299868)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $clinica->id,'brick_id' => $brick_22->id,'name' => 'Sanna La Molina'  ,'ruc' => '20136096592','code' => '026','address' => 'Av. Raúl Ferrero N° 1256, La Molina','location' => new Point(-12.0902268,-76.952777)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $clinica->id,'brick_id' => $brick_23->id,'name' => 'Sanna Miraflores'  ,'ruc' => '20136096592','code' => '027','address' => 'Av. Alfredo Benavides 1936, Miraflores','location' => new Point(-12.1273701,-77.0144488)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $clinica->id,'brick_id' => $brick_24->id,'name' => 'Sanna Chacarilla'  ,'ruc' => '20136096592','code' => '028','address' => 'Av. Primavera 336', 'location' => new Point(-12.111444,-76.992445)]);
		
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $consultorio->id,'brick_id' => $brick_25->id,'name' => 'Estar Bien'  ,'ruc' => '10447966838','code' => '029','address' => 'Av. Oscar R. Benavides 706, Cercado', 'location' => new Point(-12.0463934,-77.0842528)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $consultorio->id,'brick_id' => $brick_26->id,'name' => 'Salud Aqui'  ,'ruc' => '10447966839','code' => '030','address' => 'Jr. Ancash s/n, Cercado','location' => new Point(-12.0463759,-77.0842531)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $consultorio->id,'brick_id' => $brick_27->id,'name' => 'Dr. Perez Bonilla'  ,'ruc' => '10447966837','code' => '031','address' => 'Los Milanos 123 Edificio Médico Los Milanos - Consultorio 201 San Isidro', 'location' => new Point(-12.0912036,-77.0882135)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $consultorio->id,'brick_id' => $brick_28->id,'name' => 'Dra. Lucia Torrealva'  ,'ruc' => '10447966836','code' => '032','address' => 'Ca. Gral. Borgoño, Miraflores', 'location' => new Point(-12.1132145,-77.0504676)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $consultorio->id,'brick_id' => $brick_29->id,'name' => 'Cardiológico 01'  ,'ruc' => '00000000000','code' => '033','address' => 'Av. Raúl Ferrero N° 1256, Consultorio Cardio 1, segundo piso','location' => new Point(-12.0902268,-76.952777)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $consultorio->id,'brick_id' => $brick_30->id,'name' => 'Medicina Interna 01'  ,'ruc' => '00000000000','code' => '034','address' => 'Av. Raúl Ferrero N° 1256, Consultorio MI 1, primer piso', 'location' => new Point(-12.0902268,-76.952777)]);
		
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $farmacia->id,'brick_id' => $brick_31->id,'name' => 'Farmacia Buen Pastor'  ,'ruc' => '00000000000','code' => '035','address' => 'Av. Faustino Sánchez Carrión 264, Magdalena del Mar','location' => new Point(-12.1132052,-77.1029992)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $farmacia->id,'brick_id' => $brick_32->id,'name' => 'Farmacia 01 - Sanna la Molina'  ,'ruc' => '00000000000','code' => '036','address' => 'Av. Raúl Ferrero N° 1256, Farmacia primer piso','location' => new Point(-12.0902268,-76.952777)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $farmacia->id,'brick_id' => $brick_33->id,'name' => 'Farmacia 01 - Sanna SanBorja'  ,'ruc' => '00000000000','code' => '037','address' => 'Av. Guardia Civil 337, Farmacia tercer piso','location' => new Point(-12.0920538,-77.0105041)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $farmacia->id,'brick_id' => $brick_34->id,'name' => 'Farmacia 01 - Sanna El Golf'  ,'ruc' => '00000000000','code' => '038','address' => 'Av. Aurelio Miró Quesada 1030, Farmacia segundo piso','location' => new Point(-12.0989153,-77.0535776)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $farmacia->id,'brick_id' => $brick_35->id,'name' => 'Farmacia 01 - Sanna Sanchez Ferrer'  ,'ruc' => '00000000000','code' => '039','address' => 'Av. Los Laureles 436, Farmacia puerta 2 a la izquierda','location' => new Point(-8.130031,-79.0416683)]);
		Institution::create(['geo_id' => $geo->id,'institution_type_id' => $farmacia->id,'brick_id' => $brick_36->id,'name' => 'Farmacia 01 - Sanna del Sur'  ,'ruc' => '00000000000','code' => '040','address' => 'Av. Francisco Bolognesi 134, Farmacia primer piso','location' => new Point(-16.390126,-71.5411958)]);
    }
}