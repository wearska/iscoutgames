 <?php
  class Route
  {
      private $_uri = [];

      // Builds a collection of internal URL's to look for

      public function add($uri)
      {
        $this->_uri[] = '/' . trim($uri, '/');
      }

      // Makes the magic work
      public function submit()
      {
        $uriGetParam =  isset($_GET['uri']) ? '/' . $_GET['uri'] : '/';
        foreach ($this->_uri as $key => $value)
        {
          if (preg_match("#^$value$#", $uriGetParam))
          {
            if ($value == '/')
            {
              $value = '/home';
            }
            $view = "/views{$value}.php";
            require_once $view;
          }
        }
      }
  }
?>
