<?php

namespace Database\Seeders\Shared;

use Illuminate\Database\Seeder;
use App\Models\Shared\State;

class StatesSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// ! MX
		State::create(['created_by' => 1, 'key' => '01', 'name' => 'Aguascalientes', 'abrev' => 'Ags.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '02', 'name' => 'Baja California', 'abrev' => 'BC', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '03', 'name' => 'Baja California Sur', 'abrev' => 'BCS', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '04', 'name' => 'Campeche', 'abrev' => 'Camp.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '05', 'name' => 'Coahuila de Zaragoza', 'abrev' => 'Coah.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '06', 'name' => 'Colima', 'abrev' => 'Col.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '07', 'name' => 'Chiapas', 'abrev' => 'Chis.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '08', 'name' => 'Chihuahua', 'abrev' => 'Chih.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '09', 'name' => 'Distrito Federal', 'abrev' => 'DF', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '10', 'name' => 'Durango', 'abrev' => 'Dgo.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '11', 'name' => 'Guanajuato', 'abrev' => 'Gto.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '12', 'name' => 'Guerrero', 'abrev' => 'Gro.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '13', 'name' => 'Hidalgo', 'abrev' => 'Hgo.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '14', 'name' => 'Jalisco', 'abrev' => 'Jal.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '15', 'name' => 'México', 'abrev' => 'Mex.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '16', 'name' => 'Michoacán de Ocampo', 'abrev' => 'Mich.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '17', 'name' => 'Morelos', 'abrev' => 'Mor.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '18', 'name' => 'Nayarit', 'abrev' => 'Nay.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '19', 'name' => 'Nuevo León', 'abrev' => 'NL', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '20', 'name' => 'Oaxaca', 'abrev' => 'Oax.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '21', 'name' => 'Puebla', 'abrev' => 'Pue.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '22', 'name' => 'Querétaro', 'abrev' => 'Qro.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '23', 'name' => 'Quintana Roo', 'abrev' => 'Q. Roo', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '24', 'name' => 'San Luis Potosí', 'abrev' => 'SLP', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '25', 'name' => 'Sinaloa', 'abrev' => 'Sin.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '26', 'name' => 'Sonora', 'abrev' => 'Son.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '27', 'name' => 'Tabasco', 'abrev' => 'Tab.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '28', 'name' => 'Tamaulipas', 'abrev' => 'Tamps.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '29', 'name' => 'Tlaxcala', 'abrev' => 'Tlax.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '30', 'name' => 'Veracruz de Ignacio de la Llave', 'abrev' => 'Ver.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '31', 'name' => 'Yucatán', 'abrev' => 'Yuc.', 'country_id' => 1]);
		State::create(['created_by' => 1, 'key' => '32', 'name' => 'Zacatecas', 'abrev' => 'Zac.', 'country_id' => 1]);

		// ! USA
		State::create(['created_by' => 1, 'key' => '33', 'name' => 'Alabama', 'abrev' => 'AL.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '34', 'name' => 'Alaska', 'abrev' => 'AK.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '35', 'name' => 'Arizona', 'abrev' => 'AZ.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '36', 'name' => 'Arkansas', 'abrev' => 'AR.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '37', 'name' => 'California', 'abrev' => 'CA.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '38', 'name' => 'Carolina del Norte', 'abrev' => 'CA.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '39', 'name' => 'Carolina del Sur', 'abrev' => 'CS.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '40', 'name' => 'Colorado', 'abrev' => 'CO.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '41', 'name' => 'Connecticut', 'abrev' => 'CT.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '42', 'name' => 'Dakota del Norte', 'abrev' => 'ND.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '43', 'name' => 'Dakota del Sur', 'abrev' => 'SD.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '44', 'name' => 'Delaware', 'abrev' => 'DE.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '45', 'name' => 'Florida', 'abrev' => 'FL.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '46', 'name' => 'Georgia', 'abrev' => 'GA.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '47', 'name' => 'Hawái', 'abrev' => 'JI.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '48', 'name' => 'Idaho', 'abrev' => 'ID.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '49', 'name' => 'Illinois', 'abrev' => 'IN.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '50', 'name' => 'Indiana', 'abrev' => 'JI.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '51', 'name' => 'Iowa', 'abrev' => 'IA.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '52', 'name' => 'Kansas', 'abrev' => 'KS.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '53', 'name' => 'Kentucky', 'abrev' => 'KY.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '54', 'name' => 'Luisiana', 'abrev' => 'LA.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '55', 'name' => 'Maine', 'abrev' => 'ME.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '56', 'name' => 'Maryland', 'abrev' => 'MD.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '57', 'name' => 'Massachusetts', 'abrev' => 'MA.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '58', 'name' => 'Míchigan', 'abrev' => 'MI.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '59', 'name' => 'Minnesota', 'abrev' => 'MN.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '60', 'name' => 'Misisipi', 'abrev' => 'MS.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '61', 'name' => 'Misuri', 'abrev' => 'MO.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '62', 'name' => 'Montana', 'abrev' => 'MT.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '63', 'name' => 'Nebraska', 'abrev' => 'NE.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '64', 'name' => 'Nevada', 'abrev' => 'NV.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '65', 'name' => 'Nueva Jersey', 'abrev' => 'NJ.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '66', 'name' => 'Nueva York', 'abrev' => 'NY.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '67', 'name' => 'Nuevo México', 'abrev' => 'NM.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '68', 'name' => 'Ohio', 'abrev' => 'OH.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '69', 'name' => 'Oklahoma', 'abrev' => 'OK.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '70', 'name' => 'Oregón', 'abrev' => 'OR.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '71', 'name' => 'Pensilvania', 'abrev' => 'PA.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '72', 'name' => 'Rhode Island', 'abrev' => 'RI.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '73', 'name' => 'Tennessee', 'abrev' => 'TN.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '74', 'name' => 'Texas', 'abrev' => 'TX.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '75', 'name' => 'Utah', 'abrev' => 'UT.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '76', 'name' => 'Vermont', 'abrev' => 'VT.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '77', 'name' => 'Virginia', 'abrev' => 'VA.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '78', 'name' => 'Virginia Occidental', 'abrev' => 'WV.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '79', 'name' => 'Washington', 'abrev' => 'WA.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '80', 'name' => 'Wisconsin', 'abrev' => 'WI.', 'country_id' => 2]);
		State::create(['created_by' => 1, 'key' => '81', 'name' => 'Wyoming', 'abrev' => 'WY.', 'country_id' => 2]);

		// ! CANADA
		State::create(['created_by' => 1, 'key' => '82', 'name' => 'Ontario', 'abrev' => 'ON.', 'country_id' => 3]);
		State::create(['created_by' => 1, 'key' => '83', 'name' => 'Quebec', 'abrev' => 'QC.', 'country_id' => 3]);
		State::create(['created_by' => 1, 'key' => '84', 'name' => 'Nueva Escocia', 'abrev' => 'NS.', 'country_id' => 3]);
		State::create(['created_by' => 1, 'key' => '85', 'name' => 'Nuevo Brunswick', 'abrev' => 'NB.', 'country_id' => 3]);
		State::create(['created_by' => 1, 'key' => '86', 'name' => 'Manitoba', 'abrev' => 'MB.', 'country_id' => 3]);
		State::create(['created_by' => 1, 'key' => '87', 'name' => 'Columbia Británica', 'abrev' => 'BC.', 'country_id' => 3]);
		State::create(['created_by' => 1, 'key' => '88', 'name' => 'Isla del Príncipe Eduardo', 'abrev' => 'PE.', 'country_id' => 3]);
		State::create(['created_by' => 1, 'key' => '89', 'name' => 'Saskatchewan', 'abrev' => 'SK.', 'country_id' => 3]);
		State::create(['created_by' => 1, 'key' => '90', 'name' => 'Alberta', 'abrev' => 'AB.', 'country_id' => 3]);
		State::create(['created_by' => 1, 'key' => '91', 'name' => 'Terranova y Labrador', 'abrev' => 'NL.', 'country_id' => 3]);
		State::create(['created_by' => 1, 'key' => '92', 'name' => 'Territorios del Noroeste', 'abrev' => 'NT.', 'country_id' => 3]);
		State::create(['created_by' => 1, 'key' => '93', 'name' => 'Yukón', 'abrev' => 'YT.', 'country_id' => 3]);
		State::create(['created_by' => 1, 'key' => '94', 'name' => 'Nunavut', 'abrev' => 'UN.', 'country_id' => 3]);
	}
}