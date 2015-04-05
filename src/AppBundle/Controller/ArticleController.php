<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Article;

/**
 * Article controller.
 *
 * @Route("/")
 */
class ArticleController extends Controller
{

    /**
     * Lists all Article entities.
     *
     * @Route("/", name="article")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('AppBundle:Article')->findAll();

        return $this->render('AppBundle:Article:index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * Finds and displays a Article entity.
     *
     * @Route("/article/{id}", name="article_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $article = $em->getRepository('AppBundle:Article')->find($id);

        if (!$article) {
            throw $this->createNotFoundException('Unable to find Article entity.');
        }

        return $this->render('AppBundle:Article:show.html.twig', [
            'article' => $article,
        ]);
    }
}
