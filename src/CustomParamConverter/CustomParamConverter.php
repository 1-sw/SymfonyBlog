<?php

namespace Plugin\CustomParamConverter;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class CustomParamConverter implements ParamConverterInterface
{
	function apply(Request $request, ParamConverter $configuration)
	{
		// Только все ниже написанное должно браться из $configuration
		$userRequest = $this->iSerializer->deserialize($this->json, UserRequest::class, 'json');
            	$this->iValidator->validate($userRequest);
	}
	function supports(ParamConverter $configuration)
	{
            	$userResponse = $this->manager->create($userRequest);
            	return new JsonResponse($userResponse, Response::HTTP_CREATED);
	}
}