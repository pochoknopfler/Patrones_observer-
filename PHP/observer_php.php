<?php
class User implements \SplSubject
{
    protected $storage;
    protected $name;

    public function __construct(\SplObjectStorage $storage)
    {
        $this->storage = $storage;
    }

    public function add($name)
    {
        $this->name = $name;
        $this->notify();
    }

    public function getName()
    {
        return $this->name;
    }

    public function attach(\SplObserver $observer)
    {
        $this->storage->attach($observer);
    }

    public function detach(\SplObserver $observer)
    {
        $this->storage->detach($observer);
    }

    public function notify()
    {
        foreach ($this->storage as $observer)
            $observer->update($this);
    }
}

class Logger implements \SplObserver
{
    public function update(\SplSubject $subject)
    {
        printf('Log: Usuario %s creado %s' . PHP_EOL, $subject->getName(), date('H:i:s'));
    }
}

class Security implements \SplObserver
{
    public function update(SplSubject $subject)
    {
        if ($subject->getName() == 'pratt')
            printf('Security: Alguien trató de crear el usuario %s' . PHP_EOL, $subject->getName());
    }
}

$user = new User(new \SplObjectStorage());
$user->attach(new Logger());
$user->attach(new Security());

$user->add('carlos');
$user->add('pratt');
$user->add('miguel');

/**
 * Resultado:
 *
 * Log: Usuario Carlos creado 19:43:32
 * Log: Usuario pratt creado 19:43:32
 * Security: Alguien trató de crear el usuario pratt
 * Log: Usuario Miguel creado 19:43:32
 */
