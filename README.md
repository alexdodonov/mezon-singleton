# Singleton

##Intro##

This class implements basic singleton pattern.

##Usage##

Using singleton behaviour in your applications is so simple as it can be. Just extend the class Singleton, and enjoy using it!

See the code:

```PHP
// including all necessary files
require_once( dirname( dirname( dirname( __FILE__ ) ) ).'/conf/conf.php' );
require_once( $MEZON_PATH.'/vendor/singleton/singleton.php' );

// creatingyour own class
class   MyClass extends Singleton
{
    // methods and their implementations
}
```

That's all!

You can see the [Template Engine](https://github.com/alexdodonov/mezon/tree/master/vendor/template-engine#template-engine) class for real usage of this pattern.