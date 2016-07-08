<?php

namespace InterviewBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class TestExtension extends Extension {

  public function load(array $configs, ContainerBuilder $container) {
//	$loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
//
//	$loader->load('security.xml');
  }

  public function getAlias() {
	return 'interview_bundle';
  }

}
