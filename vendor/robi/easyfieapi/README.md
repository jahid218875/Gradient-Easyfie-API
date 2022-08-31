# EasyfieApi


require 'vendor/autoload.php';

$easyfie = new \EasyFie\EasyFie();

//call now function

Api Usages...

    $exmple_types = ['products', 'offer', 'service', 'shouts', 'article'];

    public function getToken($user, $pass)

    public function Me($token)

    public function WebData($token)

    public function getAllCategories($token)

    public function getThemesColor($token) 

    public function generatedPages($token)

    public function generatedPageSingle($token, $slug)

    public function getMetaData($token)

    public function ProductsOrBlogs($token, $type, $limit, $order $paginate)

    public function SingleData($token, $type, $id)

    public function singleCategories($token, $category_id, $limit, $paginate)

    public function Search($token, $type, $keyword, $limit)
    
    public function Orders($token, $postRequest)
