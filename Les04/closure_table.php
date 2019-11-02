<!-- https://gist.github.com/codedokode/10539720 -->
<!-- https://habr.com/ru/post/153861/ -->
<!-- https://gist.github.com/codedokode/10539720 -->
<!-- https://habr.com/ru/post/263629/ -->
<?php // - - - - Closure Table - - - - -

	function get_data($sql)
	{
		$database = 'PHP_SPL';
  		$user = 'root';
  		$pass = '';
  		$host = 'localhost';
  		$charset = 'utf8';
  		$options = [
        	\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        	\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
     	];
     	$dsn = "mysql:host=$host;dbname=$database;charset=$charset";
     	$pdo = new PDO($dsn, $user, $pass, $options);

		$get_data = $pdo->query($sql);
		$pdo = null;
		$data = $get_data->fetchAll();

		return $data;
	}

	function get_closure()
	{
		$sql = 'SELECT * FROM categories AS c JOIN category_links AS cl ON c.id_category = cl.child_id';
		return get_data($sql);
	}


	function rebuildArray($categories) {
   	$result = [];

   	foreach ($categories as $category) {
   	   if(!isset($result[$category['level']]))
   	   {
   	      $result[$category['level']] = [];
   	   }
   	   $result[$category['level']][$category['child_id']] = $category;
   	}

   	return $result;
	}
	
	function buildTree($categories, $lvl = 0) {
		if (isset($categories[$lvl])) 
			{
		   		$html = '<ul>';

		   		foreach ($categories[$lvl] as $category) 
		   			{
			      		$html .= '<li>' . $category['category_name'];

				      		if($category['parent_id'] == $category['child_id'])
					      		{
					      	      $html .= buildTree($categories, $category['level']+1);
					      		}
			      		$html .= '</li>';
		   			}

		   		$html .= '</ul>';

		   		return $html;
		   	}
	}

	function getTree($categories) 
		{
   			return buildTree(rebuildArray($categories));
		}
	echo getTree(get_closure());
?>