<?php defined('SYSPATH') or die('No direct script access.');


echo "installed complete! refresh to visit";
rename(APPPATH.'install'.EXT, APPPATH.'install_back'.EXT);

