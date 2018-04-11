/*
 * jQuery.fontselect - A font selector for the Google Web Fonts api
 * Tom Moor, http://tommoor.com
 * Copyright (c) 2011 Tom Moor
 * MIT Licensed
 * @version 0.1
*/

(function($){

  $.fn.fontselect = function(options) {  

     var __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

     var fonts = [
      "ABeeZee:regular",
      "ABeeZee:italic",
      "Abel",
      "Abril+Fatface",
      "Aclonica",
      "Acme",
      "Actor",
      "Adamina",
      "Advent+Pro:100",
      "Advent+Pro:200",
      "Advent+Pro:300",
      "Advent+Pro:regular",
      "Advent+Pro:500",
      "Advent+Pro:600",
      "Advent+Pro:700",
      "Aguafina+Script",
      "Akronim",
      "Aladin",
      "Aldrich",
      "Alef:regular",
      "Alef:700",
      "Alegreya:regular",
      "Alegreya:italic",
      "Alegreya:700",
      "Alegreya:700italic",
      "Alegreya:900",
      "Alegreya:900italic",
      "Alegreya+SC:regular",
      "Alegreya+SC:italic",
      "Alegreya+SC:700",
      "Alegreya+SC:700italic",
      "Alegreya+SC:900",
      "Alegreya+SC:900italic",
      "Alex+Brush",
      "Alfa+Slab+One",
      "Alice",
      "Alike",
      "Alike+Angular",
      "Allan:regular",
      "Allan:700",
      "Allerta",
      "Allerta+Stencil",
      "Allura",
      "Almendra:regular",
      "Almendra:italic",
      "Almendra:700",
      "Almendra:700italic",
      "Almendra+SC",
      "Amarante",
      "Amaranth:regular",
      "Amaranth:italic",
      "Amaranth:700",
      "Amaranth:700italic",
      "Amatic+SC:regular",
      "Amatic+SC:700",
      "Amethysta",
      "Amiri:regular",
      "Amiri:italic",
      "Amiri:700",
      "Amiri:700italic",
      "Amita:regular",
      "Amita:700",
      "Anaheim",
      "Andada",
      "Andika",
      "Angkor",
      "Annie+Use+Your+Telescope",
      "Anonymous+Pro:regular",
      "Anonymous+Pro:italic",
      "Anonymous+Pro:700",
      "Anonymous+Pro:700italic",
      "Antic",
      "Antic+Didone",
      "Antic+Slab",
      "Anton",
      "Arapey:regular",
      "Arapey:italic",
      "Arbutus",
      "Arbutus+Slab",
      "Architects+Daughter",
      "Archivo+Black",
      "Archivo+Narrow:regular",
      "Archivo+Narrow:italic",
      "Archivo+Narrow:700",
      "Archivo+Narrow:700italic",
      "Arimo:regular",
      "Arimo:italic",
      "Arimo:700",
      "Arimo:700italic",
      "Arizonia",
      "Armata",
      "Artifika",
      "Arvo:regular",
      "Arvo:italic",
      "Arvo:700",
      "Arvo:700italic",
      "Arya:regular",
      "Arya:700",
      "Asap:regular",
      "Asap:italic",
      "Asap:700",
      "Asap:700italic",
      "Asar:regular", 
      "Asset",
      "Astloch:regular",
      "Astloch:700",
      "Asul:regular",
      "Asul:700",
      "Atomic+Age",
      "Aubrey",
      "Audiowide",
      "Autour+One",
      "Average",
      "Average+Sans",
      "Averia+Gruesa+Libre",
      "Averia+Libre:300",
      "Averia+Libre:300italic",
      "Averia+Libre:regular",
      "Averia+Libre:italic",
      "Averia+Libre:700",
      "Averia+Libre:700italic",
      "Averia+Sans+Libre:300",
      "Averia+Sans+Libre:300italic",
      "Averia+Sans+Libre:regular",
      "Averia+Sans+Libre:italic",
      "Averia+Sans+Libre:700",
      "Averia+Sans+Libre:700italic",
      "Averia+Serif+Libre:300",
      "Averia+Serif+Libre:300italic",
      "Averia+Serif+Libre:regular",
      "Averia+Serif+Libre:italic",
      "Averia+Serif+Libre:700",
      "Averia+Serif+Libre:700italic",
      "Bad+Script",
      "Balthazar",
      "Bangers",
      "Basic",
      "Battambang:regular",
      "Battambang:700",
      "Baumans",
      "Bayon",
      "Belgrano",
      "Belleza",
      "BenchNine:300",
      "BenchNine:regular",
      "BenchNine:700",
      "Bentham",
      "Berkshire+Swash",
      "Bevan",
      "Bigelow+Rules:regular" ,
      "Bigshot+One",
      "Bilbo",
      "Bilbo+Swash+Caps",
      "Biryani:200",
      "Biryani:300",
      "Biryani:regular",
      "Biryani:600",
      "Biryani:700",
      "Biryani:800",
      "Biryani:900",
      "Bitter:regular",
      "Bitter:italic",
      "Bitter:700",
      "Black+Ops+One",
      "Bokor",
      "Bonbon",
      "Boogaloo",
      "Bowlby+One",
      "Bowlby+One+SC",
      "Brawler",
      "Bree+Serif",
      "Bubblegum+Sans",
      "Bubbler+One",
      "Buda:300",
      "Buenard:regular",
      "Buenard:700",
      "Bungee",
      "Bungee+Shade",
      "Bungee+Inline",
      "Bungee+Hairline",
      "Bungee+Outline",
      "Butcherman",
      "Butcherman",
      "Butterfly+Kids",
      "Cabin:regular",
      "Cabin:italic",
      "Cabin:500",
      "Cabin:500italic",
      "Cabin:600",
      "Cabin:600italic",
      "Cabin:700",
      "Cabin:700italic",
      "Cabin+Condensed:regular",
      "Cabin+Condensed:500",
      "Cabin+Condensed:600",
      "Cabin+Condensed:700",
      "Cabin+Sketch:regular",
      "Cabin+Sketch:700",
      "Caesar+Dressing",
      "Cagliostro",
      "Calligraffitti",
      "Cambay:regular",
      "Cambay:italic",
      "Cambay:700",
      "Cambay:700italic",
      "Cambo",
      "Candal",
      "Cantarell:regular",
      "Cantarell:italic",
      "Cantarell:700",
      "Cantarell:700italic",
      "Cantata+One",
      "Cantora+One",
      "Capriola",
      "Cardo:regular",
      "Cardo:italic",
      "Cardo:700",
      "Carme",
      "Carrois+Gothic",
      "Carrois+Gothic+SC",
      "Carter+One",
      "Catamaran:100",
      "Catamaran:200",
      "Catamaran:300",
      "Catamaran:regular",
      "Catamaran:500",
      "Catamaran:600",
      "Catamaran:700",
      "Catamaran:800",
      "Catamaran:900",
      "Caudex:regular",
      "Caudex:italic",
      "Caudex:700",
      "Caudex:700italic",
      "Caveat:regular",
      "Caveat:700",
      "Caveat+Brush:regular",
      "Cedarville+Cursive",
      "Ceviche+One",
      "Changa+One:regular",
      "Changa+One:italic",
      "Chango",
      "Chau+Philomene+One:regular",
      "Chau+Philomene+One:italic",
      "Chela+One",
      "Chelsea+Market",
      "Chenla",
      "Cherry+Cream+Soda",
      "Cherry+Swash:regular",
      "Cherry+Swash:700",
      "Chewy",
      "Chicle",
      "Chivo:regular",
      "Chivo:italic",
      "Chivo:900",
      "Chivo:900italic",
      "Chonburi:regular",
      "Cinzel:regular",
      "Cinzel:700",
      "Cinzel:900",
      "Cinzel+Decorative:regular",
      "Cinzel+Decorative:700",
      "Cinzel+Decorative:900",
      "Clicker+Script:regular",
      "Coda:regular",
      "Coda:800",
      "Coda+Caption:800",
      "Codystar:300",
      "Codystar:regular",
      "Combo",
      "Comfortaa:300",
      "Comfortaa:regular",
      "Comfortaa:700",
      "Coming+Soon",
      "Concert+One",
      "Condiment",
      "Content:regular",
      "Content:700",
      "Contrail+One",
      "Convergence",
      "Cookie",
      "Copse",
      "Corben:regular",
      "Corben:700",
      "Courgette",
      "Cousine:regular",
      "Cousine:italic",
      "Cousine:700",
      "Cousine:700italic",
      "Coustard:regular",
      "Coustard:900",
      "Covered+By+Your+Grace",
      "Crafty+Girls",
      "Creepster",
      "Crete+Round:regular",
      "Crete+Round:italic",
      "Crimson+Text:regular",
      "Crimson+Text:italic",
      "Crimson+Text:600",
      "Crimson+Text:600italic",
      "Crimson+Text:700",
      "Crimson+Text:700italic",
      "Croissant+One:regular",
      "Crushed",
      "Cuprum:regular",
      "Cuprum:italic",
      "Cuprum:700",
      "Cuprum:700italic",
      "Cutive",
      "Cutive+Mono",
      "Damion",
      "Dancing+Script:regular",
      "Dancing+Script:700",
      "Dangrek",
      "Dawning+of+a+New+Day",
      "Days+One",
      "Dekko",
      "Delius",
      "Delius+Swash+Caps",
      "Delius+Unicase:regular",
      "Delius+Unicase:700",
      "Della+Respira",
      "Denk+One",
      "Devonshire",
      "Dhurjati",
      "Didact+Gothic",
      "Diplomata",
      "Diplomata+SC",
      "Domine:regular",
      "Domine:700",
      "Donegal+One" ,
      "Doppio+One",
      "Dorsa",
      "Dosis:200",
      "Dosis:300",
      "Dosis:regular",
      "Dosis:500",
      "Dosis:600",
      "Dosis:700",
      "Dosis:800",
      "Dr+Sugiyama",
      "Droid+Sans:regular",
      "Droid+Sans:700",
      "Droid+Sans+Mono",
      "Droid+Serif:regular",
      "Droid+Serif:italic",
      "Droid+Serif:700",
      "Droid+Serif:700italic",
      "Duru+Sans",
      "Dynalight",
      "EB+Garamond",
      "Eagle+Lake",
      "Eater",
      "Economica:regular",
      "Economica:italic",
      "Economica:700",
      "Economica:700italic",
      "Eczar:regular",
      "Eczar:500",
      "Eczar:600",
      "Eczar:700",
      "Eczar:800",
      "Ek Mukta:200",
      "Ek Mukta:300",
      "Ek Mukta:regular",
      "Ek Mukta:500",
      "Ek Mukta:600",
      "Ek Mukta:700",
      "Ek Mukta:800",
      "Electrolize",
      "Elsie:regular", 
      "Elsie:900", 
      "Elsie+Swash+Caps:regular",
      "Elsie+Swash+Caps:900",
      "Emblema+One",
      "Emilys+Candy",
      "Engagement",
      "Englebert",
      "Enriqueta:regular",
      "Enriqueta:700",
      "Erica+One",
      "Esteban",
      "Euphoria+Script",
      "Ewert",
      "Exo:100",
      "Exo:100italic",
      "Exo:200",
      "Exo:200italic",
      "Exo:300",
      "Exo:300italic",
      "Exo:regular",
      "Exo:italic",
      "Exo:500",
      "Exo:500italic",
      "Exo:600",
      "Exo:600italic",
      "Exo:700",
      "Exo:700italic",
      "Exo:800",
      "Exo:800italic",
      "Exo:900",
      "Exo:900italic",
      "Expletus+Sans:regular",
      "Expletus+Sans:italic",
      "Expletus+Sans:500",
      "Expletus+Sans:500italic",
      "Expletus+Sans:600",
      "Expletus+Sans:600italic",
      "Expletus+Sans:700",
      "Expletus+Sans:700italic",
      "Fanwood+Text:regular",
      "Fanwood+Text:italic",
      "Fascinate",
      "Fascinate+Inline",
      "Faster+One",
      "Fasthand",
      "Fauna+One",
      "Federant",
      "Federo",
      "Felipa",
      "Fenix",
      "Finger+Paint",
      "Fira+Mono:regular",
      "Fira+Mono:700",
      "Fira+Sans:300",
      "Fira+Sans:300italic",
      "Fira+Sans:regular",
      "Fira+Sans:500,500italic,700,700italic",
      "Fira+Sans:500italic",
      "Fira+Sans:700",
      "Fira+Sans:700italic",
      "Fjalla+One",
      "Fjord+One",
      "Flamenco:300",
      "Flamenco:regular",
      "Flavors",
      "Fondamento:regular",
      "Fondamento:italic",
      "Fontdiner+Swanky",
      "Forum",
      "Francois+One",
      "Freckle+Face",
      "Fredericka+the+Great",
      "Fredoka+One",
      "Freehand",
      "Fresca",
      "Frijole",
      "Fruktur",
      "Fugaz+One",
      "GFS+Didot",
      "GFS+Neohellenic:regular",
      "GFS+Neohellenic:italic",
      "GFS+Neohellenic:700",
      "GFS+Neohellenic:700italic",
      "Gabriela",
      "Gafata",
      "Galdeano",
      "Galindo",
      "Gentium+Basic:regular",
      "Gentium+Basic:italic",
      "Gentium+Basic:700",
      "Gentium+Basic:700italic",
      "Gentium+Book+Basic:regular",
      "Gentium+Book+Basic:italic",
      "Gentium+Book+Basic:700",
      "Gentium+Book+Basic:700italic",
      "Geo:regular",
      "Geo:italic",
      "Geostar",
      "Geostar+Fill",
      "Germania+One",
      "Gidugu",
      "Gilda+Display",
      "Give+You+Glory",
      "Glass+Antiqua",
      "Glegoo",
      "Gloria+Hallelujah",
      "Goblin+One",
      "Gochi+Hand",
      "Gorditas:regular",
      "Gorditas:700",
      "Goudy+Bookletter+1911",
      "Graduate",
      "Grand+Hotel",
      "Gravitas+One",
      "Great+Vibes",
      "Griffy",
      "Gruppo",
      "Gudea:regular",
      "Gudea:italic",
      "Gudea:700",
      "Gurajada",
      "Habibi",
      "Halant:300",
      "Halant:regular",
      "Halant:500",
      "Halant:600",
      "Halant:700",
      "Hammersmith+One",
      "Hanalei",
      "Hanalei+Fill",
      "Handlee",
      "Hanuman:regular",
      "Hanuman:700",
      "Happy+Monkey",
      "Headland+One",
      "Henny+Penny",
      "Herr+Von+Muellerhoff",
      "Hind:300",
      "Hind:regular",
      "Hind:500",
      "Hind:600",
      "Hind:700",
      "Hind+Siliguri:300",
      "Hind+Siliguri:regular",
      "Hind+Siliguri:500",
      "Hind+Siliguri:600",
      "Hind+Siliguri:700",
      "Hind+Vadodara:300",
      "Hind+Vadodara:regular",
      "Hind+Vadodara:500",
      "Hind+Vadodara:600",
      "Hind+Vadodara:700",
      "Holtwood+One+SC",
      "Homemade+Apple",
      "Homenaje",
      "IM+Fell+DW+Pica:regular",
      "IM+Fell+DW+Pica:italic",
      "IM+Fell+DW+Pica+SC",
      "IM+Fell+Double+Pica:regular",
      "IM+Fell+Double+Pica:italic",
      "IM+Fell+Double+Pica+SC",
      "IM+Fell+English:regular",
      "IM+Fell+English:italic",
      "IM+Fell+English+SC",
      "IM+Fell+French+Canon:regular",
      "IM+Fell+French+Canon:italic",
      "IM+Fell+French+Canon+SC",
      "IM+Fell+Great+Primer:regular",
      "IM+Fell+Great+Primer:italic",
      "IM+Fell+Great+Primer+SC",
      "Iceberg",
      "Iceland",
      "Imprima",
      "Inconsolata:regular",
      "Inconsolata:700",
      "Inder",
      "Indie+Flower",
      "Inika:regular",
      "Inika:700",
      "Irish+Grover",
      "Istok+Web:regular",
      "Istok+Web:italic",
      "Istok+Web:700",
      "Istok+Web:700italic",
      "Italiana",
      "Italianno",
      "Jacques+Francois",
      "Jacques+Francois+Shadow",
      "Jaldi:regular",
      "Jaldi:700",
      "Jim+Nightshade",
      "Jockey+One",
      "Jolly+Lodger",
      "Josefin+Sans:100",
      "Josefin+Sans:100italic",
      "Josefin+Sans:300",
      "Josefin+Sans:300italic",
      "Josefin+Sans:regular",
      "Josefin+Sans:italic",
      "Josefin+Sans:600",
      "Josefin+Sans:600italic",
      "Josefin+Sans:700",
      "Josefin+Sans:700italic",
      "Josefin+Slab:100",
      "Josefin+Slab:100italic",
      "Josefin+Slab:300",
      "Josefin+Slab:300italic",
      "Josefin+Slab:regular",
      "Josefin+Slab:italic",
      "Josefin+Slab:600",
      "Josefin+Slab:600italic",
      "Josefin+Slab:700",
      "Josefin+Slab:700italic",
      "Judson:regular",
      "Judson:italic",
      "Judson:700",
      "Julee",
      "Julius+Sans+One",
      "Junge",
      "Jura:300",
      "Jura:regular",
      "Jura:500",
      "Jura:600",
      "Just+Another+Hand",
      "Just+Me+Again+Down+Here",
      "Kadwa:regular",
      "Kadwa:700",
      "Kalam:300",
      "Kalam:regular",
      "Kalam:700",
      "Kameron:regular",
      "Kameron:700",
      "Kanit:100",
      "Kanit:100italic",
      "Kanit:200",
      "Kanit:200italic",
      "Kanit:300",
      "Kanit:300italic",
      "Kanit:400",
      "Kanit:400italic",
      "Kanit:500",
      "Kanit:500italic",
      "Kanit:600",
      "Kanit:600italic",
      "Kanit:700",
      "Kanit:700italic",
      "Kanit:800",
      "Kanit:800italic",
      "Kanit:900",
      "Kanit:900italic",
      "Kantumruy:300",
      "Kantumruy:regular",
      "Kantumruy:700",
      "Karla:regular",
      "Karla:italic",
      "Karla:700",
      "Karla:700italic",
      "Karma:300",
      "Karma:regular",
      "Karma:500",
      "Karma:600",
      "Karma:700",
      "Kaushan+Script",
      "Kavoonr",
      "Kdam+Thmor",
      "Keania+One",
      "Kelly+Slab",
      "Kenia",
      "Khand:300",
      "Khand:regular",
      "Khand:500",
      "Khand:600",
      "Khand:700",
      "Khmer",
      "Khula:300",
      "Khula:regular",
      "Khula:600",
      "Khula:700",
      "Khula:800",
      "Kite+One",
      "Knewave",
      "Kotta+One",
      "Koulen",
      "Kranky",
      "Kreon:300",
      "Kreon:regular",
      "Kreon:700",
      "Kristi",
      "Krona+One",
      "Kurale",
      "La+Belle+Aurore",
      "Laila:300",
      "Laila:regular",
      "Laila:500",
      "Laila:600",
      "Laila:700",
      "Lakki+Reddy",
      "Lancelot",
      "Lateef",
      "Lato:100",
      "Lato:100italic",
      "Lato:300",
      "Lato:300italic",
      "Lato:regular",
      "Lato:italic",
      "Lato:700",
      "Lato:700italic",
      "Lato:900",
      "Lato:900italic",
      "League+Script",
      "Leckerli+One",
      "Ledger",
      "Lekton:regular",
      "Lekton:italic",
      "Lekton:700",
      "Lemon",
      "Libre-Baskerville:regular",
      "Libre-Baskerville:italic",
      "Libre-Baskerville:700",
      "Life+Savers",
      "Lilita+One",
      "Lily+Script+One",
      "Limelight",
      "Linden+Hill:regular",
      "Linden+Hill:italic",
      "Lobster",
      "Lobster+Two:regular",
      "Lobster+Two:italic",
      "Lobster+Two:700",
      "Lobster+Two:700italic",
      "Londrina+Outline",
      "Londrina+Shadow",
      "Londrina+Sketch",
      "Londrina+Solid",
      "Lora:regular",
      "Lora:italic",
      "Lora:700",
      "Lora:700italic",
      "Love+Ya+Like+A+Sister",
      "Loved+by+the+King",
      "Lovers+Quarrel",
      "Luckiest+Guy",
      "Lusitana:regular",
      "Lusitana:700",
      "Lustria",
      "Macondo",
      "Macondo+Swash+Caps",
      "Magra:regular",
      "Magra:700",
      "Maiden+Orange",
      "Mako",
      "Mallanna",
      "Mandali",
      "Marcellus",
      "Marcellus+SC",
      "Marck+Script",
      "Margarine",
      "Marko+One",
      "Marmelad",
      "Marvel:regular",
      "Marvel:italic",
      "Marvel:700",
      "Marvel:700italic",
      "Mate:regular",
      "Mate:italic",
      "Mate+SC",
      "Maven+Pro:regular",
      "Maven+Pro:500",
      "Maven+Pro:700",
      "Maven+Pro:900",
      "McLaren",
      "Meddon",
      "MedievalSharp",
      "Medula+One",
      "Megrim",
      "Meie+Script",
      "Merienda+One",
      "Merriweather:300",
      "Merriweather:regular",
      "Merriweather:700",
      "Merriweather:900",
      "Metal",
      "Metal+Mania",
      "Metamorphous",
      "Metrophobic",
      "Michroma",
      "Miltonian",
      "Miltonian+Tattoo",
      "Miniver",
      "Miss+Fajardose",
      "Modak",
      "Modern+Antiqua",
      "Molengo",
      "Molle:italic",
      "Monda:regular",
      "Monda:700",
      "Monofett",
      "Monoton",
      "Monsieur+La+Doulaise",
      "Montaga",
      "Montez",
      "Montserrat:100",
      "Montserrat:100i",
      "Montserrat:200",
      "Montserrat:200i",
      "Montserrat:300",
      "Montserrat:300i",
      "Montserrat:400",
      "Montserrat:400i",
      "Montserrat:500",
      "Montserrat:500i",
      "Montserrat:600",
      "Montserrat:600i",
      "Montserrat:700",
      "Montserrat:700i",
      "Montserrat:800",
      "Montserrat:800i",
      "Montserrat:900",
      "Montserrat:900i",
      "Montserrat+Alternates:regular",
      "Montserrat+Alternates:700",
      "Montserrat+Subrayada:regular",
      "Montserrat+Subrayada:700",
      "Moul",
      "Moulpali",
      "Mountains+of+Christmas:regular",
      "Mountains+of+Christmas:700",
      "Mouse+Memoirs",
      "Mr+Bedfort",
      "Mr+Dafoe",
      "Mr+De+Haviland",
      "Mrs+Saint+Delafield",
      "Mrs+Sheppards",
      "Muli:300",
      "Muli:300italic",
      "Muli:regular",
      "Muli:italic",
      "Mystery+Quest",
      "NTR",
      "Neucha",
      "Neuton:200",
      "Neuton:300",
      "Neuton:regular",
      "Neuton:italic",
      "Neuton:700",
      "Neuton:800",
      "News+Cycle:regular",
      "News+Cycle:700",
      "Niconne",
      "Nixie+One",
      "Nobile:regular",
      "Nobile:italic",
      "Nobile:700",
      "Nobile:700italic",
      "Nokora:regular",
      "Nokora:700",
      "Norican",
      "Nosifer",
      "Nothing+You+Could+Do",
      "Noticia+Text:regular",
      "Noticia+Text:italic",
      "Noticia+Text:700",
      "Noticia+Text:700italic",
      "Nova+Cut",
      "Nova+Flat",
      "Nova+Mono",
      "Nova+Oval",
      "Nova+Round",
      "Nova+Script",
      "Nova+Slim",
      "Nova+Square",
      "Numans",
      "Nunito:300",
      "Nunito:regular",
      "Nunito:700",
      "Odor+Mean+Chey",
      "Offside",
      "Old+Standard+TT:regular",
      "Old+Standard+TT:italic",
      "Old+Standard+TT:700",
      "Oldenburg",
      "Oleo+Script:regular",
      "Oleo+Script:700",
      "Open+Sans:300",
      "Open+Sans:300italic",
      "Open+Sans:regular",
      "Open+Sans:italic",
      "Open+Sans:600",
      "Open+Sans:600italic",
      "Open+Sans:700",
      "Open+Sans:700italic",
      "Open+Sans:800",
      "Open+Sans:800italic",
      "Open+Sans+Condensed:300",
      "Open+Sans+Condensed:300italic",
      "Open+Sans+Condensed:700",
      "Oranienbaum",
      "Orbitron:regular",
      "Orbitron:500",
      "Orbitron:700",
      "Orbitron:900",
      "Oregano:regular",
      "Oregano:italic",
      "Orienta",
      "Original+Surfer",
      "Oswald:300",
      "Oswald:regular",
      "Oswald:700",
      "Over+the+Rainbow",
      "Overlock:regular",
      "Overlock:italic",
      "Overlock:700",
      "Overlock:700italic",
      "Overlock:900",
      "Overlock:900italic",
      "Overlock+SC",
      "Ovo",
      "Oxygen:300",
      "Oxygen:regular",
      "Oxygen:700",
      "Oxygen+Mono",
      "PT+Mono",
      "PT+Sans:regular",
      "PT+Sans:italic",
      "PT+Sans:700",
      "PT+Sans:700italic",
      "PT+Sans+Caption:regular",
      "PT+Sans+Caption:700",
      "PT+Sans+Narrow:regular",
      "PT+Sans+Narrow:700",
      "PT+Serif:regular",
      "PT+Serif:italic",
      "PT+Serif:700",
      "PT+Serif:700italic",
      "PT+Serif+Caption:regular",
      "PT+Serif+Caption:italic",
      "Pacifico",
      "Palanquin:100",
      "Palanquin:200",
      "Palanquin:300",
      "Palanquin:regular",
      "Palanquin:500",
      "Palanquin:600",
      "Palanquin:700",
      "Palanquin+Dark:regular",
      "Palanquin+Dark:500",
      "Palanquin+Dark:600",
      "Palanquin+Dark:700",
      "Paprika",
      "Parisienne",
      "Passero+One",
      "Passion+One:regular",
      "Passion+One:700",
      "Passion+One:900",
      "Patrick+Hand",
      "Patua+One",
      "Paytone+One",
      "Peddana",
      "Peralta",
      "Permanent+Marker",
      "Petit+Formal+Script",
      "Petrona",
      "Philosopher:regular",
      "Philosopher:italic",
      "Philosopher:700",
      "Philosopher:700italic",
      "Piedra",
      "Pinyon+Script",
      "Pirata+One",
      "Plaster",
      "Play:regular",
      "Play:700",
      "Playball",
      "Playfair+Display:regular",
      "Playfair+Display:italic",
      "Playfair+Display:700",
      "Playfair+Display:700italic",
      "Playfair+Display:900",
      "Playfair+Display:900italic",
      "Playfair+Display+SC:regular",
      "Playfair+Display+SC:italic",
      "Playfair+Display+SC:700",
      "Playfair+Display+SC:700italic",
      "Playfair+Display+SC:900",
      "Playfair+Display+SC:900italic",
      "Podkova:regular",
      "Podkova:700",
      "Poiret+One",
      "Poller+One",
      "Poly:regular",
      "Poly:italic",
      "Pompiere",
      "Pontano+Sans",
      "Poppins:300",
      "Poppins:regular",
      "Poppins:500",
      "Poppins:600",
      "Poppins:700",
      "Port+Lligat+Sans",
      "Port+Lligat+Slab",
      "Pragati+Narrow:regular",
      "Pragati+Narrow:regular",
      "Pragati+Narrow:700",
      "Prata",
      "Preahvihear",
      "Press+Start+2P",
      "Princess+Sofia",
      "Prociono",
      "Prosto+One",
      "Puritan:regular",
      "Puritan:italic",
      "Puritan:700",
      "Puritan:700italic",
      "Purple+Purse",
      "Quando",
      "Quantico:regular",
      "Quantico:italic",
      "Quantico:700",
      "Quantico:700italic",
      "Quattrocento:regular",
      "Quattrocento:700",
      "Quattrocento+Sans:regular",
      "Quattrocento+Sans:italic",
      "Quattrocento+Sans:700",
      "Quattrocento+Sans:700italic",
      "Questrial",
      "Quicksand:300",
      "Quicksand:regular",
      "Quicksand:700",
      "Quintessential",
      "Qwigley",
      "Racing+Sans+One",
      "Radley:regular",
      "Radley:italic",
      "Rajdhani:300",
      "Rajdhani:regular",
      "Rajdhani:500",
      "Rajdhani:600",
      "Rajdhani:700",
      "Raleway:100",
      "Raleway:200",
      "Raleway:300",
      "Raleway:regular",
      "Raleway:500",
      "Raleway:600",
      "Raleway:700",
      "Raleway:800",
      "Raleway:900",
      "Raleway+Dots",
      "Ramabhadra",
      "Ramaraja",
      "Rambla:regular",
      "Rambla:italic",
      "Rambla:700",
      "Rambla:700italic",
      "Rammetto+One",
      "Ranchers",
      "Rancho",
      "Ranga:regular",
      "Ranga:700",
      "Rationale",
      "Ravi+Prakash",
      "Redressed",
      "Reenie+Beanie",
      "Revalia",
      "Rhodium+Libre",
      "Ribeye",
      "Ribeye+Marrow",
      "Righteous",
      "Risque",
      "Roboto:100",
      "Roboto:100italic",
      "Roboto:300",
      "Roboto:300italic",
      "Roboto:regular",
      "Roboto:italic",
      "Roboto:500",
      "Roboto:500italic",
      "Roboto:700",
      "Roboto:700italic",
      "Roboto:900",
      "Roboto:900italic",
      "Roboto+Condensed:300",
      "Roboto+Condensed:300italic",
      "RobotoCondensed:regular",
      "Roboto+Condensed:italic",
      "Roboto+Condensed:700",
      "Roboto+Condensed:700italic",
      "Roboto+Mono:100",
      "Roboto+Mono:100italic",
      "Roboto+Mono:300",
      "Roboto+Mono:300italic",
      "Roboto+Mono:regular",
      "Roboto+Mono:italic",
      "Roboto+Mono:500",
      "Roboto+Mono:500italic",
      "Roboto+Mono:700",
      "Roboto+Mono:700italic",
      "Roboto+Slab:100",
      "Roboto+Slab:300",
      "Roboto+Slab:regular",
      "Roboto+Slab:700",
      "Rochester",
      "Rock+Salt",
      "Rokkitt:regular",
      "Rokkitt:700",
      "Romanesco",
      "Ropa+Sans:regular",
      "Ropa+Sans:italic",
      "Rosario:regular",
      "Rosario:italic",
      "Rosario:700",
      "Rosario:700italic",
      "Rosarivo:regular",
      "Rosarivo:italic",
      "Rouge+Script",
      "Rozha+One",
      "Rubik:300",
      "Rubik:300italic",
      "Rubik:regular",
      "Rubik:italic",
      "Rubik:500",
      "Rubik:500italic",
      "Rubik:700",
      "Rubik:700italic",
      "Rubik:900",
      "Rubik:900italic",
      "Rubik+Mono+One" ,
      "Rubik+One",
      "Ruda:regular",
      "Ruda:700",
      "Ruda:900",
      "Rufina:regular",
      "Rufina:700",
      "Ruge+Boogie",
      "Ruluko",
      "Rum+Raisin",
      "Ruslan+Display",
      "Russo+One",
      "Ruthie",
      "Rye",
      "Sacramento",
      "Sahitya:regular",
      "Sahitya:700",
      "Sail",
      "Salsa",
      "Sanchez:regular",
      "Sanchez:italic",
      "Sancreek",
      "Sansita+One",
      "Sarala:regular",
      "Sarala:700",
      "Sarina",
      "Sarpanch:regular", 
      "Sarpanch:500", 
      "Sarpanch:600", 
      "Sarpanch:700", 
      "Sarpanch:800", 
      "Sarpanch:900", 
      "Satisfy",
      "Scada:regular",
      "Scada:italic",
      "Scada:700",
      "Scada:700italic",
      "Scheherazade:regular",
      "Scheherazade:700",
      "Schoolbell",
      "Seaweed+Script",
      "Sevillana",
      "Seymour+One",
      "Shadows+Into+Light",
      "Shadows+Into+Light+Two",
      "Shanti",
      "Share:regular",
      "Share:italic",
      "Share:700",
      "Share:700italic",
      "Share+Tech",
      "Share+Tech+Mono",
      "Shojumaru",
      "Short+Stack",
      "Siemreap",
      "Sigmar+One",
      "Signika:300",
      "Signika:regular",
      "Signika:600",
      "Signika:700",
      "Signika+Negative:300",
      "Signika+Negative:regular",
      "Signika+Negative:600",
      "Signika+Negative:700",
      "Simonetta:regular",
      "Simonetta:italic",
      "Simonetta:900",
      "Simonetta:900italic",
      "Sintony:regular",
      "Sintony:700",
      "Sirin+Stencil",
      "Six+Caps",
      "Skranji:regular",
      "Skranji:700",
      "Slabo+13px",
      "Slabo+27px",
      "Slackey",
      "Smokum",
      "Smythe",
      "Sniglet:800",
      "Snippet",
      "Snowburst+One",
      "Sofadi+One",
      "Sofia",
      "Sonsie+One",
      "Sorts+Mill+Goudy:regular",
      "Sorts+Mill+Goudy:italic",
      "Source+Code+Pro:200",
      "Source+Code+Pro:300",
      "Source+Code+Pro:regular",
      "Source+Code+Pro:600",
      "Source+Code+Pro:700",
      "Source+Code+Pro:900",
      "Source+Sans+Pro:200",
      "Source+Sans+Pro:200italic",
      "Source+Sans+Pro:300",
      "Source+Sans+Pro:300italic",
      "Source+Sans+Pro:regular",
      "Source+Sans+Pro:italic",
      "Source+Sans+Pro:600",
      "Source+Sans+Pro:600italic",
      "Source+Sans+Pro:700",
      "Source+Sans+Pro:700italic",
      "Source+Sans+Pro:900",
      "Source+Sans+Pro:900italic",
      "Special+Elite",
      "Spicy+Rice",
      "Spinnaker",
      "Spirax",
      "Squada+One",
      "Sree+Krushnadevaraya",
      "Stalemate",
      "Stalinist+One",
      "Stardos+Stencil:regular",
      "Stardos+Stencil:700",
      "Stint+Ultra+Condensed",
      "Stint+Ultra+Expanded",
      "Stoke:300",
      "Stoke:regular",
      "Strait",
      "Sue+Ellen+Francisco",
      "Sumana:regular",
      "Sumana:700",
      "Sunshiney",
      "Supermercado+One",
      "Sura:regular",
      "Sura:700",
      "Suranna",
      "Suravaram",
      "Suwannaphum",
      "Swanky+and+Moo+Moo",
      "Syncopate:regular",
      "Syncopate:700",
      "Tangerine:regular",
      "Tangerine:700",
      "Taprom",
      "Tauri",
      "Teko:300",
      "Teko:regular",
      "Teko:500",
      "Teko:600",
      "Teko:700",
      "Telex",
      "Tenali+Ramakrishna",
      "Tenor+Sans",
      "Text+Me+One",
      "The+Girl+Next+Door",
      "Tienne:regular",
      "Tienne:700",
      "Tienne:900",
      "Tillana:regular",
      "Tillana:500",
      "Tillana:600",
      "Tillana:700",
      "Tillana:800",
      "Timmana",
      "Tinos:regular",
      "Tinos:italic",
      "Tinos:700",
      "Tinos:700italic",
      "Titan+One",
      "Titillium+Web:200",
      "Titillium+Web:200italic",
      "Titillium+Web:300",
      "Titillium+Web:300italic",
      "Titillium+Web:regular",
      "Titillium+Web:italic",
      "Titillium+Web:600",
      "Titillium+Web:600italic",
      "Titillium+Web:700",
      "Titillium+Web:700italic",
      "Titillium+Web:900",
      "Trade+Winds",
      "Trocchi",
      "Trochut:regular",
      "Trochut:italic",
      "Trochut:700",
      "Trykker",
      "Tulpen+One",
      "Ubuntu:300",
      "Ubuntu:300italic",
      "Ubuntu:regular",
      "Ubuntu:italic",
      "Ubuntu:500",
      "Ubuntu:500italic",
      "Ubuntu:700",
      "Ubuntu:700italic",
      "Ubuntu+Condensed",
      "Ubuntu+Mono:regular",
      "Ubuntu+Mono:italic",
      "Ubuntu+Mono:700",
      "Ubuntu+Mono:700italic",
      "Ultra",
      "Uncial+Antiqua",
      "Underdog",
      "Unica+One",
      "UnifrakturCook:700",
      "UnifrakturMaguntia",
      "Unkempt:regular",
      "Unkempt:700",
      "Unlock",
      "Unna",
      "VT323",
      "Vampiro+One",
      "Varela",
      "Varela+Round",
      "Vast+Shadow",
      "Vesper+Libre:regular",
      "Vesper+Libre:500",
      "Vesper+Libre:700",
      "Vesper+Libre:900",
      "Vibur",
      "Vidaloka",
      "Viga",
      "Voces",
      "Volkhov:regular",
      "Volkhov:italic",
      "Volkhov:700",
      "Volkhov:700italic",
      "Vollkorn:regular",
      "Vollkorn:italic",
      "Vollkorn:700",
      "Vollkorn:700italic",
      "Voltaire",
      "Waiting+for+the+Sunrise",
      "Wallpoet",
      "Walter+Turncoat",
      "Warnes",
      "Wellfleet",
      "Wendy+One",
      "Wire+One",
      "Work+Sans:100",
      "Work+Sans:200",
      "Work+Sans:300",
      "Work+Sans:regular",
      "Work+Sans:500",
      "Work+Sans:600",
      "Work+Sans:700",
      "Work+Sans:800",
      "Work+Sans:900",
      "Yanone+Kaffeesatz:200",
      "Yanone+Kaffeesatz:300",
      "Yanone+Kaffeesatz:regular",
      "Yanone+Kaffeesatz:700",
      "Yantramanav:100",
      "Yantramanav:300",
      "Yantramanav:regular",
      "Yantramanav:500",
      "Yantramanav:700",
      "Yantramanav:900",
      "Yellowtail",
      "Yeseva+One",
      "Yesteryear",
      "Zeyada"];

    var settings = {
      style: 'font-select',
      placeholder: 'Select a font',
      lookahead: 2,
      api: '//fonts.googleapis.com/css?family='
    };
    
    var Fontselect = (function(){
    
      function Fontselect(original, o){
        this.$original = $(original);
        this.options = o;
        this.active = false;
        this.setupHtml();
        this.getVisibleFonts();
        this.bindEvents();

        var font = this.$original.val();
        if (font) {
          this.updateSelected();
          this.addFontLink(font);
        }
      }
      
      Fontselect.prototype.bindEvents = function(){
      
        $('li', this.$results)
        .click(__bind(this.selectFont, this))
        .mouseenter(__bind(this.activateFont, this))
        .mouseleave(__bind(this.deactivateFont, this));
        
        $('span', this.$select).click(__bind(this.toggleDrop, this));
        this.$arrow.click(__bind(this.toggleDrop, this));
      };
      
      Fontselect.prototype.toggleDrop = function(ev){
        
        if(this.active){
          this.$element.removeClass('font-select-active');
          this.$drop.hide();
          clearInterval(this.visibleInterval);
          
        } else {
          this.$element.addClass('font-select-active');
          this.$drop.show();
          this.moveToSelected();
          this.visibleInterval = setInterval(__bind(this.getVisibleFonts, this), 500);
        }
        
        this.active = !this.active;
      };
      
      Fontselect.prototype.selectFont = function(){
        
        var font = $('li.active', this.$results).data('value');
        this.$original.val(font).change();
        this.updateSelected();
        this.toggleDrop();
      };
      
      Fontselect.prototype.moveToSelected = function(){
        
        var $li, font = this.$original.val();
        
        if (font){
          $li = $("li[data-value='"+ font +"']", this.$results);
        } else {
          $li = $("li", this.$results).first();
        }

        this.$results.scrollTop($li.addClass('active').position().top);
      };
      
      Fontselect.prototype.activateFont = function(ev){
        $('li.active', this.$results).removeClass('active');
        $(ev.currentTarget).addClass('active');
      };
      
      Fontselect.prototype.deactivateFont = function(ev){
        
        $(ev.currentTarget).removeClass('active');
      };
      
      Fontselect.prototype.updateSelected = function(){
        
        var font = this.$original.val();
        $('span', this.$element).text(this.toReadable(font)).css(this.toStyle(font));
      };
      
      Fontselect.prototype.setupHtml = function(){
      
        this.$original.empty().hide();
        this.$element = $('<div>', {'class': this.options.style});
        this.$arrow = $('<div><b></b></div>');
        this.$select = $('<a><span>'+ this.options.placeholder +'</span></a>');
        this.$drop = $('<div>', {'class': 'fs-drop'});
        this.$results = $('<ul>', {'class': 'fs-results'});
        this.$original.after(this.$element.append(this.$select.append(this.$arrow)).append(this.$drop));
        this.$drop.append(this.$results.append(this.fontsAsHtml())).hide();
      };
      
      Fontselect.prototype.fontsAsHtml = function(){
        
        var l = fonts.length;
        var r, s, h = '';
        
        for(var i=0; i<l; i++){
          r = this.toReadable(fonts[i]);
          s = this.toStyle(fonts[i]);
          h += '<li data-value="'+ fonts[i] +'" style="font-family: '+s['font-family'] +'; font-weight: '+s['font-weight'] +'">'+ r +'</li>';
        }
        
        return h;
      };
      
      Fontselect.prototype.toReadable = function(font){
        return font.replace(/[\+|:]/g, ' ');
      };
      
      Fontselect.prototype.toStyle = function(font){
        var t = font.split(':');
        return {'font-family': this.toReadable(t[0]), 'font-weight': (t[1] || 400)};
      };
      
      Fontselect.prototype.getVisibleFonts = function(){
      
        if(this.$results.is(':hidden')) return;
        
        var fs = this;
        var top = this.$results.scrollTop();
        var bottom = top + this.$results.height();
        
        if(this.options.lookahead){
          var li = $('li', this.$results).first().height();
          bottom += li*this.options.lookahead;
        }
       
        $('li', this.$results).each(function(){

          var ft = $(this).position().top+top;
          var fb = ft + $(this).height();

          if ((fb >= top) && (ft <= bottom)){
            var font = $(this).data('value');
            fs.addFontLink(font);
          }
          
        });
      };
      
      Fontselect.prototype.addFontLink = function(font){
      
        var link = this.options.api + font;
      
        if ($("link[href*='" + font + "']").length === 0){
			$('link:last').after('<link href="' + link + '" rel="stylesheet" type="text/css">');
		}
      };
    
      return Fontselect;
    })();

    return this.each(function(options) {        
      // If options exist, lets merge them
      if (options) $.extend( settings, options );
      
      return new Fontselect(this, settings);
    });

  };
})(jQuery);