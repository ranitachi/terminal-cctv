<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("general.php");
include("cropimg.php");

class Product extends CI_Controller {
	
	var $general, $data;
	
	public function __construct()
	{
		parent::__construct();
		
		/*Create object class General*/
		$params = array("base_url" => base_url());
		$this->general = new General($params);
	}

	public function _remap( $method, $args = array() )
    {
		if (method_exists($this, $method))
			$this->$method($args);
		else $this->page_not_found();
    }
	
	public function page_not_found ()
	{
		/*Copy all general data*/
		$this->data = $this->general->data;
		
		$this->data["pagetitle"] = "Page Not Found";
		$this->data["currpage"] = "home";
		
		$this->template->parse_view('tpl_header', 'template/header', $this->data);
		$this->template->parse_view('tpl_footer', 'template/footer', $this->data);
		$this->template->parse_view('tpl_main', 'pagenotfound', $this->data);
		$this->template->render();
	}
	
	public function Group($args=null)
	{
		if($args == null)
		{
			$this->page_not_found();
		}
		else{
			/*Assign parameters*/
			$type = $args[0];
			
			/*Copy all general data*/
			$this->data = $this->general->data;
			
			$this->data["prodtype"] = $type;
			$this->data["pagetitle"] = "Product | " . $type;
			$this->data["currpage"] = "product";

			$this->data["tabdesc"]["en"] = 'Description';
			$this->data["tabdesc"]["id"] = 'Deskripsi';

			$this->data["tabapplication"]["en"] = 'Applications';
			$this->data["tabapplication"]["id"] = 'Pengaplikasian';

			$this->data["tabpackaging"]["en"] = 'Packaging';
			$this->data["tabpackaging"]["id"] = 'Kemasan';
			
			$this->data["dirthumb"] = "assets/images/product/thumb/" . $type;

			$dirimg = str_replace('index.php', '', $_SERVER['PHP_SELF']) . 'assets/images/';
			$this->data["dirimg"] = $dirimg;

			$this->data["imgbanner"]["BAKED_BEANS"] = $this->general->readDirectory($this->data["dirthumb"] . "/banner");
			$this->data["imgthumb"]["BAKED_BEANS"] = array(0 => array("filename" => "Bakedbeans.jpg", 
														   			  "title" => "Baked Beans (Valle Del Sole / Italy)", 
														   			  "desc" => "<h3>Baked Beans in Tomato Sauce (Kacang Panggang dalam Saus Tomat)</h3> <p>Product obtained through rehydration and burn the dried beans by adding water and salt packaged in a can. Product stabilized through sterilization process.</p> <p><strong>Ingredients:</strong>&nbsp;Beans (45%), water, tomato paste (4.5%), glucose-fructose syrup, modified maize starch, sugar, salt, flavourings and spices.</p> <p><strong>Available in 2550 gr&nbsp;and&nbsp;400 gr.</strong></p>",
														   			  "applications" => "<p><img src='$dirimg/product/thumb/BAKED_BEANS/apps/grilled-gameday-buffalo-wings.jpg' alt='' /></p>",
														   			  "packaging" => "<p><img src='$dirimg/product/thumb/BAKED_BEANS/packaging/Bakedbeans.jpg' alt='' /></p>"));
			
			$this->data["imgbanner"]["TOPPING"] = $this->general->readDirectory($this->data["dirthumb"] . "/banner");
			$this->data["imgthumb"]["TOPPING"] = array(0 => array("filename" => "creamcaramel.jpg", 
																		   "title" => "Caramel Cream Topping (Tech Food / Malaysia)", 
																		   "desc" => "<h3 style='text-align: left;'>CARAMEL CREAM TOPPING</h3> <p style='text-align: left;'>Perfect combination of supreme quality &amp; easy use. This ready-to-use cream topping is designed for strong bake stability. Rich flavour &amp; smooth texture remain unchange even after baked.</p> <p style='text-align: left;'><strong>Ingredients:</strong> Sugar, Water, Milk Solid, Milk Fat, Modified Starch, Natural Identical Flavor, Permitted Food Conditioner, Preservative and Coloring.</p> <p style='text-align: left;'><strong>Application:</strong>&nbsp;A ready to use cream topping, it can be use on bun, decoration of&nbsp;pastries, cake, tart and other bakery and confectionery applications.</p>",
																		   "applications" => "<p><img src='$dirimg/product/thumb/TOPPING/apps/Caramel Cream Topping 1.jpg' alt='' /> <img src='$dirimg/product/thumb/TOPPING/apps/Caramel Cream Topping 2.jpg' alt='' /> <img src='$dirimg/product/thumb/TOPPING/apps/Caramel Cream Topping 3.jpg' alt='' /></p>",
																		   "packaging" => "<p><img src='$dirimg/product/thumb/TOPPING/packaging/creamcaramel2.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/TOPPING/packaging/creamcaramel.jpg' alt='' /></p>"),
																1 => array("filename" => "creamchocolate.jpg", 
																		   "title" => "Chocolate Cream Topping (Tech Food / Malaysia)", 
																		   "desc" => "<h3 style='text-align: left;'>CHOCOLATE CREAM TOPPING</h3> <p style='text-align: left;'>Perfect combination of supreme quality &amp; easy use. This ready-to-use cream topping is designed for strong bake stability. Rich flavour &amp; smooth texture remain unchange even after baked.</p> <p style='text-align: left;'><strong>Ingredients:</strong> Chocolate Mass, Water, Sugar, Milk Solid, Milk Fat, Vegetable Oil, Modified Starch, Salt, Natural Identical Flavor, Permitted Food Conditioner, Preservative and Coloring.</p> <p style='text-align: left;'><strong>Application:</strong>&nbsp;A ready to use cream topping, it can be use on bun, decoration of&nbsp;pastries, cake, tart and other bakery and confectionery applications.</p>",
																		   "applications" => "<h3><img src='$dirimg/product/thumb/TOPPING/apps/Chocolate Cream Topping 1.jpg' alt='' /> <img src='$dirimg/product/thumb/TOPPING/apps/Chocolate Cream Topping 2.jpg' alt='' /> <img src='$dirimg/product/thumb/TOPPING/apps/Chocolate Cream Topping 3.jpg' alt='' /> <img src='$dirimg/product/thumb/TOPPING/apps/Chocolate Cream Topping 4.jpg' alt='' /></h3>",
																		   "packaging" => "<p><img src='$dirimg/product/thumb/TOPPING/packaging/creamchocolate2.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/TOPPING/packaging/creamchocolate.jpg' alt='' /></p>"),
																2 => array("filename" => "toppingapplecinnamon.jpg", 
																		   "title" => "Premium Apple Cinnamon Fruit Topping (Tech Food / Malaysia)", 
																		   "desc" => "<h3>APPLE CINNAMON FRUIT TOPPING</h3><p style='text-align: left;'>Perfect combination of supreme quality & easy use. It has very high fruit content up to 60% with whole pieces of fruit.</p> <p style='text-align: left;'><strong>Ingredients:</strong> -</p>  <p style='text-align: left;'><strong>Application:</strong>&nbsp;A ready to use cream topping, it can be use on bun, decoration of&nbsp;pastries, cake, tart and other bakery and confectionery applications.</p>",
																		   "applications" => "-",
																		   "packaging" => "<p><img src='$dirimg/product/thumb/TOPPING/packaging/toppingapplecinnamon2.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/TOPPING/packaging/toppingapplecinnamon.jpg' alt='' /></p>"),
																3 => array("filename" => "toppingbanana.jpg", 
																		   "title" => "Premium Banana Fruit Topping (Tech Food / Malaysia)", 
																		   "desc" => "<h3>BANANA FRUIT TOPPING</h3><p style='text-align: left;'>Perfect combination of supreme quality & easy use. It has very high fruit content up to 60% with whole pieces of fruit.</p> <p style='text-align: left;'><strong>Ingredients:</strong> Bananas, Sugar, Water, Modified Starch, Food Acid, Natural Identical Flavour, Permitted Food Conditioner, Preservative and Coloring.</p>  <p style='text-align: left;'><strong>Application:</strong>&nbsp;A ready to use cream topping, it can be use on bun, decoration of&nbsp;pastries, cake, tart and other bakery and confectionery applications.</p>",
																		   "applications" => "<h3><img src='$dirimg/product/thumb/TOPPING/apps/Premium Banana Fruit Topping 1.jpg' alt='' /> <img src='$dirimg/product/thumb/TOPPING/apps/Premium Banana Fruit Topping 2.jpg' alt='' /> <img src='$dirimg/product/thumb/TOPPING/apps/Premium Banana Fruit Topping 3.jpg' alt='' /></h3>",
																		   "packaging" => "<p><img src='$dirimg/product/thumb/TOPPING/packaging/toppingbanana2.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/TOPPING/packaging/toppingbanana.jpg' alt='' /></p>"),
																4 => array("filename" => "toppingblueberry.jpg", 
																		   "title" => "Premium Blueberry Fruit Topping (Tech Food / Malaysia)", 
																		   "desc" => "<h3>BLUEBERRY FRUIT TOPPING</h3><p style='text-align: left;'>Perfect combination of supreme quality & easy use. It has very high fruit content up to 60% with whole pieces of fruit.</p> <p style='text-align: left;'><strong>Ingredients:</strong> Wild Blueberries Whole Fruit, Sugar, Water, Modified Starch, Food Acid, Natural Identical Flavour, Permitted Food Conditioner, Preservative and Coloring.</p> <p style='text-align: left;'><strong>Application:</strong>&nbsp;A ready to use cream topping, it can be use on bun, decoration of&nbsp;pastries, cake, tart and other bakery and confectionery applications.</p>",
																		   "applications" => "<h3><img src='$dirimg/product/thumb/TOPPING/apps/Premium Blueberry Fruit Topping 1.jpg' alt='' /> <img src='$dirimg/product/thumb/TOPPING/apps/Premium Blueberry Fruit Topping 2.jpg' alt='' /> <img src='$dirimg/product/thumb/TOPPING/apps/Premium Blueberry Fruit Topping 3.jpg' alt='' /></h3>",
																		   "packaging" => "<p><img src='$dirimg/product/thumb/TOPPING/packaging/toppingblueberry2.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/TOPPING/packaging/toppingblueberry.jpg' alt='' /></p>"),
																5 => array("filename" => "toppingdarkcherry.jpg", 
																		   "title" => "Premium Dark Cherry Fruit Topping (Tech Food / Malaysia)", 
																		   "desc" => "<h3>DARK CHERRY FRUIT TOPPING</h3><p style='text-align: left;'>Perfect combination of supreme quality & easy use. It has very high fruit content up to 60% with whole pieces of fruit.</p> <p style='text-align: left;'><strong>Ingredients:</strong> Cherries Whole Fruit, Sugar, Water, Modified Starch, Natural Identical Flavor, Permitted Food Preservative and Coloring.</p> <p style='text-align: left;'><strong>Application:</strong>&nbsp;A ready to use cream topping, it can be use on bun, decoration of&nbsp;pastries, cake, tart and other bakery and confectionery applications.</p>",
																		   "applications" => "<h3><img src='$dirimg/product/thumb/TOPPING/apps/Premium Dark Cherry Fruit Topping 1.jpg' alt='' /> <img src='$dirimg/product/thumb/TOPPING/apps/Premium Dark Cherry Fruit Topping 2.jpg' alt='' /></h3>",
																		   "packaging" => "<p><img src='$dirimg/product/thumb/TOPPING/packaging/toppingdarkcherry2.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/TOPPING/packaging/toppingdarkcherry.jpg' alt='' /></p>"),
																6 => array("filename" => "toppingpeachmango.jpg", 
																		   "title" => "Premium Peach Mango Fruit Topping (Tech Food / Malaysia)", 
																		   "desc" => "<h3>PEACH MANGO FRUIT TOPPING</h3><p style='text-align: left;'>Perfect combination of supreme quality & easy use. It has very high fruit content up to 60% with whole pieces of fruit.</p> <p style='text-align: left;'><strong>Ingredients:</strong> Peaches, Mangoes, Water, Sugar, Modified Starch, Food Acid, Natural Identical Flavor, Permitted Food Conditioner, Preservative and Coloring.</p> <p style='text-align: left;'><strong>Application:</strong>&nbsp;A ready to use cream topping, it can be use on bun, decoration of&nbsp;pastries, cake, tart and other bakery and confectionery applications.</p>",
																		   "applications" => "<h3><img src='$dirimg/product/thumb/TOPPING/apps/Premium Peach Mango Fruit Topping 1.jpg' alt='' /> <img src='$dirimg/product/thumb/TOPPING/apps/Premium Peach Mango Fruit Topping 2.jpg' alt='' /> <img src='$dirimg/product/thumb/TOPPING/apps/Premium Peach Mango Fruit Topping 3.jpg' alt='' /></h3>",
																		   "packaging" => "<p><img src='$dirimg/product/thumb/TOPPING/packaging/toppingpeachmango2.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/TOPPING/packaging/toppingpeachmango.jpg' alt='' /></p>"),
																7 => array("filename" => "toppingpineapple.jpg", 
																		   "title" => "Premium Pineapple Fruit Topping (Tech Food / Malaysia)", 
																		   "desc" => "<h3>PINEAPPLE FRUIT TOPPING</h3><p style='text-align: left;'>Perfect combination of supreme quality & easy use. It has very high fruit content up to 60% with whole pieces of fruit.</p> <p style='text-align: left;'><strong>Ingredients:</strong> Pineapples, Sugar, Water, Modified Starch, Food Acid, Natural Identical Flavour, Permitted Food Conditioner, Preservative and Coloring.</p> <p style='text-align: left;'><strong>Application:</strong>&nbsp;A ready to use cream topping, it can be use on bun, decoration of&nbsp;pastries, cake, tart and other bakery and confectionery applications.</p>",
																		   "applications" => "<h3><img src='$dirimg/product/thumb/TOPPING/apps/Premium Pineapple Fruit Topping 1.jpg' alt=''  /> <img src='$dirimg/product/thumb/TOPPING/apps/Premium Pineapple Fruit Topping 2.jpg' alt=''  /> <img src='$dirimg/product/thumb/TOPPING/apps/Premium Pineapple Fruit Topping 3.jpg' alt=''  /></h3>",
																		   "packaging" => "<p><img src='$dirimg/product/thumb/TOPPING/packaging/toppingpineapple2.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/TOPPING/packaging/toppingpineapple.jpg' alt='' /></p>"),
																8 => array("filename" => "toppingraspberry.jpg", 
																		   "title" => "Premium Raspberry Fruit Topping (Tech Food / Malaysia)", 
																		   "desc" => "<h3>RASPBERRY FRUIT TOPPING</h3><p style='text-align: left;'>Perfect combination of supreme quality & easy use. It has very high fruit content up to 60% with whole pieces of fruit.</p> <p style='text-align: left;'><strong>Ingredients:</strong> Raspberries, Water, Sugar, Modified Starch, Natural Identical Flavor, Permitted Food Conditioner, Preservative and Coloring.</p> <p style='text-align: left;'><strong>Application:</strong>&nbsp;A ready to use cream topping, it can be use on bun, decoration of&nbsp;pastries, cake, tart and other bakery and confectionery applications.</p>",
																		   "applications" => "<h3><img src='$dirimg/product/thumb/TOPPING/apps/Premium Raspberry Fruit Topping 1.jpg' alt='' /> <img src='$dirimg/product/thumb/TOPPING/apps/Premium Raspberry Fruit Topping 2.jpg' alt=''  /> <img src='$dirimg/product/thumb/TOPPING/apps/Premium Raspberry Fruit Topping 3.jpg' alt=''  /></h3>",
																		   "packaging" => "<p><img src='$dirimg/product/thumb/TOPPING/packaging/toppingraspberry2.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/TOPPING/packaging/toppingraspberry.jpg' alt='' /></p>"),
																9 => array("filename" => "toppingstrawberry.jpg", 
																		   "title" => "Premium Strawberry Fruit Topping (Tech Food / Malaysia)", 
																		   "desc" => "<h3>STRAWBERRY FRUIT TOPPING</h3><p style='text-align: left;'>Perfect combination of supreme quality & easy use. It has very high fruit content up to 60% with whole pieces of fruit.</p> <p style='text-align: left;'><strong>Ingredients:</strong> Strawberries Whole Fruit, Sugar, Water, Modified Starch, Food Acid, Natural Identical Flavour, Permitted Food Conditioner, Preservative and Coloring.</p> <p style='text-align: left;'><strong>Application:</strong>&nbsp;A ready to use cream topping, it can be use on bun, decoration of&nbsp;pastries, cake, tart and other bakery and confectionery applications.</p>",
																		   "applications" => "<h3><img src='$dirimg/product/thumb/TOPPING/apps/Premium Strawberry Fruit Topping 1.jpg' alt='' /> <img src='$dirimg/product/thumb/TOPPING/apps/Premium Strawberry Fruit Topping 2.jpg' alt=''  /> <img src='$dirimg/product/thumb/TOPPING/apps/Premium Strawberry Fruit Topping 3.jpg' alt='' /></h3>",
																		   "packaging" => "<p><img src='$dirimg/product/thumb/TOPPING/packaging/toppingstrawberry2.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/TOPPING/packaging/toppingstrawberry.jpg' alt='' /></p>"));

			$this->data["imgbanner"]["DECORATING"] = $this->general->readDirectory($this->data["dirthumb"] . "/banner");
			$this->data["imgthumb"]["DECORATING"] = array(0 => array("filename" => "almondpaste2.jpg", 
																  "title" => "Almond Paste (Laped / Italy)", 
																  "desc" => "<h3 style='text-align: left;'>Almond Paste 60%</h3> <p style='text-align: left;'>High quality almond paste from blanched almonds (origin: Puglia, Italy).</p> <p style='text-align: left;'><strong>Ingredients:&nbsp;</strong>Blanched almonds (60%), sugar, water, preservative: potassium sorbate E 202.</p> <p style='text-align: left;'><strong>Use Destination:</strong>&nbsp;For baked products, almond biscuits and other specialties.</p> <p style='text-align: left;'><strong>Storage Condition:</strong>&nbsp;Sealed buckets should be stored in a cool, dry place, at room temperature. Opened buckets should be reclosed in order to avoid contact with air, that may cause the product to dry.</p>",
																  "applications" => "<p><img src='$dirimg/product/thumb/DECORATING/apps/almond paste 1.jpg' alt='' /> <img src='$dirimg/product/thumb/DECORATING/apps/almond paste 2.jpg' alt='' /></p>",
																  "packaging" => "<p><img src='$dirimg/product/thumb/DECORATING/packaging/almondpaste.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/DECORATING/packaging/almondpaste2.jpg' alt='' /></p>"),
													   1 => array("filename" => "quickfondant2.jpg", 
																  "title" => "Quick Fondant (Laped / Italy)", 
																  "desc" => "<h3>Quick Fondant</h3> <p style='text-align: left;'>Creamy fondant sugar ready-to-use for glazing. Fluid enough to be used as it is at room temperature. Thanks to its composition, it dries in a very short time.</p> <p style='text-align: left;'><strong>Ingredients:&nbsp;</strong>Liquid sugar, glucose syrup, emulsifier: E 471 mono- and diglycerides of fatty acids.</p> <p style='text-align: left;'><strong>Use Destination:</strong>&nbsp;As topping for&nbsp;cookies, donut, biscuits.</p> <p style='text-align: left;'><strong>Storage Condition:</strong>&nbsp;In a fresh and dry room, away from humidity and heat. Packages must be kept sealed and not at direct contact with the floor. They must be kept away from chemical and evil-smelling products.</p>",
																  "applications" => "<p><img src='$dirimg/product/thumb/DECORATING/apps/quick fondant1.jpg' alt='' /> <img src='$dirimg/product/thumb/DECORATING/apps/quick fondant2.jpg' alt='' /> <img src='$dirimg/product/thumb/DECORATING/apps/quick fondant3.jpg' alt=''  /></p>",
																  "packaging" => "<p><img src='$dirimg/product/thumb/DECORATING/packaging/quickfondant.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/DECORATING/packaging/quickfondant2.jpg' alt='' /></p>"),
													   2 => array("filename" => "spolverciok2.jpg", 
																  "title" => "Spolverciok 22/24 (Laped / Italy)", 
																  "desc" => "<h3>Spolverciok 22/24</h3> <p style='text-align: left;'>Spolverciok 22/24 is a special semi-manufactured obtained by a mixture of sugar, starch and 22/24 mg cocoa powder and subsequently subject to a micro-encapsulation process, which allows impermeability and endurance in contact with humid or cold products such as tiramisu and ice creams. It is not absorbed by the moisture of the product.</p> <p style='text-align: left;'><strong>Ingredients:&nbsp;</strong>Cocoa 22/24 mg, dextrose, sugar, hydrogenated vegetable fat, maize starch.</p> <p style='text-align: left;'><strong>Use Destination:</strong> It is a dusting product suitable for all humid or cool products: tiramisu, ice creams, tartufi (truffles), baked and fried products like krapfen, pancake and so on. It can also be used in mixture.</p> <p style='text-align: left;'><strong>Storage Condition:</strong> In a fresh, healthy and dry room, all packages must be kept in closed packages with no floor contact, separately from chemical or malodorous products, at a temperature of 15-20&deg;C. Good airy is suggested.</p>",
																  "applications" => "<p><img src='$dirimg/product/thumb/DECORATING/apps/spolverciok.jpg' alt='' /></p>",
																  "packaging" => "<p><img src='$dirimg/product/thumb/DECORATING/packaging/spolverciok.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/DECORATING/packaging/spolverciok2.jpg' alt='' /></p>"),
													   3 => array("filename" => "starcreamvanilla2.jpg", 
																  "title" => "Star Cream Vanilla (Laped / Italy)", 
																  "desc" => "<h3>Star Cream Vanilla</h3> <p style='text-align: left;'>Star Cream is a semi-finished product in powder form for the preparation of instant, shiny, rich and creamy pastry cream with water or milk (cold process). The finished product has no powder aftertaste. Its special composition avoids the separation of the liquid part. The finished product is freezer stable.</p> <p style='text-align: left;'><strong>Ingredients:&nbsp;</strong>Sugar, modified starch, whole and skimmed milk in powder, dextrose, preserving agent: potassium sorbate E 202, stabilizers: carrageenan E 407, xanthan gum E 415, salt; firming agent: calcium chloride; colouring agent: E 100, E 120, flavours.</p> <p style='text-align: left;'><strong>Use Destination:</strong> It can be used as a filling and if diluted with milk it can be used as a vanilla sauce for dessert.</p> <p style='text-align: left;'><strong>Storage Condition:</strong>&nbsp;In a fresh, healthy and dry room, all packages must be kept in closed packages with no floor contact, separated from chemical or malodorous products. Close packages after use.</p>",
																  "applications" => "<p><img src='$dirimg/product/thumb/DECORATING/apps/star cream vanilla.jpg' alt='' /></p>",
																  "packaging" => "<p><img src='$dirimg/product/thumb/DECORATING/packaging/starcreamvanilla.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/DECORATING/packaging/starcreamvanilla2.jpg' alt='' /></p>"),
													   4 => array("filename" => "starcreamchocolate2.jpg", 
																  "title" => "Star Cream Chocolate (Laped / Italy)", 
																  "desc" => "<h3>Star Cream Chocolate</h3> <p style='text-align: left;'>Star Cream Chocolate is a semi-finished product in powder form for the preparation of instant, shiny, rich and creamy pastry cream with water or milk (cold process). The finished product has no powder aftertaste. Its special composition avoids the separation of the liquid part. The finished product is freezer stable.</p> <p style='text-align: left;'><strong>Ingredients:&nbsp;</strong>Sugar, cocoa, modified starch, whole milk in powder, dextrose, fat-reduced cocoa, stabilizers: carrageenan E 407, xanthan gum E 415, preservative: potassium sorbate E 202, salt, firming agent: calcium chloride; flavourings.</p> <p style='text-align: left;'><strong>Use Destination:</strong>&nbsp;-</p> <p style='text-align: left;'><strong>Storage Condition:</strong>&nbsp;In a fresh, healthy and dry room, all packages must be kept in closed packages with no floor contact, separated from chemical or malodorous products. Close packages after use.</p>",
																  "applications" => "<p><img src='$dirimg/product/thumb/DECORATING/apps/star cream choco.jpg' alt='' /></p>",
																  "packaging" => "<p><img src='$dirimg/product/thumb/DECORATING/packaging/starcreamchocolate.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/DECORATING/packaging/starcreamchocolate2.jpg' alt='' /></p>"),
													   5 => array("filename" => "wonderpaste2.jpg", 
																  "title" => "Wonder Paste (Laped / Italy)", 
																  "desc" => "<h3>Wonder Paste</h3> <p style='text-align: left;'>Thin sugar paste very easy to use with rolling pin or dough sheeter, very good and natural taste, suitable for wedding cakes and celebrations. The quality of sugars and ingredients permits to have an incredible white paste, very supple. It can be coloured and deep-frozen. All its characteristics are summed in the adjective 'just wonderful'.</p> <p style='text-align: left;'><strong>Ingredients:&nbsp;</strong>Sugar, glucose syrup, refined and hydrogenated vegetable fats; stabilizers: gum arabic E 414, CMC E 466, guar gum E 412; emulsifying agent: glycerol E 422; acidifying agent: citric acid; preserving agent: potassium sorbate E 202; colouring agent: titanium dioxide E 171, flavorings.</p> <p style='text-align: left;'><strong>Use Destination:</strong>&nbsp;Ideal for covering (icing) cakes. It can kneaded with rolling ping or dough sheeter. It can be rolled extremely thin without breaking.</p> <p style='text-align: left;'><strong>Storage Condition:</strong> Store in a cool, dry place. Cartons should be kept sealed at room temperature. Packages should be carefully closed after use to prevent the remaining product from drying in the air.</p> <p style='text-align: left;'><strong>Color:</strong> Black, blue, green, pink, white, red, and yellow.</p>",
																  "applications" => "<p><img src='$dirimg/product/thumb/DECORATING/apps/wonder paste 1.jpg' alt='' /> <img src='$dirimg/product/thumb/DECORATING/apps/wonder paste 2.jpg' alt='' /> <img src='$dirimg/product/thumb/DECORATING/apps/wonder paste 3.jpg' alt='' /><img src='$dirimg/product/thumb/DECORATING/apps/wonder paste 4.jpg' alt='' /></p>",
																  "packaging" => "<p><img src='$dirimg/product/thumb/DECORATING/packaging/wonderpaste.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/DECORATING/packaging/wonderpaste2.jpg' alt='' /></p>"),
													   6 => array("filename" => "daisy2.jpg", 
													   			  "title" => "Daisy Flower Paste (Laped / Italy)", 
													   			  "desc" => "<h3>Daisy Flower Paste</h3> <p style='text-align: left;'>Ready-to-use white paste easy to knead by hand. Perfect for 3D subjects moulded by hand or with moulds. It softens by kneading by hand and dried quickly in the air. it can be coloured before and after modelling with food colours (hydrosoluble and liposoluble colours, pearl or non-pearl food lacquers, gel colours, etc.).</p> <p style='text-align: left;'><strong>Ingredients:&nbsp;</strong>starch, glucose syrup, water, hydrogenated vegetable fats; stabilisers: E 466 CMC, E 412 guar gum, E 414 gum arabic; emulsifier: E 422 glycerol; acidifier: E330 citric acid; colour: E 171 titanium dioxide; preservative: E 202 potassium sorbate; flavourings.</p> <p style='text-align: left;'><strong>Storage Condition:</strong>&nbsp;Store in a cool, dry place. Cartons should be kept sealed, not at direct contact with the floor, away from chemical or malodorous products, at room temperature. Storage room should be wee-aired. Any package should be carefully closed after use to prevent the remaining product from drying in the air.</p>",
													   			  "applications" => "<p><img src='$dirimg/product/thumb/DECORATING/apps/daisy 1.jpg' alt='' /> <img src='$dirimg/product/thumb/DECORATING/apps/daisy 2.jpg' alt='' /></p>",
													   			  "packaging" => "<p><img src='$dirimg/product/thumb/DECORATING/packaging/daisy.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/DECORATING/packaging/daisy2.jpg' alt='' /></p>"));

			$this->data["imgbanner"]["CANNED_FRUIT"] = $this->general->readDirectory($this->data["dirthumb"] . "/banner");
			$this->data["imgthumb"]["CANNED_FRUIT"] = array(0 => array("filename" => "Peach.jpg", 
																		 "title" => "Peach Halves In Syrup (All Gold / South Africa)", 
																		 "desc" => "<h3 style='text-align: justify;'>Peach Halves In Syrup (Potongan Buah Persik Dalam Sirup Kental)</h3> <p>Peach halves in syrup are prepared from sound yellow clingstone peaches with similar cultivar characteristics, which are free from defects, off suture cuts and peach stones (excluding pit extensions).</p> <p style='text-align: justify;'><strong>Ingredients:</strong> Peach Halves, Water, Cane Sugar, Citric Acid</p> <p style='text-align: justify;'><strong>Available in 822 gr</strong></p>",
																		 "applications" => "<p><img src='$dirimg/product/thumb/CANNED_FRUIT/apps/peach.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/CANNED_FRUIT/apps/peach2.jpg' alt='' /></p>",
																		 "packaging" => "<p><img src='$dirimg/product/thumb/CANNED_FRUIT/packaging/Peach.jpg' alt='' /></p>"),
															  1 => array("filename" => "Cocktail.jpg", 
															  			 "title" => "Fruit Coktail (All Gold / South Africa)", 
															  			 "desc" => "<h3 style='text-align: justify;'>Fruit Cocktail&nbsp;(Koktail&nbsp;Dalam Sirup Encer)</h3> <p>The product is a mixture of fruits in syrup. The fruits are a combination of diced peaches and pears, whole seedles grapes, pineapple pieces, and halved cherries (approved colouring).</p> <p style='text-align: justify;'><strong>Ingredients:</strong>&nbsp;Peaches, water, pears, sugar, grapes, pineapple, cherries, acidity regulator citric acid.</p> <p style='text-align: justify;'><strong>Available in 822 gr</strong></p>",
															  			 "applications" => "<p><img src='$dirimg/product/thumb/CANNED_FRUIT/apps/fruit cocktail.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/CANNED_FRUIT/apps/fruit cocktail2.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/CANNED_FRUIT/apps/fruit cocktail3.jpg' alt='' /></p>",
															  			 "packaging" => "<p><img src='$dirimg/product/thumb/CANNED_FRUIT/packaging/Cocktail.jpg' alt='' /></p>"));

			/*,
															  2 => array("filename" => "Pear_Halves_12_x_822_gr_All_Gold.jpg", 
															  			 "title" => "Pear Halves (All Gold / South Africa)", 
															  			 "desc" => "<h3 style='text-align: justify;'>Pear Halves In Syrup (Potongan Buah Pir Dalam Sirup Kental)</h3><p style='text-align: justify;'><em><strong>Ingredients:</strong> Pears, water, sugar, acidity regulator citric acid.</em></p><p style='text-align: justify;'><em><strong>Komposisi:</strong> Buah pir, air, gula, pengatur keasaman asam sitrat.</em></p><p style='text-align: justify;'><strong><em>Available in 822 gr</em></strong></p>",
															  			 "applications" => "<h3><img src='$dirimg/product/thumb/CANNED_FRUIT/apps/pear.jpg' alt='' /></h3>")*/

			$this->data["imgbanner"]["OIL"] = $this->general->readDirectory($this->data["dirthumb"] . "/banner");
			$this->data["imgthumb"]["OIL"] = array(0 => array("filename" => "EVO.jpg", 
															  "title" => "Extra Virgin Olive Oil (Valle Del Sole / Italy)", 
															  "desc" => "<h3 style='text-align: justify;'>Extra Virgin Olive Oil (Minyak Zaitun Ekstra Virgin)</h3><p style='text-align: justify;'>Made from extra virgin olive oils originating in the European Union. Superior category olive oil obtained directly from olives and solely by mechanical means.</p><p style='text-align: justify;'><strong>Ingredients:</strong>&nbsp;Extra Virgin Olive Oil&nbsp;(100%).</p><p style='text-align: justify;'><strong>Available in&nbsp;5 Ltr, 1 Ltr</strong></p>",
															  "applications" => "-",
															  "packaging" => "<p><img src='$dirimg/product/thumb/OIL/packaging/Evo2.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/OIL/packaging/Evo.jpg' alt='' /></p>"),
												   1 => array("filename" => "Pomace.jpg", 
												   			  "title" => "Pomace Olive Oil (Valle Del Sole / Italy)", 
												   			  "desc" => "<h3 style='text-align: justify;'>Pomace Olive Oil (Minyak Zaitun Pomace)</h3><p style='text-align: justify;'>Oil comprising exclusively oils obtained by processing olive pomace oil and oils obtained directly from olives.</p><p style='text-align: justify;'><strong>Ingredients:</strong>&nbsp;Olive Pomace Oil (80%),&nbsp;Extra Virgin Olive Oil&nbsp;(20%).</p><p style='text-align: justify;'><strong>Available in&nbsp;5 Ltr</strong></p>",
												   			  "applications" => "-",
												   			  "packaging" => "<p><img src='$dirimg/product/thumb/OIL/packaging/Pomace2.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/OIL/packaging/Pomace.jpg' alt='' /></p>"));
			
			$this->data["imgbanner"]["PASTA"] = $this->general->readDirectory($this->data["dirthumb"] . "/banner");
			$this->data["imgthumb"]["PASTA"] = array(0 => array("filename" => "Spaghetti.jpg", 
																	  "title" => "Spaghetti (Valle Del Sole / Italy)", 
																	  "desc" => "<h3 style='text-align: justify;'>Spaghetti 4</h3> <p>Durum wheat pasta.</p> <p><strong>Ingredients:</strong> Durum wheat semolina. Product of Italy.</p> <table class='table table-bordered'> <tbody> <tr> <td>Unit Size</td> <td>: 500 gr</td> </tr> <tr> <td>Cooking time</td> <td>: 8 mins</td> </tr> <tr> <td>Packing</td> <td>:&nbsp;24 x 500 gr NET</td> </tr> <tr> <td>Pack Type</td> <td>:&nbsp;Cello Bag</td> </tr> <tr> <td>Lenght Carton</td> <td>:&nbsp;450 mm</td> </tr> <tr> <td>Width Carton</td> <td>:&nbsp;310 mm</td> </tr> <tr> <td>Height Carton</td> <td>:&nbsp;355 mm</td> </tr> </tbody> </table>",
																	  "applications" => "<p><img src='$dirimg/product/thumb/PASTA/apps/spaghetti.jpg' alt='' /></p><p><h1><strong>Lamb Meatballs with Spicy Tomato Sauce</strong></h1></p>",
																	  "packaging" => "<p><img src='$dirimg/product/thumb/PASTA/packaging/Spaghetti.jpg' alt='' /></p> <p><img src='$dirimg/product/thumb/PASTA/packaging/Spaghetti2.jpg' alt='' /></p>"),
														   1 => array("filename" => "Linguine.jpg", 
														   			  "title" => "Linguine (Valle Del Sole / Italy)", 
														   			  "desc" => "<h3>Linguine 6</h3> <p>Durum wheat pasta.</p> <p><strong>Ingredients:</strong> Durum wheat semolina. Product of Italy.</p> <table class='table table-bordered'> <tbody> <tr> <td>Unit Size</td> <td>: 500 gr</td> </tr> <tr> <td>Cooking time</td> <td>: 7 mins</td> </tr> <tr> <td>Packing</td> <td>:&nbsp;24 x 500 gr NET</td> </tr> <tr> <td>Pack Type</td> <td>:&nbsp;Cello Bag</td> </tr> <tr> <td>Lenght Carton</td> <td>:&nbsp;450 mm</td> </tr> <tr> <td>Width Carton</td> <td>:&nbsp;310 mm</td> </tr> <tr> <td>Height Carton</td> <td>:&nbsp;355 mm</td> </tr> </tbody> </table>",
														   			  "applications" => "<p><img src='$dirimg/product/thumb/PASTA/apps/linguine.jpg' alt='' /></p><p><h1>Linguine with Spicy Shrimp</h1></p>",
														   			  "packaging" => "<p><img src='$dirimg/product/thumb/PASTA/packaging/Linguine.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/PASTA/packaging/Linguine2.jpg' alt='' /></p>"),
														   2 => array("filename" => "Pennerigate.jpg", 
														   			  "title" => "Penne Rigate (Valle Del Sole / Italy)", 
														   			  "desc" => "<h3>Penne Rigate 27</h3> <p>Durum wheat pasta.</p> <p><strong>Ingredients:</strong> Durum wheat semolina. Product of Italy.</p> <table class='table table-bordered'> <tbody> <tr> <td>Unit Size</td> <td>: 500 gr</td> </tr> <tr> <td>Cooking time</td> <td>: 11 mins</td> </tr> <tr> <td>Packing</td> <td>:&nbsp;24 x 500 gr NET</td> </tr> <tr> <td>Pack Type</td> <td>:&nbsp;Cello Bag</td> </tr> <tr> <td>Lenght Carton</td> <td>:&nbsp;450 mm</td> </tr> <tr> <td>Width Carton</td> <td>:&nbsp;310 mm</td> </tr> <tr> <td>Height Carton</td> <td>:&nbsp;355 mm</td> </tr> </tbody> </table>",
														   			  "applications" => "<p><img src='$dirimg/product/thumb/PASTA/apps/penne rigate.jpg' alt='' /></p><p><h1 class='recipe-summary__h1'>Penne and Meatballs All'Arrabbiata</h1></p>",
														   			  "packaging" => "<p><img src='$dirimg/product/thumb/PASTA/packaging/Pennerigate.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/PASTA/packaging/Pennerigate2.jpg' alt='' /></p>"),
														   3 => array("filename" => "Fusilli.jpg", 
														   			  "title" => "Fusilli (Valle Del Sole / Italy)", 
														   			  "desc" => "<h3>Fusilli 44</h3> <p>Durum wheat pasta.</p> <p><strong>Ingredients:</strong> Durum wheat semolina. Product of Italy.</p> <table class='table table-bordered'> <tbody> <tr> <td>Unit Size</td> <td>: 500 gr</td> </tr> <tr> <td>Cooking time</td> <td>: 11 mins</td> </tr> <tr> <td>Packing</td> <td>:&nbsp;24 x 500 gr NET</td> </tr> <tr> <td>Pack Type</td> <td>:&nbsp;Cello Bag</td> </tr> <tr> <td>Lenght Carton</td> <td>:&nbsp;450 mm</td> </tr> <tr> <td>Width Carton</td> <td>:&nbsp;310 mm</td> </tr> <tr> <td>Height Carton</td> <td>:&nbsp;355 mm</td> </tr> </tbody> </table>",
														   			  "applications" => "<p><img src='$dirimg/product/thumb/PASTA/apps/fusilli.jpg' alt='' /></p><p><h1 class='headline'>Fusilli with Mushroom and Roasted Butternut Squash</h1></p>",
														   			  "packaging" => "<p><img src='$dirimg/product/thumb/PASTA/packaging/Fusilli.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/PASTA/packaging/Fusilli2.jpg' alt='' /></p>"),
														   4 => array("filename" => "Lasagna.jpg", 
														   			  "title" => "Lasagna (Valle Del Sole / Italy)", 
														   			  "desc" => "<h3>Lasagne</h3> <p>Durum wheat pasta.</p> <p><strong>Ingredients:</strong> Durum wheat semolina, water. Product of Italy.</p> <table class='table table-bordered'> <tbody> <tr> <td>Unit Size</td> <td>: 500 gr</td> </tr> <tr> <td>Cooking time</td> <td>: 14 mins</td> </tr> <tr> <td>Packing</td> <td>:&nbsp;24 x 500 gr NET</td> </tr> <tr> <td>Pack Type</td> <td>:&nbsp;Cello Bag</td> </tr> <tr> <td>Lenght Carton</td> <td>:&nbsp;450 mm</td> </tr> <tr> <td>Width Carton</td> <td>:&nbsp;310 mm</td> </tr> <tr> <td>Height Carton</td> <td>:&nbsp;355 mm</td> </tr> </tbody> </table>",
														   			  "applications" => "<p><img src='$dirimg/product/thumb/PASTA/apps/lasagna.jpg' alt='' /></p><p><h1 class='articleHeadline ' style='text-align: justify;'>Tex-Mex Lasagna</h1></p>",
														   			  "packaging" => "<p><img src='$dirimg/product/thumb/PASTA/packaging/Lasagna.jpg' alt='' /></p>"),
														   5 => array("filename" => "Tagliatelle.jpg", 
														   			  "title" => "Tagliatelle Nests (Valle Del Sole / Italy)", 
														   			  "desc" => "<h3>Tagliatelle Nests 85</h3> <p>Durum wheat pasta.</p> <p><strong>Ingredients:</strong> Durum wheat semolina. Product of Italy.</p> <table class='table table-bordered'> <tbody> <tr> <td>Unit Size</td> <td>: 500 gr</td> </tr> <tr> <td>Cooking time</td> <td>: 10 mins</td> </tr> <tr> <td>Packing</td> <td>:&nbsp;24 x 500 gr NET</td> </tr> <tr> <td>Pack Type</td> <td>:&nbsp;Cello Bag</td> </tr> <tr> <td>Lenght Carton</td> <td>:&nbsp;450 mm</td> </tr> <tr> <td>Width Carton</td> <td>:&nbsp;310 mm</td> </tr> <tr> <td>Height Carton</td> <td>:&nbsp;355 mm</td> </tr> </tbody> </table>",
														   			  "applications" => "<p><img src='$dirimg/product/thumb/PASTA/apps/tagliatelle.jpg' alt='' /></p><p><h1 style='text-align: justify;'>Quorn Steak Strip and mushroom stroganoff with tarragon and tagliatelle</h1></p>",
														   			  "packaging" => "<p><img src='$dirimg/product/thumb/PASTA/packaging/Tagliatelle.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/PASTA/packaging/Tagliatelle2.jpg' alt='' /></p>"),
														   6 => array("filename" => "Fettuchine.jpg", 
														   			  "title" => "Fettuccine (Valle Del Sole / Italy)", 
														   			  "desc" => "<h3>Fettuccine 8</h3> <p>Durum wheat pasta.</p> <p><strong>Ingredients:</strong> Durum wheat semolina. Product of Italy.</p> <table class='table table-bordered'> <tbody> <tr> <td>Unit Size</td> <td>: 500 gr</td> </tr> <tr> <td>Cooking time</td> <td>: 7 mins</td> </tr> <tr> <td>Packing</td> <td>:&nbsp;24 x 500 gr NET</td> </tr> <tr> <td>Pack Type</td> <td>:&nbsp;Cello Bag</td> </tr> <tr> <td>Lenght Carton</td> <td>:&nbsp;450 mm</td> </tr> <tr> <td>Width Carton</td> <td>:&nbsp;310 mm</td> </tr> <tr> <td>Height Carton</td> <td>:&nbsp;355 mm</td> </tr> </tbody> </table>",
														   			  "applications" => "<p><img src='$dirimg/product/thumb/PASTA/apps/Fettuccine.jpg' alt='' /><h1 class='headline' style='text-align: justify;'>Fettucini in Sausage Bolognese</h1></p>",
														   			  "packaging" => "<p><img src='$dirimg/product/thumb/PASTA/packaging/Fettuchine.jpg' alt='' /></p>"));

			$this->data["imgbanner"]["TOMATOES"] = $this->general->readDirectory($this->data["dirthumb"] . "/banner");
			$this->data["imgthumb"]["TOMATOES"] = array(0 => array("filename" => "Tompel.jpg", 
																   "title" => "Whole Peeled Tomatoes (Valle Del Sole / Italy)", 
																   "desc" => "<h3 style='text-align: justify;'>Peeled Tomatoes in Tomato Juice&nbsp;(Tomat Kupas Dalam Jus Tomat)</h3><p style='text-align: justify;'>Grown in the San Marzano Valley in the South of Italy, renowned as the best tomato growing region in the world. Hand-picked luscious, red 'Roma' tomatoes canned in 100% pure tomato juice.</p><p style='text-align: justify;'><strong>Ingredients:</strong>&nbsp;Tomatoes in tomato juice, salt, acidity regulator: citric acid.</p><p style='text-align: justify;'><strong>Available in&nbsp;2550 gr</strong></p>",
																   "applications" => "<p><img src='$dirimg/product/thumb/TOMATOES/apps/tompel.jpg' alt='' /></p>",
																   "packaging" => "<p><img src='$dirimg/product/thumb/TOMATOES/packaging/tompel.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/TOMATOES/packaging/tompel2.jpg' alt='' /></p>"),
														1 => array("filename" => "Tompas.jpg", 
																   "title" => "Tomato Paste (Valle Del Sole / Italy)", 
																   "desc" => "<h3 style='text-align: justify;'>Tomato Paste (Pasta&nbsp;Tomat)</h3><p style='text-align: justify;'>Grown in the San Marzano Valley in the South of Italy, renowned as the best tomato growing region in the world. Hand-picked luscious, red 'Roma' tomatoes canned in 100% pure tomato juice.</p><p style='text-align: justify;'><strong>Ingredients:</strong>&nbsp;Tomatoes (99 %), salt.</p><p style='text-align: justify;'><strong>Available in&nbsp;2200 gr</strong></p>",
																   "applications" => "<p><img src='$dirimg/product/thumb/TOMATOES/apps/tompas.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/TOMATOES/apps/tompas2.jpg' alt='' /></p>",
																   "packaging" => "<p><img src='$dirimg/product/thumb/TOMATOES/packaging/tompas.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/TOMATOES/packaging/tompas2.jpg' alt='' /></p>"),
														2 => array("filename" => "Sundried.jpg", 
																   "title" => "Sundried Tomato In Oil (Valle Del Sole / Italy)", 
																   "desc" => "<h3 style='text-align: justify;'>Sun-Dried Tomatoes&nbsp;(Tomat Kering Dalam Minyak)</h3><p style='text-align: justify;'><strong>Ingredients:</strong>&nbsp;Sun-dried tomatoes, sunflower oil, olive oil, salt, garlic, capers, parsley, oregano, wine vinegar, chilli pepper, acidity regulator: citric acid, antioxidant: ascorbic acid.</p><p style='text-align: justify;'><strong>Available in 285 gr,&nbsp;2000 gr.</strong></p>",
																   "applications" => "<p><img src='$dirimg/product/thumb/TOMATOES/apps/sundried.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/TOMATOES/apps/sundried2.jpg' alt='' /></p>",
																   "packaging" => "<p><img src='$dirimg/product/thumb/TOMATOES/packaging/sundried.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/TOMATOES/packaging/sundried2.jpg' alt='' /></p>"));

			$this->data["imgbanner"]["VINEGAR"] = $this->general->readDirectory($this->data["dirthumb"] . "/banner");
			$this->data["imgthumb"]["VINEGAR"] = array(0 => array("filename" => "Balsamic.jpg", 
																  "title" => "Balsamic Vinegar (Valle Del Sole / Italy)", 
																  "desc" => "<h3 style='text-align: justify;'>Balsamic Vinegar</h3><p>Valle del Sole Balsamic Vinegar is made from highly selected must of white grapes. It has matured slowly inside small wooden casks of cherry for up to 10 years. An ideal dressing for salads and cooked vegetables.</p><p style='text-align: justify;'><strong>Ingredients:</strong>&nbsp;Wine vinegar, concentrated grape must, caramel, antioxidant. Contains Sulfites.</p><p style='text-align: justify;'><strong>Available in 5 ltrs.</strong></p>",
																  "applications" => "<p><img src='$dirimg/product/thumb/VINEGAR/apps/balsamic.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/VINEGAR/apps/balsamic2.jpg' alt='' /></p>",
																  "packaging" => "<p><img src='$dirimg/product/thumb/VINEGAR/packaging/balsamic.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/VINEGAR/packaging/balsamic2.jpg' alt='' /></p>"),
													   1 => array("filename" => "Capers.jpg", 
													   			  "title" => "Capers In Vinegar (Valle Del Sole / Italy)", 
													   			  "desc" => "<h3 style='text-align: justify;'>Capers In&nbsp;Vinegar</h3><p><strong>Ingredients:</strong>&nbsp;Capers, salt, wine vinegar, citric acid, ascorbic acid.</p><p style='text-align: justify;'><strong>Available in 2 Kgs.</strong></p>",
													   			  "applications" => "<p><img src='$dirimg/product/thumb/VINEGAR/apps/capers.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/VINEGAR/apps/capers2.jpg' alt='' /></p>",
													   			  "packaging" => "<p><img src='$dirimg/product/thumb/VINEGAR/packaging/capers.jpg' alt='' /></p><p><img src='$dirimg/product/thumb/VINEGAR/packaging/capers2.jpg' alt='' /></p>"));

			$this->data["imgbanner"]["FROZEN_FRIES"] = $this->general->readDirectory($this->data["dirthumb"] . "/banner");
			$this->data["imgthumb"]["FROZEN_FRIES"] = array(0 => array("filename" => "Coatedshoestring.jpg", 
																	   "title" => "Frozen Coated Shoestring French Fries (FFM / Malaysia)", 
																	   "desc" => "<h3>Kentang Beku - Coated Shoestring 1/4</h3> <p>Fried frozen French Fries (Potatoes) is a product prepared from mature and healthy tubers of the potato plant. Sorted tubers are washed, peeled &amp; cut into desired cuts and sizes. The product then passes through our production facility to achieve satisfactory color, texture and taste of natural potato product flavor.</p> <p><span style='text-decoration: underline;'><strong>Brand</strong></span></p> <p>A.TT.E French Fries</p> <p><strong>Grade: A</strong></p> <p><span style='text-decoration: underline;'><strong>Shelf Life and Storage Condition</strong></span><br />★ (-6&deg;C): 1 Week<br />★★ (-12&deg;C): 2 months<br />★★★ (-18&deg;C): 24 months (See BBE date).</p> <p>Goods must be stored and shipped at below (&le;-18&deg;C).</p>",
																	   "applications" => "<h3><img src='$dirimg/product/thumb/FROZEN_FRIES/apps/Frozen Coated Shoestring1.jpg' alt='' /> </h3>",
																	   "packaging" => "<p><strong>Box Dimension: (L) 397 X (W) 297 X (H) 250 mm</strong></p> <p><img src='$dirimg/product/thumb/FROZEN_FRIES/packaging/coatedshoestring.jpg' alt='' /></p> <p><img src='$dirimg/product/thumb/FROZEN_FRIES/packaging/coatedshoestring2.jpg' alt='' /></p> <p><img src='$dirimg/product/thumb/FROZEN_FRIES/packaging/coatedshoestring3.jpg' alt='' /></p>"),
													   		1 => array("filename" => "Shoestring.jpg", 
													   				   "title" => "Frozen Shoestring (Plain) French Fries (FFM / Malaysia)", 
													   				   "desc" => "<h3>Kentang Beku - Shoestring 1/4</h3> <p>Fried frozen French Fries (Potatoes) is a product prepared from mature and healthy tubers of the potato plant. Sorted tubers are washed, peeled &amp; cut into desired cuts and sizes. The product then passes through our production facility to achieve satisfactory color, texture and taste of natural potato product flavor.</p> <p><span style='text-decoration: underline;'><strong>Brand</strong></span></p> <p>A.TT.E French Fries</p> <p><strong>Grade: A</strong></p> <p><span style='text-decoration: underline;'><strong>Shelf Life and Storage Condition</strong></span><br />★ (-6&deg;C): 1 Week<br />★★ (-12&deg;C): 2 months<br />★★★ (-18&deg;C): 24 months (See BBE date).</p> <p>Goods must be stored and shipped at below (&le;-18&deg;C).</p>",
													   				   "applications" => "<h3><img src='$dirimg/product/thumb/FROZEN_FRIES/apps/Frozen Coated Shoestring1.jpg' alt='' /> </h3>",
													   				   "packaging" => "<p><strong>Box Dimension: (L) 397 X (W) 297 X (H) 250 mm</strong></p> <p><img src='$dirimg/product/thumb/FROZEN_FRIES/packaging/shoestring.jpg' alt='' /></p> <p><img src='$dirimg/product/thumb/FROZEN_FRIES/packaging/shoestring3.jpg' alt='' /></p> <p><img src='$dirimg/product/thumb/FROZEN_FRIES/packaging/shoestring2.jpg' alt='' /></p>"),
													   		2 => array("filename" => "Straightcut.jpg", 
													   				   "title" => "Frozen Straight Cut French Fries (FFM / Malaysia)", 
													   				   "desc" => "<h3>Kentang Beku - Straight Cut 3/8</h3> <p>Fried frozen French Fries (Potatoes) is a product prepared from mature and healthy tubers of the potato plant. Sorted tubers are washed, peeled &amp; cut into desired cuts and sizes. The product then passes through our production facility to achieve satisfactory color, texture and taste of natural potato product flavor.</p> <p><span style='text-decoration: underline;'><strong>Brand</strong></span></p> <p>A.TT.E French Fries</p> <p><strong>Grade: A</strong></p> <p><span style='text-decoration: underline;'><strong>Shelf Life and Storage Condition</strong></span><br />★ (-6&deg;C): 1 Week<br />★★ (-12&deg;C): 2 months<br />★★★ (-18&deg;C): 24 months (See BBE date).</p> <p>Goods must be stored and shipped at below (&le;-18&deg;C).</p>",
													   				   "applications" => "<h3><img src='$dirimg/product/thumb/FROZEN_FRIES/apps/Frozen Straight Cut French Fries1.jpg' alt='' /> </h3>",
													   				   "packaging" => "<p><strong>Box Dimension: (L) 397 X (W) 297 X (H) 250 mm</strong></p> <p><img src='$dirimg/product/thumb/FROZEN_FRIES/packaging/straightcut.jpg' alt='' /></p> <p><img src='$dirimg/product/thumb/FROZEN_FRIES/packaging/straightcut3.jpg' alt='' /></p> <p><img src='$dirimg/product/thumb/FROZEN_FRIES/packaging/straightcut2.jpg' alt='' /></p>"),
													   		3 => array("filename" => "Crinkle.jpg", 
													   				   "title" => "Frozen Crinkle Cut French Fries (FFM / Malaysia)", 
													   				   "desc" => "<h3>Kentang Beku - Crinkle Cut 1/2</h3> <p>Fried frozen French Fries (Potatoes) is a product prepared from mature and healthy tubers of the potato plant. Sorted tubers are washed, peeled &amp; cut into desired cuts and sizes. The product then passes through our production facility to achieve satisfactory color, texture and taste of natural potato product flavor.</p> <p><span style='text-decoration: underline;'><strong>Brand</strong></span></p> <p>A.TT.E French Fries</p> <p><strong>Grade: A</strong></p> <p><span style='text-decoration: underline;'><strong>Shelf Life and Storage Condition</strong></span><br />★ (-6&deg;C): 1 Week<br />★★ (-12&deg;C): 2 months<br />★★★ (-18&deg;C): 24 months (See BBE date).</p> <p>Goods must be stored and shipped at below (&le;-18&deg;C).</p>",
													   				   "applications" => "<h3><img src='$dirimg/product/thumb/FROZEN_FRIES/apps/Crinkle.jpg' alt='' /> </h3>",
													   				   "packaging" => "<p><strong>Box Dimension: (L) 397 X (W) 297 X (H) 250 mm</strong></p> <p><img src='$dirimg/product/thumb/FROZEN_FRIES/packaging/Crinkle.jpg' alt='' /></p> <p><img src='$dirimg/product/thumb/FROZEN_FRIES/packaging/Crinkle3.jpg' alt='' /></p> <p><img src='$dirimg/product/thumb/FROZEN_FRIES/packaging/Crinkle2.jpg' alt='' /></p>"),
													   		4 => array("filename" => "Wedges.jpg", 
													   				   "title" => "Frozen Spicy Wedges  French Fries (FFM / Malaysia)", 
													   				   "desc" => "<h3>Kentang Beku - Spicy Wedges</h3> <p>Fried frozen French Fries (Potatoes) is a product prepared from mature and healthy tubers of the potato plant. Sorted tubers are washed, peeled &amp; cut into desired cuts and sizes. The product then passes through our production facility to achieve satisfactory color, texture and taste of natural potato product flavor.</p> <p><span style='text-decoration: underline;'><strong>Brand</strong></span></p> <p>A.TT.E French Fries</p> <p><strong>Grade: A</strong></p> <p><span style='text-decoration: underline;'><strong>Shelf Life and Storage Condition</strong></span><br />★ (-6&deg;C): 1 Week<br />★★ (-12&deg;C): 2 months<br />★★★ (-18&deg;C): 24 months (See BBE date).</p> <p>Goods must be stored and shipped at below (&le;-18&deg;C).</p>",
													   				   "applications" => "<h3><img src='$dirimg/product/thumb/FROZEN_FRIES/apps/Wedges.jpg' alt='' /> </h3>",
													   				   "packaging" => "<p><strong>Box Dimension: (L) 397 X (W) 297 X (H) 250 mm</strong></p> <p><img src='$dirimg/product/thumb/FROZEN_FRIES/packaging/Wedges.jpg' alt='' /></p> <p><img src='$dirimg/product/thumb/FROZEN_FRIES/packaging/Wedges3.jpg' alt='' /></p> <p><img src='$dirimg/product/thumb/FROZEN_FRIES/packaging/Wedges2.jpg' alt='' /></p>"));
			
			$this->template->parse_view('tpl_header', 'template/header', $this->data);
			$this->template->parse_view('tpl_footer', 'template/footer', $this->data);
			$this->template->parse_view('tpl_main', 'product', $this->data);
			$this->template->render();
		}
	}
	
