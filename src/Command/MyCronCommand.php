<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:cron:railway',
    description: 'A demo command for Railways scheduler',
)]
class MyCronCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $date = new \DateTimeImmutable()->format('d.m.Y H:i:s');

        $io = new SymfonyStyle($input, $output);
        $io->success(sprintf('Horray! Now is %s', $date));

        return Command::SUCCESS;
    }
}
