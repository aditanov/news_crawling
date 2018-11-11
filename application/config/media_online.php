<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$config['media'] = [
                     'kompas' => [
                          'tag_link'         => ['href="http://nasional.kompas.com/read'],
                          'delete_link'      => 'href="',
                          'end_link'         => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'kompas-megapolitan' => [
                          'tag_link'         => ['href="http://megapolitan.kompas.com/read'],
                          'delete_link'      => 'href="',
                          'end_link'         => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'kompas-regional' => [
                          'tag_link'         => ['href="http://regional.kompas.com/read'],
                          'delete_link'      => 'href="',
                          'end_link'         => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'jawapos' => [
                          'tag_link'    => ['href="http://www.jawapos.com/read/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'rmol' => [
                          'tag_link'    => ['href="http://nusantara.rmol.co/read/','href="http://politik.rmol.co/read/','href="http://hukum.rmol.co/read/',
                                          'href="http://keamanan.rmol.co/read/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'koransindo' => [
                          'tag_link'    => ['href="news.php?r'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'awalan_link' => 'http://koran-sindo.com/',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_K'
                     ],
                     'malutpos' => [
                          'tag_link'   => ['href="/en/nasional/item/','href="/en/pro-public/item/','href="/en/daerah/halteng/item/',
                                            'href="/en/daerah/kota-ternate/item/', 'href="/en/daerah/tidore-kepulauan/item/',
                                            'href="/en/daerah/halbar/item/','href="/en/daerah/halut/item/','href="/en/daerah/halsel/item/',
                                            'href="/en/daerah/haltim/item/','href="/en/daerah/kepulauan-sula/item/',
                                            'href="/en/daerah/morotai/item/','href="/en/ekonomi/item/'],
                         'delete_link' => 'href="',
                         'end_link'    => '"',
                         'awalan_link' => 'http://portal.malutpost.co.id',
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'radarbojonegoro' => [
                          'tag_link'    => ['href="http://radarbojonegoro.jawapos.com/read/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'radarsorong' => [
                          'tag_link'    => ['href="http://www.radarsorong.com/read/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'analisa' => [
                          'tag_link'    => ['href="http://news.analisadaily.com/read/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_L'
                     ],
                     'harianandalas' => [
                          'tag_link'    => ['href="/kanal-sumatera-utara/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'awalan_link' => 'http://harianandalas.com'
                     ],
                     'bantenraya' => [
                          'tag_link'    => ['href="/utama/nasional/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'awalan_link' => 'http://bantenraya.com',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_F'
                     ],
                     'bolavaganza' => [
                          'tag_link'    => ['href="http://www.juara.net/read/sepak-bola/indonesia/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_F'
                     ],
                     'detakjakarta' => [
                          'tag_link'    => ['href=berita-'],
                          'delete_link' => 'href=',
                          'end_link'    => ' ',
                          'awalan_link' => 'http://detakjakarta.com/',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_I'
                     ],
                     'elshinta' => [
                          'tag_link'    => ['href="https://elshinta.com/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_M'
                     ],
                     'gatra' => [
                          'tag_link'    => ['href="/nusantara/nasional/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'awalan_link' => 'http://www.gatra.com'
                     ],
                     'goaceh' => [
                          'tag_link'    => ['href="/berita/baca/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'awalan_link' => 'https://www.goaceh.co'
                     ],
                     'jatimpos' => [
                          'tag_link'    => ['href="/en/nasional/','href="/en/surboyo/', 'href="/en/gubernuran/', 'href="/en/dewan/',
                                            'href="/en/jatim/', 'href="/en/pendidikan/', 'href="/en/hukum/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'awalan_link' => 'http://www.jatimpos.co',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_F'
                     ],
                     'arah' => [
                          'tag_link'    => ['href="/article/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'awalan_link' => 'http://www.arah.com'
                     ],
                     'balikpapantv' => [
                          'tag_link'    => ['href="http://btv.prokal.co/read/news/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_F'
                     ],
                     'jurnalnasional' => [
                          'tag_link'    => ['href="'],
                          'delete_link' => 'href="',
                          'end_link'    => '"'
                     ],
                     'jurnalparlemen' => [
                          'tag_link'    => ['href="http://www.jurnalparlemen.com/view/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'kabarbanten' => [
                          'tag_link'    => ['href="http://www.kabar-banten.com/site/index/halaman-utama/','href="http://www.kabar-banten.com/site/index/cilegon/',
                                            'href="http://www.kabar-banten.com/site/index/serang/', 'href="http://www.kabar-banten.com/site/index/pandeglang/',
                                            'href="http://www.kabar-banten.com/site/index/lebak/', 'href="http://www.kabar-banten.com/site/index/tanggerang/',
                                            'href="http://www.kabar-banten.com/site/index/pendidikan/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"'
                     ],
                     'kbr' => [
                          'tag_link'    => ['href="http://kbr.id/berita/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"'
                     ],
                     'koranrakyat' => [
                          'tag_link'    => ['href="/index.php/nasional/item/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'awalan_link' => 'http://www.koranrakyat.com',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_F'
                     ],
                     'metrojambi' => [
                          'tag_link'    => ['href="http://metrojambi.com/read/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'modusaceh' => [
                          'tag_link'    => ['href="http://www.modusaceh.co/news/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"'
                     ],
                     'nusabali' => [
                          'tag_link'    => ['href="http://www.nusabali.com/berita/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'papuaposnabire' => [
                          'tag_link'         => ['href="/index.php/nabire/'],
                          'delete_link'      => 'href="',
                          'end_link'         => '"',
                          'awalan_link'      => 'http://www.papuaposnabire.com',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_F'
                     ],
                     'radarbandung' => [
                          'tag_link'    => ['href="http://radarbandung.id/index.php/detail/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'radarbangka' => [
                          'tag_link'    => ['href="http://www.radarbangka.co.id/berita/detail/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"'
                     ],
                     'radarmadura' => [
                          'tag_link'    => ['href="http://radarmadura.jawapos.com/read/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'radarsolo' => [
                          'tag_link'    => ['href="http://radarsolo.jawapos.com/read/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'radarsurabaya' => [
                          'tag_link'    => ['href="http://radarsurabaya.jawapos.com/read/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'radartegal' => [
                          'tag_link'    => ['href="/berita-lokal/','href="/berita-nasional/',
                                            'href="/berita-kriminal/', 'href="/berita-ekonomi/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'awalan_link' => 'http://radartegal.com',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_P'
                     ],
                     'radartulungagungjawapos' => [
                          'tag_link'    => ['href="http://radartulungagung.jawapos.com/read/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'riaugreen' => [
                          'tag_link'    => ['href="http://riaugreen.com/view/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'sinarindonesiabaru' => [
                          'tag_link'    => ['href="http://hariansib.co/view/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'sinartani' => [
                          'tag_link'    => ['href="read-detail/read/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'awalan_link' => 'http://tabloidsinartani.com/'
                     ],
                     'sorotkeadilan' => [
                          'tag_link'    => ['href="http://sorotkeadilan.com/index.php/home?pg=nasional&id='],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_Q'
                     ],
                     'suarakarya' => [
                          'tag_link'         => ['href="http://www.suarakarya.id/detail/'],
                          'delete_link'      => 'href="',
                          'end_link'         => '"',
                          'id_berita_via'    => 'guid',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'sumbarsatu' => [
                          'tag_link'    => ['href="http://www.sumbarsatu.com/berita/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_F'
                     ],
                     'sumbawabaratpos' => [
                          'tag_link'    => ['href="http://sumbawabaratnews.com/?p='],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_G'

                     ],
                     'swaramanado' => [
                          'tag_link'    => ['href="http://swaramanadonews.com/?p='],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_G'
                     ],
                     'wartasumatera' => [
                          'tag_link'    => ['href="http://wartasumatera.com/web/berita_umum/detail/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_H'
                     ],
                     'wartabuana' => [
                          'tag_link'    => ['href="detail.php?id='],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'awalan_link' => 'http://wartabuana.com/'
                     ],
                     'buserkriminal' => [
                          'tag_link'    => ['href="http://buserkriminal.com/?p='],
                          'delete_link' => 'href="',
                          'end_link'    => '"'
                     ],
                     'lomboksatu' => [
                          'tag_link'    => ['href="/index.php/kabarkita/'],
                          'delete_link' => 'href="',
                          'end_link'    => '"',
                          'awalan_link' => 'http://www.lomboksatu.com',
                          'id_berita_via'    => 'link',
                          'id_berita_method' => 'id_berita_method_F'
                     ],
                     'detik' => [
                          'replace_awalan_link' => [
                                                    'find'    => 'm.',
                                                    'replace' => 'news.'
                                                  ],
                          'id_berita_via'       => 'link',
                          'id_berita_method'    => 'id_berita_method_H'
                     ],
                     'siantar24jam' => [
                          'awalan_link' => 'http://news.metro24jam.com/',
                          'id_berita_via'    => 'guid',
                          'id_berita_method' => 'id_berita_method_G'
                     ],
                     'okezone' => [
                          'id_berita_via'    => 'guid',
                          'id_berita_method' => 'id_berita_method_A'
                     ],
                     'korankaltara' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'antaranews' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'liputan6' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'antarasulsel' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'antarabali' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'antaragorontalo' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'antarajatim' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'antarakalbar' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'antarasulteng' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'antarasultra' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'antarayogya' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'beritajatim' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'bisnisindonesia' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'bisnissurabaya' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'covesia' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'faktakaltara' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'gagasanriau' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'harianhaluan' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'jitunews' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'jitunews' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'metrotv' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_B'
                     ],
                     'sindonews' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_B'
                     ],
                     'seputarpelalawan' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_C'
                     ],
                     'pikiranrakyat'  => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_D'
                     ],
                     'indopos'  => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_D'
                     ],
                     'rimanews' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_D'
                     ],
                     'tirto'  => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_E'
                     ],
                     'republika' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'viva' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'kaltengpos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'koranrepublika' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'beritasatu' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'globalsulut' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'kaltarapos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'papuapos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'riaupos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'batampos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'butonpos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'korankaltim' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'ambonexpres' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'metrosiantar' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'paluexpress'  => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radargorontalo' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'beritamanado' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarmojokerto' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'timikaexpres' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radartulungagung' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'rakyatsultra' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'rakyatsulsel' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'sumutpos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'timorexpres' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'harianpapua' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'waspada' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'acehvideo' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'advokat_indonesia' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'agro_indonesia' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'agungpost' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'akselerasi' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'amunisinews' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'angkasa' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'assajidin' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'aspirasinews' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'bandungexpress' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'belitongekspres' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'bengkuluekspres' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'berandanusantara' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'beritainvestigasinasional' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'beritakotakendari' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'beritakotamakasar' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'beritapagi' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'beritasore' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'beritalima' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'beritamadiun' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'beritatotabuan' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'bhineka' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'bhirawa' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'bidiknasional' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'bimaekspres' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'buanaindonesia' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'buanapos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'budayabangsa' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'bumntrack' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'bunaken' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'cahayapapua' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'cahayasiang' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'cakranusantara' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'cakrawala' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'cirebontrust' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'citrabhayangkara' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'citymagz' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'corongrakyat' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'csrindonesia' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'cybersulut' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'detak' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'difatvsku' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'djakalodang' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'dutaonline' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'energynusantara' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'expontt' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'fajar' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'fajarbanten' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'fajarpendidikan' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'floresbangkit' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'fokusntt' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'forumkeadilan' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'forumnusantara' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'gaungaman' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'gaungntb' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'gemawonogiri' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'geoenergy' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'gerbangbanten' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'globalsehat' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'gomanado' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'gorontaloonline' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'harapanrakyat' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'harianjogja' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'harianpilar' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'harianmercusuar' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'hidup' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'housingestate' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'independennews' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'indonesiamaritime' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'infobank' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'infobogor' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'infoindonesia'=> [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'infobanua' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'infojambi' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'jagadpos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'jambiindependent' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'jawapes' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'jembataninformasi' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'jonglosemar' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'jokowinomic' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'jurnalasia' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'jurnalindependent' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'jatengpos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'kabardesa' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'kabarnusantara'  => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'kabarpriangan' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'kabarjombang' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'kabarone' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'kalimantanpos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'kavling10' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'kawanuapos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'kawanuatv' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'kediripost' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'kendaripos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'kolakapos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'kompasindo' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'koranbabel' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'koranbanten' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'koranfakta' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'koranjatim' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'koranmemo' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'koranmuria' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'koranperangikorupsi' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'koranpadang' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'koranriau' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'koransawala' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'koransolo'  => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'kriminalitas' => [
                         'id_berita_via'    => 'id',
                         'id_berita_method' => 'id_berita_method_S'
                     ],
                     'kupasbengkulu' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'lensaindonesia' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'lensapos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'lensantt' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'lenteraindonesia' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'likurai' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'lintaspena'  => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'lintasmedan'  => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'lintasntt' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'liputanhukum' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'lombokpos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'malutnews' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'mamujupos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'manadoaktual' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'lomboktoday' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'manadoline' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'manadoterkini' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'manadotoday' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'maritimnews' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'marwahkepri' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'matapublik' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'matarakyat' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'mediabhayangkara' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'mediamerdeka' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'mediapembaruan' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'mediapendidikan' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'mediarakyat' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'mediarakyatnurantara' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'mediamanado'=> [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'mediantt' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'memotimur' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'metrobali' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'metrotabagsel' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'metropolitan' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'metropolitanpos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'mimbarrakyat' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'mitrana' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'mysultra' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'newtapanuli' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'newshunter' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'newsmetropol' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarjatim' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'ntbterkini' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'nttnews' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'nttonline' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'nttsatu' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'ntttekini' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'nusantaranews' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'nusantarapos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'okuekspres' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'oposisi' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'padangekspo' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'padangmedia' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'pagaralampos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'palembangekspres' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'palembangpos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'palopopos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'parepos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'pedomannews' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'pedulirakyat' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'pekanbarupos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'pelitarakyat' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'pikiranmerdeka' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'pilarsulut' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'poroslampung' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'portibi' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'posbali' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'poskota' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'posmetropadang' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'prorakyat' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarpalembang' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarbone' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarbromo' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radargarut' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarjogja' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarlamsel' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarmalang' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarpekalongan' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarselatan' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarsemarang' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarsukabumi' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarsulbar' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarlampung' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radartimika' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'rajawali' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'rakyatbengkulu' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'rakyatbicara' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'rakyatlampung' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'rakyatmaluku' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'rakyatmedia' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'rakyatpos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'rakyatkita' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'reaksibekasi' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'realitamasyarakat' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'savanaparadise' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'seputarntbmataram' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'seputarsumsel' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'seputarntt' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'sergapntt' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'sidiknusantara' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'simantab' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'seputarsulut' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'singgalangpos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'sinyal' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'skucorongrakyat' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'solopos' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'speednewsmanado' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'suarabali' => [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'suaraindonesianews'=> [
                         'id_berita_via'    => 'guid',
                         'id_berita_method' => 'id_berita_method_G'
                     ],
                     'antarafoto' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'chip' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'jurnalmanado' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'metrolangkat' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'monitorday' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'radartasikmalaya' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_A'
                     ],
                     'cnnindonesia' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_H'
                     ],
                     'balikpapanpos' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'bontangpos' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'borneonews' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'kaltimpos' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'radarsampit' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'radartarakan' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'radarbanjarmasin' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'samarinapos' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'jambiekspres' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_F'
                     ],
                     'portalsatu' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_J'
                     ],
                     'batamtoday' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_K'
                     ],
                     'bandarlampungnews' => [
                         'id_berita_via'    => 'link',
                         'id_berita_method' => 'id_berita_method_N'
                     ],
                     'merdeka' => [
                         'id_berita_via'    => 'image',
                         'id_berita_method' => 'id_berita_method_H'
                     ],
                     'tribun' => [
                        'id_berita_via'    => 'image',
                        'id_berita_method' => 'id_berita_method_R'
                     ],
                     'bangkapos' => [
                        'id_berita_via'    => 'image',
                        'id_berita_method' => 'id_berita_method_R'
                     ],
                     'kupangpos' => [
                        'id_berita_via'    => 'image',
                        'id_berita_method' => 'id_berita_method_R'
                     ],
                     'serambiindonesia' => [
                        'id_berita_via'    => 'image',
                        'id_berita_method' => 'id_berita_method_R'
                     ],
                     'balipos' => [
                        'id_berita_via'    => 'guid',
                        'id_berita_method' => 'id_berita_method_G'
                     ],
                     'surabayatribun' => [
                        'id_berita_via'    => 'image',
                        'id_berita_method' => 'id_berita_method_R'
                     ],
                     'balitribun' => [
                        'id_berita_via'    => 'image',
                        'id_berita_method' => 'id_berita_method_R'
                     ],
                     'banjarmasinpos'=> [
                        'id_berita_via'    => 'image',
                        'id_berita_method' => 'id_berita_method_R'
                     ],
                     'beritasore' => [
                        'id_berita_via'    => 'guid',
                        'id_berita_method' => 'id_berita_method_G'
                     ],
                     'bintannews'=> [
                        'id_berita_via'    => 'image',
                        'id_berita_method' => 'id_berita_method_R'
                     ],
                     'dutaselaparan' => [
                        'id_berita_via'    => 'guid',
                        'id_berita_method' => 'id_berita_method_G'
                     ],
                     'gebrak' => [
                        'id_berita_via'    => 'guid',
                        'id_berita_method' => 'id_berita_method_G'
                     ],
                     'inilah' => [
                        'id_berita_via'    => 'guid',
                        'id_berita_method' => 'id_berita_method_C'
                     ],
                     'kabarcirebon' => [
                        'id_berita_via'    => 'guid',
                        'id_berita_method' => 'id_berita_method_G'
                     ],
                     'kabar24' => [
                        'id_berita_via'    => 'guid',
                        'id_berita_method' => 'id_berita_method_A'
                     ],
                     'kaltimweekly' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_F'
                     ],
                     'mediamalang' => [
                        'id_berita_via'    => 'guid',
                        'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarbanyumas' => [
                        'id_berita_via'    => 'guid',
                        'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarbanten' => [
                        'id_berita_via'    => 'guid',
                        'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarbengkulu' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'radarindonesia' => [
                        'id_berita_via'    => 'guid',
                        'id_berita_method' => 'id_berita_method_G'
                     ],
                     'suarakalteng' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'suarakita' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'suarakumandang' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'suaramandiripos' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_F'
                     ],
                     'suaramedianasional' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'suaramerdeka' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_A'
                     ],
                     'suarantb' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'suarareformasi' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'suarasurabaya' => [
                       'id_berita_via'    => 'link',
                       'id_berita_method' => 'id_berita_method_F'
                     ],
                     'suarakendari' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'sukabumipos' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'sumajaku' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'sumateradeadline' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'sumbarpos' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'sumbernews' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'sumselpos' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'surabayapos' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'tangkasnews' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'terasbanten' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'terasntt' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'terbittop' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'terkuak' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'timesindonesia' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_H'
                     ],
                     'topiksulut' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'totabuan' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'transbogor' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_M'
                     ],
                     'translampung' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'transparansiindonesia' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'tribunjambi' => [
                       'id_berita_via'    => 'image',
                       'id_berita_method' => 'id_berita_method_R'
                     ],
                     'tribunpekanbaru' => [
                       'id_berita_via'    => 'image',
                       'id_berita_method' => 'id_berita_method_R'
                     ],
                     'tribunpontianak' => [
                       'id_berita_via'    => 'image',
                       'id_berita_method' => 'id_berita_method_R'
                     ],
                     'tribunsumsel' =>  [
                       'id_berita_via'    => 'image',
                       'id_berita_method' => 'id_berita_method_R'
                     ],
                     'tribunmakasar' =>  [
                       'id_berita_via'    => 'image',
                       'id_berita_method' => 'id_berita_method_R'
                     ],
                     'wartakota' =>  [
                       'id_berita_via'    => 'image',
                       'id_berita_method' => 'id_berita_method_R'
                     ],
                     'wartamerdeka' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'wartapriangan' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'wartapos' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'zonalinenews' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'detakbanten' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_F'
                     ],
                     'bekasiexpres' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'tempo' => [
                       'id_berita_via'    => 'link',
                       'id_berita_method' => 'id_berita_method_A'
                     ],
                     'antarakalsel' => [
                       'id_berita_via'    => 'link',
                       'id_berita_method' => 'id_berita_method_A'
                     ],
                     'arah' => [
                       'id_berita_via'    => 'link',
                       'id_berita_method' => 'id_berita_method_A'
                     ],
                     'tangselpos' => [
                       'id_berita_via'    => 'guid',
                       'id_berita_method' => 'id_berita_method_G'
                     ],
                     'bengkalispos' => [
                       'id_berita_via'    => 'id',
                       'id_berita_method' => 'id_berita_method_S'
                     ],
                     'antarajateng' => [
                       'id_berita_via'    => 'id',
                       'id_berita_method' => 'id_berita_method_S'
                     ],
                     'beritametro'  => [
                       'id_berita_via'    => 'id',
                       'id_berita_method' => 'id_berita_method_S'
                     ],
                     'beritagar'  => [
                       'id_berita_via'    => 'id',
                       'id_berita_method' => 'id_berita_method_S'
                     ],
                     'goriau'  => [
                       'id_berita_via'    => 'id',
                       'id_berita_method' => 'id_berita_method_S'
                     ],
                     'hariannasional' => [
                       'id_berita_via'    => 'id',
                       'id_berita_method' => 'id_berita_method_S'
                     ],
                     'kaganga' => [
                       'id_berita_via'    => 'id',
                       'id_berita_method' => 'id_berita_method_S'
                     ],
                     'koranmetro' => [
                       'id_berita_via'    => 'id',
                       'id_berita_method' => 'id_berita_method_S'
                     ],
                     'mediariau' => [
                       'id_berita_via'    => 'id',
                       'id_berita_method' => 'id_berita_method_S'
                     ],
                     'palipos' => [//==
                       'id_berita_via'    => 'id',
                       'id_berita_method' => 'id_berita_method_S'
                     ],
                     'poskomalut' => [
                       'id_berita_via'    => 'id',
                       'id_berita_method' => 'id_berita_method_S'
                     ],
                     'potretnews' => [
                       'id_berita_via'    => 'id',
                       'id_berita_method' => 'id_berita_method_S'
                     ],
                     'sorotnews' => [
                       'id_berita_via'    => 'id',
                       'id_berita_method' => 'id_berita_method_S'
                     ],
                     'suarapemred' => [
                       'id_berita_via'    => 'id',
                       'id_berita_method' => 'id_berita_method_S'
                     ],
                     'winetnews' => [
                       'id_berita_via'    => 'id',
                       'id_berita_method' => 'id_berita_method_S'
                     ],
                     'buserkriminal' => [
                       'id_berita_via'    => 'id',
                       'id_berita_method' => 'id_berita_method_S'
                     ]
                   ];


?>
