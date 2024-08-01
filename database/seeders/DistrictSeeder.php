<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = [
            'Wonokromo',
            'Wonocolo',
            'Wiyung',
            'Tenggilis Mejoyo',
            'Tegalsari',
            'Tandes',
            'Tambaksari',
            'Sukomanunggal',
            'Sukolilo',
            'Simokerto',
            'Semampir',
            'Sawahan',
            'Sambikerep',
            'Rungkut',
            'Pakal',
            'Pabean Cantian',
            'Mulyorejo',
            'Lakarsantri',
            'Krembangan',
            'Kenjeran',
            'Karang Pilang',
            'Jambangan',
            'Gunung Anyar',
            'Gubeng',
            'Genteng',
            'Gayungan',
            'Dukuh Pakis',
            'Bulak',
            'Bubutan',
            'Benowo',
            'Asemrowo',
            'Balongbendo',
            'Buduran',
            'Candi',
            'Gedangan',
            'Jabon',
            'Krembung',
            'Krian',
            'Prambon',
            'Porong',
            'Sedati',
            'Sidoarjo',
            'Sukodono',
            'Taman',
            'Tanggulangin',
            'Tarik',
            'Tulangan',
            'Waru',
            'Wonoayu'
        ];

        $jumlahKecamatan = [
            31, 18
        ];

        // Membuat array ID kabupaten/kota
        $arrayIds = [];

        // ID dimulai dari 1 untuk kabupaten Pacitan
        $id = 1;

        // Mengisi array dengan ID yang sesuai
        foreach ($jumlahKecamatan as $jumlah) {
            for ($i = 0; $i < $jumlah; $i++) {
                $arrayIds[] = $id;
            }
            $id++;
        }

        foreach ($districts as $index => $district) {
            // Pastikan $arrayIds[$index] adalah integer yang valid
            if (isset($arrayIds[$index])) {
                District::create([
                    'name' => $district,
                    'city_id' => $arrayIds[$index]
                ]);
            }
        }
    }
}
// $districts = [
//     'DONOROJO', 'PUNUNG', 'PRINGKUKU', 'PACITAN', 'KEBONAGUNG', 'ARJOSARI', 'NAWANGAN',
//     'BANDAR', 'TEGALOMBO', 'TULAKAN', 'NGADIROJO', 'SUDIMORO', 'NGRAYUN', 'SLAHUNG', 'BUNGKAL',
//     'SAMBIT', 'SAWOO', 'SOOKO', 'PUDAK', 'PULUNG', 'MLARAK', 'SIMAN', 'JETIS', 'BALONG', 'KAUMAN',
//     'JAMBON', 'BADEGAN', 'SAMPUNG', 'SUKOREJO', 'PONOROGO', 'BABADAN', 'JENANGAN', 'NGEBEL',
//     'PANGGUL', 'MUNJUNGAN', 'WATULIMO', 'KAMPAK', 'DONGKO', 'PULE', 'KARANGAN', 'SURUH',
//     'GANDUSARI', 'DURENAN', 'POGALAN', 'TRENGGALEK', 'TUGU', 'BENDUNGAN', 'BESUKI', 'BANDUNG',
//     'PAKEL', 'CAMPUR DARAT', 'TANGGUNG GUNUNG', 'KALIDAWIR', 'PUCANG LABAN', 'REJOTANGAN',
//     'NGUNUT', 'SUMBERGEMPOL', 'BOYOLANGU', 'TULUNGAGUNG', 'KEDUNGWARU', 'NGANTRU', 'KARANGREJO',
//     'KAUMAN', 'GONDANG', 'PAGER WOJO', 'SENDANG', 'BAKUNG', 'WONOTIRTO', 'PANGGUNGREJO', 'WATES',
//     'BINANGUN', 'SUTOJAYAN', 'KADEMANGAN', 'KANIGORO', 'TALUN', 'SELOPURO', 'KESAMBEN', 'SELOREJO',
//     'DOKO', 'WLINGI', 'GANDUSARI', 'GARUM', 'NGLEGOK', 'SANANKULON', 'PONGGOK', 'SRENGAT',
//     'WONODADI', 'UDANAWU', 'MOJO', 'SEMEN', 'NGADILUWIH', 'KRAS', 'RINGINREJO', 'KANDAT', 'WATES',
//     'NGANCAR', 'PLOSOKLATEN', 'GURAH', 'PUNCU', 'KEPUNG', 'KANDANGAN', 'PARE', 'BADAS', 'KUNJANG',
//     'PLEMAHAN', 'PURWOASRI', 'PAPAR', 'PAGU', 'KAYEN KIDUL', 'GAMPENGREJO', 'NGASEM', 'BANYAKAN',
//     'GROGOL', 'TAROKAN', 'DONOMULYO', 'KALIPARE', 'PAGAK', 'BANTUR', 'GEDANGAN', 'SUMBERMANJING',
//     'DAMPIT', 'TIRTO YUDO', 'AMPELGADING', 'PONCOKUSUMO', 'WAJAK', 'TUREN', 'BULULAWANG',
//     'GONDANGLEGI', 'PAGELARAN', 'KEPANJEN', 'SUMBER PUCUNG', 'KROMENGAN', 'NGAJUM', 'WONOSARI',
//     'WAGIR', 'PAKISAJI', 'TAJINAN', 'TUMPANG', 'PAKIS', 'JABUNG', 'LAWANG', 'SINGOSARI',
//     'KARANGPLOSO', 'DAU', 'PUJON', 'NGANTANG', 'KASEMBON', 'TEMPURSARI', 'PRONOJIWO', 'CANDIPURO',
//     'PASIRIAN', 'TEMPEH', 'LUMAJANG', 'SUMBERSUKO', 'TEKUNG', 'KUNIR', 'YOSOWILANGUN',
//     'ROWOKANGKUNG', 'JATIROTO', 'RANDUAGUNG', 'SUKODONO', 'PADANG', 'PASRUJAMBE', 'SENDURO',
//     'GUCIALIT', 'KEDUNGJAJANG', 'KLAKAH', 'RANUYOSO', 'KENCONG', 'GUMUK MAS', 'PUGER', 'WULUHAN',
//     'AMBULU', 'TEMPUREJO', 'SILO', 'MAYANG', 'MUMBULSARI', 'JENGGAWAH', 'AJUNG', 'RAMBIPUJI',
//     'BALUNG', 'UMBULSARI', 'SEMBORO', 'JOMBANG', 'SUMBER BARU', 'TANGGUL', 'BANGSALSARI', 'PANTI',
//     'SUKORAMBI', 'ARJASA', 'PAKUSARI', 'KALISAT', 'LEDOKOMBO', 'SUMBERJAMBE', 'SUKOWONO', 'JELBUK',
//     'KALIWATES', 'SUMBERSARI', 'PATRANG', 'PESANGGARAN', 'SILIRAGUNG', 'BANGOREJO', 'PURWOHARJO',
//     'TEGALDLIMO', 'MUNCAR', 'CLURING', 'GAMBIRAN', 'TEGALSARI', 'GLENMORE', 'KALIBARU', 'GENTENG',
//     'SRONO', 'ROGOJAMPI', 'BLIMBINGSARI', 'KABAT', 'SINGOJURUH', 'SEMPU', 'SONGGON', 'GLAGAH',
//     'LICIN', 'BANYUWANGI', 'GIRI', 'KALIPURO', 'WONGSOREJO', 'MAESAN', 'GRUJUGAN', 'TAMANAN',
//     'JAMBESARI DARUS SHOLAH', 'PUJER', 'TLOGOSARI', 'SUKOSARI', 'SUMBER WRINGIN', 'TAPEN',
//     'WONOSARI', 'TENGGARANG', 'BONDOWOSO', 'CURAH DAMI', 'BINAKAL', 'PAKEM', 'WRINGIN',
//     'TEGALAMPEL', 'TAMAN KROCOK', 'KLABANG', 'IJEN', 'BOTOLINGGO', 'PRAJEKAN', 'CERMEE',
//     'SUMBERMALANG', 'JATIBANTENG', 'BANYUGLUGUR', 'BESUKI', 'SUBOH', 'MLANDINGAN', 'BUNGATAN',
//     'KENDIT', 'PANARUKAN', 'SITUBONDO', 'MANGARAN', 'PANJI', 'KAPONGAN', 'ARJASA', 'JANGKAR',
//     'ASEMBAGUS', 'BANYUPUTIH', 'SUKAPURA', 'SUMBER', 'KURIPAN', 'BANTARAN', 'LECES', 'TEGALSIWALAN',
//     'BANYUANYAR', 'TIRIS', 'KRUCIL', 'GADING', 'PAKUNIRAN', 'KOTAANYAR', 'PAITON', 'BESUK',
//     'KRAKSAAN', 'KREJENGAN', 'PAJARAKAN', 'MARON', 'GENDING', 'DRINGU', 'WONOMERTO', 'LUMBANG',
//     'TONGAS', 'SUMBERASIH', 'PURWODADI', 'TUTUR', 'PUSPO', 'TOSARI', 'LUMBANG', 'PASREPAN',
//     'KEJAYAN', 'WONOREJO', 'PURWOSARI', 'PRIGEN', 'SUKOREJO', 'PANDAAN', 'GEMPOL', 'BEJI', 'BANGIL',
//     'REMBANG', 'KRATON', 'POHJENTREK', 'GONDANG WETAN', 'REJOSO', 'WINONGAN', 'GRATI', 'LEKOK',
//     'NGULING', 'TARIK', 'PRAMBON', 'KREMBUNG', 'PORONG', 'JABON', 'TANGGULANGIN', 'CANDI',
//     'TULANGAN', 'WONOAYU', 'SUKODONO', 'SIDOARJO', 'BUDURAN', 'SEDATI', 'WARU', 'GEDANGAN', 'TAMAN',
//     'KRIAN', 'BALONG BENDO', 'JATIREJO', 'GONDANG', 'PACET', 'TRAWAS', 'NGORO', 'PUNGGING',
//     'KUTOREJO', 'MOJOSARI', 'BANGSAL', 'MOJOANYAR', 'DLANGGU', 'PURI', 'TROWULAN', 'SOOKO', 'GEDEK',
//     'KEMLAGI', 'JETIS', 'DAWAR BLANDONG', 'BANDAR KEDUNG MULYO', 'PERAK', 'GUDO', 'DIWEK', 'NGORO',
//     'MOJOWARNO', 'BARENG', 'WONOSALAM', 'MOJOAGUNG', 'SUMOBITO', 'JOGO ROTO', 'PETERONGAN',
//     'JOMBANG', 'MEGALUH', 'TEMBELANG', 'KESAMBEN', 'KUDU', 'NGUSIKAN', 'PLOSO', 'KABUH', 'PLANDAAN',
//     'SAWAHAN', 'NGETOS', 'BERBEK', 'LOCERET', 'PACE', 'TANJUNGANOM', 'PRAMBON', 'NGRONGGOT',
//     'KERTOSONO', 'PATIANROWO', 'BARON', 'GONDANG', 'SUKOMORO', 'NGANJUK', 'BAGOR', 'WILANGAN',
//     'REJOSO', 'NGLUYU', 'LENGKONG', 'JATIKALEN', 'KEBONSARI', 'GEGER', 'DOLOPO', 'DAGANGAN',
//     'WUNGU', 'KARE', 'GEMARANG', 'SARADAN', 'PILANGKENCENG', 'MEJAYAN', 'WONOASRI', 'BALEREJO',
//     'MADIUN', 'SAWAHAN', 'JIWAN', 'PONCOL', 'PARANG', 'LEMBEYAN', 'TAKERAN', 'NGUNTORONADI',
//     'KAWEDANAN', 'MAGETAN', 'NGARIBOYO', 'PLAOSAN', 'SIDOREJO', 'PANEKAN', 'SUKOMORO', 'BENDO',
//     'MAOSPATI', 'KARANGREJO', 'KARAS', 'BARAT', 'KARTOHARJO', 'SINE', 'NGRAMBE', 'JOGOROGO',
//     'KENDAL', 'GENENG', 'GERIH', 'KWADUNGAN', 'PANGKUR', 'KARANGJATI', 'BRINGIN', 'PADAS',
//     'KASREMAN', 'NGAWI', 'PARON', 'KEDUNGGALAR', 'PITU', 'WIDODAREN', 'MANTINGAN', 'KARANGANYAR',
//     'MARGOMULYO', 'NGRAHO', 'TAMBAKREJO', 'NGAMBON', 'SEKAR', 'BUBULAN', 'GONDANG', 'TEMAYANG',
//     'SUGIHWARAS', 'KEDUNGADEM', 'KEPOH BARU', 'BAURENO', 'KANOR', 'SUMBEREJO', 'BALEN', 'SUKOSEWU',
//     'KAPAS', 'BOJONEGORO', 'TRUCUK', 'DANDER', 'NGASEM', 'GAYAM', 'KALITIDU', 'MALO', 'PURWOSARI',
//     'PADANGAN', 'KASIMAN', 'KEDEWAN', 'KENDURUAN', 'BANGILAN', 'SENORI', 'SINGGAHAN', 'MONTONG',
//     'PARENGAN', 'SOKO', 'RENGEL', 'GRABAGAN', 'PLUMPANG', 'WIDANG', 'PALANG', 'SEMANDING', 'TUBAN',
//     'JENU', 'MERAKURAK', 'KEREK', 'TAMBAKBOYO', 'JATIROGO', 'BANCAR', 'SUKORAME', 'BLULUK',
//     'NGIMBANG', 'SAMBENG', 'MANTUP', 'KEMBANGBAHU', 'SUGIO', 'KEDUNGPRING', 'MODO', 'BABAT',
//     'PUCUK', 'SUKODADI', 'LAMONGAN', 'TIKUNG', 'SARIREJO', 'DEKET', 'GLAGAH', 'KARANGBINANGUN',
//     'TURI', 'KALITENGAH', 'KARANG GENENG', 'SEKARAN', 'MADURAN', 'LAREN', 'SOLOKURO', 'PACIRAN',
//     'BRONDONG', 'WRINGINANOM', 'DRIYOREJO', 'KEDAMEAN', 'MENGANTI', 'CERME', 'BENJENG',
//     'BALONGPANGGANG', 'DUDUKSAMPEYAN', 'KEBOMAS', 'GRESIK', 'MANYAR', 'BUNGAH', 'SIDAYU', 'DUKUN',
//     'PANCENG', 'UJUNGPANGKAH', 'SANGKAPURA', 'TAMBAK', 'KAMAL', 'LABANG', 'KWANYAR', 'MODUNG',
//     'BLEGA', 'KONANG', 'GALIS', 'TANAH MERAH', 'TRAGAH', 'SOCAH', 'BANGKALAN', 'BURNEH', 'AROSBAYA',
//     'GEGER', 'KOKOP', 'TANJUNGBUMI', 'SEPULU', 'KLAMPIS', 'SRESEH', 'TORJUN', 'PANGARENGAN', 'SAMPANG',
//     'CAMPLONG', 'OMBEN', 'KEDUNGDUNG', 'JRENGIK', 'TAMBELANGAN', 'BANYUATES', 'ROBATAL', 'KARANG PENANG',
//     'KETAPANG', 'SOKOBANAH', 'TLANAKAN', 'PADEMAWU', 'GALIS', 'LARANGAN', 'PAMEKASAN', 'PROPPO',
//     'PALENGAAN', 'PEGANTENAN', 'KADUR', 'PAKONG', 'WARU', 'BATU MARMAR', 'PASEAN', 'PRAGAAN',
//     'BLUTO', 'SARONGGI', 'GILIGENTENG', 'TALANGO', 'KALIANGET', 'KOTA SUMENEP', 'BATUAN', 'LENTENG',
//     'GANDING', 'GULUK GULUK', 'PASONGSONGAN', 'AMBUNTEN', 'RUBARU', 'DASUK', 'MANDING', 'BATUPUTIH',
//     'GAPURA', 'BATANG BATANG', 'DUNGKEK', 'NONGGUNONG', 'GAYAM', 'RAAS', 'SAPEKEN', 'ARJASA',
//     'KANGAYAN', 'MASALEMBU', 'MOJOROTO', 'KOTA KEDIRI', 'PESANTREN', 'SUKOREJO', 'KEPANJENKIDUL',
//     'SANANWETAN', 'KEDUNGKANDANG', 'SUKUN', 'KLOJEN', 'BLIMBING', 'LOWOKWARU', 'KADEMANGAN',
//     'KEDOPOK', 'WONOASIH', 'MAYANGAN', 'KANIGARAN', 'GADINGREJO', 'PURWOREJO', 'BUGULKIDUL',
//     'PANGGUNGREJO', 'PRAJURIT KULON', 'MAGERSARI', 'KRANGGAN', 'MANGU HARJO', 'TAMAN', 'KARTOHARJO',
//     'KARANG PILANG', 'JAMBANGAN', 'GAYUNGAN', 'WONOCOLO', 'TENGGILIS MEJOYO', 'GUNUNG ANYAR',
//     'RUNGKUT', 'SUKOLILO', 'MULYOREJO', 'GUBENG', 'WONOKROMO', 'DUKUH PAKIS', 'WIYUNG',
//     'LAKARSANTRI', 'SAMBIKEREP', 'TANDES', 'SUKO MANUNGGAL', 'SAWAHAN', 'TEGALSARI', 'GENTENG',
//     'TAMBAKSARI', 'KENJERAN', 'BULAK', 'SIMOKERTO', 'SEMAMPIR', 'PABEAN CANTIAN', 'BUBUTAN',
//     'KREMBANGAN', 'ASEMROWO', 'BENOWO', 'PAKAL', 'BATU', 'JUNREJO', 'BUMIAJI'
// ];

// $jumlahKecamatan = [
//     // Kabupaten
//     12, 21, 14, 19, 14, 26, 33, 21, 31, 25, 24, 17, 24, 24, 18, 18, 21, 20, 18, 18, 19, 28, 20, 27, 18, 18, 14, 13, 27,
//     // Kota
//     4, 3, 5, 4, 3, 4, 7, 31, 4
// ];