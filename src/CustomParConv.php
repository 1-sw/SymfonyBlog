<?php


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;

/**
 * @Route("/users")
 */
class CustomParConv implements ParamConverterInterface
{


    public function supports(ParamConverter $configuration)
    {
    }

    public function apply(Request $request, ParamConverter $configuration)
    {
    }
}