	public function formadd()
	{
		/*Copy all general data*/
		$this->data = $this->general->data;
		
		$this->data["pagetitle"] = "Product > New";
		$this->data["currpage"] = "product";
		$this->data["cropimgaction"] = base_url() . "product/CropImgAction";
		
		$this->template->parse_view('tpl_header', 'template/header', $this->data);
		$this->template->parse_view('tpl_main', 'productform', $this->data);
		$this->template->render();
	}
	
	public function CropImgAction()
	{
		/*Assign directory*/
		$dirimgori = "assets/images/upload/ori/";
		$dirimgcrop = "assets/images/upload/cropped/";
		
		/*Create object class Crop*/
		$this->crop = new CropImg(
			isset($_POST['avatar_src']) ? $_POST['avatar_src'] : null,
			isset($_POST['avatar_data']) ? $_POST['avatar_data'] : null,
			isset($_FILES['file']) ? $_FILES['file'] : null,
			$dirimgori,
			$dirimgcrop
		);
		
		$response = array(
		  'state'  => 200,
		  'message' => $this->crop->getMsg(),
		  'result' => $this->crop->getResult()
		);
		
		echo json_encode($response);
		//var_dump($_POST['avatar_src'] . '<br /><br />' . $_POST['avatar_data']); die();
	}
}