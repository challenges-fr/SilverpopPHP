<?php
namespace Silverpop\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Silverpop\EngagePod;

class ExportListCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('export-list')
            ->setDescription('Request an export and be notified when is available on the FTP')
            ->addArgument('email', InputArgument::REQUIRED, 'The email to be notified.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $pod = new EngagePod([
            'engage_server' => 0,
            'username' => '****',
            'password' => '****',
        ]);

        $result = $pod->exportList(3355226, $input->getArgument('email'));

        $output->writeln('Job ID: '.$result['job_id']);
        $output->writeln('File path: '.$result['file_path']);
    }
}
