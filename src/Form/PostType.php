<?php
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
namespace App\Form;
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
use Symfony\Component\HttpFoundation\Request;


class PostType extends AbstractType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('title', TextType::class,['label' => '']);
        $builder->add('body', TextareaType::class,['label' => ' ']);
	}
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
	/**
     * @Route("/posts/new", name="post")
     */
    public function addPost(Request $request, Slugify $slugify) {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $post->setSlug($slugify->slugify($post->getTitle()));
            $post->setCreatedAt(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute('blog_posts');
        }
        return $this->render('posts\index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
