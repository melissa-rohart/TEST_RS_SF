<?php 
 
namespace App\Command;
 
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
 
class HttpCommandCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:status_http';
 
    protected function configure()
    {
        // ...
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Modification du statut du site");
    }
}