<?php

namespace InterviewBundle\Command;

use InterviewBundle\Document\Bio;
use InterviewBundle\Services\BioServices;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;


class TestCommand extends ContainerAwareCommand {

  protected function configure() {
	$this
			->setName('test:command')
			->setDescription('Find BIOs data for the given ID.')
			->addArgument(
					'id', InputArgument::REQUIRED, 'Please provide a Bio ID'
			)
	;
  }

  protected function execute(InputInterface $input, OutputInterface $output) {
	$id = $input->getArgument('id');

	$helper = $this->getHelper('question');
	$question = new ConfirmationQuestion('This is a test. Do you want to continue (y/N) ? ', false);

	if (!$helper->ask($input, $output, $question)) {
	  $output->writeln('Nothing done. Exiting...');
	} else {
	  $bio = $this->getContainer()->get('doctrine_mongodb')
			  ->getRepository('InterviewBundle:Bio')
			  ->find($id);
	  if ($bio) {
		$output->writeln('Document exist.');
	  } else {
		$output->writeln('Document doesnt exist.');
	  }
	}
  }

}
