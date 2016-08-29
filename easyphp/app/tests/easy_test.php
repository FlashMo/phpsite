<?php
easy::cache('mcj', 'cache');
echo easy::cache('mcj');
echo easy::cache('mcj', null, 0); // delete a cache set lifetime to zero
return (easy::cache('mcj') == null);
