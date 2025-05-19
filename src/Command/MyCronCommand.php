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

    protected function configure(): void
    {
        $this
            ->addArgument('date', InputArgument::REQUIRED, 'Current date')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('date');

        if ($arg1) {
            $io->note(sprintf('Argument date is: %s', $arg1));
        }

        $date = new \DateTimeImmutable($arg1)->format('d.m.Y H:i:s');

        $io->success(sprintf('Horray! Now is %s', $date));

        return Command::SUCCESS;
    }
}
