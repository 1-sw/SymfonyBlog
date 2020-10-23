<?php

namespace Plugin\CustomParamConverter;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class CustomParamConverter implements ParamConverterInterface
{
	function apply(Request $request, ParamConverter $configuration)
	{
		// What should I do here ?:
		// validate $configuration->getClass e.t.c ?
		
		return true;
	}
	function supports(ParamConverter $configuration)
	{
		// Or validation must be here?
	}
}