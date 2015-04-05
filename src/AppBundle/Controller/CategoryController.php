<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Category;

/**
 * Category controller.
 *
 * @Route("/category")
 */
class CategoryController extends Controller
{

    /**
     * Lists all Category entities.
     *
     * @Route("/", name="category")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('AppBundle:Category')->findAll();

        return $this->render('AppBundle:Category:index.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * Finds and displays a Category entity.
     *
     * @Route("/{id}", name="category_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('AppBundle:Category')->find($id);

        if (!$category) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        return $this->render('AppBundle:Category:show.html.twig', [
            'category' => $category,
        ]);
    }
}
