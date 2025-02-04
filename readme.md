

launch this command on c,d to start the project on localhost
``` bash
php -S localhost:1010 -t public

```


this is an example of how the addRoute methode works 

['GET'=>[
    '/home'=>['controller'=>$controller,'acttion'=>$action],
    '/article'=>['controller'=>$controller,'acttion'=>$action],
    '/dashboard'=>['controller'=>$controller,'acttion'=>$action]
    ]]